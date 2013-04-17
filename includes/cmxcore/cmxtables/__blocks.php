<?php

$cTable = array();

$blocks = getConfigVar('prefix').'blocks';
$cTable['blocks'] = $blocks;
$cTable['blocks_column'] = array ('id'				=> $blocks.'.id',	
								  'name'			=> $blocks.'.name',
								  'title'			=> $blocks.'.title',	
								  'content'			=> $blocks.'.content',
								  'content_type'	=> $blocks.'.content_type',
								  'url' 			=> $blocks.'.url', 	
								  'mid'				=> $blocks.'.mid',	
								  'position'		=> $blocks.'.position',	
								  'weight'			=> $blocks.'.weight',
								  'active' 			=> $blocks.'.active', 
								  'refresh'			=> $blocks.'.refresh');
return $cTable;								  
?>