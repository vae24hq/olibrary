					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<?php
						?>
						<!-- Nav Item - Alerts -->
						<?php
						?>

						<!-- Nav Item - Messages -->
						<?php
						?>


						<!-- <div class="topbar-divider d-none d-sm-block"></div> -->

						<!-- Nav Item - User Information -->



						<li class="nav-item dropdown no-arrow">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo strtoupper(oHelper::dataInfo('username', $oUserActive));?></span>
								<img class="img-profile rounded-circle" src="icon/<?php echo strtolower(oHelper::dataInfo('sex', $oUserActive)); ?>-user.png">
							</a>
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="modify-password" onclick="return showInMain('modify-password', 'Settings');">
									<i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i> Modify Password
								</a>

								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout" data-toggle="modal" data-target="#logoutModal">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
								</a>
							</div>
						</li>

					</ul>