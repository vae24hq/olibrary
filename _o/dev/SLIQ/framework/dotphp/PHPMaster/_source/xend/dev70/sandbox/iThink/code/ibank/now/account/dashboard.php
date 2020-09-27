<?php require('../brux.php'); require('is_restrict.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
<div id="content">

<div class="group">
	<div class="col-md-7">
	<?php 
	include('slice/dashboard.person.php');
	include('slice/dashboard.nok.php');
	?>

	<!-- BEGIN LAYOUT FOR TRANSFER -->
		<table id="transferInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Your Transfers</th>
			</tr>
				<?php
				$transfer = clientTransfer($userInfo['uname']);
				$transferRecords = $transfer['rows'];
				if ($transfer['totalRows'] == 0){?>
			<tr>
				<td class="col-md-12" colspan="12">
					<p class="text-success ibox">There is no pending transfer on this account.<br> You make <a href="transfer.php">click here</a> to initiate a transfer</p>
				</td>
			</tr>
			<?php } else {?>
			<tr>
				<th class="col-md-1 title-horizontal" colspan="1">Date</th>
				<th class="col-md-5 title-horizontal" colspan="5">Account</th>
				<th class="col-md-3 title-horizontal" colspan="3">Bank</th>
				<th class="col-md-1 title-horizontal" colspan="1" style="text-align: right;">Amount</th>
				<th class="col-md-1 title-horizontal" colspan="1">Status</th>
				<th class="col-md-1 title-horizontal" colspan="1" style="text-align: center;">ACTION</th>
			</tr>
			<?php $i = 0; foreach ($transferRecords as $record){?>
			<tr>
				<td class="col-md-1 value-horizontal" colspan="1"><?php echo dateAs($record['date'], 'oDateAlt');?></td>
				<td class="col-md-5 value-horizontal" colspan="5"><?php echo $record['holder'];?></td>
				<td class="col-md-3 value-horizontal" colspan="3"><?php echo $record['bank'];?></td>
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
					<?php } } else {echo ' - ';} ?>

				</td>
			</tr>
			<?php if(++$i == 5) break;} // end foreach ?>
			<?php } ?>
		</table>

	</div>
	
	<div class="col-md-5">
	<?php 
	include('slice/dashboard.account.php');
	include('slice/dashboard.news.php');
	include('slice/dashboard.officer.php');
	include('slice/dashboard.service.php');
	?>
	</div>
</div>
</div>
</body>
</html>
