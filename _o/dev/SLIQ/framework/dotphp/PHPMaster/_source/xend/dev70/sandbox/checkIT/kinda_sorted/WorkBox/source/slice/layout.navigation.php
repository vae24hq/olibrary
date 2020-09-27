
<!-- begin navigation section -->
<?php if(Device::is() != 'phone'){?>
<div class="navbar group">
<?php }?>
	<nav id="navigation" class="mainNav">
	<h3 class="none">Navigation</h3>
	<div class="nav-collapse">
		<ul class="group">
<?php	makeNav('main');?>
		</ul>
	</div>
	</nav>
<?php if(!isIE('<', 9) && Device::is() != 'desktop'){?><script>var nav = responsiveNav(".nav-collapse");</script><?php }?>
<?php if(Device::is() == 'desktop'){
piece('search-form');}
if(Device::is() != 'phone'){?>
</div>
<?php }?>
<!-- end navigation section -->
