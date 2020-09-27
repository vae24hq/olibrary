<?php

#cPanel Information
$cpuser = 'zachary'; // cPanel username
$cppass = 'NOexh7tJWyik'; // cPanel password
$cpdomain = 'vien3.com'; // cPanel domain or IP
$cpskin = 'x3';  // cPanel skin. Mostly x or x2.

#Email Information
$euser = 'info'; // email user
$epass = mt_rand(); // email password
$edomain = 'zacharygroup.com.ng'; // email domain (usually same as cPanel domain above)
$equota = 50; // amount of space in megabytes



// Create email account
  $f = fopen ("http://$cpuser:$cppass@$cpdomain:2082/frontend/$cpskin/mail/doaddpop.html?email=$euser&domain=$edomain&password=$epass&quota=$equota", "r");
  if (!$f) {
    $msg = 'Cannot create email account. Possible reasons: "fopen" function allowed on your server, PHP is running in SAFE mode';
    print_r($f);
    break;
  }
  else {
  echo $msg = "<p>Email account {$euser}@{$edomain} created.</p>";
  var_dump($f);
}
?>