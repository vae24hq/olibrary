<?php require('../brux.php'); require('is_restrict.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Loading :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require_once('slice/header.php');?>
	<div id="logPage">
			<div class="loadingPage">
				<table width="650" class="loadingTable">
				<tr>
					<th class="col-md-12 heading">Authenticating...</th>
				</tr>
				<tr>
					<td class="col-md-12" style="padding: 20px;">
						<p class="text-primary">
						Hello <strong><?php echo $userInfo['fname'].' '.$userInfo['lname'];?></strong>!<br><br>
						You are welcome to your <?php echo firm('name');?> Account.<br>
						Please wait while your information is being verified or
						<a href="<?php if($userInfo['status'] == 'active'){echo './';} else {echo 'inactive.php';}?>" class="text-danger">continue</a> if this is taking too long
						</p>
						<p style="text-align: center; margin: 30px auto;"><img src="../brux/loading.gif" width="50" height="50"></p>
					</td>
				</tr>
				</table>
			</div>
	</div>
<?php include('../in_foot.php');?>
</body>
</html>