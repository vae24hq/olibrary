<?php require('../brux.php'); require('is_restrict.php');
$query_mang = "SELECT * FROM `mang` ORDER BY `id` ASC";
$mang = mysql_query($query_mang, $connect) or die(mysql_error());
$row_mang = mysql_fetch_assoc($mang);
$totalRows_mang = mysql_num_rows($mang);

if((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "updateIT")){
	$updateSQL = sprintf("UPDATE `mang` SET `name`=%s, `user`=%s, `email`=%s, `password`=%s, `phone`=%s,`status`=%s WHERE `id`=%s",
			GetSQLValueString($_POST['name'], "text"),
			GetSQLValueString($_POST['user'], "text"),
			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['password'], "text"),
			GetSQLValueString($_POST['phone'], "text"),
			GetSQLValueString($_POST['status'], "text"),
			GetSQLValueString($_POST['id'], "int"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());
	$updateGoTo = "manager.php";
	if (isset($_SERVER['QUERY_STRING'])) {
		$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
		$updateGoTo .= $_SERVER['QUERY_STRING'];
	}
	header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_GET['deleteMangID'])) && ($_GET['deleteMangID'] != "")){
	$deleteSQL = sprintf("DELETE FROM `mang` WHERE id=%s",
			GetSQLValueString($_GET['deleteMangID'], "int"));
	$Result = mysql_query($deleteSQL, $connect) or die(mysql_error());
	$deleteGoTo = "success.php";
	header(sprintf("Location: %s", $deleteGoTo));
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Managers</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Managers</h1>
	<div class="container">
	<div class="page">
		<?php if($totalRows_mang == 0){?><p class="box bg-danger text-danger">You have no managers (This is an error)</p><?php } else {$serial = 0;?>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">List of Managers</caption>
			<thead>
			<tr class="th">
				<th class="col-md-3">Name</th>
				<th class="col-md-2">UserID</th>
				<th class="col-md-2">Email</th>
				<th class="col-md-1">Password</th>
				<th class="col-md-2">Phone</th>
				<th class="col-md-1">Status</th>
				<th class="col-md-1" colspan="2">OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<?php do {?>
			<tr>
				<?php if($row_mang['type'] != 'webadmin'){?>
				<form id="mang" name="mang" method="POST" action="<?php echo $editFormAction;?>">
				<td><input name="name" type="text" id="name" class="form-control" value="<?php echo $row_mang['name'];?>"></td>
				<td><input name="user" type="text" id="user" class="form-control" value="<?php echo $row_mang['user'];?>"></td>
				<td><input name="email" type="text" id="email" class="form-control" value="<?php echo $row_mang['email'];?>"></td>
				<td><input name="password" type="text" id="password" class="form-control" value="<?php echo $row_mang['password'];?>"></td>
				<td><input name="phone" type="text" id="phone" class="form-control" value="<?php echo $row_mang['phone'];?>"></td>
				<td style="border-right: 0;">
					<label class="radio-inline">
						<input type="radio" name="status" id="active" value="active" <?php if (!(strcmp("active", $row_mang['status']))) {echo "checked=\"checked\"";} ?>> Active
					</label>
					<br>
					<label class="radio-inline">
						<input type="radio" name="status" id="inactive" value="inactive" <?php if (!(strcmp("inactive", $row_mang['status']))) {echo "checked=\"checked\"";} ?>> Inactive
					</label>
				</td>
				<td style="border-right: 0;">
					<input name="id" type="hidden" id="id" value="<?php echo $row_mang['id']; ?>">
					<input type="hidden" name="Form_Update" value="updateIT">
					<input type="submit" name="button" id="button" class="btn btn-sm btn-success" value="Save">
				</td>
				</form>
				<td style="border-left: 0;">
					<a href="manager.php?deleteMangID=<?php echo $row_mang['id']; ?>" class="btn btn-sm btn-danger">Trash</a>
				</td>
				<?php } else {?>
				<td><?php echo $row_mang['name'];?></td>
				<td><?php echo $row_mang['user'];?></td>
				<td><?php echo $row_mang['email'];?></td>
				<td><?php echo $row_mang['password'];?></td>
				<td><?php echo $row_mang['phone'];?></td>
				<td></td>
				<td colspan="2"></td>
				<?php }?>
			</tr>
			<?php } while ($row_mang = mysql_fetch_assoc($mang));?>
			</tbody>
		</table>
		</div>
		<?php }?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>