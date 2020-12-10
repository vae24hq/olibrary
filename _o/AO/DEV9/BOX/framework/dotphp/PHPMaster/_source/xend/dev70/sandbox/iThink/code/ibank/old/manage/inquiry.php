<?php require('../brux.php'); require('is_restrict.php');
$maxRows_inquiry = 1;
$pageNum_inquiry = 0;
if (isset($_GET['pageNum_inquiry'])){$pageNum_inquiry = $_GET['pageNum_inquiry'];}
$startRow_inquiry = $pageNum_inquiry * $maxRows_inquiry;

$query_inquiry = ("SELECT * FROM `inquiry` ORDER BY `id`");
$query_limit_inquiry = sprintf("%s LIMIT %d, %d", $query_inquiry, $startRow_inquiry, $maxRows_inquiry);
$inquiry = mysql_query($query_limit_inquiry, $connect) or die(mysql_error());
$row_inquiry = mysql_fetch_assoc($inquiry);

if (isset($_GET['totalRows_inquiry'])){$totalRows_inquiry = $_GET['totalRows_inquiry'];}
else {
	$all_inquiry = mysql_query($query_inquiry);
	$totalRows_inquiry = mysql_num_rows($all_inquiry);
}
$totalPages_inquiry = ceil($totalRows_inquiry/$maxRows_inquiry)-1;

$queryString_inquiry = "";
if (!empty($_SERVER['QUERY_STRING'])){
	$params = explode("&", $_SERVER['QUERY_STRING']);
	$newParams = array();
	foreach ($params as $param){
		if (stristr($param, "pageNum_inquiry") == false && 
			stristr($param, "totalRows_inquiry") == false) {
			array_push($newParams, $param);
		}
	}
if (count($newParams) != 0){$queryString_inquiry = "&" . htmlentities(implode("&", $newParams));}
}
$queryString_inquiry = sprintf("&totalRows_inquiry=%d%s", $totalRows_inquiry, $queryString_inquiry);

if ((isset($_GET['deleteInquiryID'])) && ($_GET['deleteInquiryID'] != "")){
	$deleteSQL = sprintf("DELETE FROM `inquiry` WHERE id=%s",
			GetSQLValueString($_GET['deleteInquiryID'], "int"));
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
<title>Administrator - Inquiry</title>
<?php include('../in_head.php');?>
</head>

<body>
	<?php require('slice/header.php');?>
	<h1 class="heading">Inquiry</h1>
	<div class="container">
	<div class="page">
		<?php if($totalRows_inquiry == 0){?>
		<p class="box bg-danger text-danger">You have no records</p>
		<?php } else{?>
		<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<caption class="caption">Inquiry Information
				<span class="menu">
					<?php if($totalRows_inquiry > 0){
						echo 'Showing '.($startRow_inquiry + 1);
						if($totalRows_inquiry > 1){
							echo ' - '.min($startRow_inquiry + $maxRows_inquiry, $totalRows_inquiry).' of '.$totalRows_inquiry;
						}
						echo ' Record(s)';
					}?>
				</span>
				<?php if($totalRows_inquiry > 1){?>
				<span class="menu">
					<a href="<?php printf("%s?pageNum_inquiry=%d%s", $currentPage, 0, $queryString_inquiry); ?>">First</a> -
					<a href="<?php printf("%s?pageNum_inquiry=%d%s", $currentPage, min($totalPages_inquiry, $pageNum_inquiry + 1), $queryString_inquiry); ?>">Next</a> -
					<a href="<?php printf("%s?pageNum_inquiry=%d%s", $currentPage, max(0, $pageNum_inquiry - 1), $queryString_inquiry); ?>">Previous</a> -
					<a href="<?php printf("%s?pageNum_inquiry=%d%s", $currentPage, $totalPages_inquiry, $queryString_inquiry); ?>">Last</a>
				</span>
			<?php }?>
			</caption>
			<thead>
			<tr class="th">
				<th colspan="1" class="col-md-10">Message</th>
				<th colspan="1" class="col-md-2">OPERATION</th>
			</tr>
			</thead>
			<tbody class="regular">
			<tr>
				<td colspan="1" rowspan="5">
					<p class="bg-primary" style="padding: 5px 10px;">
						<strong><?php echo strtoupper($row_inquiry['subject']);?></strong> -
						<?php echo $row_inquiry['buid'];?> / <?php echo $row_inquiry['entry'];?>
					</p>
					<div style="padding: 4px;"><?php echo nl2br($row_inquiry['message']);?></div>
					<hr>
					<?php echo '<strong>'.$row_inquiry['name'].'</strong><br>'.$row_inquiry['email'].' | '.$row_inquiry['phone'];?>
				</td>
				<td style="text-align: center;">
					<a href="inquiry.php?deleteInquiryID=<?php echo $row_inquiry['id'];?>" class="btn btn-md btn-danger">Delete</a>
				</td>
			</tr>
			</tbody>
		</table>
		</div>
		<?php }?>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>
<?php mysql_free_result($inquiry);?>