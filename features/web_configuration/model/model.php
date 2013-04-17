<?php

function web_configuration_main() {
	$db =& getDBConn();
	$table = getTable("web_profile");
	$theme = getTable("themes");
	
	return SQltoXML("SELECT DISTINCT  * FROM ".$table['web_profile'].", ".$theme['themes']." WHERE TRUE", "Profile");
}

function web_configuration_update() {
	$db =& getDBConn();
	$table = getTable("web_profile");
						
	$result = $db->Execute("UPDATE ".$table['web_profile']." 
							SET 
								`web_name` = '".$_GET['web_name']."',
								`web_title` = '".$_GET['web_title']."',
								`web_author` =  '".$_GET['web_author']."',
								`web_url` = '".$_GET['web_url']."',
								`web_description` = '".$_GET['web_description']."', 
								`web_keywords` = '".$_GET['web_keywords']."',
								`web_default_theme` = '".$_GET['web_default_theme']."'
							WHERE TRUE");
							
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT  * FROM ".$table['web_profile']." WHERE TRUE", "Profile");
}
?>