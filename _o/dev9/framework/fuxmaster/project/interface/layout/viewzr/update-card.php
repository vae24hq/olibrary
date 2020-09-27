<?php
if($oRecord['data'] == 'NO_RECORD'){?>
<?php } elseif(!empty($oRecord['data'])){
	$rowset = $oRecord['data'];
?>
<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
			<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">Update Card</h6>
			</div>
			<div class="card-body">
				<div class="col-lg-12">
					<?php if(!empty($_GET['act'])){
						$msg = isErrorMsg('E200A1');
						echo Notify::useDiv($msg, 'E200A1');
					}?>
				</div>
<?php
	if(!empty($oRecord['data']) && empty($_GET['act'])){?>

										<form name="oForm" id="oForm" action="update-card?card=<?php echo $rowset['puid'];?>" method="POST">
												<div class="form-row">
											<div class="col-md-6 offset-md-6">
												<div class="form-group">
													<label for="cardno" class="odao-label">Hospital No:</label>
													<input type="text" class="form-control" id="cardno" name="cardno" placeholder="Hospital No" value="<?php if(!empty($rowset['cardno'])){echo $rowset['cardno'];} else {echo Form::retainInput('cardno');}?>" tabindex="1" disabled>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="surname" class="odao-label">Surname:</label>
													<input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="<?php if(!empty($rowset['surname'])){echo $rowset['surname'];} else {echo Form::retainInput('surname');}?>" tabindex="2" required>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstname" class="odao-label">First Name:</label>
													<input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="<?php if(!empty($rowset['firstname'])){echo $rowset['firstname'];} else {echo Form::retainInput('firstname');}?>" tabindex="3" required>
												</div>
											</div>

										</div>


										<div class="form-row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="occupation" class="odao-label">Occupation:</label>
													<input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" value="<?php if(!empty($rowset['occupation'])){echo $rowset['occupation'];} else {echo Form::retainInput('occupation');}?>" tabindex="4">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												<label for="phone" class="odao-label">Phone Number:</label>
													<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="<?php if(!empty($rowset['phone'])){echo $rowset['phone'];} else {echo Form::retainInput('phone');}?>" tabindex="5" required>
												</div>
											</div>

										</div>

										<div class="form-row">

											<div class="col-md-6">
												<div class="form-group">
												<label for="tribe" class="odao-label">Tribe:</label>
													<input type="text" class="form-control" id="tribe" name="tribe" placeholder="Tribe" value="<?php if(!empty($rowset['tribe'])){echo $rowset['tribe'];} else {echo Form::retainInput('tribe');}?>" tabindex="6">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="religion" class="odao-label">Religion:</label>
													<input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" value="<?php if(!empty($rowset['religion'])){echo $rowset['religion'];} else {echo Form::retainInput('religion');}?>" tabindex="7">
												</div>
											</div>
										</div>


										<div class="form-row">

											<div class="col-md-4">
												<div class="form-group">
													<label for="birthday" class="odao-label">Date of Birth:</label>
													<input type="date" class="form-control" id="dob" name="dob" value="<?php if(!empty($rowset['dob'])){echo $rowset['dob'];} else {echo Form::retainInput('dob');}?>" tabindex="8" required>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label for="sex" class="odao-label">Sex</label>
													<select id="sex" name="sex" class="form-control" tabindex="9">
														<option hidden selected disabled>Sex</option>
														<?php if(empty($rowset['sex'])){?>
														<option value="female" <?php if(Text::isSame('female', Form::retainInput('sex'))){echo ' selected';}?>>Female</option>
														<option value="male" <?php if(Text::isSame('male', Form::retainInput('sex'))){echo ' selected';}?>>Male</option>
														<?php } else {?>
														<option value="female" <?php if(Text::isSame('female', $rowset['sex'])){echo ' selected';}?>>Female</option>
														<option value="male" <?php if(Text::isSame('male', $rowset['sex'])){echo ' selected';}?>>Male</option>
														<?php } ?>
													</select>
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label for="hmo" class="odao-label">HMO</label>
													<select id="hmo" name="hmo" class="form-control" placeholder="HMO" tabindex="10">
														<option hidden selected disabled>Select HMO</option>
														<?php if(empty($rowset['hmo'])){?>
														<option value="nohmo" <?php if(Text::isSame('nohmo', Form::retainInput('hmo'))){echo ' selected';}?>>Not Applicable</option>
															<?php
																$optionHMO = HMO::all();
																if($optionHMO != 'NO_RECORD'){
																	if(Helper::isArrayMulti($optionHMO)){
																		foreach ($optionHMO as $key => $value){
																			$optionHMO = $value; ?>
															<option value="<?php echo $optionHMO['puid'];?>" <?php if(Text::isSame($optionHMO['puid'], Form::retainInput('hmo'))){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
															<?php	} // close for each
																	} // close multi-dimensional array
															else {?>
																<option value="<?php echo $optionHMO['puid'];?>" <?php if(Text::isSame($optionHMO['puid'], Form::retainInput('hmo'))){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>

													<?php	} // close NOT multi-dimensional array
															 } // close No HMO records
															?>

														<?php }

														// Patient has HMO selected

													else {?>
													<option value="nohmo" <?php if(Text::isSame('nohmo', $rowset['hmo'])){echo ' selected';}?>>Not Applicable</option>
															<?php
																$optionHMO = HMO::all();
																if($optionHMO != 'NO_RECORD'){
																	if(Helper::isArrayMulti($optionHMO)){
																		foreach ($optionHMO as $key => $value){
																			$optionHMO = $value; ?>
															<option value="<?php echo $optionHMO['puid'];?>" <?php if(Text::isSame($optionHMO['puid'], $rowset['hmo'])){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
															<?php	} // close for each
																	} // close multi-dimensional array
															else {?>
																<option value="<?php echo $optionHMO['puid'];?>" <?php if(Text::isSame($optionHMO['puid'], $rowset['hmo'])){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>

													<?php	} // close NOT multi-dimensional array
															 } // close No HMO records
														}	?>

													</select>
												</div>
											</div>
										</div>


										<div class="form-row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="address" class="odao-label">Address:</label>
													<textarea class="form-control" id="address" name="address" tabindex="11" placeholder="Address"><?php if(!empty($rowset['address'])){echo $rowset['address'];} else {echo Form::retainInput('address');}?></textarea>
												</div>
											</div>

										</div>



										<div class="form-row">
											<div class="col-md-10">
												<div class="form-group odao-bottom-button">
													<button type="submit" name="submitBTN" class="btn btn-primary o-bottom-button" tabindex="12">Save</button>
													<button type="reset" name="submitBTN" class="btn btn-default o-bottom-button" tabindex="13">Reset</button>
												</div>
											</div>
											<div class="offset-col-md-2">
												<div class="form-group odao-bottom-button">
													<button type="submit" name="submitBTN" class="btn btn-danger o-bottom-button" data-dismiss="modal" tabindex="12">Close</button>

											</div>
										</div>


							</form>
<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php }?>
