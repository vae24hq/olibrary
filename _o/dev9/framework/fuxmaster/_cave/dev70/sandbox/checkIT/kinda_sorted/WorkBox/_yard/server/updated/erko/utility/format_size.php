<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | format_size::utility ~
 */
function format_size($size=''){
	if(is_empty($size)){return FALSE;}
	if($size>=1073741824){$task = number_format($size / 1073741824 , 2) . 'GB';}
	elseif($size>=1048576){$task = number_format($size / 1048576 , 2) . 'MB';}
	elseif($size>=1024){$task = number_format($size / 1024 , 2) . 'KB';}
	elseif($size>1){$task = $size . ' bytes';}
	elseif($size==1){$task = $size . ' byte';}
	else {$task = '0';}
 	return $task;
}
?>