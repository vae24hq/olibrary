
<div id="topbar" class="group">
	<span class="breadcrumb"><?php echo breadcrumb();?></span>
	<span class="date"><?php echo responsiveDate();?></span>

<?php if(Device::is() != 'iphone'){}#erko3::layout('translate');?>

</div>


<header id="header" class="group">
<h3 class="hide">Whosco - The Winner's Group</h3>
	<div id="logo">
	<a href="<?php echo pathTo();?>" title="<?php echo erko3::$name;?>" class="logo"><img src="<?php echo responsiveImg('logo');?>" alt="<?php echo erko3::$squat;?>" class="flex"></a>
	</div>
<?php if(Device::is() != 'phone'){?>
	<div class="contact">
		<p><a href="mailto:<?php echo erko3::$basemail;?>" title="write us" class="email"><?php echo erko3::$basemail;?></a></p>
		<p><a href="tel://+2348052651094" title="call us" class="phone">+234 (0) 805 265 1094</a></p>
	<?php if(Device::is() != 'tablet'){?><p class="address">Plot 63, Sapele Road, Benin City</p><?php }?>
	</div>
<?php }?>
</header>
