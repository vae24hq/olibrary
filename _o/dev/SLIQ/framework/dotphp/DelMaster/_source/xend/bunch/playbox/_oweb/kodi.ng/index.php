<?php require('_settings.php');?>
<!doctype html>
<html lang="<?php echo $lang;?>">
<head>
<meta charset="UTF-8">
<title><?php echo showTitle();?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="asset/awesome.css">
<!-- <link rel="stylesheet" type="text/css" media="all" href="asset/ux.css"> -->
<script type="text/javascript" language="javascript" src="asset/jquery.js"></script>
<script type="text/javascript" language="javascript" src="asset/html5.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script type="text/javascript" src="asset/selectivizr.js"></script>
<![endif]-->
</head>

<body>
<h1 class="none"><?php echo showHeading();?></h1>
<?php
	loadFile('top', 'layout');
	#loadFile('banner', 'layout');
?>
</body>
</html>