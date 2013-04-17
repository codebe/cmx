<?php

$cTable = array();

$themes = getConfigVar('prefix').'themes';
$cTable['themes'] = $themes;
$cTable['themes_column'] = array ('id'				=> $themes.'.id',	
								   'name'			=> $themes.'.name',
								   'active'			=> $themes.'.active',
								   'directory'		=> $themes.'.directory');
return $cTable;								   
?>