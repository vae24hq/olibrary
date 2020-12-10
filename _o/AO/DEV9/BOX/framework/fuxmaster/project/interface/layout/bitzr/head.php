<?php
global $fuxApp;
$uri = URL::uri();
$title = '';
$title = $fuxApp->title();
if(!empty($title)){$title = $title.' - ';}
$title = $title.$fuxApp->project;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php echo $title;?></title>
	<link rel="icon" type="image/x-icon" href="icon/favicon.ico">
<?php if($uri != 'login'){?>
	<link href="css/fontawesome.css" rel="stylesheet" type="text/css">
	<link href="css/wfmi.css" rel="stylesheet" type="text/css">
<?php } ?>

	<link href="css/google.css" rel="stylesheet" type="text/css">
	<link href="css/main.css" rel="stylesheet" type="text/css">

<?php if($uri != 'login'){?>
	<link href="css/dataTable.css" rel="stylesheet" type="text/css">
<?php } ?>
	 <!-- <link href="/css/bstable.css" rel="stylesheet"> -->
	<link href="css/odao.css" rel="stylesheet" type="text/css">
	<!-- <link href="css/mdtimepicker.css" rel="stylesheet"> -->



</head>

<?php if($uri == 'login'){?>
<body class="bg-gradient-primary o-login-page">
<?php } else {?>
<body id="page-top">
<?php } ?>