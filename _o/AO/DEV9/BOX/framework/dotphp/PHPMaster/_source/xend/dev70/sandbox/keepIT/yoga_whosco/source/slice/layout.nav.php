
<!-- navigation-->
<?php if(Device::is() != 'phone'){?>
<div class="navbar group">
<?php }?>
	<nav id="navigation" class="mainNav">
	<h2 class="none">Site Navigation</h2>
<?php if(Device::is() != 'desktop'){?>
	<div class="nav-collapse">
<?php }?>
	<ul>
<?php	makeNav('main');?>
	</ul>
<?php if(Device::is() != 'desktop'){?>
	</div>
<?php }?>
	</nav>
<?php if(Device::is() != 'desktop'){?>	<script>var nav = responsiveNav(".nav-collapse");</script>
<?php }?>
<?php if(Device::is() == 'desktop'){piece('search-form');} if(Device::is() != 'phone'){?>
</div>
<?php }?>
<!-- end navigation-->
