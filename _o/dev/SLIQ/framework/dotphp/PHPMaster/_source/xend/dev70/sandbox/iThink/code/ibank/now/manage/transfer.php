<?php require('../brux.php'); require('is_restrict.php');
$maxRows_transfers = 10;
$pageNum_transfers = 0;
if (isset($_GET['pageNum_transfers'])){$pageNum_transfers = $_GET['pageNum_transfers'];}
$startRow_transfers = $pageNum_transfers * $maxRows_transfers;

$colname_transfers = "-1"; if (isset($_GET['ClientID'])){$colname_transfers = $_GET['ClientID'];}
$query_transfers = sprintf("SELECT * FROM `transfer` WHERE `user` = %s ORDER BY `id` DESC", GetSQLValueString($colname_transfers, "text"));
$query_limit_transfers = sprintf("%s LIMIT %d, %d", $query_transfers, $startRow_transfers, $maxRows_transfers);
$transfers = mysql_query($query_limit_transfers, $connect) or die(mysql_error());
$row_transfers = mysql_fetch_assoc($transfers);

if (isset($_GET['totalRows_transfers'])){$totalRows_transfers = $_GET['totalRows_transfers'];}
else {
	$all_transfers = mysql_query($query_transfers);
	$totalRows_transfers = mysql_num_rows($all_transfers);
}
$totalPages_transfers = ceil($totalRows_transfers/$maxRows_transfers)-1;

$queryString_transfers = "";
if (!empty($_SERVER['QUERY_STRING'])){
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param) {
		if (stristr($param, "pageNum_transfers") == false && 
			stristr($param, "totalRows_transfers") == false) {
			array_push($newParams, $param);
		}
	}
	if (count($newParams) != 0) {
	 $queryString_transfers = "&" . htmlentities(implode("&", $newParams));
	}
}
$queryString_transfers = sprintf("&totalRows_transfers=%d%s", $totalRows_transfers, $queryString_transfers);


if ((isset($_GET['deleteTransID'])) && ($_GET['deleteTransID'] != "")){
	$deleteSQL = sprintf("DELETE FROM `transfer` WHERE `id`=%s",
			GetSQLValueString($_GET['deleteTransID'], "int"));
	$Result = mysql_query($deleteSQL, $connect) or die(mysql_error());
	$deleteGoTo = "success.php";
	if (isset($_SERVER['QUERY_STRING'])){
		$deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
		$deleteGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $deleteGoTo));
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Transfer</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Transfer</h1>
	<div class="container">
	<div class="page">
		<?php if($totalRows_transfers == 0){?><p class="box bg-danger text-danger">You have no records</p><?php } else {?>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">Transfer Information
				<span class="menu">
					<?php
					if($totalRows_transfers > 0){
						echo 'Showing '.($startRow_transfers + 1);
						if($totalRows_transfers > 1){echo ' of '.$totalRows_transfers;}
						echo ' Record(s)';
					}?></span>
			<?php if($totalRows_transfers > 1){?>
			<span class="menu">
				<a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, 0, $queryString_transfers); ?>">First</a> -
				<a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, min($totalPages_transfers, $pageNum_transfers + 1), $queryString_transfers); ?>">Next</a> -
				<a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, max(0, $pageNum_transfers - 1), $queryString_transfers); ?>">Previous</a> -
				<a href="<?php printf("%s?pageNum_transfers=%d%s", $currentPage, $totalPages_transfers, $queryString_transfers); ?>">Last</a>
			</span>
			<?php }?>
			</caption>
			<thead>
			<tr class="th">
				<th class="col-md-1">Serial No</th>
				<th>Transfer Date</th>
				<th>Type</th>
				<th class="col-md-2">Account Name</th>
				<th>Account Number</th>
				<th class="col-md-2">Bank</th>
				<th class="col-md-1">Status</th>
				<th>Amount</th>
				<th>Balance</th>
				<th class="col-md-1">OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<?php do {?>
			<tr>
				<td scope="row"><?php echo $row_transfers['buid'];?></td>
				<td><?php echo $row_transfers['date'];?></td>
				<td><?php echo $row_transfers['type']; ?></td>
				<td><?php echo $row_transfers['holder'];?>
				<td><?php echo $row_transfers['account'];?></td>
				<td><?php echo $row_transfers['bank'];?></td>
				<td><strong><?php echo $row_transfers['status'];?></strong></td>
				<td style="text-align: right;"><?php echo currencyToSymbol(getClient('currency')).number_format($row_transfers['amount'], 2);?></td>
				<td style="text-align: right;"><?php echo currencyToSymbol(getClient('currency')).number_format(getClient('accbal'), 2);?></td>
				<td style="text-align: center;"><a href="transfer.php?deleteTransID=<?php echo $row_transfers['id'];?>" class="btn btn-sm btn-danger">Trash</a></td>
			</tr>
			<?php } while ($row_transfers = mysql_fetch_assoc($transfers));?>
			</tbody>
			</table>
		</div>
		<?php }?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>
<?php mysql_free_result($transfers);?>