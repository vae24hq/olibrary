
<div id="topbar">
<div class="inside group">
<span class="breadcrumb"><?php echo erko::breadcrumb();?></span>
<span class="date"><?php echo erko::date();?></span>
</div>
</div>

<?php $logo = 'logo'; if(device::is()=='phone'){$logo = 'logo-small';}?>
<header id="header" class="group">
<h3 class="hide"><?php echo erko::$squat;?></h3>
<div class="inside group">
<a href="<?php echo path_to();?>" title="<?php echo erko::$name;?>" id="logo"><img src="<?php echo path_to('media').$logo.erko::$trans_img;?>" alt="<?php echo erko::$squat;?>" class="flex"></a>
<div class="contact">
<?php if(device::is()!='phone'){?><a href="mailto:<?php echo erko::$basemail;?>" title="write us" class="email"><?php echo erko::$basemail;?></a><?php }?>
<a href="tel://+01" title="call us" class="phone">+1 (0) 000 000 0000</a>
</div>
</div>
</header>
