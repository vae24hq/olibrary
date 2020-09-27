				<style> 
				
				.dl-horizontal dt {

					float: left;
					width: 11.25em;
					overflow: hidden;
					clear: left;
					text-align: right;
					text-overflow: ellipsis;
					white-space: nowrap;

				}
				.dl-horizontal dd {

					margin-left: 12.38em;

				}
				</style>
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">Patient</h1>


					<!-- Content Row -->
					<div class="row">

						<div class="col-md-12">

							<!-- Area Chart -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Patient Record</h6>
								</div>
								<div class="card-body">

									<form name="NewPatient" id="NewPatient" action="patient-edit?patient=<?php echo $_GET['patient'];?>" method="post">
										<div class="row">
											<div class="col-sm-12" align="center">
												<br>
											</div>
										
											<div class="col-sm-4" align="center">
												<img alt="Picture" src="http://thispix.com/wp-content/uploads/2015/06/passport-005.jpg" width="150" height="150">
												<h5 style="margin-top: 0.3em;"><?php echo strtoupper($patientInfo['surname']).", ".$patientInfo['firstname']." ".$patientInfo['othername'];?></h5>
												<dt>Hospital No:</dt>
												<dd><?php echo $patientInfo['hospitalno'];?></dd>
												
											</div>
										
											<div class="col-sm-8">
												<dl class="dl-horizontal">
													<dt>Hospital No:</dt>
													<dd><?php echo $patientInfo['hospitalno'];?></dd>
													<dt>Name:</dt>
													<dd><?php echo strtoupper($patientInfo['surname']).", ".$patientInfo['firstname']." ".$patientInfo['othername'];?></dd>
													<dt>Occupation:</dt>
													<dd><?php echo $patientInfo['occupation'];?></dd>
													<dt>Phone number:</dt>
													<dd><?php echo $patientInfo['phone'];?></dd>
													<dt>Email Address:</dt>
													<dd><?php echo $patientInfo['email'];?></dd>
													<dt>Nationality:</dt>
													<dd><?php echo $patientInfo['nationality'];?></dd>
													<dt>Tribe:</dt>
													<dd><?php echo $patientInfo['tribe'];?></dd>
													<dt>Religion:</dt>
													<dd><?php echo $patientInfo['religion'];?></dd>
													<dt>HMO:</dt>
													<dd><?php echo $patientInfo['hmo'];?></dd>
													<dt>Date Of Birth:</dt>
													<dd><?php echo $patientInfo['birthday'];?></dd>
													<dt>Gender:</dt>
													<dd><?php echo $patientInfo['sex'];?></dd>
													<dt>Address:</dt>
													<dd><?php echo $patientInfo['address'].", ".$patientInfo['city'].", ".$patientInfo['state'];?></dd>
													<dt>Next Of Kin:</dt>
													<dd><?php echo $patientInfo['nok'];?></dd>
													<dt>Relationship <small>(with NOK)</small>:</dt>
													<dd><?php echo $patientInfo['nokrelationship'];?></dd>
													<dt>Phone Number <small>(for NOK)</small>:</dt>
													<dd><?php echo $patientInfo['nokphone'];?></dd>
													
										
												</dl>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6"></div>
											<div class="col-md-3">
												<div class="form-group odao-bottom-button">
													<button type="submit" id="printBTN" name="printBTN" class="btn btn-success odao-button" tabindex="1">Print</button>
												</div>
											</div>
										</div>
										
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>