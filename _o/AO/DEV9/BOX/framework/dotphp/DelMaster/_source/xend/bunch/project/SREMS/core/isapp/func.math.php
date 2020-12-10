<?php

function isPercentOf($value,$of){
	$percentOf = (0.01 * $of);
	$chore = $value/$percentOf;
	return $chore. '%';
}
?>