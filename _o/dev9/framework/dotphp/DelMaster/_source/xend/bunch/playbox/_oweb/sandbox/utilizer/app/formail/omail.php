<?php
function oMail($data=''){
	#prepare
	if(!empty($data['sender_name'])){$sender_name = $data['sender_name'];} else {$sender_name = 'Bot';}
	if(!empty($data['sender_email'])){$sender_email = $data['sender_email'];} else {$sender_email = 'bot@dbur.ga';}
	if(!empty($data['receiver_name'])){$receiver_name = $data['receiver_name'];} else {$receiver_name = 'dburga™';}
	if(!empty($data['receiver_email'])){$receiver_email = $data['receiver_email'];} else {$receiver_email = 'admin@dbur.ga';}
	if(!empty($data['reply_name'])){$reply_name = $data['reply_name'];} else {$reply_name = $sender_name;}
	if(!empty($data['reply_email'])){$reply_email = $data['reply_email'];} else {$reply_email = $sender_email;}
	if(!empty($data['via'])){$via = $data['via'];} else {$via = '-freturn@dbur.ga';}
	if(!empty($data['subject'])){$subject = $data['subject'];} else {$subject = 'oMailApp-'.mt_rand();}
	if(!empty($data['message'])){$message = $data['message'];}
	else {$message = 'Hello,'.PHP_EOL.PHP_EOL.'You are reading a simple sample message that test the delivery.'.PHP_EOL;}

	$sender = '"'.$sender_name.'"<'.$sender_email.'>';
	$receiver = '"'.$receiver_name.'"<'.$receiver_email.'>';
	$reply = '"'.$reply_name.'"<'.$reply_email.'>';
	
	$headers = 'From: '.$sender.PHP_EOL.'Reply-To: '.$reply.PHP_EOL.'X-Mailer: PHP/' . phpversion();
	if(@mail($receiver, $subject, $message, $headers, $via)){return true;}
	return false;
}
?>