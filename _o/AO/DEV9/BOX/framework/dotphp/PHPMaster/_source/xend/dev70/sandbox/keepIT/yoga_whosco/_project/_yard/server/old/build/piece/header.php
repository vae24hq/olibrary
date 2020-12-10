
<?php $logo = 'logo'; if(device::is()=='phone'){$logo = 'logo-small';}?>
<header id="header" class="group">
<h3 class="hide">Whosco - The Winner's Group</h3>
	<div id="logo">
	<a href="<?php echo path_to();?>" title="<?php echo erko::$name;?>" class="logo"><img src="<?php echo trans_img($logo,'media');?>" alt="<?php echo erko::$squat;?>" class="flex"></a>
	</div>
<?php if(device::is()!='phone'){?>
	<div class="contact">
		<p><a href="mailto:<?php echo erko::$basemail;?>" title="write us" class="email"><?php echo erko::$basemail;?></a></p>
		<p><a href="tel://+2348052651094" title="call us" class="phone">+234 (0) 805 265 1094</a></p>
	<?php if(device::is()!='tablet'){?><p class="address">Plot 63, Sapele Road, Benin City</p><?php }?>
	</div>
<?php }?>
</header>