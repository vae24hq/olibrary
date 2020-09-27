<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Paypal & XE.com Exchange</title>
	<style type="text/css">
	body {
		font-family: 'Helvetica', Sans-serif;
		font-size: 90%;
		color: #006297;
		background: #E1F4FF;
	}
	a {color: #996633;}
	a:hover {color: #999966;}
	.result {
		background: #006297;
		border: 1px solid #22B1FF;
		border-radius: 6px;
		color: #A4DFFF;
		text-shadow: 1px 1px 0 #004266;
		padding: 10px;
		width: 200px;
		text-align: center;
	}
	</style>
</head>
<body>
	<h1>Paypal & XE.com Exchange</h1>
	<p>Estimate charges in Naira using Paypal based on XE.com</p>
	<p>URL example :?charge=100&xeRate=199&IN=USD</p>
	<p><a href='./xchanger.php?charge=100&xeRate=321&IN=USD'>Load Example</a></p>
	<?php
		if(!empty($_REQUEST['charge']) && !empty($_REQUEST['xeRate'])){
			$multiplier = $_REQUEST['xeRate'] + 12.6;
			$result = $_REQUEST['charge'] * $multiplier;
			echo '<p class="result"><b>Result:</b> '.number_format($result, 2). ' Naira</p>';
		}
	?>
</body>
</html>