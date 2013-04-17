<?php			
	if (!defined("CMX_ROOT_DIR")) {								
		// Main Path Setting									
		define("CMX_ROOT_DIR",dirname(__FILE__));	
		$webdirectory = substr(CMX_ROOT_DIR,strlen($_SERVER['DOCUMENT_ROOT'])+1,strlen(CMX_ROOT_DIR)-strlen($_SERVER['DOCUMENT_ROOT'])-1);
		define("CMX_ROOT_URL", "http://".$_SERVER['HTTP_HOST']."/$webdirectory/");	
		define("CMX_CONFIG_FILE", CMX_ROOT_DIR."/config/config.php");
		define("CMX_MAIN_API", CMX_ROOT_DIR."/includes/cmxcore/cmx_core.php");
		define("CMX_CORE_TABLES", CMX_ROOT_DIR."/includes/cmxcore/cmxtables/");
		define("CMX_MAIN_SCRIPT", "includes/cmxcore/cmx_core.js");
		define("CMX_CORE_XML", CMX_ROOT_DIR."/includes/cmxcore/cmx_xml.php");
		define("CMX_XSL_BLOCK", CMX_ROOT_DIR."/includes/cmxcore/cmxblocks/");
		define("CMX_CORE_DB", CMX_ROOT_DIR."/includes/cmxcore/cmx_db.php");
		define("CMX_CORE_UI", CMX_ROOT_DIR."/includes/cmxcore/cmx_ui.php");
		define("CMX_CORE_IO", CMX_ROOT_DIR."/includes/cmxcore/cmx_io.php");
		define("CMX_THEME_DIR", CMX_ROOT_DIR."/themes/");
		define("CMX_MODULE_DIR", CMX_ROOT_DIR."/modules/");
		
		// PHP Library Path Setting
		define("CMX_FCK_EDITOR_BASE", CMX_ROOT_DIR."/includes/fckeditor/");
		define("CMX_FCK_EDITOR", CMX_ROOT_DIR."/includes/fckeditor/fckeditor.php");
		define("CMX_ARCHIEVE_EX", CMX_ROOT_DIR."/includes/archieveEx/ArchiveExtractor.class.php");
		define("CMX_AJAXCORE", CMX_ROOT_DIR."/includes/ajaxcore/AjaxCore.class.php");

		
		// CMX_ADODB Library Path Setting
		define("CMX_ADODB", CMX_ROOT_DIR."/includes/adodb/adodb.inc.php");
		define("CMX_ADODB_ERROR", CMX_ROOT_DIR."/includes/adodb/adodb-errorpear.inc.php");
		define("CMX_ADODB_HTML", CMX_ROOT_DIR."/includes/adodb/tohtml.inc.php");
		
		// Language Setting Path Setting
		define("CMX_LANGUAGE", CMX_ROOT_DIR."/langsetting.php");
		define("CMX_LANGUAGE_EN", CMX_ROOT_DIR."/languages/en.php");
		define("CMX_LANGUAGE_TEMP", CMX_ROOT_DIR."/lang.tmp");
		$lang = file_get_contents(CMX_LANGUAGE_TEMP);		
		define("CMX_LANGUAGE_LANG", CMX_ROOT_DIR."/languages/$lang.php");		
		
		// Javascript Library Path Setting Relative to Index
		define("CMX_FREZA", "includes/freza/frejaLibrary.js");
		define("CMX_NIFTY", "includes/nifty/nifty.js");
		define("CMX_AJAXCORE_JS", "includes/ajaxcore/AjaxCore.js");
		define("CMX_PROTOTYPE", "includes/scriptaculous/lib/prototype.js");
		define("CMX_SCRIPTACULOUS", "includes/scriptaculous/src/scriptaculous.js");
		define("CMX_UNITTEST", "includes/scriptaculous/src/unittest.js");
		define("CMX_FORM_VALIDATOR", "includes/form_validator/gen_validatorv2.js");
		define("CMX_FCKEDITOR_JS", "includes/fckeditor/fckeditor.js");
	}

?>