

		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="<?php echo oHTML::activeCSS('dashboard');?>"><a href="<?php echo $zernApp->linkTo('dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
						<li class="menu-title">Cash Point</li>
						<li class="<?php echo oHTML::activeCSS('invoice');?>"><a href="<?php echo $zernApp->linkTo('invoice');?>"><i class="fas fa-file-invoice"></i> <span>Invoice</span></a></li>

						<li class="menu-title">Setting</li>
						<li class="<?php echo oHTML::activeCSS('profile');?>"><a href="<?php echo $zernApp->linkTo('profile/my');?>"><i class="fa fa-user-circle"></i> <span>My Profile</span></a></li>
						<li class="<?php echo oHTML::activeCSS('change-password');?>"><a href="<?php echo $zernApp->linkTo('change-password');?>"><i class="fas fa-lock"></i> <span>Change Password</span></a></li>
						<li class="<?php echo oHTML::activeCSS('locked');?>"><a href="<?php echo $zernApp->linkTo('locked');?>"><i class="fas fa-key"></i> <span>Lock Screen</span></a></li>
						<li class="<?php echo oHTML::activeCSS('logout');?>"><a href="<?php echo $zernApp->linkTo('logout');?>"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>

						<hr>
						<li class="<?php echo oHTML::activeCSS('odao');?>"><a href="odao" target="_blank"><i class="fa fa-user"></i> <span>ODAO</span></a></li>
						<li><a href="zernwww/index.html" target="_blank"><i class="fab fa-internet-explorer"></i> <span>WWW</span></a></li>
					</ul>
				</div>
			</div>
		</div>
