<?php addFile('patient','utilizr'); $patient = addpatient();?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php addFile('head','slice');?>
</head>

<body id="page-top">
<?php addFile('nav','slice');?>

	<div id="wrapper">

		<!-- Sidebar -->
<?php addFile('sidebar','slice');?>

		<div id="content-wrapper">
			<div class="container-fluid">

				<!-- Breadcrumbs-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="patient">Patient</a>
					</li>
					<li class="breadcrumb-item active">New Patient</li>
				</ol>

				<!-- Page Content -->
					<div class="odao-content">
<?php addFile('form-newpatient','slice');?>
					</div>
			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
<?php #addFile('footer','slice');?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>


<?php addFile('js-bottom','slice');?>
</body>
</html>
