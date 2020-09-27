<div id="landing">
	<div class="group">
	<div class="landing_1_wrapper">
		<div class="inside">
			 <img src="<?php echo trans_img('new_landing_1','media');?>" alt="new landing" class="flex">
			<h4 class="title">Laboratory Equipment</h4>
			<p class="description">All Chemicals;Glassware; Biology, Chemistry and Physic Products; Biology, & Chemistry Reagents</p>
			<p><?php echo paragraph_link('lab-equipment', 'View more products');?></p>
		</div> 
	</div>

	<div class="landing_2_wrapper">
		<div class="inside">		
			<img src="<?php echo trans_img('new_landing_2','media');?>" alt="new landing" class="flex">
			<h4 class="title">Medical Equipment</h4>
			<p class="description">Disposables; Healthcare Equipments; Diagnostic Equipments; Operating Tables; Blood Monitor</p>
			<p><?php echo paragraph_link('medical-equipment', 'View more products');?></p>
		</div>
	</div>

	<div class="landing_3_wrapper">
		<div class="inside">		
			<img src="<?php echo trans_img('new_landing_3','media');?>" alt="new landing" class="flex">
			<h4 class="title">Technical Equipment</h4>
			<p class="description">Abrasion Testing Machine; Workshop Tools and Machines; Assembly Press Machine</p>
			<p><?php echo paragraph_link('technical-equipment', 'View more products');?></p>
		</div>
	</div>

	<div class="landing_4_wrapper">
		<div class="inside">		
			<img src="<?php echo trans_img('new_landing_4','media');?>" alt="new landing" class="flex">
			<h4 class="title">Furniture and Fittings</h4>
			<p class="description">All Hospital Furnitures; Laboratory Furnitures and Fittings; Classroom and Library Furniture	</p>
			<p><?php echo paragraph_link('furniture-and-fittings', 'View more products');?></p>
		</div>
	</div>

	<?php if(device::is()!='tablet'){?>
	<div class="landing_5_wrapper">
		<div class="inside">		
			<img src="<?php echo trans_img('new_landing_5','media');?>" alt="new landing" class="flex">
			<h4 class="title">Lab Construction</h4>
			<p class="description">Construction of School Laboratory; Industrial Laboratory and Research Laboratory</p>
			<p><?php echo paragraph_link('lab-construction', 'View more products');?></p>
		</div>
	</div>
	<?php }?>

	</div>
	<p class="more"><?php echo paragraph_link('home', 'Continue to our website');?></p>
</div>