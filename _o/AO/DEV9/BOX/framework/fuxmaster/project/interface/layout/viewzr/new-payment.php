<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
			<div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary">New Payment</h6>
			</div>
			<div class="card-body">

						<form  name="bill" id="bill" action="bill" method="post">
            		<div class="form-group row">
										<label for="dob" class="col-sm-5 col-form-label"><strong>Date:</strong></label>
								<div class="col-sm-7">
						      	<input type="date" class="form-control" id="date" name="date" tabindex="1" value="<?php echo date('Y-m-d');?>" required value="">
						    </div>

							</div>
						  <div class="form-group row">
										<label for="item" class="col-sm-5 col-form-label"><strong>Item:</strong></label>
							<div class="col-sm-7">
				     			  <input type="text" class="form-control" id="item" name="item" tabindex="2" placeholder="Item" value="" required value="">
					    </div>

							</div>
							<div class="form-group row">
										<label for="amount" class="col-sm-5 col-form-label"><strong>Amount:</strong></label>
								<div class="col-sm-7">
						      	<input type="text" class="form-control" id="amount" name="amount" tabindex="3" placeholder="Amount" value="" required value="">
						    </div>

							</div>

							<div class="form-group row">
										<label for="amount" class="col-sm-5 col-form-label"><strong>Payment Type:</strong></label>
								<div class="col-sm-7">
						      	<select id="pay-type" name="pay-type" class="form-control" tabindex="4">
											<option hidden selected disabled>Payment Type</option>
											<option value="">Full</option>
											<option value=""> Installment</option>
										</select>
						    </div>

							</div>

							<div class="form-group row">
						    		<label for="description" class="col-sm-5 col-form-label"><strong>Description:</strong> </label>
						    <div class="col-sm-7">
						      	<textarea class="form-control" id="description" name="description" tabindex="5"  placeholder="Description" value="" required value=""></textarea>
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


