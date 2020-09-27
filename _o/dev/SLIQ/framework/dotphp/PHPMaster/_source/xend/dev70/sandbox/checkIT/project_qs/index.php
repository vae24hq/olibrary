<?php
#error_reporting(0);
// settings
$qs_name = 'Turnkey Project, Inc.';
$qs_brand = 'Turnkey™';
$qs_acronym = 'Turnkey Inc.';
$qs_slogan = 'Lets build it';

$qs_basepath = '';
$qs_baseurl = '';
$qs_domain = '';

//Slideshow Information
$slideImgData = array(
	1  => array("name" => "inn_2064"),
	2  => array("name" => "inn_2063"),
	3  => array("name" => "inn_2062"),
	4  => array("name" => "inn_2061"),

	5  => array("name" => "blaise_2141"),
	6  => array("name" => "blaise_2142"),
	7  => array("name" => "blaise_2145"),

	8  => array("name" => "home_2540"),
	9  => array("name" => "home_2533"),
	10  => array("name" => "home_2517"),

	11  => array("name" => "redbend_2433"),
	12  => array("name" => "redbend_2432"),
	13  => array("name" => "redbend_2431"),

	14  => array("name" => "waynetwp_2304"),
	15  => array("name" => "waynetwp_2303"),
	16  => array("name" => "waynetwp_2302"),
	
	17  => array("name" => "towneplace_2072"),
	18  => array("name" => "towneplace_2071"),

	19  => array("name" => "llb_2578"),
	20  => array("name" => "llb_2577"),

	21  => array("name" => "skyhigh"),
	22  => array("name" => "dunwoody")
	);

// include engine
require 'qs.php';
Session::Start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo showTitle();?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="source/asset/main.css">
<script type="text/javascript" language="javascript" src="source/asset/jquery.js"></script>
<script type="text/javascript" language="javascript" src="source/asset/html5.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script type="text/javascript" src="source/asset/selectivizr.js"></script>
<![endif]-->
<script src="source/asset/slides.js"></script>
</head>

<body>
<h1 class="none"><?php echo showHeading();?></h1>
<?php 
	loadFile('layout-header', 'slice');
	if(grabLink() == 'home'){loadFile('index', 'page');}
	else {loadFile('', 'page');}	
	loadFile('layout-footer', 'slice');
?>

</body>
</html>