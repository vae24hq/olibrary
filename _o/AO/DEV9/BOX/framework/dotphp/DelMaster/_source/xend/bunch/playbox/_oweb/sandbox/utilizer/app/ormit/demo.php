<?php 
include('lib/omail.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Demo</title>
	<style type="text/css">
		body {background: #D2B48C; color: white; font-family: 'Tahoma, sans-serif';}
		.ok {color: green;}
		.error {color: red;}
		.demo {padding: 2px 5px; border: 1px solid #E8D9C5;}
	</style>
</head>
<body>
<div class="demo">
<?php
if(isset($_GET['omail'])){
	echo 'oMail Report: ';
	$mail = array();
	if(oMail($mail)){echo '<span class="ok">Success';}
	else {echo '<span class="error">Failure';}
	echo '<small> '.date('d-M-Y h:i:s A').'</small></span>';
}?>
</div>
</body>
</html>