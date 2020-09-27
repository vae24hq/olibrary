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
			<h2>Pending Tests</h2>
			
		</div>
		<div class="row clearfix">
			<div class="col-md-6 col-lg-3 col-sm-12">
				<div class="card">
					<div class="body">
						<h3>50</h3>
						<p class="text-muted">Tests done this year</p>
						
						 </div>
				</div>
			</div>
		   <div class="col-md-6 col-lg-3 col-sm-12">
				<div class="card">
					<div class="body">
						<h3>30</h3>
						<p class="text-muted">Tests done this month</p>
						
						 </div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 col-sm-12">
				<div class="card">
					<div class="body">
						<h3>10</h3>
						<p class="text-muted">Tests done this week</p>
						 </div>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 col-sm-12">
				<div class="card">
					<div class="body">
						<h3>5</h3>
						<p class="text-muted">Tests Done Today</p>
						</div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="card patients_status">
					<div class="header">
						<h2>Patients</h2>
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
							<table class="table mb-0">
								<thead class="thead-dark">
									<tr>
										<th>#</th>
										<th>Patients</th>
										<th>Vitals</th>
										<th>Card Num </th>
										<th>Last Visit</th>
										<th>Priority</th>
										<th>Status</th> 
									</tr>
								</thead>
								<tbody>
						<?php
								$record = appointment::listTest();
								$id = 0;
									if(!isArrayMulti($record)){
										$id = $id+1;
										$filta['ruid'] = $record['patient'];
										$info = patient::info($filta);
						?>
																		<tr>
																			<td><?php echo $id;?></td>
																			<td><img src="assets/images/xs/avatar3.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span><?php echo $info['firstname'].' '.$info['lastname'];?></span></td>
																			<td><span class="text-info"><strong>BP:</strong> <?php echo $record['bp'];?>, <strong>Temp:</strong> <?php echo $record['temperature'];?></span></td>
																			<td><?php echo $info['cardno'];?></td>
																			<td><?php echo $record['modified'];?></td>
																			<td><span class="badge badge-warning">MEDIUM</span></td>
																			<td><span class="badge badge-success">Admit</span></td>
																		</tr>
					<?php } else {
						foreach ($record as $row){
										$id = $id+1;
										$filta['ruid'] = $row['patient'];
										$info = patient::info($filta);
							?>
																		<tr>
																			<td><?php echo $id;?></td>
																			<td><img src="assets/images/xs/avatar3.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span><?php echo $info['firstname'].' '.$info['lastname'];?></span></td>
																			<td><span class="text-info"><strong>BP:</strong> <?php echo $row['bp'];?>, <strong>Temp:</strong> <?php echo $row['temperature'];?></span></td>
																			<td><?php echo $info['cardno'];?></td>
																			<td><?php echo $row['modified'];?></td>
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

<script src="assets/js/pages/forms/basic-form-elements.js"></script>
 <script src="assets/js/resource.js"></script>
</body>
</html>