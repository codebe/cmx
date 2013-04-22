<?php
/** Initialization coreAPI
*  	coreAPI provide functionality for UI, Database, and Control
*	@return void
*/
$webIncludeFile = array();
$coreIncludeScript = array (CMX_FREZA, CMX_AJAXCORE_JS, CMX_PROTOTYPE, CMX_SCRIPTACULOUS, 
	CMX_UNITTEST, CMX_MAIN_SCRIPT, CMX_FCKEDITOR_JS);

include (CMX_CORE_DB);
include (CMX_CORE_XML);
include (CMX_CORE_UI);
include (CMX_CORE_IO);

function initAPI() {

	global $webIncludeFile, $coreIncludeScript ;
	
	// Initialization
	cmxDBinit();
	
	// Module and Features Javascript Library
	$db =& getDBConn();	
	$table = getTable("modules");
	
	$result = $db->Execute("SELECT ".$table['modules_column']['directory'].", ".$table['modules_column']['type']." FROM ".$table['modules']." WHERE ".$table['modules_column']['activated']."=1");
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	$webIncludeFile['javascript'] = "";
		foreach ($coreIncludeScript as $key => $value) {
		$webIncludeFile['javascript'] .= "<script language=\"javascript\" src=\"".$value."\"></script>\n";
	}
	
	for (; !$result->EOF; $result->MoveNext()) {
		list($directory, $type) = $result->fields;

		if ($type == "features") {
			$webIncludeFile['javascript'] .= "<script language=\"javascript\" src=\"features/".$directory."/control/control.js\"></script>\n";
		} else {
			$webIncludeFile['javascript'] .= "<script language=\"javascript\" src=\"modules/".$directory."/control/control.js\"></script>\n";
		}
	}
	
	// CSS and XSL Themes Location
	$webIncludeFile['javascript'] = rtrim($webIncludeFile['javascript']);
	$webIncludeFile['xsl'] = "themes/".getActiveTheme()."/index.xsl";
	$webIncludeFile['css'] = "themes/".getActiveTheme()."/style.css";	
	
	return true;
}

function getConfigVar($param) {
	global $cmxConfig;	
	if ($param == "ALL") 
		return $cmxConfig;
	else
		return $cmxConfig[$param];
}

function getUserMode() {
	if (isset($_SESSION['user_login'])) {		
		$db =& getDBConn();
		$table = getTable("users");
		
		$result = $db->Execute("SELECT ".$table['users_column']['umode']." FROM ".$table['users']." WHERE ".$table['users_column']['uname']."='".$_SESSION['user_login']."'");
		list($status) = $result->fields;
		
		$result->Close();		
		return $status;
	} else {
		return 'Guest';
	}
}


///////////////////////// functionality for Tables /////////////////////
/** Return information desired table
*	@return bool
*/
function getTable($table_name) {
	include (CMX_CORE_TABLES."__".$table_name.".php");
	return $cTable;
}

///////////////////////// functionality for AJAX Interface - XSLT /////////////////////
function getWebProperties() {

	$db =& getDBConn();
	$table = getTable("web_profile");
	
	$result = $db->Execute("SELECT * FROM ".$table['web_profile']." WHERE TRUE");
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	for (; !$result->EOF; $result->MoveNext()) {
		list($id, $profile, $name, $title, $author, $url, $description, $keywords, $theme) = $result->fields;
	}
	
	
	$result->Close();
	return array ("web_name" => $name, "web_title" => $title, "web_author" => $author, "web_description" => $description, "web_keywords" => $keywords);
}

///////////////////////// functionality for Control /////////////////////
/** Rendering main page
*	@return bool
*/
function getActiveTheme() {
	global $cmxConfig;
	$db =& getDBConn();	
	
	if (isset($_SESSION['user_login'])) {
		// User has login
		$table = getTable("users");
		$result = $db->Execute("SELECT ".$table['users_column']['user_theme']." FROM ".$table['users']." WHERE ".$table['users_column']['uname']."='".$_SESSION['user_login']."'");
		$result->Close();
	} else {
		// User hasnot login
		$table = getTable("web_profile");
		$result = $db->Execute("SELECT ".$table['web_profile_column']['web_default_theme']." FROM ".$table['web_profile']." WHERE TRUE");
		$result->Close();
	}
	
	list($theme) = $result->fields;	
	return $theme;
}

function getListActiveMenu() {
	$db =& getDBConn();	
	$table = getTable("modules");
	
	return SQltoXML("SELECT  * FROM ".$table['modules']." WHERE ".$table['modules_column']['activated']."=1", "Module");
}


?>
