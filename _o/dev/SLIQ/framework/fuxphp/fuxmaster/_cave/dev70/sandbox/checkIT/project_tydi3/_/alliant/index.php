<?php
error_reporting(0);
// settings
$qs_name = 'Alliant Group';
$qs_brand = 'Alliant™';
$qs_acronym = 'Alliant';
$qs_slogan = 'You can bank on us';

$qs_basepath = 'alliant';
$qs_baseurl = '';
$qs_domain = '';

// include engine
require 'qs.php';?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo showTitle();?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<link rel="shortcut icon" type="image/x-icon" href="source/asset/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="source/asset/main.css">
<script type="text/javascript" language="javascript" src="source/asset/jquery.js"></script>
<script type="text/javascript" language="javascript" src="source/asset/html5.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script type="text/javascript" src="source/asset/selectivizr.js"></script>
<![endif]-->
<script type="text/JavaScript">
function openBrowser(url){
	var name = 'browsepop';
	var features = 'status=no, scrollbars=yes, resizable=yes, width=1024, height=640, location=no';
	window.open(url, name, features);
}
</script>
</head>

<body>
<h1 class="none"><?php echo showHeading();?></h1>
<div id="page">
<?php 
	loadFile('layout-header', 'slice');
	loadFile('layout-nav', 'slice');
	loadFile('', 'page');
	loadFile('layout-sidebar', 'slice');
	loadFile('layout-footer', 'slice');
?>
</div>

</body>
</html>