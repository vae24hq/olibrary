<?php
function getGUID(){
	if (function_exists('com_create_guid')){
		return com_create_guid();
	}else{
		mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid = chr(123)// "{"
			.substr($charid, 0, 8).$hyphen
			.substr($charid, 8, 4).$hyphen
			.substr($charid,12, 4).$hyphen
			.substr($charid,16, 4).$hyphen
			.substr($charid,20,12)
		.chr(125);// "}"
		return $uuid;
	}
}

$GUID = getGUID();
$GUID2 = rand(10000, 99999);
$GUID3 = mt_rand(10000000, 99999999);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Generate Unique ID - GUID</title>
	<style type="text/css" media="screen">
		body {
			font-family: Arial, sans-serif;
			font-size: 0.9em;
			color: tan;
			background: black;
			line-height: 1.5;
		}
		h1 {color: brown; font-size: 1.2em; margin-bottom: 0;}
		a {color: red;}
	</style>
	<script>
	function myReload() {
		location.reload();
	}
	</script>
</head>
<body>
	<h1>Generated ID</h1>
	<p><?php
	echo 'GUID 1: '.$GUID.'<br>';
	echo 'GUID 2: '.$GUID2.'<br>';
	echo 'GUID 3: '.$GUID3.'<br>';?></p>
	<p><a href="javascript:void(0)" onclick="myReload()">Reload</a></p>
</body>
</html>