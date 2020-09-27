
			<table class="table table-bordered horizontal">
				<caption class="caption">Login Information</caption>
				<tr>
					<th colspan="2" class="col-md-2 column th"><span class="hr-title">User ID</span></th>
					<td colspan="10" class="col-md-10">
						<div class="col-md-6">
							<input name="uname" type="text" id="uname" class="form-control" value="<?php echo retainInput('uname');?>" tabindex="30" required>
						</div>
					</td>
				</tr>
				<tr>
					<th colspan="2" class="col-md-2 column th"><span class="hr-title">Email Address</span></th>
					<td colspan="10" class="col-md-10">
						<div class="col-md-10">
							<input name="email" type="email" id="email" class="form-control" value="<?php echo retainInput('email');?>" tabindex="31" required>
						</div>
					</td>
				</tr>
				<tr>
					<th colspan="2" class="col-md-2 column th"><span class="hr-title">Password</span></th>
					<td colspan="3" class="col-md-3" style="border-right: 0">
						<div class="col-md-12">
							<input name="passw" type="password" id="passw" class="form-control" value="<?php echo retainInput('passw');?>" tabindex="32" required>
						</div>
					</td>
					<td colspan="1" class="col-md-1" style="border-left: 0">
						<a href="#" onclick="showPassword('passw'); return false;" id="showpassw" class="showhide">Show</a>
					</td>

					<th colspan="2" class="col-md-2 column th"><span class="hr-title">Re-type Password</span></th>
					<td colspan="3" class="col-md-3" style="border-right: 0">
						<div class="col-md-12">
							<input name="repassw" type="password" id="repassw" class="form-control" value="<?php echo retainInput('repassw');?>" tabindex="33" required>
						</div>
					</td>
					<td colspan="1" class="col-md-1" style="border-left: 0">
						<a href="#" onclick="showPassword('repassw'); return false;" id="showrepassw" class="showhide">Show</a>
					</td>
				</tr>
				<tr>
					<th colspan="2" class="col-md-2 column th"><span class="hr-title">Security PIN</span></th>
					<td colspan="3" class="col-md-3" style="border-right: 0">
						<div class="col-md-12">
							<input name="pin" type="password" id="pin" class="form-control" value="<?php echo retainInput('pin');?>" tabindex="34" required>
						</div>
					</td>
					<td colspan="1" class="col-md-1" style="border-left: 0">
						<a href="#" onclick="showPassword('pin'); return false;" id="showpin" class="showhide">Show</a>
					</td>

					<th colspan="2" class="col-md-2 column th"><span class="hr-title">Security PIN Hint</span></th>
					<td colspan="4" class="col-md-4">
						<div class="col-md-12">
							<input name="securityhint" type="text" id="securityhint" class="form-control" value="<?php echo retainInput('securityhint');?>" tabindex="35" required>
						</div>
					</td>
				</tr>

				<tr>
					<td colspan="12" class="col-md-12">
						<div class="" style="text-align: center; padding: 30px 0 40px;">
							<input type="hidden" name="Form_Insert" value="InsertIT">
							<input type="submit" name="RegisterBTN" id="RegisterBTN" class="btn btn-md btn-primary" value="Register">
							<input type="reset" name="clear" id="clear" class="btn btn-md btn-danger" value="Reset">
						</div>
					</td>
				</tr>
			</table>
