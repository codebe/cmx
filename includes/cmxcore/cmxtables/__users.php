<?php

$cTable = array();

$users = getConfigVar('prefix').'users';
$cTable['users'] = $users;
$cTable['users_column'] = array ('uid' 				=> $users.'.uid', 				
								 'name' 			=> $users.'.name', 			
								 'uname' 			=> $users.'.uname', 			
								 'email'			=> $users.'.email',			
								 'femail' 			=> $users.'.femail', 			
								 'url' 				=> $users.'.url', 				
								 'user_regdate' 	=> $users.'.user_regdate', 	
								 'user_icq' 		=> $users.'.user_icq', 		
								 'user_sig' 		=> $users.'.user_sig', 		
								 'user_viewemail'	=> $users.'.user_viewemail',	
								 'user_theme' 		=> $users.'.user_theme', 		
								 'user_aim' 		=> $users.'.user_aim', 		
								 'user_yim' 		=> $users.'.user_yim', 		
								 'pass' 			=> $users.'.pass', 			
								 'umode' 			=> $users.'.umode', 			
								 'status' 			=> $users.'.status'); 			
return $cTable;															 
?>       