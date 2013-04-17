// JavaScript Document
function modules_management() {
	cmxCore_blockID++;
	
	renderingPage('index.php?mode=getFileData&modules=modules_management&function=main_function&type=feature&blockID='+cmxCore_blockID,
				  	'features/modules_management/view/manage_module.xsl', 'center_container', manageBlock);
}

function installNewModule(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=modules_management&function=install_module&type=feature' +
				  '&module_path='+document.getElementById('module_path').value+
				  '&blockID='+blockID;  
	renderingPage(modelvariable, 'features/modules_management/view/manage_module.xsl', blockID, function() {location.reload(true);});
}

function showInstalledModules(blockID) {
	renderingPage('index.php?mode=getFileData&modules=modules_management&function=show_modules&type=feature&blockID='+blockID,
				  		'features/modules_management/view/show_modules.xsl', blockID, blockEffect);
}

function showInstallPage(blockID) {
	renderingPage('index.php?mode=getFileData&modules=modules_management&function=main_function&type=feature&blockID='+blockID,
				  		'features/modules_management/view/manage_module.xsl', blockID, blockEffect);
}

function deactivatingModule(moduleID, blockID) {
	renderingPage('index.php?mode=getFileData&modules=modules_management&function=deactivating_module&type=feature&moduleID='+moduleID+'&blockID='+blockID,
				  		'features/modules_management/view/show_modules.xsl', blockID, blockEffect);
}

function activatingModule(moduleID, blockID) {
	renderingPage('index.php?mode=getFileData&modules=modules_management&function=activating_module&type=feature&moduleID='+moduleID+'&blockID='+blockID,
				  		'features/modules_management/view/show_modules.xsl', blockID, blockEffect);
}

function deleteModule(moduleID, blockID) {
	if(confirm('Are you sure want to delete module?')==false ) 
		return true;
	else {
		renderingPage('index.php?mode=getFileData&modules=modules_management&function=delete_module&type=feature&moduleID='+moduleID+'&blockID='+blockID,
					  		'features/modules_management/view/show_modules.xsl', blockID, blockEffect);
	}
}