  <!-- Logout Modal-->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="row">
							<div class="col-lg-12">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"></h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
										<div class="col-12">

											<form name="NewPatient" id="NewPatient" action="" method="post">
												<div class="form-row">
													<div class="col-md-6 offset-md-6">
														<div class="form-group">
															<label for="hospitalno" class="odao-label">Hospital No:</label>
															<input type="text" class="form-control" id="hospitalno" name="hospitalno" placeholder="surname" value="">
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="surname" class="odao-label">Surname:</label>
															<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="" required value="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="firstname" class="odao-label">First Name:</label>
															<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="" required value="">
														</div>
													</div>

												</div>


												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="occupation" class="odao-label">Occupation:</label>
															<input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" value="" required value="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="phone" class="odao-label">Phone Number:</label>
															<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="" required value="">
														</div>
													</div>

												</div>

												<div class="form-row">

													<div class="col-md-6">
														<div class="form-group">
															<label for="tribe" class="odao-label">Tribe:</label>
															<input type="text" class="form-control" id="tribe" name="tribe" placeholder="Tribe" value="" required value="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="religion" class="odao-label">Religion:</label>
															<input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" value="" required value="">
														</div>
													</div>
												</div>


												<div class="form-row">

													<div class="col-md-6">
														<div class="form-group">
															<label for="birthday" class="odao-label">Date of Birth:</label>
															<input type="date" class="form-control" id="birthday" name="birthday" value="" required value="">
														</div>
													</div>

													<div class="col-md-6">
														<div class="form-group">
															<label for="hmo" class="odao-label">Sex</label>
															<select id="hmo" name="Sex" class="form-control">
																<option  value="male">Male</option>
																<option value="female">Female</option>

															</select>
														</div>
													</div>
												</div>


												<div class="form-row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="address" class="odao-label">Address:</label>
															<textarea class="form-control" id="address" name="address" placeholder="Address" value="" required value=""></textarea>
														</div>
													</div>

												</div>

													</form>
										</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a class="btn btn-primary" href="#" id="submitBTN" name="submitBTN">Submit</a>
						</div>
					<!--</form>-->
					</div>
				</div>
</div>
