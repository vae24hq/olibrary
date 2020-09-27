<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | piece::viewport
 * Dependency » $isDevice
 */
if(!empty($isDevice) && $isDevice != 'desktop'){
	echo '<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=3">';
}
?>
