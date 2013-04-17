<?php
	include ('../init-file.php');
	include (CMX_LANGUAGE);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Installation Page</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body{padding: 20px;background-color: #FFF; text-align: left;
    font: 76% Verdana,Arial,sans-serif}
h1,h2,p{margin: 0 10px}
h1{font-size: 250%;color: #4396D8;letter-spacing: 1px}
h2{font-size: 200%;color: #FFF}
h3{font-size: 100%;margin:0;padding: 0 0 3px;background: #99CC00;color: #000;text-align: left}
p{padding-bottom:1em}
h2{padding-top: 0.3em}
div#container{width:850px;margin: 0 auto;text-align:center}
div#header{float: right;background: #FFFF99;width:330px}
div#content{background: #FFFF99;width:500px}
div#content2{background: #FFFF99;width:500px}
</style>
<link rel="stylesheet" type="text/css" href="../includes/nifty/niftyCorners.css">
<link rel="stylesheet" type="text/css" href="../includes/nifty/niftyPrint.css" media="print">
<link rel="stylesheet" type="text/css" href="../default-style/default.css"/>
<script type="text/javascript" src="../includes/nifty/nifty.js"></script>
<script type="text/javascript">
window.onload=function(){
if(!NiftyCheck())
    return;
RoundedTop("div#header","#E6FCE4","#99CC00");
RoundedBottom("div#header","#E6FCE4","#FFFF99");	
RoundedTop("div#content2","#E6FCE4","#99CC00");
RoundedBottom("div#content2","#E6FCE4","#99CC00");
RoundedTop("div#content","#E6FCE4","#99CC00");
RoundedBottom("div#content","#E6FCE4","#FFFF99");
}
</script>
</head>
<body>
  <?php
			if (empty($_POST['dbserver'])) {
				$_POST['dbserver'] = 'mysql';
			}
			if (empty($_POST['host'])) {
				$_POST['host'] = '127.0.0.1';
			}
			if (empty($_POST['user'])) {
				$_POST['user'] = 'root';
			}
			if (empty($_POST['dbtype'])) {
				$_POST['dbtype'] = 'MyISAM';
			}

			if (isset($_POST['Submit']) && ($_POST['Submit'] == "Submit")) {
				if ($_POST['dbserver'] == "sqlite") {
					@include_once (CMX_ADODB_ERROR);
					@include_once (CMX_ADODB);
					@include_once (CMX_ADODB_HTML);
					include_once 'sql/table_initial.php';
					include_once 'sql/data_initial.php';
					include_once 'update_config_file.php';

					// Initialization Database
					$db = ADONewConnection($_POST['dbserver']);					
					@$db->Connect('0666');									
					if ($_POST['createdb'] == "createdb") {
						$result = $db->Execute("CREATE DATABASE ". $_POST['dbname']);
						if (!is_object($result)) {
							$e = ADODB_Pear_Error();
							echo '<p><b>'.$e->message.'</b>'; 
						}
						$db->Disconnect();
						echo $TEXT['created-db']. "<br />";
					}
					@$db->Connect($_POST['dbname'], '0666');
					
					// Create Tables
					echo "<p><b>DBServer: $_POST[dbserver], Number of Tables : ".count($table_sql)."</b><p>";
					for ($i=0; $i<count($table_sql); $i++) {
						$result = $db->Execute($table_sql[$i]['query']);
						if (!is_object($result)) {
							$e = ADODB_Pear_Error();
							echo '<p><b>'.$e->message.'</b>'; 
						} else {
							echo $table_name[$i]['table']. " created succesfully <br/>";
						}
					}

					// Update Data Information
					for ($i=0; $i<count($data_sql); $i++) {
						$result = $db->Execute($data_sql[$i]['query']);
						if (!is_object($result)) {
							$e = ADODB_Pear_Error();
							echo '<p><b>'.$e->message.'</b>'; 
						} 
					}					
					
					// Update to Config File
					update_config_php($_POST['dbserver'], $_POST['host'], $_POST['user'], $_POST['dbpassword'], 
										$_POST['dbname'], $_POST['dbprefix'], $_POST['dbtype']);
					
					echo "<p><b>".$TEXT['post-installation']."</b></p>"; exit();
				} else {
					if (($_POST['dbserver'] == "mysql") || ($_POST['dbserver'] == "postgres7") || ($_POST['dbserver'] == "ibase") || ($_POST['dbserver'] == "mssql") || ($_POST['dbserver'] == "borland_ibase") || ($_POST['dbserver'] == "firebird") || ($_POST['dbserver'] == "mssqlpo") || ($_POST['dbserver'] == "maxsql") || ($_POST['dbserver'] == "oci8") || ($_POST['dbserver'] == "oci805") || ($_POST['dbserver'] == "oci8po") || ($_POST['dbserver'] == "postgres") || ($_POST['dbserver'] == "oracle") || ($_POST['dbserver'] == "postgres64") || ($_POST['dbserver'] == "sybase")) {
						include_once (CMX_ADODB_ERROR);
						include_once (CMX_ADODB);
						include_once (CMX_ADODB_HTML);
						include_once 'sql/table_initial.php';
						include_once 'sql/data_initial.php';
						include_once 'update_config_file.php';

						// Initialization Database
						$db = ADONewConnection($_POST['dbserver']);
						@$db->Connect($_POST['host'], $_POST['user'], $_POST['dbpassword']);								
						if ($_POST['createdb'] == "createdb") {
							$result = $db->Execute("CREATE DATABASE ". $_POST['dbname']);
							if (!is_object($result)) {
								$e = ADODB_Pear_Error();
								echo '<p><b>'.$e->message.'</b>'; 
							}
							$db->Disconnect();
							echo $TEXT['created-db']. "<br />";
						}
						@$db->Connect($_POST['host'], $_POST['user'], $_POST['dbpassword'], $_POST['dbname']);
										
						// Create Tables					
						echo "<p><b>DBServer: $_POST[dbserver], Number of Tables : ".count($table_sql)."</b><p>";
						for ($i=0; $i<count($table_sql); $i++) {
							$result = $db->Execute($table_sql[$i]['query']);
							if (!is_object($result)) {
								$e = ADODB_Pear_Error();
								echo '<p><b>'.$e->message.'</b>'; 
							} else {
								echo $table_name[$i]['table']. " created succesfully <br/>";
							}
						}
						
						// Update Data Information
						for ($i=0; $i<count($data_sql); $i++) {
							$result = $db->Execute($data_sql[$i]['query']);
							if (!is_object($result)) {
								$e = ADODB_Pear_Error();
								echo '<p><b>'.$e->message.'</b>'; 
							} 
						}

						// Update to Config File
						update_config_php($_POST['dbserver'], $_POST['host'], $_POST['user'], $_POST['dbpassword'], 
											$_POST['dbname'], $_POST['dbprefix'], $_POST['dbtype']);
						
						echo "<p><b>".$TEXT['post-installation']."</b></p>"; exit();
					} else {
						print_r($TEXT['ADOdb-notdbserver']);
					}
				}
			}
		?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div id="container">
    <div id="header">
      <table width="330" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="3" align="left"><h3> &nbsp;<?php echo $TEXT['installation-title']; ?></h3></td>
        </tr>
        <tr>
          <td colspan="3" align="left" class="legal"><?php echo $TEXT['ADOdb-description']; ?></td>
        </tr>
      </table>
    </div>

    <div id="content">
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="4" align="left"><h3> &nbsp;Database Setup </h3></td>
        </tr>
        <tr>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="250"><?php echo $TEXT['db-server']; ?></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150"><?php echo $TEXT['db-host']; ?></td>
        </tr>
        <tr>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="250"><input type="text" name="dbserver" size="30" value="<?php echo $_POST['dbserver']; ?>" disabled="disabled"></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150"><input type="text" name="host" size="30" value="<?php echo $_POST['host']; ?>"></td>
        </tr>
        
        <tr>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="250"><?php echo $TEXT['db-user']; ?></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150"><?php echo $TEXT['db-password']; ?></td>
        </tr>
        <tr>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="250"><input type="text" name="user" size="30" value="<?php echo $_POST['user']; ?>"></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150"><input type="password" name="dbpassword" size="30" value="<?php echo $_POST['dbpassword']; ?>"></td>
        </tr>
        
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><?php echo $TEXT['db-name']; ?></td>
          <td align="left">&nbsp;</td>
          <td align="left"><?php echo $TEXT['db-prefix']; ?></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><input name="dbname" type="text" id="dbname" value="<?php echo $_POST['dbname']; ?>" size="30"></td>
          <td align="left">&nbsp;</td>
          <td align="left"><input name="dbprefix" type="text" id="dbprefix" value="<?php echo $_POST['dbprefix']; ?>" size="30"></td>
        </tr>
        
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><?php echo $TEXT['db-type']; ?></td>
          <td align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><input name="dbtype" type="text" id="dbtype" value="<?php echo $_POST['dbtype']; ?>" size="30" disabled="disabled"></td>
          <td align="left">&nbsp;</td>
          <td align="left"><input name="createdb" type="checkbox" id="createdb" value="createdb">
            Create New Database</td>
        </tr>
      </table>
    </div>
    <br>
    <div id="content2">
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="4" align="left"><h3> &nbsp;Administrator Setup </h3></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><?php echo $TEXT['admin-name']; ?></td>
          <td align="left">&nbsp;</td>
          <td align="left" width="150"><?php echo $TEXT['admin-user']; ?></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><input name="adminname" type="text" id="adminname" value="<?php echo $_POST['adminname']; ?>" size="30"></td>
          <td align="left">&nbsp;</td>
          <td align="left" width="150"><input name="adminuser" type="text" id="adminuser" value="<?php echo $_POST['adminuser']; ?>" size="30"></td>
        </tr>
        
        <tr>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="250"><?php echo $TEXT['admin-password']; ?></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150"><?php echo $TEXT['admin-repassword']; ?></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left" width="250"><input name="adminpassword" type="password" id="adminpassword" value="<?php echo $_POST['adminpassword']; ?>" size="30"></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150"><input name="adminrepassword" type="password" id="adminrepassword" value="<?php echo $_POST['adminrepassword']; ?>" size="30"></td>
        </tr>
        
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left" width="250"><?php echo $TEXT['admin-email']; ?></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150">&nbsp;</td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left" width="250"><input name="adminemail" type="text" id="adminemail" value="<?php echo $_POST['adminemail']; ?>" size="30"></td>
          <td align="left" width="10">&nbsp;</td>
          <td align="left" width="150">&nbsp;</td>
        </tr>
        
        <tr>
          <td colspan="4" align="right" class="title"><input name="Reset" type="reset" id="Reset" value="Reset">
            &nbsp;
          <input name="Submit" type="submit" id="Submit" value="Submit"> &nbsp;</td>
        </tr>
      </table>
    </div>
  </div>
</form>
</body>
</html>
