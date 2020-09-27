<?php require('../brux.php'); require('is_restrict.php');
$query_billing = "SELECT * FROM `billing` ORDER BY `id` ASC";
$billing = mysql_query($query_billing, $connect) or die(mysql_error());
$row_billing = mysql_fetch_assoc($billing);
$totalRows_billing = mysql_num_rows($billing);

if ((isset($_POST["Form_Insert"])) && ($_POST["Form_Insert"] == "InsertIT")){
	$addLine = 'Please enter your '.ucwords($_POST['acronym']).' code below';
	$insertSQL = sprintf("INSERT INTO `billing` (`buid`, `min_per`, `max_per`, `statement`, `acronym`, `title`, `line`, `label`, `value`,`next`) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
			GetSQLValueString(randomize('buid'), "text"),
			GetSQLValueString($_POST['min_per'], "text"),
			GetSQLValueString($_POST['max_per'], "text"),
			GetSQLValueString(rewriteRH($_POST['statement']), "text"),
			GetSQLValueString($_POST['acronym'], "text"),
			GetSQLValueString($_POST['title'], "text"),
			GetSQLValueString($addLine, "text"),
			GetSQLValueString($_POST['label'], "text"),
			GetSQLValueString($_POST['value'], "text"),
			GetSQLValueString($_POST['next'], "text"));
	$Result = mysql_query($insertSQL, $connect) or die(mysql_error());
	$insertGoTo = "code.php";
	header("Location: ".$insertGoTo);
}

$query_code = "SELECT * FROM `billing` ORDER BY `id` ASC";
$code = mysql_query($query_code, $connect) or die(mysql_error());
$row_code = mysql_fetch_assoc($code);
$totalRows_code = mysql_num_rows($code);

if ((isset($_POST["Form_Update"])) && ($_POST["Form_Update"] == "updateIT")){
	$updateSQL = sprintf("UPDATE `billing` SET `acronym`=%s, `label`=%s, `value`=%s, `title`=%s, `line`=%s, `statement`=%s, `min_per`=%s, `max_per`=%s, `next`=%s WHERE id=%s",
			GetSQLValueString($_POST['acronym'], "text"),
			GetSQLValueString($_POST['label'], "text"),
			GetSQLValueString($_POST['value'], "text"),
			GetSQLValueString($_POST['title'], "text"),
			GetSQLValueString($_POST['line'], "text"),
			GetSQLValueString($_POST['statement'], "text"),
			GetSQLValueString($_POST['min_per'], "text"),
			GetSQLValueString($_POST['max_per'], "text"),
			GetSQLValueString($_POST['next'], "text"),
			GetSQLValueString($_POST['id'], "int"));
	$Result = mysql_query($updateSQL, $connect) or die(mysql_error());
	$updateGoTo = "code.php";
	header("Location: ".$updateGoTo);
}

