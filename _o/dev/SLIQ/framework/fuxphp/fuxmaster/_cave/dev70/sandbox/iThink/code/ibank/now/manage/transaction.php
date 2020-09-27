<?php require('../brux.php'); require('is_restrict.php');
$clientIS = getClient('uname', 'user');
$clientCalcBalance = calcTransBal($clientIS);

if ((isset($_POST["Form_Insert"])) && ($_POST["Form_Insert"] == "InsertIT")){
	$buid = randomize('buid');
	$insertSQL = sprintf("INSERT INTO `transaction` (`buid`, `user`, `period`, `trasno`, `description`, `category`, `type`, `amount`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
			GetSQLValueString($buid, "text"),
			GetSQLValueString($_POST['user'], "text"),
			GetSQLValueString($_POST['period'], "text"),
			GetSQLValueString($_POST['trasno'], "text"),
			GetSQLValueString(rewriteRH($_POST['description']), "text"),
			GetSQLValueString($_POST['category'], "text"),
			GetSQLValueString($_POST['type'], "text"),
			GetSQLValueString($_POST['amount'], "text"));
	$Result = mysql_query($insertSQL, $connect) or die(mysql_error());

	// Account Balance (update account balance for client)
	$totalBalance = calcTransBal($_POST['user']);
	updateAccBal($totalBalance, $_POST['user'], 'uname');


	// Transactions Balance (update each transaction balance for client)
	updateTransBal($_POST['user']);


	$insertGoTo = "transaction.php";
	if (isset($_SERVER['QUERY_STRING'])){
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $insertGoTo));
}


$maxRows_transaction = 10;
$pageNum_transaction = 0;
if (isset($_GET['pageNum_transaction'])){$pageNum_transaction = $_GET['pageNum_transaction'];}
$startRow_transaction = $pageNum_transaction * $maxRows_transaction;

$colname_transaction = "-1"; if (isset($_GET['ClientID'])){$colname_transaction = $_GET['ClientID'];}
$query_transaction = sprintf("SELECT * FROM `transaction` WHERE `user` = %s ORDER BY id DESC", GetSQLValueString($colname_transaction, "text"));
$query_limit_transaction = sprintf("%s LIMIT %d, %d", $query_transaction, $startRow_transaction, $maxRows_transaction);
$transaction = mysql_query($query_limit_transaction, $connect) or die(mysql_error());
$row_transaction = mysql_fetch_assoc($transaction);

if (isset($_GET['totalRows_transaction'])){
	$totalRows_transaction = $_GET['totalRows_transaction'];
} else {
	$all_transaction = mysql_query($query_transaction);
	$totalRows_transaction = mysql_num_rows($all_transaction);
}
$totalPages_transaction = ceil($totalRows_transaction/$maxRows_transaction)-1;

$queryString_transaction = "";
if (!empty($_SERVER['QUERY_STRING'])){
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param){
		if (stristr($param, "pageNum_transaction") == false && 
			stristr($param, "totalRows_transaction") == false) {
			array_push($newParams, $param);
		}
	}
	if (count($newParams) != 0){$queryString_transaction = "&" . htmlentities(implode("&", $newParams));}
}
$queryString_transaction = sprintf("&totalRows_transaction=%d%s", $totalRows_transaction, $queryString_transaction);


if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "updateIT")){
	$updateSQL = sprintf("UPDATE `transaction` SET period=%s, trasno=%s, description=%s, category=%s, type=%s, amount=%s WHERE id=%s",
			GetSQLValueString($_POST['period'], "text"),
			GetSQLValueString($_POST['trasno'], "text"),
			GetSQLValueString(rewriteRH($_POST['description']), "text"),
			GetSQLValueString($_POST['category'], "text"),
			GetSQLValueString($_POST['type'], "text"),
			GetSQLValueString($_POST['amount'], "text"),
			GetSQLValueString($_POST['id'], "int"));
		mysql_query($updateSQL, $connect) or die(mysql_error());


	// Account Balance (update account balance for client)
	$totalBalance = calcTransBal($_POST['user']);
	updateAccBal($totalBalance, $_POST['user'], 'uname');


	// Transactions Balance (update each transaction balance for client)
	updateTransBal($_POST['user']);

	$updateGoTo = "transaction.php";
	if (isset($_SERVER['QUERY_STRING'])){
		$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
		$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $updateGoTo));
}


