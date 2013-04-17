// JavaScript Document
var intervalID;

function main_content() {
	cmxCore_blockID++;
	
	renderingPage('index.php?mode=getBlockData&block=content&blockID='+cmxCore_blockID, 
				  	'features/main_content/view/content.xsl', 'center_container', manageBlock);
}

function editContent(blockID) {
	newWindow = window.open('features/main_content/model/edit_content.php?blockID='+blockID, 'editContent', 'status,menubar,height=450,width=800,center=yes');
	newWindow.focus();
}

function loadingFrontPage(blockID) {	
	renderingPage('index.php?mode=getFileData&modules=main_content&function=updateData&type=feature&blockID='+blockID, 
			'features/main_content/view/content.xsl', blockID, blockEffect);
}

