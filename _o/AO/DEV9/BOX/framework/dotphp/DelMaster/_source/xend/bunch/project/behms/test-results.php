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
$page = "labPatients";
include 'brux/slice/header.php'; 
include 'brux/slice/sidebar.php';
?>
<section class="content">
		<div class="container-fluid">
				<div class="block-header">
						<h2>Add Test Result for PATIENT NAME</h2>
						<small class="text-muted">Welcome to HMS Application</small> </div>
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="card">
										<div class="header">
												<h2>Patient Case Notes <small></small> </h2>
												<ul class="header-dropdown m-r--5">
														<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
																<ul class="dropdown-menu pull-right">
																		<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
																		<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
																		<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
																</ul>
														</li>
												</ul>
										</div>
										<div class="body">
												<div class="row clearfix">
														<p>This is the text entered by the doctor. This is the text entered by the doctor.This is the text entered by the doctor.This is the text entered by the doctor.This is the text entered by the doctor.This is the text entered by the doctor.This is the text entered by the doctor.This is the text entered by the doctor.This is the text entered by the doctor.</p>
												</div>
												<div class="row clearfix">
														<div class="col-sm-12">
																<div class="form-group">
																		<div class="form-line">
																				<label for="notes">Enter Test Results</label>
																				<textarea rows="14" class="form-control no-resize" placeholder="Extra Notes" name="notes"></textarea>
																		</div>
																</div>
														</div>
														<div class="">
																<button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
																<button type="submit" class="btn btn-raised">Cancel</button>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="row clearfix">
						<div class="col-md-12">
								<div class="card">
										<div class="header">
												<h2>Registration Information <small>Description text here...</small> </h2>
										</div>
										<div class="body">
												<div class="row clearfix">
														<div class="col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="Doctor Name">
																		</div>
																</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="Staff on Duty">
																		</div>
																</div>
														</div>
												</div>
												<div class="row clearfix">
														<div class="col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="Ward No.">
																		</div>
																</div>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-12">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="datetimepicker form-control" placeholder="Please choose date & time...">
																		</div>
																</div>
														</div>
														<div class="col-sm-12">
																<button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
																<button type="submit" class="btn btn-raised">Cancel</button>
														</div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
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
<script src="ckeditor/ckeditor.js"></script> 
<script src="assets/js/pages/forms/basic-form-elements.js"></script> 
<script>

 CKEDITOR.replace( 'notes' );
</script>
</body>
</html>