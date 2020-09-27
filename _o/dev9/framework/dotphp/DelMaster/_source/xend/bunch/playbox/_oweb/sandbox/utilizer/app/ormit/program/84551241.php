<?php
$oFailURL = ''; if(!empty($_REQUEST['_fail'])){$oFailURL = $_REQUEST['_fail'];}
$oNextURL = ''; if(!empty($_REQUEST['_success'])){$oNextURL = $_REQUEST['_success'];}

$oName = 'no name'; if(!empty($_REQUEST['name'])){$oName = $_REQUEST['name'];}
$oEmail = 'no@email.address'; if(!empty($_REQUEST['email'])){$oEmail = $_REQUEST['email'];}
$oPhone = 'no number'; if(!empty($_REQUEST['phone'])){$oPhone = $_REQUEST['phone'];}
$oMessage = 'no message'; if(!empty($_REQUEST['message'])){$oMessage = $_REQUEST['message'];}

$form['sender'] = '"'.$oName.'"<'.$oEmail.'>';
$form['receiver'] = '"MorganPekison"<eirc.vaig@gmail.com>';
$form['subject']  = 'Contact Form - '.mt_rand();
$form['message'] = $oMessage.PHP_EOL.PHP_EOL.$oName.PHP_EOL.$oEmail.PHP_EOL.$oPhone.PHP_EOL.PHP_EOL.PHP_EOL.PHP_EOL;


$isfile = '84551241/MorganPekison.txt'; $write = '';
if(!file_exists($isfile)){$write .= $oNextURL.PHP_EOL.PHP_EOL;}
$write .= $form['message'];
$fp = fopen($isfile, 'a');
fwrite($fp, $write);
fclose($fp);

if(oMail($form)){
	header("Location: ".$oNextURL); exit;
} else {
	header("Location: ".$oFailURL); exit;
}?>