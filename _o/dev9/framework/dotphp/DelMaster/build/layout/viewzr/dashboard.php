<?php oFile::load('head','slicezr');?>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
<?php include oSLICEZR.'sidebar.php';?>

		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
<?php include oSLICEZR.'topnav.php';?>

				<!-- End of Topbar -->

				<!-- Begin Page Content -->
<?php include oPAGEZR.'dashboard_adhoc.php';?>

				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
<?php include oSLICEZR.'footer.php';?>
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
<?php include oBITZR.'logout.modal.php';?>


<?php oFile::load('js','slicezr');?>
</body>
</html>