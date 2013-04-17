// JavaScript Document
function web_configuration() {
	cmxCore_blockID++;
	
	renderingPage('index.php?mode=getFileData&modules=web_configuration&function=web_configuration_main&type=feature&blockID='+cmxCore_blockID,
				  	'features/web_configuration/view/web_configuration.xsl', 'center_container', manageBlock);
}

function updateWebProfile(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=web_configuration&function=web_configuration_update&type=feature' +
				  '&web_name='+document.getElementById('web_name').value+
				  '&web_title='+document.getElementById('web_title').value+
				  '&web_author='+document.getElementById('web_author').value+
				  '&web_url='+document.getElementById('web_url').value+
				  '&web_description='+document.getElementById('web_description').value+
				  '&web_keywords='+document.getElementById('web_keywords').value+
				  '&web_default_theme='+document.getElementById('web_default_theme').value+
				  '&blockID='+blockID;  
	renderingPage(modelvariable, 'features/web_configuration/view/web_configuration.xsl', blockID, function() {location.reload(true);});
}