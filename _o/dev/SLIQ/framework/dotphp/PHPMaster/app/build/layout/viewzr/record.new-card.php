				<div class="container-fluid">

					<!-- Content Row -->
					<div class="row">

						<div class="col-md-12">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Bio Data</h6>
								</div>
								<div class="card-body">
									<div class="row o-pad-topbottom">
									</div>
									<form name="NewPatient" id="NewPatient" action="" method="POST">
									<?php echo Notify::useDiv($iMedApp['msg'], $iMedApp['code']);?>
										<div class="form-row o-pad-top">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" tabindex="1" value="<?php echo Utility::retainInput('surname');?>" autofocus required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" tabindex="2" value="<?php echo Utility::retainInput('firstname');?>">
												</div>
											</div>
										</div>

										<div class="form-row o-pad-top">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" tabindex="3" value="<?php echo Utility::retainInput('phone');?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												<input type="number" class="form-control" id="hospitalno" name="hospitalno" placeholder="Hospital Number" tabindex="4" value="<?php echo Utility::retainInput('hospitalno');?>">
												</div>
											</div>
										</div>

										<div class="form-row o-pad-top">
											<div class="col-md-6">
												<div class="form-group form-inline">
													<label for="birthdate" class="o-label form-label">Birth Date:</label>
													<input type="date" class="form-control col-md-7" id="birthdate" name="birthdate" placeholder="Birth Date" tabindex="5" value="<?php echo Utility::retainInput('birthdate');?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<select id="sex" name="sex" class="form-control" placeholder="Sex" tabindex="6">
														<option hidden selected disabled>Sex</option>
														<option value="female" <?php if(Utility::isTextSame('female', Utility::retainInput('sex'))){echo ' selected';}?>>Female</option>
														<option value="male" <?php if(Utility::isTextSame('male', Utility::retainInput('sex'))){echo ' selected';}?>>Male</option>
													</select>
												</div>
											</div>
										</div>

										<div class="form-row o-pad-top">
											<div class="col-md-12">
												<div class="form-group">
													<label for="address">Address:</label>
													<textarea class="form-control" id="address" name="address" rows="3" placeholder="Address" tabindex="7"><?php echo Utility::retainInput('address');?></textarea>
												</div>
											</div>
										</div>

										<div class="form-row o-pad-top">
											<div class="col-md-4">
												<div class="form-group">
													<input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" tabindex="8" value="<?php echo Utility::retainInput('occupation');?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<input type="text" class="form-control" id="tribe" name="tribe" placeholder="Tribe" tabindex="9" value="<?php echo Utility::retainInput('tribe');?>">
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" tabindex="10" value="<?php echo Utility::retainInput('religion');?>">
												</div>
											</div>
										</div>

										<div class="form-row o-pad-top">
											<div class="col-md-6">
												<div class="form-group">
													<select id="hmo" name="hmo" class="form-control" placeholder="HMO" tabindex="11">
														<option hidden selected disabled>Select HMO</option>
														<option value="nohmo" <?php if(Utility::isTextSame('nohmo', Utility::retainInput('hmo'))){echo ' selected';}?>>Not Applicable</option>

													<?php
														$optionHMO = record::allHMO();
														if($optionHMO != 'NO_RECORD'){
															if(Utility::isArrayMulti($optionHMO)){
																foreach ($optionHMO as $key => $value){
																	$optionHMO = $value;
																?>
														<option value="<?php echo $optionHMO['puid'];?>" <?php if(Utility::isTextSame($optionHMO['puid'], Utility::retainInput('hmo'))){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
													<?php }
															} else {?>
														<option value="<?php echo $optionHMO['puid'];?>" <?php if(Utility::isTextSame($optionHMO['puid'], Utility::retainInput('hmo'))){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
												<?php }
														}?>
													</select>
												</div>
											</div>

										</div>



										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group o-bottom-button">
													<button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="12">Create Record</button>
												</div>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>