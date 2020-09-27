<?php require('../brux.php'); require('is_restrict.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Inactive :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<div id="logPage">
			<div class="loadingPage">
				<table width="650" class="loadingTable">
				<tr>
					<th class="col-md-12 heading">Inactive Account</th>
				</tr>
				<tr>
					<td class="col-md-12" style="padding: 20px;">
						<p class="text-primary">
						Sorry <strong><?php echo $userInfo['fname'].' '.$userInfo['lname'];?></strong>!<br><br>
						Your account is currently <span class="texte-danger">inactive.</span><br>
						Please contact the account department for assistance or enquiry on issues related to your online account<br><br><br>
						<strong><?php echo $officerInfo['name'];?></strong><br>
						<?php echo $officerInfo['email'];?><br>
						<?php echo $officerInfo['phone'];?>
						</p>
						<p style="margin: 30px 0;">Please <a href="<?php echo $logoutAction;?>" class="text-danger">logout</a> from your account</p>
					</td>
				</tr>
				</table>
			</div>
	</div>
<?php include('../in_foot.php');?>
</body>
</html>