if ((isset($_GET['deleteCodeID'])) && ($_GET['deleteCodeID'] != "")){
	$deleteSQL = sprintf("DELETE FROM `billing` WHERE `id`=%s",
			GetSQLValueString($_GET['deleteCodeID'], "int"));
	$Result = mysql_query($deleteSQL, $connect) or die(mysql_error());
	$deleteGoTo = "code.php";
	header("Location: ".$deleteGoTo);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Administrator - Code</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Code</h1>
	<div class="container">
	<div class="page">
		<form id="addTrans" name="addTrans" method="POST" action="<?php echo $editFormAction;?>">
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">New Code</caption>
			<thead>
			<tr class="th">
				<th class="col-md-1">Acronym</th>
				<th class="col-md-1">Label</th>
				<th class="col-md-2">Value</th>
				<th class="col-md-1">Title</th>
				<th class="col-md-2">Statement</th>
				<th class="col-md-1">Minimum</th>
				<th class="col-md-1">Maximum</th>
				<th class="col-md-2">Next</th>
				<th class="col-md-1">OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<tr>
				<td><input name="acronym" type="text" id="acronym" class="form-control" value="" placeholder="COT"></td>
				<td><input name="label" type="text" id="label" class="form-control" value="" placeholder="COT Code"></td>
				<td><input name="value" type="text" id="value" class="form-control" value="<?php echo 'C'.mt_rand(100000, 999999).'TX';?>"></td>
				<td><input name="title" type="text" id="title" class="form-control" value="" placeholder="COT Required"></td>
				<td><input name="statement" type="text" id="statement" class="form-control" value="" placeholder="COT code is required for this transfer"></td>
				<td><input name="min_per" type="number" id="min_per" class="form-control" value="" placeholder="3"></td>
				<td><input name="max_per" type="number" id="max_per" class="form-control" value="" placeholder="47"></td>
				<td>
					<select name="next" id="next" class="form-control">
						<?php do {?>
						<option value="<?php echo $row_billing['buid'];?>"><?php echo $row_billing['acronym'];?></option>
						<?php } while ($row_billing = mysql_fetch_assoc($billing));?>
						<option value="completed">Completed</option>
					</select>
				</td>
				<td>
				<input type="hidden" name="Form_Insert" value="InsertIT">
				<input type="submit" name="button" id="button" class="btn btn-md btn-success" value="Create">
				</td>
			</tr>
			</tbody>
		</table>
		</div>
		</form>

		<?php if($totalRows_code == 0){?><p class="box bg-danger text-danger">You have no record</p><?php } else {?>
		<div class="table-responsive">
		<table class="table table-hover table-bordered table-striped">
			<caption class="caption">List of Code</caption>
			<thead>
			<tr class="th">
				<th class="col-md-1">Acronym</th>
				<th class="col-md-1">Label</th>
				<th class="col-md-1">Value</th>
				<th class="col-md-1">Title</th>
				<th class="col-md-2">Line</th>
				<th class="col-md-2">Statement</th>
				<th class="col-md-1">Minimum</th>
				<th class="col-md-1">Maximum</th>
				<th class="col-md-1">Next</th>
				<th class="col-md-1" colspan="2">OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<?php do {?>
			<form id="update<?php echo rand();?>" name="update<?php echo rand();?>" method="POST" action="<?php echo $editFormAction;?>">
			<tr>
				<td><input name="acronym" type="text" id="acronym" class="form-control" value="<?php echo $row_code['acronym'];?>"></td>
				<td><input name="label" type="text" id="label" class="form-control" value="<?php echo $row_code['label'];?>"></td>
				<td><input name="value" type="text" id="value" class="form-control" value="<?php echo $row_code['value'];?>"></td>
				<td><input name="title" type="text" id="title" class="form-control" value="<?php echo $row_code['title'];?>"></td>
				<td><input name="line" type="text" id="line" class="form-control" value="<?php echo $row_code['line'];?>"></td>
				<td><input name="statement" type="text" id="statement" class="form-control" value="<?php echo $row_code['statement'];?>"></td>
				<td><input name="min_per" type="number" id="min_per" class="form-control" value="<?php echo $row_code['min_per'];?>"></td>
				<td><input name="max_per" type="number" id="max_per" class="form-control" value="<?php echo $row_code['max_per'];?>"></td>
				<td>
					<select name="next" id="next" class="form-control">
						<?php
							$query_next = "SELECT * FROM `billing` WHERE `buid` <> '".$row_code['buid']."' ORDER BY `id` ASC";
							$next = mysql_query($query_next, $connect) or die(mysql_error());
							$row_next = mysql_fetch_assoc($next);
							$totalRows_next = mysql_num_rows($next);
						do {?>
						<option value="<?php echo $row_next['buid'];?>" <?php if (!(strcmp($row_next['buid'], $row_code['next']))) {echo "selected=\"selected\"";}?>><?php echo $row_next['acronym'];?></option>
						<?php } while ($row_next = mysql_fetch_assoc($next));?>
						<option value="completed" <?php if (!(strcmp("completed", $row_code['next']))) {echo "selected=\"selected\"";}?>>Completed</option>
					</select>
				</td>
				<td style="border-right: 0;">
					<input name="id" type="hidden" id="id" value="<?php echo $row_code['id'];?>">
					<input type="hidden" name="Form_Update" value="updateIT">
					<input type="submit" name="button" id="button" class="btn btn-sm btn-primary" value="Save">
				</td>
				<td style="border-left: 0;"><?php if($row_code['buid'] != '16935354'){?><a href="code.php?deleteCodeID=<?php echo $row_code['id'];?>" class="btn btn-sm btn-danger">Trash</a><?php }?></td>
			</tr>
			</form>
			<?php } while ($row_code = mysql_fetch_assoc($code));?>
			</tbody>
		</table>
		</div>
		<?php }?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>