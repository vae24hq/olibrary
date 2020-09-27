<?php
require 'konfig.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>::<?php echo konfig('hospitalName'); ?>::</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" type="text/css">
    <!-- Dropzone Css -->
    <link href="assets/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" />
    <!-- Wait Me Css -->
    <link rel="stylesheet" href="assets/plugins/waitme/waitMe.css" />
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />

    <link rel="stylesheet" href="assets/css/main.css" />
    <!-- Custom Css -->



</head>

<body class="theme-cyan">
    <?php
		$page = "bookAppointment";
		include 'brux/slice/header.php';
		include 'brux/slice/sidebar.php';
		?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Book Appointment</h2>
                <small class="text-muted">Welcome to HMS Application</small>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>Basic Information <small>Description text here...</small> </h2>
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
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" id="patientCardNo" class="form-control no-resize" placeholder="Enter Patient Card Number"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-raised g-bg-cyan" id="getPatientDetails">Get Patient Details</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" clearfix" id="patientDetails2">
                             
                            </div>

            <?php 
						if (isset($_REQUEST['patient'])) {
							$patientData['cardno'] = $_REQUEST['patient'];
							$record = patient::info($patientData);

							//dbug(db::insertRUID('user'));

							?>
                           
            <div class=" clearfix" id="patientDetails">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card">
                        <div class="header">
                            <h2>Patient Details</h2>

                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-md-4 col-sm-4">
                                    <h4><img src="assets/images/logo-placeholder.jpg" width="70" alt="velonic"></h4>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h4><?php echo $record['cardno']   ?> <br>
                                        <strong><?php echo ucfirst($record['firstname']) . ' ' . ucfirst($record['lastname']); ?></strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="mainTable" class="table table-striped" style="cursor: pointer;">
                                            <thead>
                                                <tr>
                                                    <th>Age</th>
                                                    <th>Gender</th>
                                                    <th>Address</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Last Visit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $record['birthdate']   ?></td>
                                                    <td><?php echo $record['sex']   ?></td>
                                                    <td><?php echo $record['address']   ?></td>
                                                    <td><?php echo $record['phone']   ?></td>
                                                    <td><?php echo $record['email']   ?></td>
                                                    <td>Jan 16, 2018</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>







            <?php 
					} ?>
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Health Information <small>Enter Vital Signs...</small> </h2>
                        </div>
                        <div class="body">
                            <form action="go/book-appointment" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Temperature" name="temperature">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Blood Pressure" name="bp">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Weight" name="weight">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Height" name="height">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group drop-custum">
                                            <select class="form-control show-tick" name="odepartment">
                                                <option value="">-- Select Department --</option>
                                                <option value="doctor">Doctor</option>
                                                <option value="laboratory">Laboratory</option>
                                                <option value="pharmacy">Pharmacy</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="hidden" name="patient" id="pCardNo" value="<?php if (isset($_GET['patient'])) {
																																											echo $_GET['patient'];
																																										} ?>">
                                        <button type="submit" class="btn btn-raised g-bg-cyan">Book Appointment</button>
                                        <button type="reset" class="btn btn-raised">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.js"></script>
    	<script type="text/javascript">
        $(document).ready(function(){
 
            $("#getPatientDetails").click(function(e) {

                 
                var patientCardNo = $("#patientCardNo").val();
 
                $('#patientDetails2').load('fetchdata.php?patientCardNo='+patientCardNo);
                $("#pCardNo").val(patientCardNo);


                 
                 	
 
 
   
                
});	
         
        });
		</script>
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