<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | utility::title
 * Dependency » *
 */
function pageTitle($title=''){
	global $pypeTitle;
	global $pypeApp;

	$chore = $title;		
	if(!empty($pypeTitle)){
		$chore .= $pypeTitle;
	}
	if(!empty($pypeApp)){
		$chore .= $pypeApp;
	}

	if(empty($chore)){
		$chore ='pype™ Framework';
	}

	return $chore;
}
?>