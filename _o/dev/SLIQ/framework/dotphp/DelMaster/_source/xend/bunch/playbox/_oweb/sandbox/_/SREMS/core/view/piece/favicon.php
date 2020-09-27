<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | piece::favicon
 * Dependency » $isDevice
 */
?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo FAVICON.FS;?>favicon.ico">
<?php if(!empty($isDevice) && $isDevice != 'desktop'){?>
<link rel="apple-touch-icon-precomposed" href="<?php echo FAVICON.FS;?>apple-touch-icon-precomposed.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo FAVICON.FS;?>apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo FAVICON.FS;?>apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo FAVICON.FS;?>apple-touch-icon-144x144.png">
<?php }?>
