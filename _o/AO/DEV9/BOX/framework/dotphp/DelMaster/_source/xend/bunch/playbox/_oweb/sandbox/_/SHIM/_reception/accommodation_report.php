<?php do_session(); $loc = getAppLoc(); require('../Connections/dbcon.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}



$currentPage = $_SERVER["PHP_SELF"];

$maxRows_dataSet = 20;
$pageNum_dataSet = 0;
if (isset($_GET['pageNum_dataSet'])) {
  $pageNum_dataSet = $_GET['pageNum_dataSet'];
}
$startRow_dataSet = $pageNum_dataSet * $maxRows_dataSet;

mysql_select_db($database_dbcon, $dbcon);

//sort by date
if(isset($_GET['period'])) {
	$timeDate = $_GET['period'];
	$timeDate = get_date($timeDate, 'timedate');
	$_SESSION['timeDate'] = $timeDate;
}



$query_dataSet = "SELECT * FROM accommodation WHERE `AccommodationStatus` !='open' ORDER BY tuid DESC";
$query_limit_dataSet = sprintf("%s LIMIT %d, %d", $query_dataSet, $startRow_dataSet, $maxRows_dataSet);
$dataSet = mysql_query($query_limit_dataSet, $dbcon) or die(mysql_error());
$row_dataSet = mysql_fetch_assoc($dataSet);

if (isset($_GET['totalRows_dataSet'])) {
  $totalRows_dataSet = $_GET['totalRows_dataSet'];
} else {
  $all_dataSet = mysql_query($query_dataSet);
  $totalRows_dataSet = mysql_num_rows($all_dataSet);
}
$totalPages_dataSet = ceil($totalRows_dataSet/$maxRows_dataSet)-1;

$queryString_dataSet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_dataSet") == false && 
        stristr($param, "totalRows_dataSet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_dataSet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_dataSet = sprintf("&totalRows_dataSet=%d%s", $totalRows_dataSet, $queryString_dataSet);


?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<?php if ($totalRows_dataSet > 0) { // Show if recordset not empty ?>


  <?php  $sn = '0'; $TCost = '0'; $TDeposit = '0'; $ReFundBal = '0'; $CBal = '0'; 
   do { 
	 		if(isset($_GET['period'])) {
			$showtime = $row_dataSet['tuid'];
			$showtime = get_date($showtime, 'timedate');
				if($showtime == "{$_SESSION['timeDate']}") {
					 $TCost = ($TCost + $row_dataSet['TotalCost']);  
						if($rowDataBalance = strstr($row_dataSet['Balance'], '-')) {
							$rowDataBalance = str_replace('-', '', $row_dataSet['Balance']);
						
						$CBal = ($CBal + $row_dataSet['Balance']);	
						}
						
						$TDeposit = ($TDeposit + $row_dataSet['AmountDeposited']); 
						
						if($rowDataBalance = strstr($row_dataSet['Balance'], '-')) {
							$rowDataBalance = str_replace('-', '', $row_dataSet['Balance']);				
						} else {
							
							$ReFundBal = ($ReFundBal + $row_dataSet['Balance']);	
						}
						
						 }
		}  else { // no sorting ?
		  $TCost = ($TCost + $row_dataSet['TotalCost']);
		
						if($rowDataBalance = strstr($row_dataSet['Balance'], '-')) {
							$rowDataBalance = str_replace('-', '', $row_dataSet['Balance']);
						
						$CBal = ($CBal + $row_dataSet['Balance']);	
						}
					
						 $TDeposit = ($TDeposit + $row_dataSet['AmountDeposited']); 
		$ReFundBal = str_replace('-', '', $ReFundBal);
		
		 }  //no sorting show all ?>
      
      
     <?php } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
      

<?php }?>

<?php if ($totalRows_dataSet == 0) { // Show if recordset empty ?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
    <tr>
      <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>NOTIFICATION</strong></td>
    </tr>
    <tr class="tabContent infoError">
      <td height="50" colspan="6" align="left" valign="middle" style="text-transform:none; padding-left:20px;">NO RECORD FOUND!</td>
    </tr>
  </table>
<?php } // Show if recordset empty ?>
<?php
mysql_free_result($dataSet);
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>ACCOMMODATION SUMMARY</strong></td>
  </tr>
  
  <tr class="cellTitle">
     <th height="24" align="left" valign="middle" scope="col"> TITLE </th>
     <th width="120" align="right" valign="middle" scope="col"> AMOUNT </th>
   </tr>
   
   
  <tr class="tabContent">
  <td height="30" align="left" valign="middle" style="text-transform:none;">
  GENERATED INCOME
  </td>
  
  <td align="right" valign="middle">
   <strong>&#8358;<?php echo number_format($TCost,2); ?></strong>
  </td>
  </tr>
  
  <tr class="tabContent">
  <td height="30" align="left" valign="middle" style="text-transform:none;">
 CASH RECIEVED</td>
  
  <td align="right" valign="middle">
   <strong>&#8358;
          <?php 
		  $CBal = str_replace('-', '', $CBal);
		 
		 $TotalIncome = ($TCost - $CBal); echo number_format($TotalIncome,2); ?>
          </strong>
  </td>
  </tr>
  
  <tr class="tabContent">
  <td height="30" align="left" valign="middle" style="text-transform:none;">
  CREDIT</td>
  
  <td align="right" valign="middle">
   <strong>&#8358; <?php if($CBal = str_replace('-', '', $CBal)){
		 echo number_format($CBal,2);} ?>
        </strong>
  </td>
  </tr>
  
  
   
</table>

