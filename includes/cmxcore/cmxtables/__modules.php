<?php

$cTable = array();

$modules = getConfigVar('prefix').'modules';
$cTable['modules'] = $modules;
$cTable['modules_column'] = array ('id'				=> $modules.'.id',	
								   'name'			=> $modules.'.name',
								   'type'			=> $modules.'.type',	
								   'displayname'	=> $modules.'.displayname',
								   'description' 	=> $modules.'.description', 	
								   'directory'		=> $modules.'.directory',	
								   'version'		=> $modules.'.version',	
								   'admin_capable'	=> $modules.'.admin_capable',
								   'user_capable' 	=> $modules.'.user_capable', 
								   'guest_capable' 	=> $modules.'.guest_capable', 
								   'activated'		=> $modules.'.activated');
return $cTable;								   
?>