<?php
require '.initializr.php';
require MODELIZR.'auth.php';
require ORGANIZR.'authenticate.php';
require MODELIZR.'patient.php';
if(!empty($_GET['patient'])){
	$patientBind = $_GET['patient'];
	$patientInfo = patient::record($patientBind);
	if($patientInfo == 'NO_RECORD'){oRedirect('no-record');}
	if(!empty($_POST)){
		if(patient::update($_POST, $_GET['patient'])){oRedirect('success?op=patient-updated');}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $MediPlex->info('name');?></title>
<link rel="icon" type="image/x-icon" href="asset/favicon.ico">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="css/google.css" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="css/odao.css" rel="stylesheet">
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
<?php include SLICE.'layout.sidebar.php';?>

		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
<?php include SLICE.'layout.topnav.php';?>

				<!-- End of Topbar -->

				<!-- Begin Page Content -->
<?php include VIEW.'patient-edit.php';?>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
<?php include SLICE.'layout.footer.php';?>
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
<?php include SLICE.'logout.modal.php';?>


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>