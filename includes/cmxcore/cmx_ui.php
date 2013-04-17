<?php

function cmxAJAXinit() {
	$GLOBALS['ajaxcore'] = new AJAXCore();
}

function &getAJAXobj() {
	return $GLOBALS['ajaxcore'];
}

function getViewBlockData($block_name, $features = "", $modules = "") {
	$directory = ($features == "") ? (($modules == "") ? "" : $modules) : $features;
	
	if ($block_name == "mainpage") {
		return file_get_contents(CMX_ROOT_DIR."/themes/".getActiveTheme()."/index.xsl");
	} else {
		return file_get_contents(CMX_XSL_BLOCK.$block_name.".xsl");;
	}	
}

function getModelBlockData($block_name, $root_name = "root", $child_name = "child", $blockID = 0) {
	$db =& getDBConn();
	$table = getTable("blocks");
	
	$result = $db->Execute("SELECT ".$table['blocks_column']['content'].",".$table['blocks_column']['content_type']." FROM ".$table['blocks']." WHERE ".$table['blocks_column']['name']."='".$block_name."'");
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
	} 
	
	for (; !$result->EOF; $result->MoveNext()) {
		list($content, $type) = $result->fields;	
		if ($type == "array")
			$content = unserialize($content);
	}
	
	$result->Close();		
	$xmlresult = ($type=="array") ? ArraytoXML($content, "root", true, $child_name, $blockID):TexttoXML($content, $root_name, $child_name, $blockID);
	return $xmlresult;
}

function getModelFileData($modules, $function, $type = "feature", $blockID) {
	$directory = ($type == "feature") ? "features" : "modules";
	$GLOBALS['blockID'] = $blockID;
	
	include ($directory."/".$modules."/model/model.php");
	return $function();
}

function getActionFileData($modules, $function, $type = "feature") {
	$directory = ($type == "feature") ? "features" : "modules";
	
	include ($directory."/".$modules."/model/model.php");
}

?>