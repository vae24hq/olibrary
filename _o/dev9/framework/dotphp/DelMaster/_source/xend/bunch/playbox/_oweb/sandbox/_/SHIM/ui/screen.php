<?php do_session(); $loader = new loader(); ?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" type="image/x-icon" href="../media/icon/favicon.ico" />
<link rel="stylesheet" type="text/css" href="../script/css/screen.css">
<?php print_msg($loader->get_title()); ?>
</head>

<body>

<!--header section -->
<?php inc("../ui/screen_header.php"); ?>
<!--end header section -->

<div class="spacer" style="height:6px;">&nbsp;</div>
<?php getContentArea(); ?>
<div class="spacer" style="height:4px;">&nbsp;</div>

<!--footer section -->
<?php inc("../ui/screen_footer.php"); ?>
<!--end footer section -->

</body>
</html>