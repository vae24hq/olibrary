<?php require('_settings.php');?>
<!doctype html>
<html lang="<?php echo $lang;?>">
<head>
<meta charset="UTF-8">
<title><?php echo showTitle();?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?<?php echo mt_rand();?>">
<link rel="stylesheet" type="text/css" media="all" href="asset/ux.css?<?php echo mt_rand();?>">
<script type="text/javascript" language="javascript" src="asset/jquery.js"></script>
<script type="text/javascript" language="javascript" src="asset/html5.js"></script>
<script type="text/javascript" language="javascript" src="asset/javascript.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script type="text/javascript" src="asset/selectivizr.js"></script>
<![endif]-->
<script type="text/JavaScript">
function openIB(path){
	var name = 'browsepop';
	var features = 'status=no, scrollbars=yes, resizable=yes, width=1024, height=650, location=no';
	var domain = '<?php echo site('ib');?>';
	var url = domain+path;
	window.open(url, name, features);
}
</script>

</head>

<body>
<h1 class="none"><?php echo showHeading();?></h1>
<?php
	loadFile('header', 'layout');
	loadFile('banner', 'layout');?>



</body>
</html>