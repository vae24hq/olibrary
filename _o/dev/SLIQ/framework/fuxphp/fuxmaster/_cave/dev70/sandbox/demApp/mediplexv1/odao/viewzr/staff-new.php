				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-2 text-gray-800">New Staff</h1>


					<!-- Content Row -->
					<div class="row">

						<div class="col-md-12">

							<!-- Area Chart -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Create Staff Record</h6>
								</div>
								<div class="card-body">

									<form name="NewStaff" id="NewStaff" action="staff-new" method="post">
										<div class="form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="username" class="odao-label">Username:</label>
													<input type="text" class="form-control" id="username" name="username" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="password" class="odao-label">Password:</label>
													<input type="password" class="form-control" id="password" name="password">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="employeeno" class="odao-label">Employee ID:</label>
													<input type="text" class="form-control" id="employeeno" name="employeeno">
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="surname" class="odao-label">Surname:</label>
													<input type="text" class="form-control" id="surname" name="surname" required>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="firstname" class="odao-label">First Name:</label>
													<input type="text" class="form-control" id="firstname" name="firstname">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="othername" class="odao-label">Other Name:</label>
													<input type="text" class="form-control" id="othername" name="othername">
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-4">
												<div class="form-group">
													<label for="phone" class="odao-label">Phone Number:</label>
													<input type="text" class="form-control" id="phone" name="phone">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="email" class="odao-label">Email Address:</label>
													<input type="text" class="form-control" id="email" name="email">
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label for="nationality" class="odao-label">Nationality:</label>
													<input type="text" class="form-control" id="nationality" name="nationality">
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-3">
												<div class="form-group">
													<label for="type" class="odao-label">Type:</label>
													<select id="type" class="form-control" name="type">
														<option selected value="none">None</option>
														<option value="adhoc">AdHoc</option>
														<!-- <option value="parttime">Part-time</option>
														<option value="fulltime">Full-time</option> -->
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="station" class="odao-label">Station:</label>
													<select id="station" class="form-control" name="station">
														<option selected value="none">None</option>
														<option value="cmd">CMD</option>
														<option value="doctor">Doctor</option>
														<option value="nurse">Nurse</option>
													</select>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="birthday" class="odao-label">Date of Birth:</label>
													<input type="date" class="form-control" id="birthday" name="birthday">
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group">
													<span for="sex" class="odao-label">Gender:</span>
													<div class="radio odao-radio-div">
														<label><input type="radio" name="sex" id="sex" value="female" required><span class="odao-radio-label">Female</span></label>
														<label style="margin-left:40px;"><input type="radio" name="sex" id="sex" value="male"><span class="odao-radio-label">Male</span></label>
													</div>
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-5">
												<div class="form-group">
													<label for="address" class="odao-label">Address:</label>
													<input type="text" class="form-control" id="address" name="address">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="city" class="odao-label">City:</label>
													<input type="text" class="form-control" id="city" name="city">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="state" class="odao-label">State:</label>
													<input type="text" class="form-control" id="state" name="state">
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-5">
												<div class="form-group">
													<label for="nok" class="odao-label">Next of KIN <small>(NOK)</small>:</label>
													<input type="text" class="form-control" id="nok" name="nok">
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<label for="nokrelationship" class="odao-label">Relationship <small>(with NOK)</small>:</label>
													<input type="text" class="form-control" id="nokrelationship" name="nokrelationship">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<label for="nokphone" class="odao-label">Phone Number: <small>(for NOK)</small></label>
													<input type="text" class="form-control" id="nokphone" name="nokphone">
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group odao-bottom-button">
													<button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="3">Create Record</button>
													<button type="reset" id="clearBTN" name="clearBTN" class="btn btn-danger odao-button" tabindex="3">Clear Entry</button>
												</div>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>