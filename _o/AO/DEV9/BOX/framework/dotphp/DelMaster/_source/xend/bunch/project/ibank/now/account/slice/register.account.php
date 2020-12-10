
			<table class="table table-bordered table-striped">
				<caption class="caption">Account Information</caption>
				<thead>
				<tr class="th">
					<th colspan="2">Account Type</th>
					<th colspan="2">Account Currency</th>
					<th colspan="2">Annual Income</th>
					<th colspan="2">Asset Worth</th>
					<th colspan="2">Credit Worth</th>
				</tr>
				</thead>
				<tbody class="regular">
				<tr>
					<td colspan="2">
						<select name="acctype" id="acctype" class="form-control" tabindex="17" required>
							<option>Select</option>
							<option value="investment" <?php if(!(strcmp("investment", retainInput('acctype')))){echo ' selected';}?>>Investment</option>
							<option value="savings" <?php if(!(strcmp("savings", retainInput('acctype')))){echo ' selected';}?>>Savings</option>
							<option value="current" <?php if(!(strcmp("current", retainInput('acctype')))){echo ' selected';}?>>Current</option>
							<option value="direct" <?php if(!(strcmp("direct", retainInput('acctype')))){echo ' selected';}?>>Direct</option>
							<option value="fixed" <?php if(!(strcmp("fixed", retainInput('acctype')))){echo ' selected';}?>>Fixed</option>
						</select>
					</td>
					<td colspan="2">
						<select name="currency" id="currency" class="form-control" tabindex="18" required>
							<option value="">Select</option>
							<option value="dollar" <?php if(!(strcmp("dollar", retainInput('currency')))){echo ' selected';}?>>Dollar</option>
							<option value="pound" <?php if(!(strcmp("pound", retainInput('currency')))){echo ' selected';}?>>Pound</option>
							<option value="euro" <?php if(!(strcmp("euro", retainInput('currency')))){echo ' selected';}?>>Euro</option>
							<option value="yen" <?php if(!(strcmp("yen", retainInput('currency')))){echo ' selected';}?>>Yen</option>
							<option value="rupee" <?php if(!(strcmp("rupee", retainInput('currency')))){echo ' selected';}?>>Rupee</option>
						</select>
					</td>
					<td colspan="2">
						<select name="annual" id="annual" class="form-control" tabindex="19" required>
							<option value="">Select</option>
							<option value="$2,000+" <?php if(!(strcmp("$2,000+", retainInput('annual')))){echo ' selected';}?>>$2,000+</option>
							<option value="$10,000+" <?php if(!(strcmp("$10,000+", retainInput('annual')))){echo ' selected';}?>>$10,000+</option>
							<option value="$20,000+" <?php if(!(strcmp("$20,000+", retainInput('annual')))){echo ' selected';}?>>$20,000+</option>
							<option value="$50,000+" <?php if(!(strcmp("$50,000+", retainInput('annual')))){echo ' selected';}?>>$50,000+</option>
							<option value="$100,000+" <?php if(!(strcmp("$100,000+", retainInput('annual')))){echo ' selected';}?>>$100,000+</option>
							<option value="$200,000+" <?php if(!(strcmp("$200,000+", retainInput('annual')))){echo ' selected';}?>>$200,000+</option>
							<option value="$500,000+" <?php if(!(strcmp("$500,000+", retainInput('annual')))){echo ' selected';}?>>$500,000+</option>
						</select>
					</td>
					<td colspan="2">
						<select name="assetworth" id="assetworth" class="form-control" tabindex="20" required>
							<option value="">Select</option>
							<option value="$50,000+" <?php if(!(strcmp("$50,000+", retainInput('assetworth')))){echo ' selected';}?>>$50,000+</option>
							<option value="$100,000+" <?php if(!(strcmp("$100,000+", retainInput('assetworth')))){echo ' selected';}?>>$100,000+</option>
							<option value="$200,000+" <?php if(!(strcmp("$200,000+", retainInput('assetworth')))){echo ' selected';}?>>$200,000+</option>
							<option value="$500,000+" <?php if(!(strcmp("$500,000+", retainInput('assetworth')))){echo ' selected';}?>>$500,000+</option>
						</select>
					</td>
					<td colspan="2">
						<select name="creditworth" id="creditworth" class="form-control" tabindex="21" required>
							<option value="">Select</option>
							<option value="$50,000+" <?php if(!(strcmp("$50,000+", retainInput('creditworth')))){echo ' selected';}?>>$50,000+</option>
							<option value="$100,000+" <?php if(!(strcmp("$100,000+", retainInput('creditworth')))){echo ' selected';}?>>$100,000+</option>
							<option value="$200,000+" <?php if(!(strcmp("$200,000+", retainInput('creditworth')))){echo ' selected';}?>>$200,000+</option>
							<option value="$500,000+" <?php if(!(strcmp("$500,000+", retainInput('creditworth')))){echo ' selected';}?>>$500,000+</option>
						</select>
					</td>
				</tr>

				<tr class="th">
					<th colspan="4" class="col-md-4">Investible Assets</th>
					<th colspan="4" class="col-md-4">Interested Services</th>
					<th colspan="2">Preferred Time of Call</th>
				</tr>
				<tr>
					<td colspan="4">
						<select class="form-control" name="asset[]" multiple="multiple" size=6  tabindex="22" required style='height: 100%;'>
							<option value="Cash"<?php if(retainSelect('Cash', 'asset')){echo ' selected';}?>>Cash</option>
							<option value="Real Estate"<?php if(retainSelect("Real Estate", 'asset')){echo ' selected';}?>>Real Estate</option>
							<option value="Art Jewelry"<?php if(retainSelect("Art Jewelry", 'asset')){echo ' selected';}?>>Art/Jewelry</option>
							<option value="Private Equity"<?php if(retainSelect("Private Equity", 'asset')){echo ' selected';}?>>Private Equity</option>
							<option value="Insurance"<?php if(retainSelect("Insurance", 'asset')){echo ' selected';}?>>Insurance (with cash value)</option>
							<option value="Money Market"<?php if(retainSelect("Money Market", 'asset')){echo ' selected';}?>>Money Market (bonds, bills, etc)</option>
							<option value="Others"<?php if(retainSelect('Others', 'asset')){echo ' selected';}?>>Others</option>
						</select>
						<span class="text-info small">(Hold Ctrl Key to select more than one)</span>
					</td>
					<td colspan="4">
						<select class="form-control" name="service[]" multiple="multiple" size=6  tabindex="23" required style='height: 100%;'>
							<option value="Banking"<?php if(retainSelect("Banking", 'service')){echo ' selected';}?>>Banking Services</option>
							<option value="Wealth Planning"<?php if(retainSelect("Wealth Planning", 'service')){echo ' selected';}?>>Wealth Planning Solutions</option>
							<option value="Investment_Services"<?php if(retainSelect("Investment_Services", 'service')){echo ' selected';}?>>Investment Services</option>
							<option value="Private Equity"<?php if(retainSelect("Private Equity", 'service')){echo ' selected';}?>>Private Equity</option>
							<option value="Real Estate"<?php if(retainSelect("Real Estate", 'service')){echo ' selected';}?>>Real Estate</option>
							<option value="TrustFund Management"<?php if(retainSelect("TrustFund Management", 'service')){echo ' selected';}?>>Trust and Estate Management</option>
							<option value="Lifestyle Management"<?php if(retainSelect("Lifestyle Management", 'service')){echo ' selected';}?>>Lifestyle Management</option>
							<option value="Others"<?php if(retainSelect("Others", 'service')){echo ' selected';}?>>Other Services</option>
						</select>
						<span class="text-info small">(Hold Ctrl Key to select more than one)</span>
					</td>
					<td>
						<select id="calltime" name="calltime" class="form-control" tabindex="24" required>
							<option value="">Select Time</option>
							<option value="Weekday 8am - 12pm"<?php if(!(strcmp("Weekday 8am - 12pm", retainInput('calltime')))){echo ' selected';}?>>Weekday 8am - 12pm</option>
							<option value="Weekday 12pm - 6pm"<?php if(!(strcmp("Weekday 12pm - 6pm", retainInput('calltime')))){echo ' selected';}?>>Weekday 12pm - 6pm</option>
							<option value="Weekday from 6pm"<?php if(!(strcmp("Weekday from 6pm", retainInput('calltime')))){echo ' selected';}?>>Weekday from 6pm</option>
							<option value="Weekend 8am - 12pm"<?php if(!(strcmp("Weekend 8am - 12pm", retainInput('calltime')))){echo ' selected';}?>>Weekend 8am - 12pm</option>
							<option value="Weekend 12pm - 6pm"<?php if(!(strcmp("Weekend 12pm - 6pm", retainInput('calltime')))){echo ' selected';}?>>Weekend 12pm - 6pm</option>
							<option value="Weekend from 6pm"<?php if(!(strcmp("Weekend from 6pm", retainInput('calltime')))){echo ' selected';}?>>Weekend from 6pm</option>
						</select>
					</td>
				</tbody>
			</table>
