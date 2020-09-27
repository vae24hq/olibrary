<?php require('../brux.php'); require('is_restrict.php');
// if transaction id is set on URL
if(!empty($_GET['transferID'])){
	$transfer = getTransfer('buid', $_GET['transferID'], 'fetchRow');
	if($transfer){
		// If transfer process_serial is default
		if($transfer['process_serial'] == 'default'){

			// If user's account billing is set to default
			if($userInfo['billing'] == 'default'){
				#Get default billing process from billing list
				$billing = getBilling('default', '', 'fetchRow');
			} 
			// If user's account billing is set to a value from billing list
			else {
				#Get billing process from user's set
				$billing = getBilling('buid', $userInfo['billing'], 'fetchRow');
			}
		}
		// If transfer process_serial is not default
		else {
			#Get billing process from transfer process_serial set
			$billing = getBilling('buid', $transfer['process_serial'], 'fetchRow');
		}
	}

	if($billing){
		$updateSQL = "UPDATE `transfer` SET `statement` = 'Your transfer is completed', `status` = 'completed', `process_serial` = 'completed' WHERE `buid`= '".$_GET['transferID']."'";
		$runSQL = mysql_query($updateSQL, $connect) or die(mysql_error());
	}
}
// when transaction id is not set on URL
if(empty($_GET['transferID'])){
	header("Location: ".'dashboard.php');
	die();
} 
// when transaction id is set on URL but not valid
elseif(!$transfer){
	header("Location: ".'dashboard.php');
	die();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Completed :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
<div id="content">
	<div class="col-md-12">
		<div class="table-responsive">
			<table id="requiredInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Transfer Completed</th>
			</tr>
			<tr>
			<tr>
				<th class="col-md-12" colspan="12">
					<div class="text-primary" style="margin: 80px auto; text-align: center">
					<span class="text-success">Your funds transfer operation was successful</span><br><br>
					The transferred sum will reflect in the nominated account within 72 hours.<br>
					Thank you.</div>
				</th>
			</tr>
			</table>
		</div>
	</div>
</div>
</body>
</html>