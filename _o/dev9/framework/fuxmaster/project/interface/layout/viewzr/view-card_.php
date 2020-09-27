<div class="container-fluid">
	<div class="row">
			<form name="view-card" id="view-card" action="view-card" method="post">


					<div class="offset-md-4 col-md-4 offset-md-4" >
						<img alt="Picture" src="http://thispix.com/wp-content/uploads/2015/06/passport-005.jpg" width="150" height="150">
					</div>

          	<div class="form-group row">
					    <label for="fullname" class="col-sm-5 col-form-label"><strong>Fullname:</strong> </label>
					    <div class="col-sm-7">
					      <input type="text" readonly class="form-control-plaintext" id="fullname" value="<?php //echo Form::retainInput('fullname');?>">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="hospitalno" class="col-sm-5 col-form-label"><strong>Hospital No:</strong> </label>
					    <div class="col-sm-7">
					      <input type="text" readonly class="form-control-plaintext" id="hospitalno" value="<?php //echo Form::retainInput('hospitalno');?>">
					    </div>
					  </div>
					  <div class="form-group row">
    					<label for="phone" class="col-sm-5 col-form-label"><strong>Phone number:</strong> </label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control-plaintext" id="phone" name="phone" value="<?php //echo Form::retainInput('phone');?>">
					    </div>
					  </div>
					  <div class="form-group row">
							<label for="tribe" class="col-sm-5 col-form-label"><strong>Tribe:</strong></label>
							<div class="col-sm-7">
					      <input type="text" class="form-control-plaintext" id="tribe" name="tribe" value="<?php //echo Form::retainInput('tribe');?>">
					    </div>

						</div>
						<div class="form-group row">
							<label for="religion" class="col-sm-5 col-form-label"><strong>Religion:</strong></label>
							<div class="col-sm-7">
					      <input type="text" class="form-control-plaintext" id="religion" name="religion" value="<?php //echo Form::retainInput('religion');?>">
					    </div>

						</div>
						<div class="form-group row">
							<label for="visitdate" class="col-sm-5 col-form-label"><strong>DOB:</strong></label>
							<div class="col-sm-7">
					      <input type="text" class="form-control-plaintext" id="birthday" name="birthday" value="<?php //echo Form::retainInput('birthday');?>">
					    </div>

						</div>
						<div class="form-group row">
							<label for="sex" class="col-sm-5 col-form-label"><strong>Sex:</strong></label>
							<div class="col-sm-7">
					      <input type="text" class="form-control-plaintext" id="sex" name="sex" value="<?php //echo Form::retainInput('sex');?>">
					    </div>

						</div>
						<div class="form-group row">
							<label for="address" class="col-sm-5 col-form-label"><strong>Address:</strong></label>
							<div class="col-sm-7">
					      <input type="text" class="form-control-plaintext" id="address" name="address" value="<?php //echo Form::retainInput('address');?>">
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