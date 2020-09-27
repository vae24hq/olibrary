<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | util::document
 * Dependency »
 */
function isDocument(){
	$task = '';
	global $pypeModule; global $pypeOperation;
	if(strtolower($pypeOperation)=='default'){$task = $pypeModule;}
	else {$task = $pypeModule.' '.$pypeOperation;}
	return $task;
}

function currentDoc($return='name'){ #$return = name | file | filename
	$exts = array('html', 'php', 'inc');
	$page = $_SERVER['PHP_SELF'];
	$pathdetails = pathinfo($page);
	if(in_array($pathdetails['extension'], $exts)){
		$ext = '.'.$pathdetails['extension'];
		$task = basename($_SERVER['PHP_SELF'], $ext);
	}

	if($return=='filename'){return $task.$ext;}
	elseif($return=='file'){return $page;}
	elseif($return=='ext'){return $ext;}
	else {return $task;}
}
?>