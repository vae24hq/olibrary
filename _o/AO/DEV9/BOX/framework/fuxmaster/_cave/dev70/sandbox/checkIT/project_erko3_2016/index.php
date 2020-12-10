<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | root::index ~ default file
 */
require('build/index.php');
require_once('captcha.php');
erko::doctype();
?>
<html lang="en">
<head>
<?php
	erko::charset();
	erko::xua_compatible();
	erko::viewport();
	erko::title();
	erko::meta('erko', 'yeah');
	erko::favicon();
	erko::css('device');
	erko::js();
?>

</head>

<body id="body">
<?php erko::heading();?>
<div id="page">
<?php
if(validate_ie('<', 6)){stale_browser('ie');}
else {erko::layout();}
?>	
</div>
<script>
  <?php if(!validate_ie('<', 9)){?>var nav = responsiveNav(".nav-collapse");<?php }?>
  $(function(){$("#slider").responsiveSlides({speed: 1000, timeout: 6000, random: true, namespace: "banner", nav: true});});
</script>

</body>
</html>