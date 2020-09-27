				<!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow o-topnav"> -->
				<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow o-topnav">
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
						<h4 class="o-page-title" id="pageTitle"></h4>

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
<?php include oBIT.'topnav.user.php';?>

					</ul>

				</nav>