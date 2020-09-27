		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard"><div class="sidebar-brand-text mx-3">Faith Mediplex</div></a>
			<hr class="sidebar-divider my-0">
			<li class="nav-item active"><a class="nav-link" href="/dashboard"><span class="o-pad-left"><?php echo ucfirst(user::active('type'));?> Dashboard</span></a></li>
			<hr class="sidebar-divider">
			<?php if(user::active('type') != 'adhoc'){?>
				<div class="sidebar-heading">Record Cards</div>
				<li class="nav-item"><a class="nav-link" href="/record/new-card"><span class="o-pad-left">New Card</span></a></li>
				<li class="nav-item"><a class="nav-link" href="/record/cards"><span class="o-pad-left">Manage Card</span></a></li>
			<?php } else {?>
				<li class="nav-item"><a class="nav-link" href="/record/cards"><span class="o-pad-left">Update Card</span></a></li>
			<?php }?>

			<hr class="sidebar-divider">
			<div class="sidebar-heading">Settings</div>
			<li class="nav-item"><a class="nav-link" href="/setting/change-password"><span class="o-pad-left">Change Password</span></a></li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>