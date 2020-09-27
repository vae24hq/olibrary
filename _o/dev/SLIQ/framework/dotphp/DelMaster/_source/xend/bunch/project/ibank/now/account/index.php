<?php require('../brux.php'); require('is_restrict.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Client :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
<?php
include ('slice/header.php');
include ('slice/nav.php');
?>

<div class="frame resiframe" id="scrollbar">
	<iframe name="content" id="content" src="dashboard.php"></iframe>
</div>
<?php include('../in_foot.php');?>
</body>
</html>