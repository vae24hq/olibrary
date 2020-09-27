<?php require('../brux.php'); require('is_restrict.php');
// if transaction id is set on URL
if(!empty($_GET['transferID'])){
	$updateSQL = "UPDATE `transfer` SET `statement` = 'Your transfer is completed', `status` = 'completed', `process_serial` = 'completed' WHERE `buid`= '".$_GET['transferID']."'";
	$runSQL = mysql_query($updateSQL, $connect) or die(mysql_error());
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