
	<div class="search">
	<div class="content">
	<h3 class="heading">Search Product</h3>
	<p class="paragraph">Please use the form below to find your product</p>
<?php piece('search-form');
if(Device::is() != 'phone'){piece('best-quality'); echo "\n";}?>
	</div>
	</div><!-- end of search -->