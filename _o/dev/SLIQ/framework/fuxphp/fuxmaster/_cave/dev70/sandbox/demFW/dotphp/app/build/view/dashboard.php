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
						<a href="dashboard">Dashboard</a>
					</li>
				</ol>

				<!-- Page Content -->
				<!-- <h1>Blank Page</h1>
				<hr>
				<p>This is a great starting point for new custom pages and <a href="#" data-toggle="modal" data-target="#logoutModal">modal window</a>.</p> -->

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
<?php addFile('footer','slice');?>

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
