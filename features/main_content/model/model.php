<?php
		
function updateData() {
	$db =& getDBConn();
	$table = getTable("blocks");
	
	return SQltoXML("SELECT ".$table['blocks_column']['content'].",".$table['blocks_column']['content_type']." FROM ".$table['blocks']." WHERE ".$table['blocks_column']['name']."='content'", "block");
}
	
?>