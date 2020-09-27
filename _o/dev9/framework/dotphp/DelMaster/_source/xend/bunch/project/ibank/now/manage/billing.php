<?php require('../brux.php'); require('is_restrict.php');
$query_billing = "SELECT * FROM `billing` ORDER BY `id` ASC";
$billing = mysql_query($query_billing, $connect) or die(mysql_error());
$row_billing = mysql_fetch_assoc($billing);
$totalRows_billing = mysql_num_rows($billing);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Managers</title>
<?php include('../in_head.php');?>
<style type="text/css">
	.otp th, .otp td {
		background: skyblue;
		color: white;
		font-weight: bold;
	}
</style>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Billing</h1>
	<div class="container">
	<div class="page">
		<?php if($totalRows_billing == 0){?><p class="box bg-danger text-danger">You have no record</p><?php } else {$serial = 0;?>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">List of Billing</caption>
			<thead>
			<tr class="th">
				<th class="col-md-1">S/N</th>
				<th class="col-md-2">Acronym</th>
				<th class="col-md-5">Label</th>
				<th class="col-md-3">Value</th>
				<th class="col-md-1">Minimum</th>
				<th class="col-md-1">Maximum</th>
			</tr>
			</thead>
			<tbody class="regular">
<?php do {?>
			<tr <?php if($row_billing['buid'] == '16935354'){echo ' class="otp"';}?>>
				<th scope="row"><?php $serial++; echo $serial;?></th>
				<td><?php echo $row_billing['acronym'];?></td>
				<td><?php echo $row_billing['label'];?></td>
				<td><?php echo $row_billing['value'];?></td>
				<td><?php echo $row_billing['min_per'].'%';?></td>
				<td><?php echo $row_billing['max_per'].'%';?></td>
			</tr>
<?php } while ($row_billing = mysql_fetch_assoc($billing));?>
			</tbody>
		</table>
		</div>
		<?php }?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>