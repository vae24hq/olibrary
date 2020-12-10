<?php require('library/core.php');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include("assets/bit/meta-viewport.php"); ?>
<title><?php include("assets/bit/title.php"); ?></title>
<?php include("assets/bit/meta.php"); ?>
<?php include("assets/bit/favicon.php"); ?>
<?php include("assets/bit/css.php"); ?>
<?php include("assets/bit/in-head.php"); ?>
<?php include("assets/bit/js.php"); ?>
</head>

<body>
<h1 class="hide">
  <?php include("assets/bit/title.php"); ?>
</h1>
<?php include('assets/bit/header.php'); ?>
<?php 
	$singlePages = array('login');
	if(in_array($cignaLoader->module(), $singlePages)) { $sectionID = 'page-single';} else {$sectionID = 'page';} 
	if(!in_array($cignaLoader->module(), $singlePages)) {
		include('assets/bit/nav.php');
	} 
?>

<section id="<?php echo $sectionID;?>">
<h2 class="hide"><?php echo $cignaLoader->get('module');?></h2>
<?php
	$isLoggedIn = isLoggedIn('autologin');
	if($isLoggedIn == 'loggedin') {
		include('assets/bit/topnav.php'); 
	}
?>

<div class="page-content"><?php $cignaLoader->get('page');?></div>
<?php include('assets/bit/footer.php'); ?>

</section>
</body>
</html>