if ((isset($_GET['deleteTransactionID'])) && ($_GET['deleteTransactionID'] != "")){
	$deleteSQL = sprintf("DELETE FROM `transaction` WHERE id=%s",
			GetSQLValueString($_GET['deleteTransactionID'], "int"));
	mysql_query($deleteSQL, $connect) or die(mysql_error());

	// Account Balance (update account balance for client)
	$totalBalance = calcTransBal($_GET['ClientID']);
	updateAccBal($totalBalance, $_GET['ClientID'], 'uname');

	// Transactions Balance (update each transaction balance for client)
	updateTransBal($_GET['ClientID']);

	$deleteGoTo = "transaction.php?ClientID=".$_GET['ClientID'];
	header("Location: ".$deleteGoTo);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Transaction</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Transaction</h1>
	<div class="container">
	<div class="page">
		<form id="addTrans" name="addTrans" method="POST" action="<?php echo $editFormAction;?>">
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">New Transaction</caption>
			<thead>
			<tr class="th">
				<th class="col-md-2">Date <small>(<?php echo date('Y-m-d H:i:s');?>)</small></th>
				<th class="col-md-2">Trans. ID</th>
				<th class="col-md-3">Description</th>
				<th >Category</th>
				<th>Type</th>
				<th>Amount</th>
				<th>OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<tr>
				<td><input name="period" type="text" id="period" class="form-control" value="<?php echo date('Y-m-d H:i:s');?>"></td>
				<td><input name="trasno" type="text" id="trasno" class="form-control" value="<?php echo randomize('trasno');?>"></td>
				<td><input name="description" type="text" id="description" class="form-control" value=""></td>
				<td>
					<select name="category" id="category" class="form-control">
						<option value="atm">ATM</option>
						<option value="charge">Charge</option>
						<option value="deposit">Deposit</option>
						<option value="electronic">Electronic</option>
						<option value="interest">Interest</option>
						<option value="pos">POS</option>
						<option value="transfer">Transfer</option>
						<option value="withdrawal">Withdrawal</option>
					</select>
				</td>
				<td>
					<select name="type" id="type" class="form-control">
						<option value="DR">Debit</option>
						<option value="CR">Credit</option>
					</select>
				</td>
				<td><input name="amount" type="number" id="amount" class="form-control" value=""></td>
				<td>
					<input type="hidden" name="user" value="<?php echo getClient('uname', 'user');?>">
					<input type="hidden" name="Form_Insert" value="InsertIT">
					<input type="submit" name="button" id="button" class="btn btn-md btn-success" value="Create">
				</td>
			</tr>
			</tbody>
		</table>
		</div>
		</form>


		<?php if($totalRows_transaction == 0){?><p class="box bg-danger text-danger">No records found</p><?php } else {$serial = 0;?>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">Transaction Information
			<span class="menu">Account Balance:
			<?php $currency = getClient('currency', 'user'); echo currencyToSymbol($currency).numFormat(getClient('accbal', 'user'));?>
			</span>
			<span class="menu">
				<?php
					if($totalRows_transaction > 0){
						echo 'Showing '.($startRow_transaction + 1);
						if($totalRows_transaction > 1){
							echo ' - '.min($startRow_transaction + $maxRows_transaction, $totalRows_transaction).' of '.$totalRows_transaction;
						}
						echo ' Record(s)';
					}?>
			</span>
			<?php if($totalRows_transaction > 1){?>
			<span class="menu">
				<a href="<?php printf("%s?pageNum_transaction=%d%s", $currentPage, 0, $queryString_transaction); ?>">First</a> -
				<a href="<?php printf("%s?pageNum_transaction=%d%s", $currentPage, min($totalPages_transaction, $pageNum_transaction + 1), $queryString_transaction); ?>">Next</a> -
				<a href="<?php printf("%s?pageNum_transaction=%d%s", $currentPage, max(0, $pageNum_transaction - 1), $queryString_transaction); ?>">Previous</a> -
				<a href="<?php printf("%s?pageNum_transaction=%d%s", $currentPage, $totalPages_transaction, $queryString_transaction); ?>">Last</a>
			</span>
			<?php }?>
			</caption>
			<thead>
			<tr class="th">
				<th>S/N</th>
				<th class="col-md-2">Date <small>(<?php echo date('Y-m-d H:i:s');?>)</small></th>
				<th>Trans. ID</th>
				<th class="col-md-3">Description</th>
				<th class="col-md-1">Category</th>
				<th class="col-md-1">Type</th>
				<th class="col-md-1">Amount</th>
				<th class="col-md-1">Balance</th>
				<th colspan="2">OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<?php do {?>
			<form id="update<?php echo rand();?>" name="update<?php echo rand();?>" method="POST" action="<?php echo $editFormAction;?>">
				<tr>
					<th scope="row"><?php $serial++; echo $serial;?></th>
					<td><input name="period" type="text" id="period" class="form-control" value="<?php echo $row_transaction['period']; ?>"></td>
					<td><input name="trasno" type="text" id="trasno" class="form-control" value="<?php echo $row_transaction['trasno']; ?>"></td>
					<td><input name="description" type="text" id="description" class="form-control" value="<?php echo $row_transaction['description']; ?>"></td>
					<td>
						<select name="category" id="category" class="form-control">
							<option value="atm" <?php if (!(strcmp("atm", $row_transaction['category']))) {echo "selected";} ?>>ATM</option>
							<option value="charge" <?php if (!(strcmp("charge", $row_transaction['category']))) {echo "selected";} ?>>Charge</option>
							<option value="deposit" <?php if (!(strcmp("deposit", $row_transaction['category']))) {echo "selected";} ?>>Deposit</option>
							<option value="electronic" <?php if (!(strcmp("electronic", $row_transaction['category']))) {echo "selected";} ?>>Electronic</option>
							<option value="interest" <?php if (!(strcmp("interest", $row_transaction['category']))) {echo "selected";} ?>>Interest</option>
							<option value="pos" <?php if (!(strcmp("pos", $row_transaction['category']))) {echo "selected";} ?>>POS</option>
							<option value="transfer" <?php if (!(strcmp("transfer", $row_transaction['category']))) {echo "selected";} ?>>Transfer</option>
							<option value="withdrawal" <?php if (!(strcmp("withdrawal", $row_transaction['category']))) {echo "selected";} ?>>Withdrawal</option>
						</select>
					</td>
					<td>
						<select name="type" id="type" class="form-control">
							<option value="DR" <?php if (!(strcmp("DR", $row_transaction['type']))) {echo "selected";} ?>>Debit</option>
							<option value="CR" <?php if (!(strcmp("CR", $row_transaction['type']))) {echo "selected";} ?>>Credit</option>
						</select>
					</td>
					<td><input name="amount" type="text" id="amount" class="form-control" value="<?php echo $row_transaction['amount'];?>"></td>
					<td style="text-align: right;"><?php echo currencyToSymbol($currency).numFormat($row_transaction['balance']);?></td>
					<td style="border-right:0;">
						<input name="id" type="hidden" id="id" value="<?php echo $row_transaction['id'];?>">
						<input type="hidden" name="user" value="<?php echo getClient('uname', 'user');?>">
						<input type="hidden" name="Form_Update" value="updateIT">
						<input type="submit" name="button" id="button" class="btn btn-sm btn-primary" value="Save">
					</td>
					<td style="border-left:0;">
						<a href="transaction.php?deleteTransactionID=<?php echo $row_transaction['id'];?>&ClientID=<?php echo getClient('uname');?>" class="btn btn-sm btn-danger">Trash</a>
					</td>
				</tr>
			</form>
			<?php } while ($row_transaction = mysql_fetch_assoc($transaction));?>
			<tr>
			<?php ?>
				<td colspan="10" style="text-align: center;" class="<?php if(!inString($clientCalcBalance, '-')){echo 'bg-primary text-success';} else {echo 'bg-danger text-danger';}?>">Transaction Balance: <strong><?php echo currencyToSymbol($currency).numFormat($clientCalcBalance);?></strong></td>
			</tr>
			</tbody>
		</table>
		</div>
		<?php } ?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>