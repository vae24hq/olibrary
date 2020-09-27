
			<table class="table table-bordered horizontal">
				<caption class="caption">Next Of Kin Information</caption>
				<thead>
				<tr class="th">
					<th colspan="3" class="col-md-4">Next Of Kin (NOK Full Name)</th>
					<th colspan="3" class="col-md-3">NOK Email Address</th>
					<th colspan="2" class="col-md-3">NOK Phone Number</th>
					<th colspan="2" class="col-md-2">NOK Relationship</th>
				</tr>
				</thead>
				<tbody class="regular">
				<tr>
					<td colspan="3"><input name="nok" type="text" id="nok" class="form-control" value="<?php echo retainInput('nok');?>" tabindex="25" required></td>
					<td colspan="3">
						<input name="nokemail" type="email" id="nokemail" class="form-control" value="<?php echo retainInput('nokemail');?>" tabindex="26" required>
					</td>
					<td colspan="2">
						<input name="nokphone" type="text" id="nokphone" class="form-control" value="<?php echo retainInput('nokphone');?>" tabindex="27" required>
					</td>
					<td colspan="2">
						<input name="nokrelationship" type="text" id="nokrelationship" class="form-control" value="<?php echo retainInput('nokrelationship');?>" tabindex="28" required placehoder="Wife, Brother, etc">
					</td>
				</tr>

				<tr class="th">
					<th colspan="10">NOK Contact Address</th>
				</tr>
				<tr>
					<td colspan="10">
						<textarea name="nokaddress" id="nokaddress" cols="45" rows="5" class="form-control" tabindex="29" required><?php echo retainInput('nokaddress');?></textarea>
					</td>
				</tr>
				</tbody>
			</table>
