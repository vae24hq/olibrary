<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | index
 * Dependency » switch
 */
require('core/switch.php');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include(PIECE.DS.'viewport.php');?>
<title><?php echo pageTitle();?></title>
<?php include(PIECE.DS.'meta.php');?>
<?php include(PIECE.DS.'favicon.php');?>
<?php include(PIECE.DS.'css.php');?>
<?php include(PIECE.DS.'css-form.php');?>
<?php include(PIECE.DS.'in-head.php');?>
<?php include(PIECE.DS.'js.php');?>
</head>

<body>
<h1 class="hide"><?php if(!empty($pypeAppHeading)){echo $pypeAppHeading;} else {echo pageTitle();}?></h1>
<?php include(DESIGN.DS.'pype.php');?>
</body>
</html>