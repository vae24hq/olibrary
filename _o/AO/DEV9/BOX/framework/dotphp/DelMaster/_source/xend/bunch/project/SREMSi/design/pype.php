<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | design::pype
 * Dependency » *
 */

restrict('loggedIn');
autoLogIn();
global $pypeModule;
$mode = strtolower($pypeModule);

if(layout() !='initialize'){include(SLICE.DS.'header.php');}?>
<div id="<?php echo layout();?>" class="group">
<?php include(SLICE.DS.'main.php');?>  
<?php if(layout() =='application' && $mode != 'print'){include(SLICE.DS.'side.php');}?>
</div>
<?php if(layout() !='initialize' && $mode != 'print'){include(SLICE.DS.'footer.php');}?>
