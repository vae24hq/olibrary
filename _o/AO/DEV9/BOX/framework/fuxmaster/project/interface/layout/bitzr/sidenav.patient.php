			<!-- Divider -->
			<hr class="sidebar-divider">
<?php if($iMedUserActive['account'] == 'adhoc'){?>
<li class="nav-item"><a class="nav-link" href="patient-new"><i class="fas fa-fw fa-plus-square"></i><span>New Patient</span></a></li>
<li class="nav-item"><a class="nav-link" href="patient-list"><i class="fas fa-fw fa-clipboard-list"></i><span>Patient List</span></a></li>
			<hr class="sidebar-divider">

<?php } else {?>
			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePatient" aria-expanded="true" aria-controls="collapsePatient">
					<i class="fas fa-fw fa-folder"></i>
					<span>Patient</span>
				</a>
				<div id="collapsePatient" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Manage Patient</h6>
						<a class="collapse-item" href="patient-new"><i class="fas fa-fw fa-plus-square"></i> New Patient</a></a>
						<a class="collapse-item" href="patient-list"><i class="fas fa-fw fa-clipboard-list"></i> Patient List</a>
						<!-- <a class="collapse-item" href="patient-search"><i class="fas fa-fw fa-search"></i> Search Patient</a> -->
					</div>
				</div>
			</li>
<?php }?>