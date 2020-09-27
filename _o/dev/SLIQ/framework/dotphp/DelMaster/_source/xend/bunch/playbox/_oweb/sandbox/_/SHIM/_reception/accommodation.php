<?php do_session(); $loc = getAppLoc(); require('../Connections/dbcon.php'); error_reporting(0);

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



<?php //PREP SEARCH
	if(isset($_GET['act']) && $_GET['act'] == 'search') { 
    	include("inc_search_accommodation.php");
	} else // END SEARCH PREP
	{ //BEGIN SHOW RESULT 
?>



<?php if ($totalRows_dataSet > 0) { // Show if recordset not empty ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="14" class="tabTitle" scope="col"><strong>RESULT</strong>    </td>
  </tr>
  <tr class="cellTitle">
    <th width="200" height="24" align="left" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">CUSTOMER</th>
    <th width="30" align="left" valign="middle" scope="col"><small>ROOM</small></th>
    <th width="150" align="left" valign="middle" scope="col"><small>SUITE</small></th>
    <th width="90" align="center" valign="middle" scope="col">CHECK-IN </th>
    <th width="100" align="center" valign="middle" scope="col"> <small>TO CHECK-OUT</small></th>
    <th width="50" align="center" valign="middle" scope="col"><small>STAYING?</small></th>
    <th width="80" align="center" valign="middle" scope="col">(&#8358;) COST</th>
    <th width="80" align="center" valign="middle" bgcolor="#FFC4C4" scope="col">(&#8358;) CREDIT</th>
    <th width="80" align="center" valign="middle" scope="col">(&#8358;) PAID </th>
    
    <th width="80" align="center" valign="middle" scope="col">(&#8358;) REFUND</th>
    <?php
    $showCheckOut = showUrlArea("check-out");
		if($showCheckOut == 'yes') { 
         		 ?> 
              <th width="50" align="center" valign="middle" scope="col"><small>CHECKOUT?</small></th>
              <?php } ?>
    <th width="170" align="center" valign="middle" scope="col">DATE</th>
  </tr>
  <?php  $sn = '0'; $TCost = '0'; $TDeposit = '0'; $ReFundBal = '0'; $CBal = '0'; ?>
<?php do { ?>
     
     <?php 
	 		if(isset($_GET['period'])) {
			$showtime = $row_dataSet['tuid'];
			$showtime = get_date($showtime, 'timedate');
				if($showtime == "{$_SESSION['timeDate']}") {?>

      <tr class="tabContent">
      
        <td height="22" align="left">
        <?php  
			//Personal Info for Display
			$PersonInfo = $row_dataSet['Customer'];
			$query_PersonInfo = "SELECT * FROM person_info WHERE `fuid` = '$PersonInfo'";
			$PersonInfo = mysql_query($query_PersonInfo, $dbcon) or die(mysql_error());
			$row_PersonInfo = mysql_fetch_assoc($PersonInfo);
			$totalRows_PersonInfo = mysql_num_rows($PersonInfo);
			echo $row_PersonInfo['FullName'];
					?>
        </td>
        <td align="left">
		<small>
		<?php  
			//Room Info for Display
			$RoomInfo = $row_dataSet['Room'];
			$query_RoomInfo = "SELECT * FROM rooms WHERE `fuid` = '$RoomInfo'";
			$RoomInfo = mysql_query($query_RoomInfo, $dbcon) or die(mysql_error());
			$row_RoomInfo = mysql_fetch_assoc($RoomInfo);
			$totalRows_RoomInfo = mysql_num_rows($RoomInfo);
			echo $row_RoomInfo['Title'];
		?>
        </small>
        </td>
        <td align="left">
        <small>
		<?php
        //Room Info for Display
			$SuiteInfo = $row_RoomInfo['RoomType'];
			$query_SuiteInfo = "SELECT * FROM room_type WHERE `fuid` = '$SuiteInfo'";
			$SuiteInfo = mysql_query($query_SuiteInfo, $dbcon) or die(mysql_error());
			$row_SuiteInfo = mysql_fetch_assoc($SuiteInfo);
			$totalRows_SuiteInfo = mysql_num_rows($SuiteInfo);
			echo $row_SuiteInfo['Title'];
			?>
            </small>
            </td>
        <td align="center" valign="middle"><small><?php echo do_date('QD1', $row_dataSet['CheckInDate']); ?></small></td>
        <td align="center" valign="middle"><small><?php echo do_date('QD1', $row_dataSet['CheckOutDate']); ?></small></td>
        <td align="center" valign="middle">
       	<small><?php if($row_dataSet['AccommodationStatus'] =='checked-in') { echo "yes"; } else { echo "no";} ?></small>
        </td>
        <td align="right" valign="middle"><small><?php echo number_format($row_dataSet['TotalCost'],2);  $TCost = ($TCost + $row_dataSet['TotalCost']); ?></small></td>
        <td align="right" valign="middle" bgcolor="#FFE8E8">
        				<small>
						<?php 
						if($rowDataBalance = strstr($row_dataSet['Balance'], '-')) {
							$rowDataBalance = str_replace('-', '', $row_dataSet['Balance']);
						echo number_format($rowDataBalance, 2);
						$CBal = ($CBal + $row_dataSet['Balance']);	
						}					
						?>
                        </small>
       	</td>
        <td align="right" valign="middle">
		
                        <small><?php if($row_dataSet['AmountDeposited'] > '0'){ echo number_format($row_dataSet['AmountDeposited'],2);} $TDeposit = ($TDeposit + $row_dataSet['AmountDeposited']); ?></small>
                        
        </td>
        <td align="right" valign="middle">
        		<small><?php 
						if($rowDataBalance = strstr($row_dataSet['Balance'], '-')) {
							$rowDataBalance = str_replace('-', '', $row_dataSet['Balance']);				
						} else {
							echo number_format($row_dataSet['Balance'],2);
							$ReFundBal = ($ReFundBal + $row_dataSet['Balance']);	
						}
						
						?></small>
                        
                        
                        
                        
    
                
              
        </td>
        <?php if($showCheckOut == 'yes') { ?>
        <td align="center">
        <?php if($row_dataSet['AccommodationStatus'] == 'checked-in'){ ?>
        <a class="infoNav" href="?url=check-out_reception&item=<?php echo $row_dataSet['suid']; ?>&ped=<?php echo $_GET['period'];?>">go</a>
        <?php }else { echo "done"; }?>
        </td>
        <?php } ?>
        <td align="center">
        <a class="infoNav2" href="?url=accommodation_reception&period=<?php echo $row_dataSet['tuid']; ?>">
		<small><?php echo get_date($row_dataSet['tuid'], 'report'); ?></small></a></td>
      </tr>
      <?php }
		}  else { // no sorting ?>
			
		<tr>
      
        <td height="22" align="left">
        <?php  
			//Personal Info for Display
			$PersonInfo = $row_dataSet['Customer'];
			$query_PersonInfo = "SELECT * FROM person_info WHERE `fuid` = '$PersonInfo'";
			$PersonInfo = mysql_query($query_PersonInfo, $dbcon) or die(mysql_error());
			$row_PersonInfo = mysql_fetch_assoc($PersonInfo);
			$totalRows_PersonInfo = mysql_num_rows($PersonInfo);
			echo $row_PersonInfo['FullName'];
					?>
        </td>
        <td align="left">
		<small>
		<?php  
			//Room Info for Display
			$RoomInfo = $row_dataSet['Room'];
			$query_RoomInfo = "SELECT * FROM rooms WHERE `fuid` = '$RoomInfo'";
			$RoomInfo = mysql_query($query_RoomInfo, $dbcon) or die(mysql_error());
			$row_RoomInfo = mysql_fetch_assoc($RoomInfo);
			$totalRows_RoomInfo = mysql_num_rows($RoomInfo);
			echo $row_RoomInfo['Title'];
		?>
        </small>
        </td>
        <td align="left">
        <small>
		<?php
        //Room Info for Display
			$SuiteInfo = $row_RoomInfo['RoomType'];
			$query_SuiteInfo = "SELECT * FROM room_type WHERE `fuid` = '$SuiteInfo'";
			$SuiteInfo = mysql_query($query_SuiteInfo, $dbcon) or die(mysql_error());
			$row_SuiteInfo = mysql_fetch_assoc($SuiteInfo);
			$totalRows_SuiteInfo = mysql_num_rows($SuiteInfo);
			echo $row_SuiteInfo['Title'];
			?>
            </small>
            </td>
        <td align="center" valign="middle"><small><?php echo do_date('QD1', $row_dataSet['CheckInDate']); ?></small></td>
        <td align="center" valign="middle"><small><?php echo do_date('QD1', $row_dataSet['CheckOutDate']); ?></small></td>
        <td align="center" valign="middle"><small><?php if($row_dataSet['AccommodationStatus'] =='checked-in') { echo "yes"; } else { echo "no";} ?></small></td>
        <td align="right" valign="middle"><small><?php echo number_format($row_dataSet['TotalCost'],2);  $TCost = ($TCost + $row_dataSet['TotalCost']); ?></small></td>
        <td align="right" valign="middle" bgcolor="#FFE8E8">
		
		
		<small>
		<?php 
						if($rowDataBalance = strstr($row_dataSet['Balance'], '-')) {
							$rowDataBalance = str_replace('-', '', $row_dataSet['Balance']);
						echo number_format($rowDataBalance,2);
						$CBal = ($CBal + $row_dataSet['Balance']);	
						}
					
						?>
                        </small>
						
		  </td>
        <td align="right" valign="middle"><small><?php if($row_dataSet['AmountDeposited'] > '0'){ echo number_format($row_dataSet['AmountDeposited'],2);} $TDeposit = ($TDeposit + $row_dataSet['AmountDeposited']); ?></small></td>
        <td align="right" valign="middle"> 
		<small>
		<?php 
						if($rowDataBalance = strstr($row_dataSet['Balance'], '-')) {
							$rowDataBalance = str_replace('-', '', $row_dataSet['Balance']);				
						} else {
							echo number_format($row_dataSet['Balance'],2);
							$ReFundBal = ($ReFundBal + $row_dataSet['Balance']);	
						}
						
						?></small></td>
        <?php if($showCheckOut == 'yes') {?>
        <td align="center"><?php if($row_dataSet['AccommodationStatus'] == 'checked-in'){ ?>
        <a class="infoNav" href="?url=check-out_reception&item=<?php echo $row_dataSet['suid']; ?>">go</a>
        <?php }else { echo "done"; }?></td>
        <?php } ?>
        <td align="center">
        <a class="infoNav2" href="?url=accommodation_reception&period=<?php echo $row_dataSet['tuid']; ?>">
		<small><?php echo get_date($row_dataSet['tuid'], 'report'); ?></small></a></td>
      </tr>
      
      <?php }  //no sorting show all ?>
      
      
     <?php } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
      <tr>
        <td height="26" colspan="6" align="right" style="border:0px; border-right:#CCC dotted 1px;"><strong>TOTAL</strong></td>
        <td align="right" valign="middle"><strong><?php echo number_format($TCost,2); ?></strong></td>
        <td align="right" valign="middle" bgcolor="#FFAAAA">
        
        <strong>
		<?php if($CBal = str_replace('-', '', $CBal)){
		 echo number_format($CBal,2);} ?></strong></td>
        <td align="right" valign="middle">
        <strong><?php echo number_format($TDeposit,2); ?>
		</strong>
         
        </td>
        <td align="right" valign="middle"><strong>
        <?php $ReFundBal = str_replace('-', '', $ReFundBal);
		if($ReFundBal > '0') {
		 echo number_format($ReFundBal); }?></strong>
        </td>
        
      </tr>
     
</table>

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

 <br />
  <br />
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>ACCOMMODATION SUMMARY</strong></td>
  </tr>
  <tr class="tabContent">
    <td height="50" colspan="6" align="left" valign="middle" style="text-transform:none; padding-left:20px;">
             
        <div style="width:500px; text-align:right;">
       <p>GENERATED INCOME: <?php echo sprintf("%'.-100s%3.2",'',$TCost); ?>
        <strong>&#8358;<?php echo number_format($TCost,2); $summaryAccTCost = $TCost; ?></strong><br /><br /> 
           
        CASH RECIEVED: <?php echo sprintf("%'.100s%3.2",'',''); ?>
        <strong>&#8358;<?php $TotalIncome = ($TCost - $CBal); echo @number_format($TotalIncome,2);  $summaryAccTotalIncome = $TotalIncome;?></strong><br /><br />
        
        CREDIT OWED: <?php echo sprintf("%'.-100s%3.2",'',''); ?>
        <strong>&#8358;<?php if($CBal = str_replace('-', '', $CBal)){
		 echo number_format($CBal,2);}   $summaryAccCBal = $CBal; ?></strong>
        </p>
     </div>
    </td>
  </tr>
</table>


<?php } //END SEARCH-RESULT SECTION ?>

