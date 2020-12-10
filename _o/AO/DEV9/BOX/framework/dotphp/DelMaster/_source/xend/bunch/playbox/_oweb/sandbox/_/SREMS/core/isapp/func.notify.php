<?php
function isNotify($msg, $class='info'){
	$chore = '<div class="';
	$chore .= $class;
	$chore .='">';
	$chore .= $msg;
	$chore .='</div>';
	return $chore;
}
?>