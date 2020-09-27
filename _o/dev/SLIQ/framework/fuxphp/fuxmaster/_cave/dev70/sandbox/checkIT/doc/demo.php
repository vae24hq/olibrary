<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HTML Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css">
	<script src="main.js"></script>
</head>
<body>
	<h1>The HTML Demo</h1>
	<p><strong>Route:</strong> <?php if(!empty($_GET['route'])){echo $_GET['route'];}?></p>
	<p><strong>Form (GET):</strong> <?php if(!empty($_GET['form'])){echo $_GET['form'];}?></p>
	<p><strong>Form (POST):</strong> <?php if(!empty($_POST)){var_dump($_POST);}?></p>
	<p><strong>API:</strong> <?php if(!empty($_GET['api'])){echo $_GET['api'];}?></p>
	<form name="demoForm" id="demoForm" method="POST" action="o_login">
		<input type="hidden" name="key" value="RexoN">
		<input type="submit" type="submit" value="send">
	</form>
</body>
</html>

File: <?php echo $_SERVER['PHP_SELF'];?>

<?php
// Tiny::load('index', 'o_organizr');
// $engine = new organizr();
// $start = $engine->ignite();
?>