<?php
function oMail($data){
	if(!empty($data['sender'])){$sender = $data['sender'];} else {$sender = '"Bot"<bot@dbur.ga>';}
	if(!empty($data['receiver'])){$receiver = $data['receiver'];} else {$receiver = '"dburga™"<admin@dbur.ga>';}
	if(!empty($data['reply'])){$reply = $data['reply'];} else {$reply = $sender;}
	if(!empty($data['via'])){$via = $data['via'];} else {$via = '-freturn@dbur.ga';}
	if(!empty($data['subject'])){$subject = $data['subject'];} else {$subject = 'oMailApp-'.mt_rand();}
	if(!empty($data['message'])){$message = $data['message'];}
	else {
		$message = 'Hello,'.PHP_EOL.PHP_EOL.'You are reading a simple sample message that test the delivery.'.PHP_EOL;
	}	
	$headers = 'From: '.$sender.PHP_EOL.'Reply-To: '.$reply.PHP_EOL.'X-Mailer: PHP/' . phpversion();
	if(mail($receiver, $subject, $message, $headers, $via)){return true;}
	return false;
}
?>