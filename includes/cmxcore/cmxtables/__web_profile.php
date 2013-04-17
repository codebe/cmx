<?php

$cTable = array();

$web_profile = getConfigVar('prefix').'web_profile';
$cTable['web_profile'] = $web_profile;
$cTable['web_profile_column'] = array ('id'					=> $web_profile.'.id',	
								   	   'web_profile'		=> $web_profile.'.web_profile',
								       'web_name'			=> $web_profile.'.web_name',	
								       'web_title'			=> $web_profile.'.web_title',
								       'web_author' 		=> $web_profile.'.web_author', 	
								       'web_url'			=> $web_profile.'.web_url',	
								       'web_description'	=> $web_profile.'.web_description',	
								       'web_keyword'		=> $web_profile.'.web_keyword',
								       'web_default_theme' 	=> $web_profile.'.web_default_theme');
return $cTable;									   
?>