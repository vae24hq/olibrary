<?php require_once('../core.php'); require_once('isauthorized.php');?>
<link rel="stylesheet" type="text/css" href="../source/inetsoft.css">

<div id="home" class="page group">
	<div class="left">
		<div class="wrapper group">
			<h3 class="title">Personal Information</h3>
			<table class="table">
				<tr>
					<th class="label" width="100px" scope="col">Full Name: </th>
					<td class="value" scope="col" colspan="2"><?php echo client('fname').' '.client('mname').' '.client('lname');?></td>
				</tr>
				<tr>
					<th class="label" scope="col">E-mail: </th>
					<td class="value" scope="col"><?php echo client('email'); ?></td>
					<td class="value" width="40px" rowspan="7"><img src="upload/<?php echo client('passport');?>" alt="<?php echo client('fname');?>" class="passport"></td>
				</tr>
				<tr>
					<th class="label" scope="col">Phone No: </th>
					<td class="value" scope="col"><?php echo client('phone'); ?></td>
				</tr>
				<tr>
					<th class="label" scope="col">Birth Date: </th>
					<td class="value" scope="col"><?php echo client('birthdate'); ?></td>
				</tr>
				<tr>
					<th class="label" scope="col">Gender: </th>
					<td class="value" scope="col"><?php echo client('sex'); ?></td>
				</tr>
				<tr>
					<th class="label" scope="col">Nationality: </th>
					<td class="value" scope="col"><?php echo client('nationality'); ?></td>
				</tr>
				<tr>
					<th class="label" scope="col">City/State: </th>
					<td class="value" scope="col"><?php echo client('city').'/'.client('state'); ?></td>
				</tr>
				<tr>
					<th class="label" scope="col">Address: </th>
					<td class="value" scope="col"><?php echo client('address'); ?></td>
				</tr>
			</table>

			<h3 class="title">Your Transfers</h3>
			<table class="table">
				<?php if (transfers('totalRows') == 0){?>
				<tr>
					<td class="value warning" scope="col">NO PENDING TRANSFER HAS BEEN MADE FROM YOUR ACCOUNT!</td>
				</tr>
     			<?php } //Show if no pending transfer exist
     			if (transfers('totalRows') > 0) { // Show if pending transfer exist
     				do {?>
         	<tr>
           		<th class="label">Serial No:</th>
           		<td class="value"><?php echo transfers('trasno');?></td>
           		<th class="label">Date:</th>
           		<td class="value"><?php echo transfers('transdate');?></td>
            </tr>
            <tr>
					<td class="details" colspan="4">
					You Initiated, <strong><?php echo transfers('type');?></strong> of the sum of <strong><?php echo transfers('amount');?></strong>
					<?php echo client('currency');?>, from your <?php echo firm('bname');?> online account to an account with the following details.
					</td>
				</tr>
				<tr>
					<th class="label">Account Title:</th>
					<td class="value" colspan="3"><?php echo transfers('toaccholder'); ?></td>
				</tr>
				<tr>
					<th class="label">Account Number:</th>
					<td class="value" colspan="3"><?php echo transfers('toaccount'); ?></td>
				</tr>
				<tr>
					<th class="label">Destination:</th>
					<td class="value" colspan="3"><?php echo transfers('tobank'); ?></td>
				</tr>
					<th class="label">Location:</th>
					<td class="value" colspan="3"><?php echo transfers('bnkloc'); ?></td>
            </tr>
            <tr>
            	<td class="value" colspan="4"><a href="process.php?trasno=<?php echo transfers('trasno');?>" class="BtnLink">[Continue With Transfer Process]</a></td>
            </tr>
         </table>
       <?php } while ($row_transf = mysql_fetch_assoc(transfers('transf')));
       	} // Show if recordset not empty ?>
			</table>
		</div>
	</div>
	<div class="right">
		<div class="wrapper group">
			<h3 class="title">News On Account</h3>
			<table class="table">
				<tr>
					<td class="value" scope="col" colspan="2"><?php echo nl2br(client('statement'));?></td>
				</tr>
			</table>

			<h3 class="title">Account Details</h3>
			<table class="table">
				<tr>
					<td class="value" scope="col" colspan="2"><?php echo nl2br(client('statement'));?></td>
				</tr>
			</table>

			<h3 class="title">Change Password</h3>
			<table class="table">
				<tr><td class="details" scope="col" colspan="2">Change your account login PIN</td></tr>
				<tr>
					<th class="label">New PIN:</th>
					<td class="value" scope="col"></td>
				</tr>
				<tr>
					<th class="label">Re-type PIN:</th>
					<td class="value" scope="col"></td>
				</tr>
			</table>

		</div>
	</div>
	<div class="center">
	</div>
</div>

<?php include('slice_footer.php');?>
