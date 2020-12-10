
		<table id="nokInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Next of Kin Information</th>
			</tr>
			<tr>
				<th class="col-md-3 title" colspan="3">NOK Name</th>
				<td class="col-md-9 value" colspan="9"><?php echo $userInfo['nok'];?></td>
			</tr>
			<tr>
				<th class="col-md-3 title" colspan="3">NOK E-Mail</th>
				<td class="col-md-9 value" colspan="9"><?php echo $userInfo['nokemail'];?></td>
			</tr>
			<tr>
				<th class="col-md-3 title" colspan="3">NOK Phone Number</th>
				<td class="col-md-9 value" colspan="9"><?php echo $userInfo['nokphone'];?></td>
			</tr>
			<tr>
				<th class="col-md-3 title" colspan="3">Relationship</th>
				<td class="col-md-9 value" colspan="9"><?php echo $userInfo['nokrelationship'];?></td>
			</tr>
			<tr>
				<th class="col-md-3 title" colspan="3">Address</th>
				<td class="col-md-9 value" colspan="9"><?php echo nl2br($userInfo['address']);?></td>
			</tr>
		</table>

