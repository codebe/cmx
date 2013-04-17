<?php

function guestbook_main() {
	$db =& getDBConn();
	$table = getTable("guestbook");
	
	return SQltoXML("SELECT * FROM ".$table['guestbook']." WHERE TRUE", "Guestbook");
}

function submit_comment() {
	$db =& getDBConn();
	$table = getTable("guestbook");
	
	$result = $db->Execute("INSERT INTO ".$table['guestbook']." 
								( `name`, `email`, `comment`, `entry_date`) 
							VALUES ('".$_GET['name']."', '".$_GET['email']."', '".$_GET['comment']."', NOW());");
	
	if (!is_object($result)) {
		$e = ADODB_Pear_Error();
		echo '<p><b>'.$e->message.'</b></p>'; 
		return false;
	} 
	
	return SQltoXML("SELECT * FROM ".$table['guestbook']." WHERE TRUE", "Guestbook");
}

function show_comment() {
	$db =& getDBConn();
	$table = getTable("guestbook");
	
	return SQltoXML("SELECT * FROM ".$table['guestbook']." WHERE TRUE", "Guestbook");
}

?>