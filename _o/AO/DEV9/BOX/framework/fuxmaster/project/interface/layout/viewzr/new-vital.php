<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
			<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">New Vitals</h6>
			</div>
			<div class="card-body">

						<form  name="new-vital" id="new-vital" action="new-vital" method="post">
            						<div class="form-row">
													<div class="col-md-6 offset-md-6">
														<div class="form-group">
															<label for="hospitalno" class="odao-label">Hospital No:</label>
															<input type="text" class="form-control" id="hospitalno" name="hospitalno" placeholder="hospitalno" value="">
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="surname" class="odao-label">Surname:</label>
															<input type="text" class="form-control" id="surname" name="surname" tabindex="1" placeholder="Surname" value="" required value="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="firstname" class="odao-label">First Name:</label>
															<input type="text" class="form-control" id="firstname" name="firstname" tabindex="2" placeholder="First name" value="" required value="">
														</div>
													</div>

												</div>
												<div class="form-row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="height" class="odao-label">Height(cm):</label>
															<input type="text" class="form-control" id="height" name="height" tabindex="3" placeholder="Height" value="" required value="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="weight" class="odao-label">Weight (kg):</label>
															<input type="text" class="form-control" id="weight" name="weight" tabindex="4" placeholder="Weight" value="" required value="">
														</div>
													</div>

												</div>

												<div class="form-row">

													<div class="col-md-6">
														<div class="form-group">
															<label for="pulse" class="odao-label">Pulse:</label>
															<input type="text" class="form-control" id="pulse" name="pulse" tabindex="4" placeholder="Pulse" value="" required value="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="temperature" class="odao-label">Temperature (C):</label>
															<input type="text" class="form-control" id="temperature" name="temperature" tabindex="6" placeholder="Temperature" value="" required value="">
														</div>
													</div>
												</div>

												<div class="form-row">

													<div class="col-md-6">
														<div class="form-group">
															<label for="resprate" class="odao-label">Respiratory Rate:</label>
															<input type="text" class="form-control" id="resprate" name="resprate" tabindex="7" placeholder="Respiratory Rate" value="" required value="">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="bp" class="odao-label">Blood Pressure:</label>
															<input type="text" class="form-control" id="bp" name="bp" tabindex="8" placeholder="Blood Pressure" value="" required value="">
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="info" class="odao-label">Other Info:</label>
															<textarea class="form-control" id="info" name="info" tabindex="9" placeholder="Description" value="" required value=""></textarea>
														</div>
													</div>

												</div>

											  <div class="form-row">
																		<div class="col-md-10">
																			<div class="form-group odao-bottom-button">
																				<button type="submit" name="submitBTN" class="btn btn-primary o-bottom-button" tabindex="6">Save</button>
																				<button type="reset" name="submitBTN" class="btn btn-default o-bottom-button" tabindex="7">Reset</button>
																			</div>
																		</div>
																		<div class="offset-col-md-2">
																			<div class="form-group odao-bottom-button">
																				<button type="submit" name="submitBTN" class="btn btn-danger o-bottom-button" data-dismiss="modal" tabindex="8">Close</button>

																		</div>
												</div>

				    </form>
			</div>
		</div>
	</div>
</div>


