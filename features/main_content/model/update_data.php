<?php
include ("../../../init-file.php");
include (CMX_ADODB_ERROR);
include (CMX_ADODB);
include (CMX_ADODB_HTML);
include (CMX_MAIN_API);
include (CMX_CONFIG_FILE);

if ( isset( $_POST ) )
   $postArray = &$_POST ;			// 4.1.0 or later, use $_POST
else
   $postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

foreach ( $postArray as $sForm => $value )
{
	if ( get_magic_quotes_gpc() )
		$postedValue = stripslashes( $value );
	else
		$postedValue = $value;
}

cmxDBInit();
$db =& getDBConn();
$table = getTable("blocks");

$result = $db->Execute("UPDATE ".$table['blocks']." 
						SET `content` = '".$postedValue."'							
						WHERE ".$table['blocks_column']['name']."='content'");	
						
if (!is_object($result)) {
	$e = ADODB_Pear_Error();
	echo '<p><b>'.$e->message.'</b></p>'; 
	return false;
} 				
	
?>


