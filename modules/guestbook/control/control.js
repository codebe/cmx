//Javascript Document

function guestbook() {
	cmxCore_blockID++;
	
	renderingPage('index.php?mode=getFileData&modules=guestbook&function=guestbook_main&type=modules&blockID='+cmxCore_blockID,
				  	'modules/guestbook/view/guestbook_main.xsl', 'center_container', manageBlock);
}

function submitComment(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=guestbook&function=submit_comment&type=module' +
				  '&name='+document.getElementById('name').value+
				  '&email='+document.getElementById('email').value+
				  '&comment='+document.getElementById('comment').value+
				  '&blockID='+blockID;  
	renderingPage(modelvariable, 'modules/guestbook/view/guestbook_comment.xsl', blockID, blockEffect);
}

function showCommentPage(blockID) {
	renderingPage('index.php?mode=getFileData&modules=guestbook&function=show_comment&type=module&blockID='+blockID,
				  		'modules/guestbook/view/guestbook_comment.xsl', blockID, blockEffect);
}

function showGuestbookPage(blockID) {
	renderingPage('index.php?mode=getFileData&modules=guestbook&function=guestbook_main&type=module&blockID='+blockID,
				  		'modules/guestbook/view/guestbook_main.xsl', blockID, blockEffect);	
}