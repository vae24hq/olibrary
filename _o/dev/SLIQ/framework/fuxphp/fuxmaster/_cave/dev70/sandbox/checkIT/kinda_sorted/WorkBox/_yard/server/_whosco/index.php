<?php
/* erko3™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, HTML, CSS, JS & derived technology.
 * © July 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | index::erko3 ~ default file
 */

require('source/initializer.php');
erko3::doctype();
?>
<html lang="en">
<head>
<?php
	erko3::charset();
	erko3::viewport();
	erko3::XUA();
?>
<title><?php erko3::title();?></title>
<?php
	erko3::meta();
	erko3::favicon();
	erko3::stylesheet();
	erko3::js();
?>
</head>

<body id="body">
<h1 class="none"><?php echo heading();?></h1>
<div id="page">
<?php
if(isIE('<', 6)){staleBrowser('ie');}
else {
	code('library');
	layout('header');
	if(erko3::page('name') != 'indexsssssssssssssssssssssss'){layout('navigation');}
	#layout('banner');?>


<div id="content">
<?php #if(erko3::page('name') == 'index'){view('index');} else {?>
	<div id="main">
	<?php #view();?>
	</div>

	<div id="side">
	<?php #layout('side');?>
	</div>
<?php# }?>
</div>
<!-- end content section -->

<?php
	#layout('secondary');
	layout('footer');
erko3::site();}?>
</div>
</body>
</html>