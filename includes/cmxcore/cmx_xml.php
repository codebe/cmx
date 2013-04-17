<?php

function xmlDomInit() {
	$GLOBALS['xmlDocument'] = new DomDocument;
}

function &getXMLDom() {
	return $GLOBALS['xmlDocument'];
}

function SQltoXML($query, $table_name, $root_name = "root", $exchange_row_name = "") {
	global $cmxConfig;
	
	$dbObj =& getDBConn();
	$result = $dbObj->Execute($query);
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b>'; 
		return false;
	} 

	$xmlDocument = new DomDocument;
	$root=$xmlDocument->createElement($root_name);
	$xmlDocument->appendChild($root);
	
	if (!empty($exchange_row_name)) {
		$row_name = $exchange_row_name;
	} else {
		$row_name = $table_name;
	} 
	
	if ($result->EOF) {
		$blockID = $xmlDocument->createElement('blockID');
		$root->appendChild($blockID);
		$IDValue = $xmlDocument->createTextNode($GLOBALS['blockID']);
		$blockID->appendChild($IDValue);
	}

	for (; !$result->EOF; $result->MoveNext()) {
		$array_value = $result->fields;
		$column = array_filter(array_keys($result->fields), "is_string");
		
		// Add the Node is Row Name [Name of Table]
		$child = $xmlDocument->createElement($row_name);
		$root->appendChild($child);
		
		// Add the Node Child of Row Name, Node and Text
		$blockID = $xmlDocument->createElement('blockID');
		$child->appendChild($blockID);		
		$IDValue = $xmlDocument->createTextNode($GLOBALS['blockID']);
		$blockID->appendChild($IDValue);
		
		foreach ($column as $key => $value) {		
			$element = $xmlDocument->createElement($value);
			$child->appendChild($element); 
			$child_value=$xmlDocument->createTextNode($array_value[$value]);
			$element->appendChild($child_value);
		}
	}
	
	$result->Close();
	return $xmlDocument->saveXML();
}

function TexttoXML($text, $root_name = "root", $child_name = "child", $blockID = 0) {
	$xmlDocument = new DomDocument;
	$root=$xmlDocument->createElement($root_name);
	$xmlDocument->appendChild($root);
	
	$blockNode = $xmlDocument->createElement('blockID');
	$root->appendChild($blockNode);
	
	$blockValue = $xmlDocument->createTextNode($blockID);
	$blockNode->appendChild($blockValue);
	
	$child = $xmlDocument->createElement($child_name);
	$root->appendChild($child);
	
	$child_value=$xmlDocument->createTextNode($text);
	$child->appendChild($child_value);
	
	return $xmlDocument->saveXML();
}

function ArraytoXML($array_source, $root_name = "root", $is_need_child_name = false, $child_name = "", $blockID = 0) {
	
	xmlDomInit();
	$xmlDocument =& getXMLDom();
	$root=$xmlDocument->createElement($root_name);
	$xmlDocument->appendChild($root);
	for ($i=0; $i<count($array_source); $i++) {
		$array_source[$i]['blockID'] = $blockID;
	}

	$array_source = array_reverse($array_source);
	
	while (!count($array_source) == 0) {
	
		if ($is_need_child_name) {
			$child = $xmlDocument->createElement($child_name);
			$root->appendChild($child);
		}
		
		$child_array = array_pop($array_source);
		array_walk($child_array, "parseArrayToXML", $child);
	}
	
	return $xmlDocument->saveXML();
}

function parseArrayToXML($value, $key, &$child) {
	$xmlDocument =& getXMLDom();
	
	if (is_array($value)) {
		$node = $xmlDocument->createElement($key);
		$child->appendChild($node); 
		array_walk($value, "parseArrayToXML", $node);
	} else {
		$element = $xmlDocument->createElement($key);
		$child->appendChild($element); 
		$child_value=$xmlDocument->createTextNode($value);
		$element->appendChild($child_value);
	}
	
}

?>