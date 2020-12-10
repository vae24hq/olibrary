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
												<h5> John Doe</h5>
											</div>
										
											<div class="col-sm-8">
												<dl class="dl-horizontal">
													<dt>Email Address</dt>
													<dd><a href="">user@gmail.com</a></dd>
													<dt>Address</dt>
													<dd>98 BIU Road, Benin</dd>
													<dt>Mobile No</dt>
													<dd>08063333333</dd>
													<dt>Sex</dt>
													<dd>Male</dd>
													<dt>Birth Date</dt>
													<dd>2017-12-18</dd>
													<dt>Tribe</dt>
													<dd>Igbo</dd>
													<dt>Religion</dt>
													<dd>Christian</dd>
													<dt>OPD No</dt>
													<dd>0001</dd>
										
												</dl>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-4 offset-md-8">
												<div class="form-group">
													<label class="odao-label">Hospital No:</label> <?php echo $patientInfo['hospitalno'];?>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label class="odao-label">Surname:</label> <?php echo $patientInfo['surname'];?>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="firstname" class="odao-label">First Name:</label> <?php echo $patientInfo['firstname'];?>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="othername" class="odao-label">Other Name:</label>
													<input type="text" class="form-control" id="othername" name="othername" value="<?php echo $patientInfo['othername'];?>">
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="occupation" class="odao-label">Occupation:</label>
													<input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $patientInfo['occupation'];?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="phone" class="odao-label">Phone Number:</label>
													<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $patientInfo['phone'];?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="email" class="odao-label">Email Address:</label>
													<input type="text" class="form-control" id="email" name="email" value="<?php echo $patientInfo['email'];?>">
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="nationality" class="odao-label">Nationality:</label>
													<input type="text" class="form-control" id="nationality" name="nationality" value="<?php echo $patientInfo['nationality'];?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="tribe" class="odao-label">Tribe:</label>
													<input type="text" class="form-control" id="tribe" name="tribe" value="<?php echo $patientInfo['tribe'];?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="religion" class="odao-label">Religion:</label>
													<input type="text" class="form-control" id="religion" name="religion" value="<?php echo $patientInfo['religion'];?>">
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="hmo" class="odao-label">HMO</label>
													<select id="hmo" name="hmo" class="form-control">
														<option <?php if($patientInfo['hmo']=="none"){echo "selected";}?> value="none">None</option>
														<option <?php if($patientInfo['hmo']=="mediplan"){echo "selected";}?> value="mediplan">Mediplan Healthcare Limited</option>
														<option <?php if($patientInfo['hmo']=="hygeia"){echo "selected";}?> value="hygeia">Hygeia HMO Limited</option>
														<option <?php if($patientInfo['hmo']=="princeton"){echo "selected";}?> value="princeton">Princeton Health Limited</option>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="birthday" class="odao-label">Date of Birth:</label>
													<input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $patientInfo['birthday'];?>">
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<span for="sex" class="odao-label">Gender:</span>
													<div class="radio odao-radio-div">
														<label><input type="radio" name="sex" id="sex" value="female" required <?php if($patientInfo['sex']=="female"){echo "checked";}?>><span class="odao-radio-label">Female</span></label>
														<label style="margin-left:40px;"><input type="radio" name="sex" id="sex" value="male" <?php if($patientInfo['sex']=="male"){echo "checked";}?>><span class="odao-radio-label">Male</span></label>
													</div>
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-5">
												<div class="form-group">
													<label for="address" class="odao-label">Address:</label>
													<input type="text" class="form-control" id="address" name="address" value="<?php echo $patientInfo['address'];?>">
												</div>
											</div>
										<div class="col-md-3">
												<div class="form-group">
													<label for="city" class="odao-label">City:</label>
													<input type="text" class="form-control" id="city" name="city" value="<?php echo $patientInfo['city'];?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="state" class="odao-label">State:</label>
													<input type="text" class="form-control" id="state" name="state" value="<?php echo $patientInfo['state'];?>">
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-5">
												<div class="form-group">
													<label for="nok" class="odao-label">Next of KIN <small>(NOK)</small>:</label>
													<input type="text" class="form-control" id="nok" name="nok" value="<?php echo $patientInfo['nok'];?>">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="nokrelationship" class="odao-label">Relationship <small>(with NOK)</small>:</label>
													<input type="text" class="form-control" id="nokrelationship" name="nokrelationship" value="<?php echo $patientInfo['nokrelationship'];?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="nokphone" class="odao-label">Phone Number: <small>(for NOK)</small></label>
													<input type="text" class="form-control" id="nokphone" name="nokphone" value="<?php echo $patientInfo['nokphone'];?>">
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group odao-bottom-button">
													<button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="3">Save Record</button>
													<button type="reset" id="clearBTN" name="clearBTN" class="btn btn-danger odao-button" tabindex="3">Cancel</button>
												</div>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>