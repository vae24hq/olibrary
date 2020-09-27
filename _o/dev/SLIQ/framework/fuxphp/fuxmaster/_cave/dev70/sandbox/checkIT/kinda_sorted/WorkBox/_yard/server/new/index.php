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
	//include custom functions
	code('function');
	
	//layout construct
	#layout('header');
	#if(erko3::page('name') != 'index'){layout('navigation');}
	#layout('slider');
	#view('current');
	#layout('secondary');
	layout('footer');
?>

</div>


</body>
</html>