<?php

$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."users` (`name`, `uname`, `email`, `pass`, `user_regdate`, `user_theme`, `umode`, `status`) VALUES ('".$_POST['adminname']."', '".$_POST['adminuser']."', '".$_POST['adminemail']."', MD5('".$_POST['adminpassword']."'), NOW(), 'default_themes', 'Administrator', 'A');";

$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."blocks` (`name`, `title`, `content`, `content_type`) VALUES ('mainmenu', 'The CMX Default Main Menu', 'a:5:{i:0;a:2:{s:4:\"name\";s:9:\"Home Page\";s:4:\"link\";s:27:\"main_content();return false\";}i:1;a:2:{s:4:\"name\";s:12:\"Member Panel\";s:4:\"link\";s:29:\"user_management();return false\";}i:2;a:2:{s:4:\"name\";s:12:\"Themes Panel\";s:4:\"link\";s:29:\"themes_management();return false\";}i:3;a:2:{s:4:\"name\";s:13:\"Modules Panel\";s:4:\"link\";s:30:\"modules_management();return false\";}i:4;a:2:{s:4:\"name\";s:9:\"Web Panel\";s:4:\"link\";s:31:\"web_configuration();return false\";}}', 'array');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."blocks` (`name`, `title`, `content`, `content_type`) VALUES ('content', 'The CMX Default Content', '<p>CMX is a Content Management System that fully featured AJAX Technology for more efficient Web Application</p>
																																						<p>The Advantage of CMX :</p>
																																						<ol>
																																							<li>Do not need load page repeatedly every request has been sent</li>
																																							<li>More dynamic user interface</li>
																																							<li>Easy to developing module, CMX using MVC pattern</li>
																																							<li>Easy to make theme, CMX using XSL as template</li>
																																						</ol>
																																						<p>We need many review, to improve and fix bugs in CMX, So if find any bugs please tell us to <a href=\"mailto:cmx@diodachi.com\">cmx@diodachi.com</a></p>
																																						', 'text');";

$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."modules` (`name` ,`type` ,`displayname` ,`description` ,`directory` ,`version` ,`admin_capable` ,`user_capable` ,`guest_capable` ,`activated` ) VALUES ('mainContent', 'features', 'Main Content', 'The main content for website', 'main_content', '1.0', '1', '1', '1', '1');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."modules` (`name` ,`type` ,`displayname` ,`description` ,`directory` ,`version` ,`admin_capable` ,`user_capable` ,`guest_capable` ,`activated` ) VALUES ('modulesManagement', 'features', 'Modules Management', 'The main content for website', 'modules_management', '1.0', '1', '1', '1', '1');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."modules` (`name` ,`type` ,`displayname` ,`description` ,`directory` ,`version` ,`admin_capable` ,`user_capable` ,`guest_capable` ,`activated` ) VALUES ('themesManagement', 'features', 'Themes Management', 'The main content for website', 'themes_management', '1.0', '1', '1', '1', '1');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."modules` (`name` ,`type` ,`displayname` ,`description` ,`directory` ,`version` ,`admin_capable` ,`user_capable` ,`guest_capable` ,`activated` ) VALUES ('userManagement', 'features', 'Users Management', 'The main content for website', 'user_management', '1.0', '1', '1', '1', '1');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."modules` (`name` ,`type` ,`displayname` ,`description` ,`directory` ,`version` ,`admin_capable` ,`user_capable` ,`guest_capable` ,`activated` ) VALUES ('webConfiguration', 'features', 'Web Configuration', 'The main content for website', 'web_configuration', '1.0', '1', '1', '1', '1');";

$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."themes` (`name`, `active`, `directory`) VALUES ('default_themes', 'Y', 'default_themes');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."themes` (`name`, `active`, `directory`) VALUES ('dark_dimension', 'Y', 'dark_dimension');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."themes` (`name`, `active`, `directory`) VALUES ('floral_impact', 'Y', 'floral_impact');";
$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."themes` (`name`, `active`, `directory`) VALUES ('liquidity_grap', 'Y', 'liquidity_graph');";

$data_sql[]['query'] = "INSERT INTO `".$_POST['dbprefix']."web_profile` (`web_profile`, `web_name`, `web_title`, `web_author`, `web_default_theme`)	VALUES ('default', 'CMX', 'CMX The CMS with AJAX', '".$_POST['adminname']."', 'default_themes');";	
												 								
?>