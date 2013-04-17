<?php

function main_function() {
	$db =& getDBConn();
	$table = getTable("modules");
	
	return SQltoXML("SELECT * FROM ".$table['modules']." WHERE ".$table['modules_column']['activated']."='1'", "Modules");
}

function install_module() {
	$db =& getDBConn();
	$table = getTable("modules");
	
	// Using for table file and data file
	$table_prefix = getConfigVar('prefix');
	$table_type = getConfigVar('dbtype');
	
	$upload_file = $_GET['module_path'];
	$new_file = CMX_MODULE_DIR.basename($upload_file);
	
	if (!copy($upload_file, $new_file)) {
		echo "failed to copy $file....\n";
	}
	
	/* Init. ArchiveExtractor Object */
	$archExtractor = new ArchiveExtractor();
	$extractedFileList = $archExtractor->extractArchive('modules/'.basename($upload_file), 'modules/');
	unlink($new_file);
	
	include (CMX_MODULE_DIR.basename($upload_file, ".zip")."/__init.php");
	include (CMX_MODULE_DIR.basename($upload_file, ".zip")."/".$moddata['tablefile']);
	include (CMX_MODULE_DIR.basename($upload_file, ".zip")."/".$moddata['datafile']);
		
	// Create Table	from table file
	for ($i=0; $i<count($table_sql); $i++) {
		$result = $db->Execute($table_sql[$i]['query']);
		if (!is_object($result)) {
			$e = ADODB_Pear_Error();
			echo '<p><b>'.$e->message.'</b>'; 
		}
	}
	
	// Execute Query from data file
	for ($i=0; $i<count($data_sql); $i++) {
		$result = $db->Execute($data_sql[$i]['query']);
		if (!is_object($result)) {
			$e = ADODB_Pear_Error();
			echo '<p><b>'.$e->message.'</b>'; 
		} 
	}
	
	$result = $db->Execute("INSERT INTO ".$table['modules']." 
								( `name` , `type` , `displayname`, `description`, `directory`, `version`, 
									`admin_capable`, `user_capable`, `guest_capable`, `activated` )
							VALUES ('".$moddata['name']."', 'modules', '".$moddata['displayname']."', '".$moddata['description']."', '".basename($upload_file, ".zip")."',
										'".$moddata['version']."',  ".$moddata['admin'].", ".$moddata['user'].", ".$moddata['guest'].", 1);");

	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	// Copy the information table
	$information_file = CMX_MODULE_DIR.basename($upload_file, ".zip")."/".$moddata['tableinfo'];
	if (!copy($information_file, CMX_CORE_TABLES.$moddata['tableinfo'])) {
		echo "failed to copy $file....\n";
	}

	return SQltoXML("SELECT * FROM ".$table['modules']." WHERE ".$table['modules_column']['activated']."='1'", "Modules");
}

function show_modules() {
	$db =& getDBConn();
	$table = getTable("modules");
	
	return SQltoXML("SELECT * FROM ".$table['modules']." WHERE TRUE", "Modules");
}

function deactivating_module() {
	$db =& getDBConn();
	$table = getTable("modules");
	
	$result = $db->Execute("UPDATE ".$table['modules']." SET ".$table['modules_column']['activated']."=0 
							WHERE ".$table['modules_column']['id']."=".$_GET['moduleID']."");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT * FROM ".$table['modules']." WHERE TRUE", "Modules");
}

function activating_module() {
	$db =& getDBConn();
	$table = getTable("modules");
	
	$result = $db->Execute("UPDATE ".$table['modules']." SET ".$table['modules_column']['activated']."=1 
							WHERE ".$table['modules_column']['id']."=".$_GET['moduleID']."");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT * FROM ".$table['modules']." WHERE TRUE", "Modules");
}

function delete_module() {
	$db =& getDBConn();
	$table = getTable("modules");
	
	// Using for table file and data file
	$table_prefix = getConfigVar('prefix');
	$table_type = getConfigVar('dbtype');
	
	$result = $db->Execute("SELECT ".$table['modules_column']['directory']." FROM ".$table['modules']." WHERE ".$table['modules_column']['id']."=".$_GET['moduleID']."");
	for (; !$result->EOF; $result->MoveNext()) {
		list($module_name) = $result->fields;
		
		// Implement delete module
		$module_directory = CMX_MODULE_DIR.$module_name;
		
		// Delete database
		include ($module_directory.'/__table.php');
		
		// Delete table	from table file
		for ($i=0; $i<count($table_name); $i++) {
			$delete = $db->Execute("DROP TABLE ".$table_name[$i]['table']);
			if (!is_object($result)) {
				$e = ADODB_Pear_Error();
				echo '<p><b>'.$e->message.'</b>'; 
			}
		}
		
		// Delete files
		rm($module_directory);
	}			
	
	$result = $db->Execute("DELETE FROM ".$table['modules']." WHERE ".$table['modules_column']['id']."=".$_GET['moduleID']."");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT * FROM ".$table['modules']." WHERE TRUE", "Modules");
}

?>