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
$page = "patientProfile";
include 'brux/slice/header.php'; 
include 'brux/slice/sidebar.php';
?>
<section class="content">
		<div class="container-fluid">
				<div class="block-header">
						<h2>Patient Profile</h2>
						<small class="text-muted">Welcome to HMS Application</small> </div>
				<div class="row clearfix">
						<div class="col-lg-4 col-md-12 col-sm-12">
								<div class=" card patient-profile"> <img src="assets/images/image-1.jpg" class="img-fluid" alt=""> </div>
								<div class="card">
										<div class="header">
												<h2>About Patient</h2>
										</div>
										<div class="body"> <strong>Name</strong>
												<p><?php echo patient::profile('firstname').' '.patient::profile('lastname');?></p>
												<strong>Occupation</strong><p>UI UX Design</p>
												<strong>Email ID</strong> <p><?php echo patient::profile('email');?></p>
												<strong>Phone</strong> <p><?php echo patient::profile('phone');?></p>
												<strong>Address</strong><address><?php echo patient::profile('address');?></address>
												<hr>
												<strong>Blood info</strong>
												<div class="col-sm-12">
														<button class="btn bg-cyan waves-effect" type="button">Blood Group <span class="badge"><?php echo patient::profile('blood');?></span></button>
														<button class="btn bg-cyan waves-effect" type="button">Genotype <span class="badge"><?php echo patient::profile('genotype');?></span></button>
												</div>
										</div>
								</div>
								<div class="card">
										<div class="header">
												<h2> Current Session Timeline</h2>
												<ul class="header-dropdown">
														<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
																<ul class="dropdown-menu pull-right">
																		<li><a href="javascript:void(0);">Action</a></li>
																		<li><a href="javascript:void(0);">Another action</a></li>
																		<li><a href="javascript:void(0);">Something else here</a></li>
																</ul>
														</li>
												</ul>
										</div>
										<div class="body">
												<div class="row clearfix">
														<div class="col-lg-12">
																<div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
																		<div class="panel panel-col-grey">
																				<div class="panel-heading" role="tab" id="headingOne_17">
																						<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseOne_17" aria-expanded="true" aria-controls="collapseOne_17"> <i class="material-icons">perm_contact_calendar</i> OPD - 12/12/18 - 4.33pm </a> </h4>
																				</div>
																				<div id="collapseOne_17" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_17">
																						<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
																								non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
																								eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
																								single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
																								helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
																								Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
																								raw denim aesthetic synth nesciunt you probably haven't heard of them
																								accusamus labore sustainable VHS. </div>
																				</div>
																		</div>
																		<div class="panel panel-col-blue-grey">
																				<div class="panel-heading" role="tab" id="headingTwo_17">
																						<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17" aria-expanded="false"
													 aria-controls="collapseTwo_17"> <i class="material-icons">cloud_download</i> Doctor - 12/12/18 - 4.43pm </a> </h4>
																				</div>
																				<div id="collapseTwo_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17">
																						<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
																								non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
																								eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
																								single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
																								helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
																								Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
																								raw denim aesthetic synth nesciunt you probably haven't heard of them
																								accusamus labore sustainable VHS. </div>
																				</div>
																		</div>
																		<div class="panel panel-col-orange">
																				<div class="panel-heading" role="tab" id="headingThree_17">
																						<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseThree_17" aria-expanded="false"
													 aria-controls="collapseThree_17"> <i class="material-icons">contact_phone</i> Laboratory - 12/12/18 - 4.54pm </a> </h4>
																				</div>
																				<div id="collapseThree_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_17">
																						<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
																								non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
																								eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
																								single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
																								helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
																								Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
																								raw denim aesthetic synth nesciunt you probably haven't heard of them
																								accusamus labore sustainable VHS. </div>
																				</div>
																		</div>
																		<div class="panel panel-col-blue-grey">
																				<div class="panel-heading" role="tab" id="headingTwo_17x">
																						<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17x" href="#collapseTwo_17x" aria-expanded="false"
													 aria-controls="collapseTwo_17"> <i class="material-icons">cloud_download</i> Doctor - 12/12/18 - 5.23pm </a> </h4>
																				</div>
																				<div id="collapseTwo_17x" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17x">
																						<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
																								non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
																								eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
																								single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
																								helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
																								Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
																								raw denim aesthetic synth nesciunt you probably haven't heard of them
																								accusamus labore sustainable VHS. </div>
																				</div>
																		</div>
																		<div class="panel panel-col-deep-orange">
																				<div class="panel-heading" role="tab" id="headingFour_17">
																						<h4 class="panel-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseFour_17" aria-expanded="false"
													 aria-controls="collapseFour_17"> <i class="material-icons">folder_shared</i> Pharmacy - 12/12/18 - 5.30pm </a> </h4>
																				</div>
																				<div id="collapseFour_17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour_17">
																						<div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
																								non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
																								eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
																								single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
																								helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
																								Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
																								raw denim aesthetic synth nesciunt you probably haven't heard of them
																								accusamus labore sustainable VHS. </div>
																				</div>
																		</div>
																</div>
														</div>
												</div>
										</div>
								</div>
						</div>
						<div class="col-lg-8 col-md-12 col-sm-12">
								<div class="card">
										<div class="body"> 
												<!-- Nav tabs -->
												<ul class="nav nav-tabs" role="tablist">
														<li class="nav-item"><a class="nav-link active"data-toggle="tab"  href="#report">Biographyink</a></li>
														<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#timeline">Timeline</a></li>
												</ul>
												
												<!-- Tab panes -->
												<div class="tab-content">
														<div role="tabpanel" class="tab-pane in active" id="report">
																<div class="wrap-reset">
																		<div class="mypost-list">
																				<div class="post-box">
																						<p>This is a short note created by the OPD department during the patient file opening (add-patient page). </p>
																				</div>
																				<hr>
																				<h4>Health Status</h4>
																				<div class="col-sm-12">
																						<button class="btn bg-green waves-effect" type="button">HIV <span class="badge">Negative (-)</span></button>
																						<button class="btn bg-blue waves-effect" type="button">Hepatitis <span class="badge">Unchecked (?)</span></button>
																						<button class="btn bg-green waves-effect" type="button">Cancer <span class="badge">Negative (-)</span></button>
																				</div>
																				<hr>
																				<div class="post-box">
																						<h4>Current Medical Condition</h4>
																						<div class="body p-l-0 p-r-0">
																								<ul class="list-unstyled">
																										<li>
																												<div>Blood Pressure</div>
																												<span class="badge bg-pink "><?php echo patient::profile('bp');?></span> </li>
																										<br>
																										<li>
																												<div>Temperature</div>
																												<span class="badge bg-pink btn-lg"><?php echo patient::profile('temperature');?> <sup>0</sup>C</span> </li>
																										<br>
																										<li>
																												<div>Weight</div>
																												<span class="badge bg-pink btn-lg"><?php echo patient::profile('weight');?></span> </li>
																										<br>
																										<li>
																												<div>Height</div>
																												<span class="badge bg-pink btn-lg"><?php echo patient::profile('height');?></span> </li>
																										<br>
																								</ul>
																						</div>
																				</div>
																				<hr>
																				<h4>Doctor's Notes</h4>
																				<hr>
																				<form action="" method="post">
																						<div class="row clearfix">
																								<div class="col-sm-12">
																										<div class="form-group">
																												<div class="form-line">
																														<label for="notes">Add Notes</label>
																														<textarea rows="14" class="form-control no-resize" placeholder="Extra Notes" name="notes"></textarea>
																												</div>
																										</div>
																								</div>
																								<div class="col-lg-12 col-md-6 col-sm-12">
																										<div class="form-group drop-custum">
																												<select class="form-control show-tick" name="gender">
																														<option value="">-- Send to --</option>
																														<option value="10">Pharmacy</option>
																														<option value="20">Laboratory</option>
																														<option value="10">OPD</option>
																												</select>
																										</div>
																								</div>
																								<div class="">
																										<button type="submit" class="btn btn-raised g-bg-cyan">Save</button>
																								</div>
																						</div>
																				</form>
																		</div>
																</div>
														</div>
														<div role="tabpanel" class="tab-pane" id="timeline">
																<div class="timeline-body">
																		<div class="timeline m-border">
																				<div class="timeline-item">
																						<div class="item-content">
																								<div class="text-small">Just now</div>
																								<p>Discharge.</p>
																						</div>
																				</div>
																				<div class="timeline-item border-info">
																						<div class="item-content">
																								<div class="text-small">11:30</div>
																								<p>Routine Checkup</p>
																						</div>
																				</div>
																				<div class="timeline-item border-warning border-l">
																						<div class="item-content">
																								<div class="text-small">10:30</div>
																								<p>Operation </p>
																						</div>
																				</div>
																				<div class="timeline-item border-warning">
																						<div class="item-content">
																								<div class="text-small">3 days ago</div>
																								<p>Routine Checkup</p>
																						</div>
																				</div>
																				<div class="timeline-item border-danger">
																						<div class="item-content">
																								<div class="text--muted">Thu, 10 Mar</div>
																								<p>Routine Checkup</p>
																						</div>
																				</div>
																				<div class="timeline-item border-info">
																						<div class="item-content">
																								<div class="text-small">Sat, 5 Mar</div>
																								<p>Routine Checkup</p>
																						</div>
																				</div>
																				<div class="timeline-item border-danger">
																						<div class="item-content">
																								<div class="text-small">Sun, 11 Feb</div>
																								<p>Blood checkup test</p>
																						</div>
																				</div>
																				<div class="timeline-item border-info">
																						<div class="item-content">
																								<div class="text-small">Thu, 17 Jan</div>
																								<p>Admit patient ward no. 21</p>
																						</div>
																				</div>
																		</div>
																</div>
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

<script src="assets/js/pages/forms/basic-form-elements.js"></script> 
<script src="ckeditor/ckeditor.js"></script> 
<script>

 CKEDITOR.replace( 'notes' );
</script>
</body>
</html>