<?php
/*----------  Path function  ----------*/
function oPath($to='', $dir='asset'){
	$path = '';

	if($dir=='asset'){$path .= 'asset'.PS;}
	if($dir=='build'){$path .= 'build'.DS;}

	if($to=='CSS'){$path = 'css'.PS;}
	if($to=='IMG'){$path .= 'image'.PS;}
	if($to=='JS'){$path = 'js'.PS;}
	if($to=='MEDIA'){$path = 'media'.PS;}

	return $path;
}
?>