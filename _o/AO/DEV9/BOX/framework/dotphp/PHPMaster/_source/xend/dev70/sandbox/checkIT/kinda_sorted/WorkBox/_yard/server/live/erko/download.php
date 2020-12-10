<?php
	if(!empty($_GET['data'])) { $data = $_GET['data'] ;}
	if($data =='email') {$file = 'download/email.txt';}

	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename ="'.basename($file).'"');
	readfile($file);
	exit;
?>


		