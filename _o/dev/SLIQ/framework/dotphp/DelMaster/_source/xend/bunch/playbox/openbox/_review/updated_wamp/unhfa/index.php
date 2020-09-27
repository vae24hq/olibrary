<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | root::index ~ default file
 */
require('build/setting.php');
erko::doctype();?>
<html lang="en">
<head>
<?php
	erko::charset();
	erko::xua_compatible();
	erko::viewport();
	erko::title();
	erko::meta('erko', 'no');
	erko::favicon();
?>
<link rel="stylesheet" type="text/css" href="<?php echo path_to('css')?>layout.css">
<link rel="stylesheet" type="text/css" href="<?php echo path_to('css')?>print.css" media="print">
<script type="text/javascript" src="<?php echo path_to('js')?>time.js"></script>
</head>

<body id="body">
<?php erko::layout();?>
</body>
</html>