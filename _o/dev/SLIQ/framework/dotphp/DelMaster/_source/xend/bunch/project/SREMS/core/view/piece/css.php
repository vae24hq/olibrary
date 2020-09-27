<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | piece::css
 * Dependency » $isDevice
 */
?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo CSS.FS;?>base.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo CSS.FS;?>global.css">
<?php if(!empty($isDevice) && $isDevice == 'phone'){
	echo '<link rel="stylesheet" type="text/css" media="screen, projection" href="'.CSS.FS.'phone.css">';
} elseif ($isDevice == 'tablet'){
	echo '<link rel="stylesheet" type="text/css" media="screen, projection" href="'.CSS.FS.'tablet.css">';
} elseif ($isDevice == 'desktop'){
	echo '<link rel="stylesheet" type="text/css" media="screen, projection" href="'.CSS.FS.'desktop.css">';
}?>
<link rel="stylesheet" href="<?php echo CSS.FS;?>jquery.countdown.css">

