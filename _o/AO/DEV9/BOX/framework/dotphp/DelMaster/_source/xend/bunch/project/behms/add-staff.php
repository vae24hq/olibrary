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
$page = "addStaff";
include 'brux/slice/header.php'; 
include 'brux/slice/sidebar.php';
?>

<section class="content">
		<div class="container-fluid">
				<div class="block-header">
						<h2>Add Staff</h2>
						<small class="text-muted">Welcome to HMS Application</small>
				</div>
				<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="header">
						<h2>Basic Information <small>Staff Basic Information...</small> </h2>
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
				<form name="addStaff" id="addStaff" action="go/add-staff" method="post">
					<div class="body">
												<div class="row clearfix">
														<div class="col-sm-6">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="First Name" name="firstname">
																		</div>
																</div>
														</div>
														<div class="col-sm-6">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="Last Name" name="lastname">
																		</div>
																</div>
														</div>
												</div>
												<div class="row clearfix">
														<div class="col-sm-6">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="Phone" name="phone">
																		</div>
																</div>
														</div>
														
														<div class="col-sm-6">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="Email" name="email">
																		</div>
																</div>
														</div>
														 
														<div class="col-sm-12">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="Enter Staff Address" name="address">
																		</div>
																</div>
														</div>
														<div class="col-sm-6">
																<div class="form-group drop-custum">
																		<select class="form-control show-tick" name="sex">
																				<option value="">-- Gender --</option>
																				<option value="Male">Male</option>
																				<option value="Female">Female</option>
																		</select>
																</div>
														</div>
														<div class="col-sm-6">
																<div class="form-group drop-custum">
																		<select class="form-control show-tick" name="odepartment">
																				<option value="">-- Department --</option>
																				<option value="OPD">OPD</option>
																				<option value="LAB">LAB</option>
																				<option value="PHARMACY">PHARMACY</option>
																				<option value="DOCTOR">DOCTOR</option>
																				<option value="ACCOUNT">ACCOUNT</option>
																		</select>
																</div>
														</div>
														<div class="col-sm-6">
																<div class="form-group">
																		<div class="form-line">
																				<input type="text" class="form-control" placeholder="username" name="username">
																		</div>
																</div>
														</div>
														
														<div class="col-sm-6">
																<div class="form-group">
																		<div class="form-line">
																				<input type="password" class="form-control" placeholder="password" name="password">
																		</div>
																</div>
														</div>
														<div class="col-sm-12">
																<button type="submit" class="btn btn-raised g-bg-cyan">Submit</button>
																<button type="submit" class="btn btn-raised">Cancel</button>
														</div>
												</div>
										</div>
										
										</form>
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

<script src="assets/js/pages/forms/basic-form-elements.js"></script>
 <script src="assets/js/resource.js"></script>
</body>
</html>