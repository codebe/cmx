<?php 

include ("../../../init-file.php");
include (CMX_ADODB_ERROR);
include (CMX_ADODB);
include (CMX_ADODB_HTML);
include (CMX_FCK_EDITOR);
include (CMX_MAIN_API);
include (CMX_CONFIG_FILE);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Content Editor</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="robots" content="noindex, nofollow">
	</head>
	<body>
		<form method="post" target="_self" action="update_data.php" onSubmit="window.close();">
			<?php			
			cmxDBInit();
			$db =& getDBConn();
			$table = getTable("blocks");
			
			$result = $db->Execute("SELECT ".$table['blocks_column']['content']." FROM ".$table['blocks']."
									WHERE ".$table['blocks_column']['name']."='content'");
			
			if (!is_object($result)) {
				$e = ADODB_Pear_Error();
				echo '<p><b>'.$e->message.'</b></p>'; 
				return false;
			} 
			
			for (; !$result->EOF; $result->MoveNext()) {
				list($content) = $result->fields;		
			}
			
			$sBasePath = '../../../includes/fckeditor/' ;
			
			$oFCKeditor = new FCKeditor('Instance') ;
			$oFCKeditor->BasePath	= $sBasePath ;
			$oFCKeditor->Value		= $content ;
			$oFCKeditor->Width  	= '100%' ;
			$oFCKeditor->Height 	= '400' ;
			$oFCKeditor->Create() ;
			?>
			<input type="submit" value="Submit">
	</form>
	</body>
</html>