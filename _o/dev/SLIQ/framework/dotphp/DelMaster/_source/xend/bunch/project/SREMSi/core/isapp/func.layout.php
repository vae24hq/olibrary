<?php
function layout(){
	#layout types - initialize | page | application
	$chore = '';
	$initialize = array('pype');
	$page = array('access','print');
	global $pypeLoader;

	$module = strtolower($pypeLoader->get('module'));

	if(in_array($module, $initialize) || in_array(getURL(), $initialize)){
		$chore = 'initialize';
	}
	elseif(in_array($module, $page) || in_array(getURL(), $page)){
		$chore = 'page';
	}
	else {
		$chore = 'application';
	}
	return $chore;
}
?>