
<div id="content" class="group">
<div id="main">
<?php erko::page();?>	
</div>

<div id="side">
	<h3 class="heading">Featured Products</h3>
	
		<div class="group">
		<div class="inside" id="featured_1">
			<img src="<?php echo trans_img('1-150','media');?>" alt="new arrival" class="flex">
			<h4 class="title">MS036</h4>
		</div>

		<div class="inside" id="featured_2">
			<img src="<?php echo trans_img('2-150','media');?>" alt="new arrival" class="flex">
			<h4 class="title">MS036</h4>
		</div>

		<div class="inside" id="featured_3">
			<img src="<?php echo trans_img('3-150','media');?>" alt="new arrival" class="flex">
			<h4 class="title">MS036</h4>
		</div>
		</div>
		<?php if(device::is()=='phone'){?><p class="grouip"></p><?php }?>
		<p class="more"><?php echo paragraph_link('products', '...view more products');?></p>
	
</div>