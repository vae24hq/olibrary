
<div class="container-fluid">
	<div class="row">

						<form  name="edit-card" id="edit-card" action="edit-card" method="post">
            	<div class="form-group row">
						    <label for="surname" class="col-sm-5 col-form-label"><strong>Surname:</strong> </label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="<?php //echo Form::retainInput('surname');?>" tabindex="1" >
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="firstname" class="col-sm-5 col-form-label"><strong>First name:</strong> </label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" id="firstname" name="firstname" tabindex="2" placeholder="First name" value="<?php // echo Form::retainInput('firstname');?>" >
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="phone" class="col-sm-5 col-form-label"><strong>Phone number:</strong> </label>
						    <div class="col-sm-7">
						      <input type="text" class="form-control" id="phone" name="phone" tabindex="3" placeholder="Phone number" value="<?php //echo Form::retainInput('phone');?>" >
						    </div>
						  </div>
						  <div class="form-group row">
								<label for="tribe" class="col-sm-5 col-form-label"><strong>Tribe:</strong></label>
								<div class="col-sm-7">
						      <input type="text" class="form-control" id="tribe" name="tribe" tabindex="4" placeholder="Tribe" value="<?php //echo Form::retainInput('tribe');?>" >
						    </div>

							</div>
							<div class="form-group row">
								<label for="religion" class="col-sm-5 col-form-label"><strong>Religion:</strong></label>
								<div class="col-sm-7">
						      <input type="text" class="form-control" id="religion" name="religion" tabindex="5" placeholder="Religion" value="<?php //echo Form::retainInput('religion');?>" >
						    </div>

							</div>
							<div class="form-group row">
								<label for="dob" class="col-sm-5 col-form-label"><strong>DOB:</strong></label>
								<div class="col-sm-7">
						      <input type="date" class="form-control" id="birthday" name="birthday" tabindex="6" value="<?php //echo Form::retainInput('birthday');?>" >
						    </div>

							</div>
							<div class="form-group row">
								<label for="sex" class="col-sm-5 col-form-label"><strong>Sex:</strong></label>
								<div class="col-sm-7">
						      <select id="sex" name="sex" tabindex="7" class="form-control">
										<option hidden selected disabled>Sex</option>
										<option value="female" <?php //if(Text::isSame('female', Form::retainInput('sex'))){echo ' selected';}?>>Female</option>
										<option value="male" <?php //if(Text::isSame('male', Form::retainInput('sex'))){echo ' selected';}?>>Male</option>
									</select>
						    </div>

							</div>
							<div class="form-group row">
						    <label for="address" class="col-sm-5 col-form-label"><strong>Address:</strong> </label>
						    <div class="col-sm-7">
						      <textarea class="form-control" id="address" name="address" tabindex="8"  placeholder="Address" vvalue="<?php //echo Form::retainInput('address');?>"></textarea>
						    </div>
						  </div>
						  <div class="form-row">
								<div class="col-md-6">
									<div class="form-group odao-bottom-button">
										<button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="9">Update</button>
										<button type="reset" id="clearBTN" name="clearBTN" class="btn btn-danger odao-button" tabindex="10">Clear</button>
									</div>
								</div>
							</div>

				    </form>
					</div>
				</div>