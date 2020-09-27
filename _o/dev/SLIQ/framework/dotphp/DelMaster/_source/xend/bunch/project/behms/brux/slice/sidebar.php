<section> 
	<!-- Left Sidebar -->
	<aside id="leftsidebar" class="sidebar"> 
		<!-- User Info -->
		<div class="user-info">
			<div class="admin-image"> <img src="assets/images/random-avatar7.jpg" alt=""> </div>
			<div class="admin-action-info"> <span>Welcome</span>
				<h3><?php echo activeuser('firstname').' '.ucfirst(substr(activeuser('lastname'),1, 1));?>.</h3>
				<ul>
					<li><a href="mail-inbox.html" title="Go to Inbox"><i class="zmdi zmdi-email"></i></a></li>
					<li><a href="profile.html" title="Go to Profile"><i class="zmdi zmdi-account"></i></a></li>
					<li><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings"></i></a></li>
					<li><a href="sign-in.html" title="sign out" ><i class="zmdi zmdi-sign-in"></i></a></li>
				</ul>
			</div>
			<div class="quick-stats">
				<h5>Today Report</h5>
				<ul>
					<li><span>16<i>Patients</i></span></li>
					<li><span>20<i>Pending</i></span></li>
					<li><span>04<i>Visits</i></span></li>
				</ul>
			</div>
		</div>
		<!-- #User Info --> 
		<!-- Menu -->
		<div class="menu">
			<ul class="list">
				<li class="header">MAIN NAVIGATION</li>
<?php 
				$deptLink = strtolower(activeuser('odepartment'));
				if($deptLink == 'opd' || $deptLink == 'admin'){?>
				<li class="<?php if($page=="dashboard") echo "active open";  ?>"><a href="dashboard"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
				<li class="<?php if($page=="addPatients") echo "active open";  ?>"><a href="add-patient" class="subNav"><i class="zmdi zmdi-plus"></i><span>Add Patients</span></a></li>
				<li class="<?php if($page=="bookAppointment") echo "active open";  ?>"><a href="book-appointment"><i class="zmdi zmdi-calendar-check"></i><span>Book Appointment</span></a></li>
			<?php } 
				
				if($deptLink == 'opd' || $deptLink == 'admin'){?>
				<li class="<?php if($page=="allPatients") echo "active open"; ?>"><a href="all-patients" class="subNav"><i class="zmdi zmdi-file-text"></i><span>All Patients</span></a></li>


				<?php } 

			 

				if($deptLink == 'doctor' || $deptLink == 'admin'){?>
				<li class="<?php if($page=="myAppointments") echo "active open"; ?>"><a href="my-appointments" class="subNav"><i class="zmdi zmdi-file-text"></i><span>My Appointments</span></a></li>


				<?php } 


				if($deptLink == 'lab' || $deptLink == 'admin'){?>
				<li class="<?php if($page=="labPatients") echo "active open"; ?>"><a href="lab-patients" class="subNav"><i class="zmdi zmdi-plus"></i><span>lab Patients</span></a></li>
				<?php } ?>

				<li class="<?php if($page=="invoice") echo "active open";  ?>"><a href="patient-invoice" class="subNav"><i class="zmdi zmdi-calendar-note"></i><span>Patient Invoice</span></a></li>
				<?php // if($deptLink == 'admin'){?>
				<li class="<?php if($page=="addStaff") echo "active open";  ?>"><a href="add-staff" class="subNav"><i class="zmdi zmdi-calendar-note"></i><span>Add Staff</span></a></li>
			<?php // } ?>
				<li><a href="patients" class="mainNav"><i class="zmdi zmdi-file-text"></i><span>Reports</span></a></li><br />
