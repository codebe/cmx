<?php
function mainpage() {
	$db =& getDBConn();
	$table = getTable("users");
	return SQltoXML("SELECT ".$table['users_column']['status']." FROM ".$table['users']." WHERE ".$table['users_column']['uname']."='".$_SESSION['user_login']."'", "Users");
}

function login() {
	$db =& getDBConn();
	$table = getTable("users");

	return SQltoXML("SELECT * FROM ".$table['users']." 
					 WHERE 
					 	".$table['users_column']['uname']." = '".$_GET['uname']."' AND 
						".$table['users_column']['pass']." = MD5('".$_GET['pass']."') AND
						".$table['users_column']['status']." = 'A'", 
					 "Users");
}

function logout() {
	$db =& getDBConn();
	$table = getTable("users");
	
	return SQltoXML("SELECT ".$table['users_column']['status']." FROM ".$table['users']." WHERE FALSE", "Users");
}

function send_password() {
	$db =& getDBConn();
	$table = getTable("users");
	
	$new_password = str_shuffle('qI9h0Dn3Xu12LptWjb7M');
	$result = $db->Execute("UPDATE `".$table['users']."` 
							SET
								".$table['users_column']['pass']."= MD5('".$new_password."')
							WHERE
								".$table['users_column']['uname']."= '".$_GET['uname']."' ");
									
	$result = $db->Execute("SELECT ".$table['users_column']['email']." FROM ".$table['users']." WHERE ".$table['users_column']['uname']."='".$_GET['uname']."'");	
	for (; !$result->EOF; $result->MoveNext()) {
		list($email) = $result->fields;
		@mail($email,'New Password',$new_password);
	}	
	
	return SQltoXML("SELECT ".$table['users_column']['status']." FROM ".$table['users']." WHERE FALSE", "Users");
}

function edit_profile() {
	$db =& getDBConn();
	$table = getTable("users");
	
	$result = $db->Execute("UPDATE `".$table['users']."` 
							SET
								".$table['users_column']['name']."= '".$_GET['name']."',
								".$table['users_column']['email']."= '".$_GET['email']."',
								".$table['users_column']['femail']."= '".$_GET['femail']."',
								".$table['users_column']['url']."= '".$_GET['url']."',
								".$table['users_column']['user_yim']."= '".$_GET['yim']."',
								".$table['users_column']['user_icq']."= '".$_GET['icq']."',
								".$table['users_column']['user_sig']."= '".$_GET['sig']."'
							WHERE
								".$table['users_column']['uname']."= '".$_GET['uname']."';");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
							
	if (!empty($_GET['pass'])) {
		$result = $db->Execute("UPDATE `".$table['users']."` 
								SET
									".$table['users_column']['pass']."= MD5('".$_GET['pass']."')
								WHERE
									".$table['users_column']['uname']."=".$_GET['uname']."");	
	}								

	return SQltoXML("SELECT * FROM ".$table['users']." 
					 WHERE 
					 	".$table['users_column']['uname']." = '".$_GET['uname']."'", 
					 "Users");
}

function show_profile() {
	$db =& getDBConn();
	$table = getTable("users");
	$user_mode = 'Guest';
	
	$result = $db->Execute("SELECT ".$table['users_column']['umode']." FROM ".$table['users']." WHERE ".$table['users_column']['uid']."= '".$_GET['userID']."'");
	for (; !$result->EOF; $result->MoveNext()) {
		list($mode) = $result->fields;
		$user_mode = $mode;
	}	
	
	return SQLtoXML("SELECT *, '".$_GET['userID']."' userID, '".$user_mode."' userMode FROM ".$table['users']." WHERE ".$table['users_column']['uid']."= '".$_GET['targetID']."' ", "Users");
}

function user_management() {
	$db =& getDBConn();
	$table = getTable("users");
	
	return SQltoXML("SELECT *, '".$_GET['userID']."' userID FROM ".$table['users']." 
					 WHERE TRUE", 
					 "Users");
}

function show_create_user() {
	$db =& getDBConn();
	$table = getTable("users");
	
	return SQltoXML("SELECT '".$_GET['userID']."' userID FROM ".$table['users']." 
					 WHERE TRUE", 
					 "Users");
}

function create_user() {
	$db =& getDBConn();
	$table = getTable("users");
	
	$result = $db->Execute("INSERT INTO ".$table['users']." 
								( 	`name` , `uname` , `email` , 
									`femail` , `url` , `user_regdate` , `user_icq` , 
									`user_sig` , `user_viewemail` , `user_theme` , `user_aim` , 
									`user_yim` , `pass` , `umode` , `status` )
							VALUES (
							'".$_GET['name']."', '".$_GET['uname']."', '".$_GET['email']."', '".$_GET['femail']."', 
							'".$_GET['url']."', NOW(), '".$_GET['icq']."' , '".$_GET['sig']."' , 'Y' , 'default_themes', NULL , NULL , 
							MD5('".$_GET['pass']."'), '".$_GET['umode']."', 'A');");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT *, '".$_GET['userID']."' userID FROM ".$table['users']." 
				 WHERE TRUE", 
				 "Users");
}

function register_user() {
	$db =& getDBConn();
	$table = getTable("users");
	
	$result = $db->Execute("INSERT INTO ".$table['users']." 
								( 	`name` , `uname` , `email` , 
									`femail` , `url` , `user_regdate` , `user_icq` , 
									`user_sig` , `user_viewemail` , `user_theme` , `user_aim` , 
									`user_yim` , `pass` , `umode` , `status` )
							VALUES (
							'".$_GET['name']."', '".$_GET['uname']."', '".$_GET['email']."', '".$_GET['femail']."', 
							'".$_GET['url']."', NOW(), '".$_GET['icq']."' , '".$_GET['sig']."' , 'Y' , 'default_themes', NULL , NULL , 
							MD5('".$_GET['pass']."'), 'User', 'A');");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT * FROM ".$table['users']." WHERE FALSE", "Users");
}

function delete_user() {
	$db =& getDBConn();
	$table = getTable("users");
	
	$result = $db->Execute("DELETE FROM ".$table['users']." WHERE ".$table['users_column']['uid']."= '".$_GET['deleteID']."' ");
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT *, '".$_GET['userID']."' userID FROM ".$table['users']." 
					 WHERE TRUE", 
					 "Users");
}

function activating_user() {
	$db =& getDBConn();
	$table = getTable("users");
	
	$result = $db->Execute("UPDATE `".$table['users']."` 
							SET
								".$table['users_column']['status']."= 'A'
							WHERE
								".$table['users_column']['uid']."= '".$_GET['targetID']."' ");

	return SQltoXML("SELECT *, '".$_GET['userID']."' userID FROM ".$table['users']." 
					 WHERE TRUE", 
					 "Users");								
}

function deactivating_user() {
	$db =& getDBConn();
	$table = getTable("users");

	$result = $db->Execute("UPDATE `".$table['users']."` 
							SET
								".$table['users_column']['status']."= 'D'
							WHERE
								".$table['users_column']['uid']."= '".$_GET['targetID']."' ");	
								
	return SQltoXML("SELECT *, '".$_GET['userID']."' userID FROM ".$table['users']." 
					 WHERE TRUE", 
					 "Users");								
}

?>