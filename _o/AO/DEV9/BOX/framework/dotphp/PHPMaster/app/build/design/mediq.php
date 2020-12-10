<?php
require oSLICE.'head.php';?>

<body id="page-top">

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
<?php
$oview = oVIEW.$odao->uri().'.php';
if(file_exists($oview)){require $oview;}
?>

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
<?php require oBIT.'logout.modal.php';?>


<?php require oSLICE.'js.php';?>
</body>
</html>