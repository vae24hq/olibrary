
		<table id="officerInfo" class="record col-md-12">
			<tr><th class="col-md-12 table-heading" colspan="12">Account Officer</th></tr>
			<tr>
				<th class="col-md-5 title-horizontal" colspan="5">Name</th>
				<th class="col-md-7 title-horizontal" colspan="7">E-Mail/Phone Number</th>
			</tr>
				<td class="col-md-5 value-horizontal" colspan="5"><?php echo ucwords($officerInfo['name']);?></td>
				<td class="col-md-7 value-horizontal" colspan="7"><?php echo strtolower($officerInfo['email']);?>
				<br><?php echo $officerInfo['phone'];?></td>
			<tr>
		</table>
