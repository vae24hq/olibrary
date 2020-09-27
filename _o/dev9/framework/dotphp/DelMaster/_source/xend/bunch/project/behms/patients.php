<?php
require 'konfig.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>::<?php echo konfig('hospitalName');?>::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
<!-- Dropzone Css -->
<link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
<!-- Bootstrap Material Datetime Picker Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"/>
<!-- Wait Me Css -->
<link rel="stylesheet" href="assets/plugins/waitme/waitMe.css" />
<!-- Bootstrap Select Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css"/>

<link rel="stylesheet" href="assets/css/main.css"/>
<!-- Custom Css -->



</head>

<body class="theme-cyan">
<?php
$page = "patients";
$subPage = "allPatients";
include 'brux/slice/header.php'; 
include 'brux/slice/sidebar.php';
?>

<section class="content">
		<div class="container-fluid">
				<div class="block-header">
						<h2>All Patients</h2>
						<small class="text-muted">Welcome to HMS Application</small>
				</div>
				<div class="row clearfix">
					<!-- 	<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="card all-patients">
										<div class="body">
												<div class="row">
														<div class="col-md-4 col-sm-4 text-center m-b-0">
																<a href="javascript:void(0);" class="p-profile-pix"><img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail img-fluid"></a>
														</div>
														<div class="col-md-8 col-sm-8 m-b-0">
																<h5 class="m-b-0">Johnathan Doe <a href="javascript:void(0);" class="edit"><i class="zmdi zmdi-edit"></i></a></h5> <small>Cardio</small>
																<address class="m-b-0">
																		123 Folsom Ave, Suite 100 New York, CADGE 56824<br>
																		<abbr title="Phone">P:</abbr> (123) 456-7890
																</address>
														</div>
												</div>
										</div>
								</div>
						</div> -->

						<?php
								$record = patient::all();
								$id = 0;
									if(!isArrayMulti($record)){
						?>
						<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="card all-patients">
										<div class="body">
												<div class="row">
														<div class="col-md-4 col-sm-4 text-center m-b-0">
																<a href="javascript:void(0);" class="p-profile-pix"><img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail img-fluid"></a>
														</div>
														<div class="col-md-8 col-sm-8 m-b-0">
																<h5 class="m-b-0"><?php echo $record['firstname'].' '.$record['lastname'];?> <a href="javascript:void(0);" class="edit"><i class="zmdi zmdi-edit"></i></a></h5> <small><?php echo $record['status'];?></small>
																<address class="m-b-0">
																		<?php echo $record['address'];?><br>
																		<abbr title="Phone">P:</abbr> <?php echo $record['phone'];?>
																</address>
														</div>
												</div>
										</div>
								</div>
						</div>
<?php } else {
						foreach ($record as $row){
										$id = $id+1;
							?>
						<div class="col-lg-4 col-md-6 col-sm-12">
								<div class="card all-patients">
										<div class="body">
												<div class="row">
														<div class="col-md-4 col-sm-4 text-center m-b-0">
																<a href="javascript:void(0);" class="p-profile-pix"><img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail img-fluid"></a>
														</div>
														<div class="col-md-8 col-sm-8 m-b-0">
																<h5 class="m-b-0"><?php echo $row['firstname'].' '.$row['lastname'];?> <a href="javascript:void(0);" class="edit"><i class="zmdi zmdi-edit"></i></a></h5> <small><?php echo $row['status'];?></small>
																<address class="m-b-0">
																		<?php echo $row['address'];?><br>
																		<abbr title="Phone">P:</abbr> <?php echo $row['phone'];?>
																</address>
														</div>
												</div>
										</div>
								</div>
						</div>
<?php } }?>

				</div>
		</div>
		
		
 
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

 
</section>

<div class="color-bg"></div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 


<script src="assets/plugins/autosize/autosize.js"></script> <!-- Autosize Plugin Js --> 
<script src="assets/plugins/momentjs/moment.js"></script> <!-- Moment Plugin Js -->
<script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->
<!-- Bootstrap Material Datetime Picker Plugin Js --> 
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->

<script src="assets/js/pages/forms/basic-form-elements.js"></script>
</body>
</html>