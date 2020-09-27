<?php require('../brux.php'); require('is_restrict.php');
if((isset($_POST["Form_Insert"])) && ($_POST["Form_Insert"] == "InsertIT")){
	createTransfer($_POST);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Transfer :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
<!-- BEGIN LAYOUT FOR SUCCESS -->
<div id="content">
	<div class="col-md-12">
		<div class="table-responsive">
		

<!-- BEGIN LAYOUT FOR TRANSFER -->
		<table id="transferInfo" class="record col-md-12">
			<?php
				$transfer = clientTransfer($userInfo['uname'], 'fetchAll', 'yeah');
				$transferRecords = $transfer['rows'];
				if ($transfer['totalRows'] == 0){
					if($userInfo['accbal'] < 1){?>
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Service Unavailable</th>
			</tr>
			<tr><td class="col-md-12 value" colspan="12">
				<div class="ibox text-danger"><p>Sorry <strong><?php echo $userInfo['fname'];?></strong>, you cannot use this service at this time.<br>
				Please contact your account office or the support desk for inquiries on how to resolve this.</p></div>
			</td></tr>
				<?php } else {include('slice/transfer.form.php');}
			 } else {?>
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Your Pending Transfer</th>
			</tr>
			<tr>
				<th class="col-md-1 title-horizontal" colspan="1">Date</th>
				<th class="col-md-2 title-horizontal" colspan="2">Account Number</th>
				<th class="col-md-3 title-horizontal" colspan="3">Account Name</th>
				<th class="col-md-2 title-horizontal" colspan="2">Bank</th>
				<th class="col-md-2 title-horizontal" colspan="1">Location</th>
				<th class="col-md-1 title-horizontal" colspan="1" style="text-align: right;">Amount</th>
				<th class="col-md-1 title-horizontal" colspan="1">Status</th>
				<th class="col-md-1 title-horizontal" colspan="1" style="text-align: center;">ACTION</th>
			</tr>
			<?php $i = 0; foreach ($transferRecords as $record){?>
			<tr>
				<td class="col-md-1 value-horizontal" colspan="1"><?php echo dateAs($record['date'], 'oDate');?></td>
				<td class="col-md-2 value-horizontal" colspan="2"><?php echo $record['account'];?></td>
				<td class="col-md-3 value-horizontal" colspan="3"><?php echo $record['holder'];?></td>
				<td class="col-md-2 value-horizontal" colspan="2"><?php echo $record['bank'];?></td>
				<td class="col-md-2 value-horizontal" colspan="1"><?php echo $record['location'];?></td>
				<td class="col-md-1 value-horizontal" colspan="1" style="text-align: right;"><?php echo currencyToSymbol($userInfo['currency']).number_format($record['amount'], 2);?></td>
				<?php 
					$statusCSS = ''; if($record['status'] =='pending'){$statusCSS = 'warning';}?>
				<td class="col-md-1 value-horizontal" colspan="1"><?php echo '<span class="'.$statusCSS.'">'.ucwords($record['status']).'</span>';?></td>
				<td class="col-md-1 value-horizontal" colspan="1">
					<?php if($record['process_serial'] != 'completed'){
					if($userInfo['billing'] == 'nobill'){?>
					<a href="splash.auto.php?transferID=<?php echo $record['buid']; ?>" class="btn btn-sm btn-primary">Proceed</a>
					<?php } else {?>
					<a href="process.php?transferID=<?php echo $record['buid']; ?>" class="btn btn-sm btn-primary">Proceed</a>
					<?php } } ?>

				</td>
			</tr>
			<?php if(++$i == 5) break;} // end foreach ?>
			<?php } ?>
		</table>
		</div>
	</div>
</div>
</body>
</html>