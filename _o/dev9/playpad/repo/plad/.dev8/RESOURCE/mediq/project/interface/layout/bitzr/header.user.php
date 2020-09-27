

			<ul class="nav user-menu float-right">
<?php #include oBIT.'header.notify.php';?>
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="<?php echo $zernApp->linkTo(oIMG::DP());?>" width="24">
							<span class="status online"></span>
						</span>
						<span><small><?php echo $activeUser->obtain('surname');?></small></span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo $zernApp->linkTo('profile/update');?>">Update Profile</a>
						<a class="dropdown-item" href="<?php echo $zernApp->linkTo('change-password');?>">Change Password</a>
						<a class="dropdown-item" href="<?php echo $zernApp->linkTo('locked');?>">Lock</a>
						<a class="dropdown-item" href="<?php echo $zernApp->linkTo('logout');?>">Logout</a>
					</div>
				</li>
			</ul>


			<div class="dropdown mobile-user-menu float-right">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
				<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?php echo $zernApp->linkTo('profile/update');?>">Update Profile</a>
					<a class="dropdown-item" href="<?php echo $zernApp->linkTo('change-password');?>">Change Password</a>
					<a class="dropdown-item" href="<?php echo $zernApp->linkTo('locked');?>">Lock</a>
					<a class="dropdown-item" href="<?php echo $zernApp->linkTo('logout');?>">Logout</a>
				</div>
			</div>