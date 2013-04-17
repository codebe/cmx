<?php

function cmxDBinit() {
	global $cmxConfig;
	
	if ($cmxConfig['dbhost'] == "sqlite") {
		$GLOBALS['connection'] =& ADONewConnection($cmxConfig['dbhost']);					
		@$GLOBALS['connection']->Connect($cmxConfig['dbname'], '0666');	
	} else {
		$GLOBALS['connection'] =& ADONewConnection($cmxConfig['dbserver']);
		@$GLOBALS['connection']->Connect($cmxConfig['dbhost'], $cmxConfig['dbuname'], $cmxConfig['dbpassword'], $cmxConfig['dbname']);	
	} 
}

function &getDBConn()
{
	return $GLOBALS['connection'];
}

?>