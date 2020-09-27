<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | piece::meta
 * Dependency » $isDevice, isMeta();
 */
global $isDevice;
?>
<meta name="description" content="<?php echo isMeta('description');?>">
<meta name="keywords" content="<?php echo isMeta('keywords');?>">
<meta name="robots" content="index, follow">
<?php if(!empty($isDevice) && $isDevice != 'desktop'){
	echo'<meta name="format-detection" content="telephone=no">';
}?>