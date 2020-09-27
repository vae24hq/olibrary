<h3 class="moduleTitle"><?php global $pypeLandingTitle; echo $pypeLandingTitle;?></h3>
<div class="moduleContent">
<div class="notice"><b>Initializing...</b></div>
<p>Please wait while the program is initialized</p>
<p class="loading"><img src="<?php echo ANIMATION.FS;?>loading.gif"  alt="Loading"></p>
</div>
<?php redirect(isURL('access'), '3');?>