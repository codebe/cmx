// JavaScript Document

// Show Function
function user_management() {	
	cmxCore_blockID++;
	
	renderingPage('index.php?mode=getFileData&modules=user_management&function=mainpage&type=feature&blockID='+cmxCore_blockID,
				  	'features/user_management/view/user_login.xsl', 'center_container', manageBlock);
}

function showRegisterPage(blockID) {	
	renderingPage('index.php?mode=getFileData&modules=user_management&function=mainpage&type=feature&blockID='+blockID, 
				  	'features/user_management/view/user_register.xsl', blockID, blockEffect);
}

function showLoginPage(blockID) {
	renderingPage('index.php?mode=getFileData&modules=user_management&function=mainpage&type=feature&blockID='+blockID, 
				  	'features/user_management/view/user_login.xsl', blockID, blockEffect);
}

function showLostPasswordPage(blockID) {
	renderingPage('index.php?mode=getFileData&modules=user_management&function=mainpage&type=feature&blockID='+blockID, 
				  	'features/user_management/view/user_lost_password.xsl', blockID, blockEffect);	
}

function showEditProfile(blockID, targetID, userID) {
	renderingPage('index.php?mode=getFileData&modules=user_management&function=show_profile&type=feature&targetID='+targetID+'&userID='+userID+'&blockID='+blockID, 
				  	'features/user_management/view/user_edit_profile.xsl', blockID, blockEffect);		
}

function showUserManagement(blockID, userID) {
	renderingPage('index.php?mode=getFileData&modules=user_management&function=user_management&type=feature&userID='+userID+'&blockID='+blockID, 
				  	'features/user_management/view/user_management.xsl', blockID, blockEffect);		
}

function showAddUser(blockID, userID) {
	renderingPage('index.php?mode=getFileData&modules=user_management&function=show_create_user&type=feature&userID='+userID+'&blockID='+blockID, 
				  	'features/user_management/view/user_create_account.xsl', blockID, blockEffect);	
}

function sendPassword(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=send_password&type=feature' +
						'&uname='+document.getElementById('uname').value +
						'&email='+document.getElementById('email').value +
						'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_lost_password_confirmation.xsl', blockID, blockEffect);
}

// Function for login page
function loginUser(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=login&type=feature' +
						'&uname='+document.getElementById('uname').value +
						'&pass='+document.getElementById('pass').value +
						'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_backend.xsl', blockID, blockEffect);
}

// Function for user page
function logout(blockID, userID) {
	renderingPage('index.php?mode=getFileData&modules=user_management&function=logout&type=feature&blockID='+blockID,
				  	'features/user_management/view/user_login.xsl', blockID, blockEffect);
}

function createUserAccount(blockID, userID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=create_user&type=feature' + 
						'&name='+document.getElementById('name').value+
						'&uname='+document.getElementById('uname').value+
						'&pass='+document.getElementById('pass').value+
						'&email='+document.getElementById('email').value+
						'&femail='+document.getElementById('femail').value+
						'&url='+document.getElementById('url').value+
						'&icq='+document.getElementById('icq').value+
						'&yim='+document.getElementById('yim').value+
						'&umode='+document.getElementById('umode').value+
						'&sig='+document.getElementById('sig').value+
						'&userID='+userID+'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_backend.xsl', blockID, blockEffect);							
}

function registerUser(blockID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=register_user&type=feature' + 
						'&name='+document.getElementById('name').value+
						'&uname='+document.getElementById('uname').value+
						'&pass='+document.getElementById('pass').value+
						'&email='+document.getElementById('email').value+
						'&femail='+document.getElementById('femail').value+
						'&url='+document.getElementById('url').value+
						'&icq='+document.getElementById('icq').value+
						'&yim='+document.getElementById('yim').value+
						'&sig='+document.getElementById('sig').value+
						'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_register_confirmation.xsl', blockID, blockEffect);	
}

function editUserProfile(blockID, userID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=edit_profile&type=feature' + 
						'&name='+document.getElementById('name').value+
						'&uname='+document.getElementById('uname').value+
						'&pass='+document.getElementById('pass').value+
						'&email='+document.getElementById('email').value+
						'&femail='+document.getElementById('femail').value+
						'&url='+document.getElementById('url').value+
						'&icq='+document.getElementById('icq').value+
						'&yim='+document.getElementById('yim').value+
						'&sig='+document.getElementById('sig').value+
						'&userID='+userID+'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_edit_profile_confirmation.xsl', blockID, blockEffect);		
}

function deleteUser(blockID, deleteID, userID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=delete_user&type=feature' +
						'&deleteID='+deleteID + 
						'&userID='+userID + 
						'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_management.xsl', blockID, blockEffect);
}

function activatingUser(blockID, targetID, userID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=activating_user&type=feature' +
						'&targetID='+targetID + 
						'&userID='+userID + 
						'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_management.xsl', blockID, blockEffect);	
}

function deactivatingUser(blockID, targetID, userID) {
	var modelvariable = 'index.php?mode=getFileData&modules=user_management&function=deactivating_user&type=feature' +
						'&targetID='+targetID + 
						'&userID='+userID + 
						'&blockID='+blockID;
	renderingPage(modelvariable, 'features/user_management/view/user_management.xsl', blockID, blockEffect);	
}