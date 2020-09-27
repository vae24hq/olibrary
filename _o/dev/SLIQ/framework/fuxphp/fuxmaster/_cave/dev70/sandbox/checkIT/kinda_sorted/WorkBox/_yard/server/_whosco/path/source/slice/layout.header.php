
<header id="header">
<h2 class="none">Whosco - The Winner's Group</h2>

<div class="top group">
	<span class="breadcrumb"><?php echo breadcrumb();?></span>
	<span class="date"><?php echo responsiveDate();?></span>
</div>

<div class="firm group">
	<div id="logo">
	<a href="<?php echo pathTo();?>" title="<?php echo erko3::$name;?>" class="brand"><img src="<?php echo responsiveImg('logo');?>" alt="<?php echo erko3::$squat;?>" class="flex"></a>
	</div>

<?php if(Device::is() != 'phone'){?>
	<div class="contact">
	<a href="mailto:<?php echo erko3::$basemail;?>" title="write us" class="email"><?php echo erko3::$basemail;?></a>
	<a href="tel://+2348052651094" title="call us" class="phone">+234 (0) 805 265 1094</a>
	<?php if(Device::is() != 'tablet'){?><span class="address">Plot 63, Sapele Road, Benin City</span>
<?php }?>
	</div>
<?php }?>
</div>

</div>
</header>
<!-- end header section -->

