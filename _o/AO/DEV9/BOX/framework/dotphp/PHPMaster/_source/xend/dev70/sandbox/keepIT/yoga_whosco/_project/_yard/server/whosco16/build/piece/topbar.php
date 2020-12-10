
<div id="topbar" class="group">
	<span class="breadcrumb"><?php echo erko::breadcrumb();?></span>
	<span class="date"><?php echo erko::date();?></span>

<?php if(device::is() !='iphone'){
#erko::piece('slice-topbar-translate');
}?>

</div>