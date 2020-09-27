		<form name="transferForm" id="transferForm" method="POST" action="<?php echo $editFormAction;?>">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">New Transfer Details</th>
			</tr>
			<tr>
				<th class="col-md-12 em title" colspan="12" style="text-align: left; text-transform: capitalize;">Recipient's Bank Information</th>
			</tr>
			<tr>
				<th colspan="3" class="col-md-3 title">Amount (In <?php echo $userInfo['currency'];?>)</th>
				<td colspan="9" class="col-md-9 value">
					<input name="amount" type="number" id="amount" class="form-control" value="<?php echo retainInput('amount');?>" tabindex="1" required max="<?php echo (int)($userInfo['accbal']);?>">
				</td>
			</tr>
			<tr>
				<th colspan="3" class="col-md-3 title">Account Name</th>
				<td colspan="9" class="col-md-9 value">
					<input name="holder" type="text" id="holder" class="form-control" value="<?php echo retainInput('holder');?>" tabindex="2" required>
				</td>
			</tr>
			<tr>
				<th colspan="3" class="col-md-3 title">Account Number</th>
				<td colspan="9" class="col-md-9 value">
					<input name="account" type="text" id="account" class="form-control" value="<?php echo retainInput('account');?>" tabindex="3" required>
				</td>
			</tr>
			<tr>
				<th colspan="3" class="col-md-3 title">Bank Name</th>
				<td colspan="9" class="col-md-9 value">
					<input name="bank" type="text" id="bank" class="form-control" value="<?php echo retainInput('bank');?>" tabindex="4" required>
				</td>
			</tr>
			<tr>
				<th colspan="3" class="col-md-3 title">Bank Location</th>
				<td colspan="9" class="col-md-9 value">
					<input name="location" type="text" id="location" class="form-control" value="<?php echo retainInput('location');?>" tabindex="5" required>
				</td>
			</tr>
			<tr>
				<th colspan="3" class="col-md-3 title">Swift/Routing/IFSC/Others</th>
				<td colspan="9" class="col-md-9 value">
					<input name="swift" type="text" id="swift" class="form-control" value="<?php echo retainInput('swift');?>" tabindex="6">
				</td>
			</tr>
			</table>
			<table class="col-md-12 no-border">
			<tr>
				<td colspan="12" class="col-md-12">
					<div class="" style="text-align: center; padding: 30px 0 40px;">
						<input type="hidden" name="Form_Insert" value="InsertIT">
						<input type="submit" name="TransferBTN" id="TransferBTN" class="btn btn-md btn-primary" value="Transfer">
						<input type="reset" name="clear" id="clear" class="btn btn-md btn-danger" value="Cancel">
					</div>
				</td>
			</tr>
		</form>