<?php include oBIT.'head.php';?>


	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
<?php require oSLICE.'sidebar.php';?>

		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">


				<!-- Topbar -->
<?php require oSLICE.'topnav.php';?>

				<!-- End of Topbar -->

				<!-- Begin Page Content -->
<?php require  oVIEW.'main.php';?>

				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
<?php require oSLICE.'footer.php';?>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
<?php require  oBIT.'modal.big.php';?>
<?php require oBIT.'logout.modal.php';?>


<?php require oBIT.'js.php';?>
