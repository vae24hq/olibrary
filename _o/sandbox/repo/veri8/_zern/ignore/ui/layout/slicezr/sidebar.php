		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
				<div class="sidebar-brand-icon rotate-n-15"> <i class="fas fa-stethoscope"></i> </div>
				<div class="sidebar-brand-text mx-3"><?php echo $fuxApp->project.' <sup>'.$fuxApp->ver.'</sup>';?></div>
			</a>
			<!-- Divider -->
			<hr class="sidebar-divider my-0">
			<!-- Nav Item - Dashboard -->
			<li class="nav-item<?php echo oHelper::isCSSActive('dashboard', $fuxURI);?>"> <a class="nav-link" href="dashboard"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
			<?php if($oUserActive['type'] == 'dev'){?>
			<li class="nav-item<?php echo oHelper::isCSSActive('blank', $fuxURI);?>"> <a class="nav-link" href="blank"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>blank</span></a> </li>
		<?php } ?>
			<!-- Divider -->
<?php

	#$sideNav = oBIT.'sidenav.'.$userActive['type'].'.php';
	#if(file_exists($sideNav)){include $sideNav;}

	// if($userActive['type'] == 'record'){
	// 	include oBIT.'sidenav.record.php';
	// }




	// //menu for pay point
	// if($userActive['type'] == 'paypoint'){
	// 	include oBIT.'sidenav.paypoint.php';
	// }



	include oBIT.'sidenav.card.php';
	include oBIT.'sidenav.setting.php';
?>



			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">
			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>