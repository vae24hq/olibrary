<?php include oBIT . 'head.php'; ?>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->

		<?php include oSLICE . 'sidebar.php'; ?>

		<!-- End of Sidebar -->
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->

			<?php include oSLICE . 'nav.php'; ?>

				<!-- End of Topbar -->
				<!-- Begin Page Content -->

				<?php if (file_exists(oVIEW . $fuxURI . '.php')) {
					include oVIEW . $fuxURI . '.php';
				} else {
					include oVIEW . 'blank.php';
				} ?>

				<!-- /.container-fluid -->
			</div>
			<!-- End of Main Content -->
			<!-- Footer -->

			<?php include oSLICE . 'footer.php'; ?>

			<!-- End of Footer -->
		</div>
		<!-- End of Content Wrapper -->
	</div>
	<!-- End of Page Wrapper -->
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i> </a>
	<!-- Logout Modal-->

	<?php
	include oBIT . 'modal.logout.php';
	include oBIT . 'js.php'; ?>