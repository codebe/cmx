<?php

$table_sql[]['query'] = 
"CREATE TABLE `".$table_prefix."guestbook` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `comment` text NOT NULL default '',
  `entry_date` datetime NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) TYPE=".$table_type.";";
$table_name[]['table'] = $table_prefix."guestbook";							

?>