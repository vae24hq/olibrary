<?php require 'konfig.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>404::Not Found</title>
	<style type="text/css" media="screen">
		body {background: white; color:black; font-family: Tahoma, 'sans-serif';}
		.errorURL {
			color: red;
			font-weight: bold;
			font-family: 'Palatino Linotype','sans-serif';
			font-style: italic;
		}
	</style>
</head>
<body>
	<h1>Not Found</h1>
	<p>The requested URL <span class="errorURL"><?php echo oRoute('o_URI');?></span> was not found on this server.</p>
</body>
</html>