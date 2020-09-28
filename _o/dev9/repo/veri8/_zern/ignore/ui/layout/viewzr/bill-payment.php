
<?php
if(!empty($oRecord['data'])){
	$rowset = $oRecord['data'];
?>

<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-12">
			<div class="card shadow mb-4">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Bill Payment</h6>
				</div>
				<div class="card-body">
					<form  name="bill" id="bill" action="bill-payment?card=<?php echo $rowset['puid'];?>" method="POST">

						<?php if($oRecord['code'] != 'E200A1'){?>

						<div class="form-group row">
							<label for="dob" class="col-sm-5 col-form-label"><strong>Date:</strong></label>
							<div class="col-sm-7">
								<input type="date" class="form-control" id="date" name="date" tabindex="1" value="<?php echo date('Y-m-d');?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label for="item" class="col-sm-5 col-form-label"><strong>Item:</strong></label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="item" name="item" tabindex="2" placeholder="Item" value="<?php echo oHelper::dataInfo('item', $rowset);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="amount" class="col-sm-5 col-form-label"><strong>Amount:</strong></label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="amount" name="amount" tabindex="3" placeholder="Amount" value="<?php echo oHelper::dataInfo('amount', $rowset);?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="amount" class="col-sm-5 col-form-label"><strong>Payment Type:</strong></label>
							<div class="col-sm-7">
								<select id="pay-type" name="pay-type" class="form-control" tabindex="4">
									<option hidden disabled>Payment Type</option>
									<option value="bill" selected>Bill Payment</option>
								</select>
							</div>
						</div>
						<!-- <div class="form-group row">
							<label for="description" class="col-sm-5 col-form-label"><strong>Description:</strong> </label>
							<div class="col-sm-7">
								<textarea class="form-control" id="description" name="description" tabindex="5"  placeholder="Description" required></textarea>
							</div>
						</div> -->
						<div class="form-row">
						<div class="col-md-10">
							<div class="form-group odao-bottom-button">
								<button type="submit" name="submitBTN" class="btn btn-primary o-bottom-button" tabindex="6">Post Payment</button>
								<button type="reset" name="submitBTN" class="btn btn-default o-bottom-button" tabindex="7">Reset</button>
							</div>
						</div>
					<?php } else {?>
						<div class="col-lg-12"> <?php echo oHelper::notify($oRecord);?> </div>
					<?php }?>
						<!-- <div class="offset-col-md-2">
							<div class="form-group odao-bottom-button">
								<button type="submit" name="submitBTN" class="btn btn-danger o-bottom-button" data-dismiss="modal" tabindex="8">Close</button>
							</div>
						</div> -->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
