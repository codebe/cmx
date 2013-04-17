// JavaScript Document
function themes_management() {
	cmxCore_blockID++;
	
	renderingPage('index.php?mode=getFileData&modules=themes_management&function=themes_management_main&type=feature&blockID='+cmxCore_blockID,
				  	'features/themes_management/view/theme_update.xsl', 'center_container', manageBlock);
}

function installTheme(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=themes_management&function=install_theme&type=feature' +
				  '&new_theme_path='+document.getElementById('new_theme_path').value+
				  '&new_theme_name='+document.getElementById('new_theme_name').value+
				  '&blockID='+blockID;  
	renderingPage(modelvariable, 'features/themes_management/view/theme_confirmation.xsl', blockID, blockEffect);
}

function showThemePage(blockID) {
		renderingPage('index.php?mode=getFileData&modules=themes_management&function=themes_management_main&type=feature&blockID='+blockID,
				  	'features/themes_management/view/theme_update.xsl', blockID, blockEffect);
}

function deleteTheme(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=themes_management&function=delete_theme&type=feature' +
				  '&delete_theme_name='+document.getElementById('delete_theme_name').value+
				  '&blockID='+blockID;  
	renderingPage(modelvariable, 'features/themes_management/view/theme_confirmation.xsl', blockID, blockEffect);		
}