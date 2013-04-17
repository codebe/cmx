<?php
// include file config	
session_start();
include('init-file.php');
include('langsetting.php');
include(CMX_CONFIG_FILE);
	
//	check if has install or not
if ($cmxConfig["dbtype"] && $cmxConfig["dbname"] && 
		$cmxConfig["dbuname"] && $cmxConfig["dbhost"]) {
			// Do Nothing
		} else {
			echo $TEXT['default-style'];
			echo $TEXT['installation-title'];
			echo $TEXT['pre-installation'];
			exit();
		}

// initialization API
include (CMX_ADODB_ERROR);
include (CMX_ADODB);
include (CMX_ADODB_HTML);
include (CMX_MAIN_API);
include (CMX_AJAXCORE);
include (CMX_ARCHIEVE_EX);

// Initialization API
initAPI();
$webProperties = getWebProperties();

// Handling for javascript request
switch ($_GET['mode']) {
	case "getBlockData":
		header('content-type: text/xml MIME-Type');
		echo getModelBlockData($_GET['block'], "root", $_GET['block'], $_GET['blockID']); exit;
		break;
	case "getViewFile":
		header('content-type: text/xml MIME-Type');
		echo getViewBlockData($_GET['block']); exit;
		break;
	case "getFileData":
		header('content-type: text/xml MIME-Type');
		echo getModelFileData($_GET['modules'], $_GET['function'], $_GET['type'], $_GET['blockID']); exit;
		break; 
	case "getActionFile":
		header('content-type: text/html');
		echo getActionFileData($_GET['modules'], $_GET['function'], $_GET['type']); exit;
		break;	
	case "getActiveTheme":
		header('content-type: text/html');
		echo getActiveTheme(); exit;
		break;		
	case "getListActiveMenu":
		header('content-type: text/xml');
		echo getListActiveMenu(); exit;
		break;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="<?php print $webProperties['web_author']; ?>" />
<meta name="keywords" content="<?php print $webProperties['web_keywords']; ?>" />
<meta name="description" content="<?php print $webProperties['web_description']; ?>" />
<title><?php print $webProperties['web_title']; ?></title>
<?php print $webIncludeFile['javascript']; ?>
<link rel="stylesheet" type="text/css" href="<?php print $webIncludeFile['css']; ?>" />
</head>
<body onload="showMainIndexPage()">
<div id="cmxContent" align="center"></div>
</body>
</html>
