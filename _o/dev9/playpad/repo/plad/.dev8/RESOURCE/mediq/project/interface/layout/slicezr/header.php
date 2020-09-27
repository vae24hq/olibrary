
		<div class="header">
			<div class="header-left">
				<a href="<?php echo $zernApp->linkTo('dashboard');?>" class="logo">
					<img src="<?php echo $zernApp->linkTo(ICON.'icon.png');?>" width="35" height="35" class="iconlogo"> <span><?php echo $zernApp->project;?></span>
				</a>
			</div>
			<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
			<a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
<?php include oBIT.'header.user.php';?>
		</div>
