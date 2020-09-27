
		<table id="personalInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Personal Information</th>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">Name</th>
				<td class="col-md-8 value" colspan="8">
					<?php echo $userInfo['fname']; if(!empty($userInfo['mname'])){echo ' '.$userInfo['mname'];} echo ' '.$userInfo['lname'];?>
				</td>
				<td class="col-md-2" colspan="2" rowspan="6">
					<?php $ispassport = $userInfo['passport'];?>
					<img src="<?php echo imgPass($ispassport);?>" class="passport">
				</td>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">E-Mail</th>
				<td class="col-md-6 value" colspan="6"><?php echo $userInfo['email'];?></td>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">Phone No</th>
				<td class="col-md-6 value" colspan="6"><?php echo $userInfo['phone'];?></td>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">Date of Birth</th>
				<td class="col-md-6 value" colspan="6"><?php echo $userInfo['birthdate'];?></td>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">Gender</th>
				<td class="col-md-6 value" colspan="6"><?php echo $userInfo['sex'];?></td>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">Nationality</th>
				<td class="col-md-6 value" colspan="6"><?php echo $userInfo['nationality'];?></td>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">City</th>
				<td class="col-md-10 value" colspan="10">
					<?php echo $userInfo['city']; if(!empty($userInfo['city']) && !empty($userInfo['state'])){echo ' / ';} echo $userInfo['state'];?>
				</td>
			</tr>
			<tr>
				<th class="col-md-2 title" colspan="2">Address</th>
				<td class="col-md-10 value" colspan="10"><?php echo nl2br($userInfo['address']);?></td>
			</tr>
		</table>
