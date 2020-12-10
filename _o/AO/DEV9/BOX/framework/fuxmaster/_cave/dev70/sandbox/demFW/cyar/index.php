<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | root::index ~ default file
 */
require('setting.php');
markup::doctype();
?>
<html lang="en">
<head>
<?php
	markup::charset();
	markup::viewport();
	markup::XUA();
	markup::title();
	markup::meta();
	markup::favicon();
	markup::stylesheet();
	markup::js();	
?>
</head>

<body id="<?php markup::cssID();?>">
<h1 class="hide"><?php markup::heading();?></h1>

<?php if(isIE('<', 6)){markup::stale('ie');} else {cyar::start();}?>

</body>
</html>