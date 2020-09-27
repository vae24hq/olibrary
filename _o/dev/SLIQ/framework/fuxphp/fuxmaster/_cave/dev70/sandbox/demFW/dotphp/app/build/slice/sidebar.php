		<ul class="sidebar navbar-nav odao-sidebar">
			<li class="nav-item<?php activeNavCSS('dashboard');?>">
				<a class="nav-link" href="dashboard">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<li class="nav-item dropdown odao-nav-item">
				<a class="nav-link dropdown-toggle odao-nav-link" href="#" id="patient" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-fw fa-user-injured"></i>
					<span>Patient</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="patient">
				<div class="odao-submenu">
					<a class="dropdown-item" href="patient-add"><i class="fas fa-fw fa-plus-square"></i> New Patient</a>
					<a class="dropdown-item<?php activeCSS('patient-list');?>" href="patient-list"><i class="fas fa-fw fa-clipboard-list"></i> Patient List</a>
					<a class="dropdown-item" href="patient-search"><i class="fas fa-fw fa-search"></i> Search Patient</a>
				</div>
				</div>
			</li>

			<li class="nav-item dropdown odao-nav-item">
				<a class="nav-link dropdown-toggle" href="#" id="staff" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-fw fa-users"></i>
					<span>Staff</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="staff">
					<a class="dropdown-item" href="staff-add"><i class="fas fa-fw fa-user-plus"></i> New Staff</a>
					<a class="dropdown-item<?php activeCSS('staff-list');?>" href="staff-list"><i class="fas fa-fw fa-user-friends"></i> Staff List</a>
				</div>
			</li>

			<li class="nav-item odao-nav-item">
				<a class="nav-link" href="logout">
					<i class="fas fa-fw fa-sign-in-alt"></i>
					<span>Logout</span></a>
			</li>
		</ul>