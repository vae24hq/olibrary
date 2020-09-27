<?php require('../brux.php'); require('is_restrict.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Transaction :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
<!-- BEGIN LAYOUT FOR TRANSACTION -->
<div id="content">
	<div class="col-md-12">
		<table id="transferInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Your Transactions</th>
			</tr>
			<?php
				$dataRecord = clientTransaction($userInfo['uname']);
				$dataRows = $dataRecord['rows'];
				if ($dataRecord['totalRows'] == 0){?>
			<tr>
				<td class="col-md-12" colspan="12">
					<p class="text-success ibox">There is no transactions on this account.</p>
				</td>
			</tr>
			<?php } else {?>
			<tr>
				<th class="col-md-2 title-horizontal" colspan="1">Date</th>
				<th class="col-md-1 title-horizontal" colspan="1">Reference</th>
				<th class="col-md-6 title-horizontal" colspan="5">Description</th>
				<th class="col-md-1 title-horizontal" colspan="1">Category</th>
				<th class="col-md-1 title-horizontal" colspan="1" style="text-align: right;">Debit</th>
				<th class="col-md-1 title-horizontal" colspan="1" style="text-align: right;">Credit</th>
				<th class="col-md-1 title-horizontal" colspan="1" style="text-align: right;">Balance</th>
			</tr>
			<?php 
				$i = 0;
				foreach ($dataRows as $record){?>
			<tr>
				<td class="col-md-2 value-horizontal" colspan="1"><?php echo dateAs($record['period'], 'MYSQL_DateTime');?></td>
				<td class="col-md-1 value-horizontal" colspan="1"><?php echo $record['trasno'];?></td>
				<td class="col-md-6 value-horizontal" colspan="5"><?php echo $record['description'];?></td>
				<td class="col-md-1 value-horizontal" colspan="1">
					<?php if($record['type']=='DR'){echo '<span class="text-danger">';}?>
					<?php if($record['type']=='CR'){echo '<span class="text-success">';}?>
					<small><strong><?php echo strtoupper($record['category']);?></strong></small>
					<?php if($record['type']=='DR' || $record['type']=='CR'){echo '</span>';}?>
				</td>
				<td class="col-md-1 value-horizontal" colspan="1" style="text-align: right;">
					<?php if($record['type']=='DR'){echo '<span class="text-danger">'.currencyToSymbol($userInfo['currency']).number_format($record['amount'], 2).'</span>';}?>
				</td>
				<td class="col-md-1 value-horizontal" colspan="1" style="text-align: right;">
					<?php if($record['type']=='CR'){echo '<span class="text-success">'.currencyToSymbol($userInfo['currency']).number_format($record['amount'], 2).'</span>';}?>
				</td>
				<td class="col-md-1 value-horizontal" colspan="1" style="text-align: right;">
					<?php if(is_numeric($record['balance'])){echo currencyToSymbol($userInfo['currency']).number_format($record['balance'], 2);}?>
					</td>
				</tr>
			<?php if(++$i == 50) break; } // end foreach ?>
			<?php } ?>
		</table>
	</div>
</div>
</body>
</html>