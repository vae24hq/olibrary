<?php
$spet = new Spet('layout/main.php');
$spet->doTag('slice-header', $spet->content('layout/slice.header.inc'));
$spet->doTag('name', 'Anthony O. Osawere');

$label = array(
	'location' => 'West-Africa',
	'role' => 'Software Engineer',
	'username' => 'iamodao'
);
$spet->doTags($label);
?>