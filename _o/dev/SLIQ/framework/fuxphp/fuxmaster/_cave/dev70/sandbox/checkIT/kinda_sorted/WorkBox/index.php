<?php
/* erko3™ framework - an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website.
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, HTML, CSS, JS & derived technology. © July 2016 | version 1.0
 * ================================================================================================================================
 * PHP | index::erko3 ~ default file
 */

require('source/initializer.php');
erko::doctype();
?>
<html lang="en">
<head>
<?php
	erko::charset();
	erko::viewport();
	erko::XUA();
?>
<title><?php erko::title();?></title>
<?php
	erko::meta();
	erko::favicon();
	erko::stylesheet();
	erko::js();
?>
</head>

<body id="body">
<h1 class="none"><?php echo heading();?></h1>
<div class="page">

<?php if(isIE('<', 6)){staleBrowser('ie');}
else {
	code('library');
	layout('header');
	#if(erko::page() != 'index'){layout('navigation');}
	#layout('banner');
	#if(erko::page() == 'index'){outline('index');}
	#else {outline('primary');}
	layout('secondary');
	layout('footer');
}?>

</div>
</body>
</html>