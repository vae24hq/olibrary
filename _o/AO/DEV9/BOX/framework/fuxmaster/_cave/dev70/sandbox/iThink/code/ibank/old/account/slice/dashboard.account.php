
	<?php $clientBalance = $userInfo['accbal']; $clientCurrency = $userInfo['currency']?>

		<table id="accountInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Account Information</th>
			</tr>
			<tr>
				<th class="col-md-4 title" colspan="4">Account Name</th>
				<td class="col-md-8 value" colspan="8"><strong>
					<?php echo strtoupper($userInfo['lname']);
					if(!empty($userInfo['mname'])){echo ' '.strtoupper($userInfo['mname']);} echo ' '.strtoupper($userInfo['fname']);?></strong>
				</td>
			</tr>
			<tr>
				<th class="col-md-4 title" colspan="4">Account Number</th>
				<td class="col-md-8 value" colspan="8"><?php echo $userInfo['accountno'];?></td>
			</tr>

			<tr>
				<th class="col-md-4 title" colspan="4">Account Type</th>
				<td class="col-md-8 value" colspan="8"><?php echo $userInfo['acctype'];?></td>
			</tr>
			<tr>
				<th class="col-md-4 title" colspan="4">Currency</th>
				<td class="col-md-8 value" colspan="8"><?php echo ucwords($userInfo['currency']);?></td>
			</tr>
			<tr>
				<th class="col-md-4 title" colspan="4">Incoming Transfer</th>
				<td class="col-md-8 value" colspan="8">
					<?php if(is_numeric($userInfo['income'])){echo currencyToSymbol($clientCurrency).number_format($userInfo['income'], 2);} else {echo $userInfo['income'];}?>
				</td>
			</tr>
			<tr>
				<th class="col-md-4 title" colspan="4">Outgoing Transfer</th>
				<td class="col-md-8 value" colspan="8">
					<?php if(is_numeric($userInfo['outgo'])){echo currencyToSymbol($clientCurrency).number_format($userInfo['outgo'], 2);} else {echo $userInfo['outgo'];}?>
				</td>
			</tr>
			<tr>
				<th class="col-md-4 title" colspan="4">Swift/Routing/IFSC/Others</th>
				<td class="col-md-8 value" colspan="8"><?php echo $userInfo['swift'];?></td>
			</tr>
			<tr>
				<th class="col-md-4 title" colspan="4">Your balance</th>
				<td class="col-md-8 value" colspan="8" style="font-size: 1.7em;"><span class="<?php if(inString($clientBalance, '-')){echo 'text-danger';} else {echo 'text-primary';}?>"><?php echo currencyToSymbol($clientCurrency).number_format($clientBalance, 2);?></span>
				</td>
			</tr>
		</table>
