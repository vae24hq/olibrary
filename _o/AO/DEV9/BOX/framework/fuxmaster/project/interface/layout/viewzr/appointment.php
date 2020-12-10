
<div class="container-fluid">

				<div class="row">
					<form name="appointment" id="appointment" action="appointment" method="post">
			                	<div class="form-group row">
											    <label for="fullname" class="col-sm-5 col-form-label"><strong>Fullname:</strong> </label>
											    <div class="col-sm-7">
											      <input type="text" readonly class="form-control-plaintext" id="fullname" value="<?php //echo Form::retainInput('fullname');?>">
											    </div>
											  </div>
											  <div class="form-group row">
											    <label for="hospitalno" class="col-sm-5 col-form-label"><strong>Hospital No:</strong> </label>
											    <div class="col-sm-7">
											      <input type="text" readonly class="form-control-plaintext" id="hospitalno"value="<?php //echo Form::retainInput('hospitalno');?>">
											    </div>
											  </div>
											  <div class="form-group row">
													<label for="visitdate" class="col-sm-5 col-form-label"><strong>Appointment Date:</strong></label>
													<div class="col-sm-7">
											      <input type="date" class="form-control" id="visitdate" name="visitdate" tabindex="1" value="" required="">
											    </div>

												</div>
												<div class="form-group row">
											    <label for="visittime" class="col-sm-5 col-form-label"><strong>Appointment Time:</strong> </label>
											    <div class="col-sm-7">
											      <input type="text" placeholder="Pick a time" class="form-control" id="visittime" name="visittime"  tabindex="2" value="">
											    </div>
											  </div>
											  <div class="form-row">
													<div class="col-md-6">
														<div class="form-group odao-bottom-button">
															<button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="3">Book</button>
															<button type="reset" id="clearBTN" name="clearBTN" class="btn btn-danger odao-button" tabindex="4">Clear</button>
														</div>
													</div>
												</div>

			    </form>


					</div>


</div>
</div>

<script type="text/javascript">
		 $(document).ready(function(){
		//$(document).on("click", '#visittime', function(event) {
	    //alert("new link clicked!");
	    $('#visittime').mdtimepicker();
	});


	</script>