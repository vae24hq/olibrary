				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Search -->
<?php #include BIT.'topbar.search.php';?>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">
						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
<?php #include BIT.'topbar.searchdrop.php';?>


						<!-- Nav Item - Alerts -->
<?php #include BIT.'topbar.alert.php';?>


						<!-- Nav Item - Messages -->
<?php #include BIT.'topbar.message.php';?>

						<!-- <div class="topbar-divider d-none d-sm-block"></div> -->

						<!-- Nav Item - User Information -->
<?php include oBITZR.'topbar.usernav.php';?>

					</ul>

				</nav>