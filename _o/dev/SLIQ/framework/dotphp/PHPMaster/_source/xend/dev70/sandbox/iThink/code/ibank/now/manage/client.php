<?php require('../brux.php'); require('is_restrict.php');
$query_clients = "SELECT * FROM `client` ORDER BY `fname` ASC";
$clients = mysql_query($query_clients, $connect) or die(mysql_error());
$row_clients = mysql_fetch_assoc($clients);
$totalRows_clients = mysql_num_rows($clients);

if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "updateIT")){
	$updateSQL = sprintf("UPDATE `client` SET status=%s WHERE `buid`=%s",
			GetSQLValueString($_POST['status'], "text"),
			GetSQLValueString($_POST['ClientID'], "int"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());
	$updateGoTo = "success.php";
	if (isset($_SERVER['QUERY_STRING'])){
		$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
		$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_GET['deleteClientID'])) && ($_GET['deleteClientID'] != "")){

	$query_passport = "SELECT `passport` FROM `client` WHERE `uname` ='".$_GET['deleteClientID']."'";
	$passport = mysql_query($query_passport, $connect) or die(mysql_error());
	$row_passport = mysql_fetch_assoc($passport);
	$imgPass ='../brux/upload/'.$row_passport['passport'];
	if(file_exists($imgPass)){unlink($imgPass);}

	$deleteSQL = sprintf("DELETE FROM `client` WHERE `uname`=%s",
			GetSQLValueString($_GET['deleteClientID'], "text"));
	$Result = mysql_query($deleteSQL, $connect) or die(mysql_error());

	$deleteSQL2 = sprintf("DELETE FROM `transfer` WHERE `user`=%s",
			GetSQLValueString($_GET['deleteClientID'], "text"));
	$Result2 = mysql_query($deleteSQL2, $connect) or die(mysql_error());

	$deleteSQL3 = sprintf("DELETE FROM `transaction` WHERE `user`=%s",
			GetSQLValueString($_GET['deleteClientID'], "text"));
	$Result3 = mysql_query($deleteSQL3, $connect) or die(mysql_error());

	$deleteGoTo = "success.php";
	header(sprintf("Location: %s", $deleteGoTo));
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Clients</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Clients</h1>
	<div class="container">
	<div class="page">
		<?php if($totalRows_clients == 0){?>
		<p class="box bg-danger">
			<span class="text-danger">You have no clients registered.<br>
			Please use the registration link on the website or <a href="../account/register.php" target="_blank">register a new client</a></span><br><br>
			<span class="bg-primary" style="padding: 3px 5px; line-height: 2.2;">CONTACT INFORMATION</span><br>
			<strong><?php echo webAdmin('name');?></strong><br>
			<strong class="text-primary"><?php echo webAdmin('email');?></strong><br>
			<strong class="text-primary"><?php echo webAdmin('phone');?></strong> <small>(WhatsApp)</small>
		</p>
		<?php } else {$serial = 0;?>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">List of Clients</caption>
			<thead>
			<tr class="th">
				<th>S/N</th>
				<th class="col-md-2">Account Name <small>[Number]</small></th>
				<th class="col-md-1">UserID <small>[PIN]</small></th>
				<th class="col-md-2">Email <small>[Password]</small></th>
				<th class="col-md-1">Balance</th>
				<th colspan="2">Status</th>
				<th class="col-md-2" colspan="2">Activity</th>
				<th class="col-md-1" colspan="2">OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<?php do {?>
			<tr>
				<th scope="row"><?php $serial++; echo $serial;?></th>
				<td>
				<?php 
					echo $row_clients['fname'].' '.$row_clients['mname'].' '.$row_clients['lname'];
					echo ' <br><small>[<strong>'.$row_clients['accountno'].'</strong>]</small>';
				?>
				</td>
				<td><?php echo $row_clients['uname']. '<br><small>[<strong>'. $row_clients['pin'].'</strong>]</small>';?></td>
				<td><?php echo $row_clients['email'] .' <br><small>['.$row_clients['passw'].']</small>';?></td>
				<td style="text-align: right;"><?php echo currencyToSymbol($row_clients['currency']).number_format($row_clients['accbal'], 2);?></td>
				<form id="updateForm" name="updateForm" method="POST" action="<?php echo $editFormAction;?>">
				<td style="border-right: 0;">
					<label class="radio-inline"><input type="radio" name="status" id="active" value="active" <?php if (!(strcmp("active", $row_clients['status']))) {echo "checked=\"checked\"";} ?>> Active</label><br>
					<label class="radio-inline"><input type="radio" name="status" id="inactive" value="inactive" <?php if (!(strcmp("inactive", $row_clients['status']))) {echo "checked=\"checked\"";} ?>> Inactive</label>
				</td>
				<td style="border-left: 0;">
					<input name="ClientID" type="hidden" id="ClientID" value="<?php echo $row_clients['buid'];?>">
					<input type="hidden" name="Form_Update" value="updateIT">
					<input type="submit" name="button" id="button" class="btn btn-sm btn-success" value="Save">
				</td>
				</form>
				<td style="border-right: 0;"><a href="transfer.php?ClientID=<?php echo $row_clients['uname'];?>" class="btn btn-sm btn-info">Transfer</a></td>
				<td style="border-left: 0;"><a href="transaction.php?ClientID=<?php echo $row_clients['uname']; ?>" class="btn btn-sm btn-warning">Transaction</a></td>
				<td style="border-right: 0;"><a href="update.php?ClientID=<?php echo $row_clients['uname']; ?>" class="btn btn-sm btn-primary">Update</a></td>
				<td style="border-left: 0;"><a href="client.php?deleteClientID=<?php echo $row_clients['uname'];?>" class="btn btn-sm btn-danger">Trash</a></td>
			</tr>
			<?php } while ($row_clients = mysql_fetch_assoc($clients));?>
			</tbody>
		</table>
		</div>
		<?php }?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>