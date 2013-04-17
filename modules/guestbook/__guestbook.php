<?php

$cTable = array();

$blocks = getConfigVar('prefix').'guestbook';
$cTable['guestbook'] = $blocks;
$cTable['guestbook_column'] = array (	'id'				=> $blocks.'.id',	
								  		'name'				=> $blocks.'.name',
								  		'email'				=> $blocks.'.email',	
								  		'comment'			=> $blocks.'.comment',
								  		'entry_date'		=> $blocks.'.entry_date');
return $cTable;								  
?>