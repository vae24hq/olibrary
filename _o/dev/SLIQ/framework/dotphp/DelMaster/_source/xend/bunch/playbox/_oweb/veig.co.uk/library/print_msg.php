<?php
function print_msg($msg='', $class='notice', $wrap='p'){
 	if(is_null($msg) || empty($wrap)){return FALSE;}
 	$wrap = strtolower($wrap);
 	if(empty($class)){$css = '';}
 	else {$css = ' class="'.$class.'"';}

 	$chore = '<'.$wrap.$css.'>'.$msg.'</'.$wrap.'>';

 	echo $chore."\n";

 	return;
}
?>