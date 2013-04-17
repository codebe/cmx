<?php

function themes_management_main() {
	$db =& getDBConn();
	$table = getTable("themes");
	
	return SQltoXML("SELECT * FROM ".$table['themes']." WHERE ".$table['themes_column']['active']."='1'", "Themes");
}

function install_theme() {
	$db =& getDBConn();
	$table = getTable("themes");
	
	$upload_file = $_GET['new_theme_path'];
	$new_file = CMX_THEME_DIR.basename($upload_file);
	
	if (!copy($upload_file, $new_file)) {
		echo "failed to copy $file....\n";
	}
	
	/* Init. ArchiveExtractor Object */
	$archExtractor = new ArchiveExtractor();
	$extractedFileList = $archExtractor->extractArchive('themes/'.basename($upload_file), 'themes/');
	unlink($new_file);
	
	$result = $db->Execute("INSERT INTO ".$table['themes']." ( `name` , `active` , `directory` )
							VALUES ('".$_GET['new_theme_name']."', '1', '".basename($upload_file, ".zip")."');");

	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 

	return SQltoXML("SELECT * FROM ".$table['themes']." WHERE ".$table['themes_column']['active']."='1'", "Themes");
}

function delete_theme() {
	$db =& getDBConn();
	$table = getTable("themes");
			
	// Implement Delete directory
	$directory = CMX_THEME_DIR.$_GET['delete_theme_name'];
	rm($directory);
	
	$result = $db->Execute(" DELETE FROM ".$table['themes']." WHERE ".$table['themes_column']['directory']." = '".$_GET['delete_theme_name']."'");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT * FROM ".$table['themes']." WHERE ".$table['themes_column']['active']."='1'", "Themes");
}

?>