<br />
<br />
<br />
<br />


			</ul>
		</div>
		<!-- #Menu -->
	</aside>
	
	<!-- Right Sidebar -->
	<aside id="rightsidebar" class="right-sidebar">
		<ul class="nav nav-tabs tab-nav-right" role="tablist">
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#skins">Skins</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat">Chat</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Setting</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane in active in active" id="skins">
				<ul class="demo-choose-skin">
					<li data-theme="red"><div class="red"></div><span>Red</span> </li>
					<li data-theme="purple"><div class="purple"></div><span>Purple</span> </li>
					<li data-theme="blue"><div class="blue"></div><span>Blue</span> </li>
					<li data-theme="cyan" class="active"><div class="cyan"></div><span>Cyan</span> </li>
					<li data-theme="green"><div class="green"></div><span>Green</span> </li>
					<li data-theme="deep-orange"><div class="deep-orange"></div><span>Deep Orange</span> </li>
					<li data-theme="blue-grey"><div class="blue-grey"></div><span>Blue Grey</span> </li>
					<li data-theme="black"><div class="black"></div><span>Black</span> </li>
					<li data-theme="blush"><div class="blush"></div><span>Blush</span> </li>
				</ul>
			</div>
			<div role="tabpanel" class="tab-pane" id="chat">
				<div class="demo-settings">
					<div class="search">
						<div class="input-group">
							<div class="form-line">
								<input type="text" class="form-control" placeholder="Search..." required autofocus>
							</div>
						</div>
					</div>
					<h6>Recent</h6>
					<ul>
						<li class="online">
							<div class="media">
								<a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar1.jpg" alt=""></a>
								<div class="media-body">
									<span class="name">Claire Sassu</span>
									<span class="message">Can you share the</span>
									<span class="badge badge-outline status"></span>
								</div>
							</div>
						</li>
						<li class="online">
							<div class="media">
								<a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar2.jpg" alt=""></a>
								<div class="media-body">
									<span class="name">Maggie jackson</span>
									<span class="message">Can you share the</span>
									<span class="badge badge-outline status"></span>
								</div>
							</div>
						</li>
						<li class="online">
							<div class="media">
								<a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar3.jpg" alt=""></a>
								<div class="media-body">
									<span class="name">Joel King</span>
									<span class="message">Ready for the meeti</span>
									<span class="badge badge-outline status"></span>
								</div>
							</div>
						</li>
					</ul>
					<h6>Contacts</h6>
					<ul class="contacts_list">
						<li class="offline">
							<div class="media">
								<a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar4.jpg" alt=""></a>
								<div class="media-body">
									<span class="name">Hossein Shams</span>
									<span class="badge badge-outline status"></span>
								</div>
							</div>
						</li>
						<li class="online">
							<div class="media">
								<a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar1.jpg" alt=""></a>
								<div class="media-body">
									<span class="name">Maryam Amiri</span>
									<span class="badge badge-outline status"></span>
								</div>
							</div>
						</li>
						<li class="offline">
							<div class="media">
								<a href="javascript:void(0);"><img class="media-object " src="assets/images/xs/avatar2.jpg" alt=""></a>
								<div class="media-body">
									<span class="name">Gary Camara</span>
									<span class="badge badge-outline status"></span>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane" id="settings">
				<div class="demo-settings">
					<p>General settings</p>
					<ul class="setting-list">
						<li>
							<span>Report Panel Usage</span>
							<div class="switch">
								<label>
									<input type="checkbox" checked>
									<span class="lever"></span>
								</label>
							</div>
						</li>
						<li>
							<span>Email Redirect</span>
							<div class="switch">
								<label>
									<input type="checkbox">
									<span class="lever"></span>
								</label>
							</div>
						</li>
					</ul>
					<p>System settings</p>
					<ul class="setting-list">
						<li>
							<span>Notifications</span>
							<div class="switch">
								<label>
									<input type="checkbox" checked>
									<span class="lever"></span>
								</label>
							</div>
						</li>
						<li>
							<span>Auto Updates</span>
							<div class="switch">
								<label>
									<input type="checkbox" checked>
									<span class="lever"></span>
								</label>
							</div>
						</li>
					</ul>
					<p>Account settings</p>
					<ul class="setting-list">
						<li>
							<span>Offline</span>
							<div class="switch">
								<label>
									<input type="checkbox">
									<span class="lever"></span>
								</label>
							</div>
						</li>
						<li>
							<span>Location Permission</span>
							<div class="switch">
								<label>
									<input type="checkbox" checked>
									<span class="lever"></span>
								</label>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</aside>
	
</section>