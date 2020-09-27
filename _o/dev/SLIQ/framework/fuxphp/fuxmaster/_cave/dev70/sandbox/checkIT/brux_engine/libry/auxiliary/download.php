<?php
if((!empty($_REQUEST['action'])) && $_REQUEST['action'] == 'download'){

	if(!empty($_GET['file'])){$data = $_GET['file'];}
	$data = clean_up($data);
	$data = strip_clean($data);
	$data = string_swap($data, '/','');
	if($data =='demo') {$file = 'demo.txt';}

	if(fileFound($file)){
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename ="'.basename($file).'"');
		readfile($file);
		exit;
	}
}
?>