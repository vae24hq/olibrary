<!-- begin header section -->
<header id="header" class="pageHeader">
 <h2 class="none">Whosco - The Winner's Group</h2>
	<div class="topbar group">
		<span class="crumb"><?php echo breadcrumb();?></span>
		<span class="date"><?php echo resDate();?></span>
	</div>
	<div class="branding group">
		<div class="firm"><a class="logo" href="<?php echo pathTo('index');?>" title="<?php echo erko::$squat;?>"><img src="<?php echo resImg('logo');?>" alt="<?php echo erko::$squat;?>"></a></div>
<?php if(Device::is() != 'phone'){?>
		<div class="contactInfo">
			<a href="mailto:<?php echo erko::$email;?>" title="email us" class="email"><?php echo erko::$email;?></a>
			<a href="tel://+2348052651094" title="call us" class="phone">+234 (0) 805 265 1094</a>
			<span class="address">Plot 63, Sapele Road, Benin City</span>
		</div>
<?php }?>

	</div>
</header>
<!-- end header section -->
