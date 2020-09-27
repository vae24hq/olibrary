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
<link href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">


</head>

<body class="theme-cyan">
<?php
$page = "myAppointments";
include 'brux/slice/header.php'; 
include 'brux/slice/sidebar.php';
?>
<section class="content">
		<div class="container-fluid">
				<div class="block-header">
						<h2>My Appointments</h2>
				</div>
				<div class="row clearfix">
						<div class="col-md-6 col-lg-3 col-sm-12">
								<div class="card">
										<div class="body">
												<h3>50.5 Gb</h3>
												<p class="text-muted">Traffic this month</p>
												<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="68" type="success">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
												</div>
												<span class="text-small">4% higher than last month</span> </div>
								</div>
						</div>
						<div class="col-md-6 col-lg-3 col-sm-12">
								<div class="card">
										<div class="body">
												<h3>26.8%</h3>
												<p class="text-muted">Server Load</p>
												<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="68" type="danger">
														<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
												</div>
												<span class="text-small">4% higher than last month</span> </div>
								</div>
						</div>
						<div class="col-md-6 col-lg-3 col-sm-12">
								<div class="card">
										<div class="body">
												<h3>$ 14,500</h3>
												<p class="text-muted">Total Sale</p>
												<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="68" type="warning">
														<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
												</div>
												<span class="text-small">15% higher than last month</span> </div>
								</div>
						</div>
						<div class="col-md-6 col-lg-3 col-sm-12">
								<div class="card">
										<div class="body">
												<h3>1,600</h3>
												<p class="text-muted">Total Feedbacks</p>
												<div class="progressbar-xs progress-rounded progress-striped progress ng-isolate-scope" value="68" type="info">
														<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
												</div>
												<span class="text-small">10% higher than last month</span> </div>
								</div>
						</div>
				</div>
				<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="card patients_status">
										<div class="header">
												<h2>Waiting Patients</h2>
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
												<div class="table-responsive table_middel">
														 
														<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Vitals</th>
                                    <th>Card No</th>
                                    <th>Date of Birth</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Vitals</th>
                                    <th>Card No</th>
                                    <th>Date of Birth</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>

                            	<?php
								$record = appointment::all();
								$id = 0;
									if(!isArrayMulti($record)){
										$id = $id+1;
										$filta['cardno'] = $record['patient'];
										$info = patient::info($filta);
						?>
																		<tr>
																			 
																			<a href="go/go"><td><img src="assets/images/xs/avatar3.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span><?php echo $info['firstname'].' '.$info['lastname'];?></span></td></a>
																			<td><span class="text-info"><strong>BP:</strong> <?php echo $record['bp'];?>, <strong>Temp:</strong> <?php echo $record['temperature'];?></span></td>
																			<td><?php echo $record['patient'];?></td>
																			<td><?php echo $info['birthdate'];?></td>
																			<td><span class="badge badge-warning">MEDIUM</span></td>
																			<td><span class="badge badge-success">Admit</span></td>
																		</tr>
                            	<?php } else {
						foreach ($record as $row){
										$id = $id+1;
										$filta['cardno'] = $row['patient'];
										$info = patient::info($filta);
							?>
																		<tr>
																			 
																			<td><span><a href="patient-profile?ruid=<?php echo $info['ruid']?>"><?php echo $info['firstname'].' '.$info['lastname'];?></a></span></td>
																			<td><span class="text-info"><strong>BP:</strong> <?php echo $row['bp'];?>, <strong>Temp:</strong> <?php echo $row['temperature'];?></span></td>
																			<td><?php echo $row['patient'];?></td>
																			<td><?php echo $info['birthdate'];?></td>
																			<td><span class="badge badge-warning">MEDIUM</span></td>
																			<td><span class="badge badge-success">Admit</span></td>
																		</tr>
					<?php } }?>
                                
                            </tbody>
                        </table>
												</div>
										</div>
								</div>
						</div>
				</div>
				
				<!-- #END# Example --> 
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
<script src="assets/bundles/datatablescripts.bundle.js"></script><!-- Jquery DataTable Plugin Js -->
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/js/morphing.js"></script><!-- Custom Js -->  


<script src="assets/js/pages/forms/basic-form-elements.js"></script> 
<script src="assets/js/resource.js"></script>
</body>
</html>