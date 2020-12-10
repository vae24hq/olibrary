<?php
	$receiver = '"FliQBiz™"<admin@fliq.biz>';
	$sender = '"SenDa™"<bot@dbur.ga>';
	$subject = 'SMTP Test -'.mt_rand();
	$message = 'Hello,'.PHP_EOL;
	$message .= 'This is just a simple message to test the availability of SMTP on the web server';
	$headers = 'From: '.$sender.PHP_EOL.'Reply-To: '.$sender.PHP_EOL.'X-Mailer: PHP/' . phpversion();
	$via = '-freturn@dbur.ga';

	if(mail($receiver, $subject, $message, $headers, $via)){
		echo 'Email is sent!';
	}
?>