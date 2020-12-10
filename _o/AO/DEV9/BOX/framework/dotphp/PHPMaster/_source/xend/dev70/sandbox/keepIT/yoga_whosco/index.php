<?php
/* erko3™ framework - an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website.
 * Built by SlimEdge™ [@officialSEID - www.seid.com.ng] using PHP, HTML, CSS, JS & derived technology. © July 2016 | version 1.0
 * ================================================================================================================================
 * PHP | index::erko3 ~ default file
 */
require('source/init.php');
erko::doctype();
?>
<html lang="en">
<head>
<?php
	erko::charset();
	erko::viewport();
	erko::XUA();
	erko::title();
	erko::meta();
	erko::favicon();
	erko::stylesheet();
	erko::js();
?>
</head>

<body id="<?php echo strtolower(erko::$acronym);?>">
<h1 class="none"><?php echo heading();?></h1>
<?php if(isIE('<', 6)){staleBrowser('ie');} else {launch();}?>

</body>
</html>