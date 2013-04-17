<?php

$table_sql[]['query'] = 
"CREATE TABLE `".$_POST['dbprefix']."users` (
  `uid` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `uname` varchar(25) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `femail` varchar(60) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `user_regdate` varchar(20) NOT NULL default '',
  `user_icq` varchar(15) default NULL,
  `user_sig` varchar(255) default NULL,
  `user_viewemail` tinyint(2) default NULL,
  `user_theme` varchar(255) NOT NULL default '',
  `user_aim` varchar(18) default NULL,
  `user_yim` varchar(25) default NULL,
  `pass` varchar(40) NOT NULL default '',
  `umode` varchar(25) NOT NULL default '',
  `status` varchar(2) NOT NULL default '',
  PRIMARY KEY  (`uid`)
) TYPE=".$_POST['dbtype'].";";
$table_name[]['table'] = $_POST['dbprefix']."users";							

$table_sql[]['query'] = 
"CREATE TABLE `".$_POST['dbprefix']."modules` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL default '',
  `type` varchar(12) NOT NULL,
  `displayname` varchar(64) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `directory` varchar(64) NOT NULL default '',
  `version` varchar(10) NOT NULL default '0',
  `admin_capable` tinyint(1) NOT NULL default '0',
  `user_capable` tinyint(1) NOT NULL default '0',
  `guest_capable` tinyint(1) NOT NULL default '0',
  `activated` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=".$_POST['dbtype'].";";
$table_name[]['table'] = $_POST['dbprefix']."modules";							
	
$table_sql[]['query'] = 
"CREATE TABLE `".$_POST['dbprefix']."blocks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `content_type` varchar(12) NOT NULL default 'text',
  `url` varchar(254) NOT NULL default '',
  `mid` int(11) unsigned NOT NULL default '0',
  `position` char(1) NOT NULL default 'l',
  `weight` decimal(10,1) NOT NULL default '0.0',
  `active` tinyint(3) unsigned NOT NULL default '1',
  `refresh` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=".$_POST['dbtype'].";"; 
$table_name[]['table'] = $_POST['dbprefix']."blocks";							

$table_sql[]['query'] = 
"CREATE TABLE `".$_POST['dbprefix']."themes` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(64) NOT NULL default '',
  `active` tinyint(3) unsigned NOT NULL default '1',
  `directory` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=".$_POST['dbtype'].";"; 			
$table_name[]['table'] = $_POST['dbprefix']."themes";											

$table_sql[]['query'] = 
"CREATE TABLE `".$_POST['dbprefix']."web_profile` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `web_profile` varchar(64) NOT NULL default '',
  `web_name` varchar(64) NOT NULL default '',
  `web_title` varchar(64) NOT NULL default '',
  `web_author` varchar(64) NOT NULL default '',
  `web_url` varchar(255) NOT NULL default '',
  `web_description` varchar(255) NOT NULL default '',
  `web_keywords` varchar(255) NOT NULL default '',
  `web_default_theme` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=".$_POST['dbtype'].";"; 			
$table_name[]['table'] = $_POST['dbprefix']."web_profile";	

?>