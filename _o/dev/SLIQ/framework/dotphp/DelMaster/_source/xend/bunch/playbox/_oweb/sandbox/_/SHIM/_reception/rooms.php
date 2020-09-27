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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "updateForm")) {
  $updateSQL = sprintf("UPDATE rooms SET Title=%s, `Description`=%s, RoomType=%s WHERE suid=%s",
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['RoomType'], "text"),
                       GetSQLValueString($_POST['suid'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());
}

$maxRows_dataSet = 20;
$pageNum_dataSet = 0;
if (isset($_GET['pageNum_dataSet'])) {
  $pageNum_dataSet = $_GET['pageNum_dataSet'];
}
$startRow_dataSet = $pageNum_dataSet * $maxRows_dataSet;

mysql_select_db($database_dbcon, $dbcon);

					//get record of all room type
					mysql_select_db($database_dbcon, $dbcon);
					$query_allRoomType = "SELECT * FROM room_type";
					$allRoomType = mysql_query($query_allRoomType, $dbcon) or die(mysql_error());
					$row_allRoomType = mysql_fetch_assoc($allRoomType);
					$totalRows_allRoomType = mysql_num_rows($allRoomType);
					
					

			//PROCESS room query
			$query_dataSet = "SELECT * FROM rooms WHERE `puid` > '0'";
			
			//if ROOM IS SEARCHED
			if(isset($_GET['roomno']) && $_GET['roomno'] != '') {
				$query_dataSet .=" AND `Title` = '{$_GET['roomno']}'";
			}
			
			//if SUITE IS SELECTED
			if(isset($_GET['suite']) && $_GET['suite'] != '') {
				$query_dataSet .=" AND `RoomType` = '{$_GET['suite']}'";
			}

	  		//PROCESS room state
			if(isset($_GET['state']) && $_GET['state'] != '') {
				if($_GET['state'] == 'open') {
				$query_dataSet .=" AND `Status` = 'available'";
				}
				elseif($_GET['state'] == 'booked') {
				$query_dataSet .=" AND `Status` = 'instay'";
				}
			}
			
$query_dataSet .= " ORDER BY Title DESC";
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



$showManage = showUrlArea("manage");
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>


<?php if ($totalRows_dataSet > 0) { // Show if recordset not empty ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="9" class="tabTitle" scope="col"><strong>RESULT</strong> 
    <span style="text-transform:none;">
    (Showing <?php echo ($startRow_dataSet + 1) ?> - 
	<?php echo min($startRow_dataSet + $maxRows_dataSet, $totalRows_dataSet) ?> of 
	<?php echo $totalRows_dataSet ?>   records)</span>
    
    
     <span style="float:right; padding-right:10px; text-transform:none;"> 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, 0, $queryString_dataSet); ?>">First</a> ~ 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, min($totalPages_dataSet, $pageNum_dataSet + 1), $queryString_dataSet); ?>">Next</a> ~ 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, max(0, $pageNum_dataSet - 1), $queryString_dataSet); ?>">Previous</a> ~ 
     <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, $totalPages_dataSet, $queryString_dataSet); ?>">Last</a>
     </span>
    </td>
  </tr>
  <tr class="cellTitle">
    <th width="30" height="24" align="center" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">S/N</th>
    <th width="100" align="left" valign="middle" scope="col">ROOM</th>
    <th align="left" valign="middle" scope="col">DETAILS</th>
    <th width="160" align="left" valign="middle" scope="col">SUITE</th>
    <th width="100" align="center" valign="middle" scope="col">STATUS</th>
    <th width="70" align="right" valign="middle" scope="col">(&#8358;) DEPOSIT</th>
    <th width="70" align="right" valign="middle" scope="col">(&#8358;) PRICE </th>
    
    <?php if($showManage == 'yes') {?>
    <th width="50" align="center" valign="middle" scope="col">ACTION</th>
    <?php } ?>
  </tr>
  <?php  $sn = ''; ?>

    <?php do { ?>
    
    
    <?php //for editing room info
	  if(isset($_GET['act']) && $_GET['act'] == 'manage') {?>
     
     <form action="<?php echo $editFormAction; ?>" method="POST" name="updateForm" id="updateForm">
      <tr>
        <td height="30" align="center" valign="middle" scope="col">
                  <?php echo $sn = ($sn + 1) ?></td>
        <td align="left"><input name="Title" type="text" id="Title" value="<?php echo $row_dataSet['Title'];?>" size="10">
        <input name="suid" type="hidden" id="suid" value="<?php echo $row_dataSet['suid']; ?>"></td>
        <td align="left" valign="middle"><textarea name="Description" id="Description" cols="45" rows="1"><?php echo $row_dataSet['Description'];?></textarea></td>
        <td align="left" valign="middle">
			<?php //suites
					$Suite4Row = $row_dataSet['RoomType'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_getSuite = "SELECT * FROM room_type WHERE `fuid` = '$Suite4Row'";
					$getSuite = mysql_query($query_getSuite, $dbcon) or die(mysql_error());
					$row_getSuite = mysql_fetch_assoc($getSuite);
					$totalRows_getSuite = mysql_num_rows($getSuite);
					 ?>
         <section class="container">
     
     <div class="dropdown">
     <select name="RoomType" class="dropdown-select" id="RoomType">
            <?php
do {  
?>
            <option value="<?php echo $row_allRoomType['fuid']?>"<?php if (!(strcmp($row_allRoomType['fuid'], $row_dataSet['RoomType']))) {echo "selected=\"selected\"";} ?>><?php echo $row_allRoomType['Title']?></option>
            <?php
} while ($row_allRoomType = mysql_fetch_assoc($allRoomType));
  $rows = mysql_num_rows($allRoomType);
  if($rows > 0) {
      mysql_data_seek($allRoomType, 0);
	  $row_allRoomType = mysql_fetch_assoc($allRoomType);
  }
?>
        </select>
        </div>
        </section></td>
        <td align="center" valign="middle"><?php echo $row_dataSet['Status']; ?></td>
        <td align="right" valign="middle">
        <?php echo number_format($row_getSuite['Deposit'],2); ?>
          
        </td>
        <td align="right" valign="middle"><?php echo number_format($row_getSuite['Price'],2); ?></td>
        
        
        <?php if($showManage == 'yes') {?>
        <td align="center">
        <input type="submit" name="updateBtn" id="updateBtn" value="Save">
        </td>
        <?php } ?>
        
      </tr>
      <input type="hidden" name="MM_update" value="updateForm">
     </form>
      <?php } else { ?>
      
      
  <tr>
        <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
  <td align="left"><?php echo $row_dataSet['Title']; ?></td>
        <td align="left"><?php echo $row_dataSet['Description']; ?></td>
        <td align="left">
			<?php //suites
					$Suite4Row = $row_dataSet['RoomType'];
					mysql_select_db($database_dbcon, $dbcon);
					$query_getSuite = "SELECT * FROM room_type WHERE `fuid` = '$Suite4Row'";
					$getSuite = mysql_query($query_getSuite, $dbcon) or die(mysql_error());
					$row_getSuite = mysql_fetch_assoc($getSuite);
					$totalRows_getSuite = mysql_num_rows($getSuite);
					echo $row_getSuite['Title']; ?>
   </td>
        <td align="center" valign="middle"><?php echo $row_dataSet['Status']; ?></td>
        <td align="right" valign="middle">
         
          <?php echo number_format($row_getSuite['Deposit'], 2); ?>
          
        </td>
        <td align="right" valign="middle"><?php echo number_format($row_getSuite['Price'], 2); ?></td>
        
        
       
      </tr>
      <?php } ?>
      
      
      <?php } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
</table>

<?php } else {
 echo "No Record Found";
} // Show if recordset empty ?>
<?php
mysql_free_result($dataSet);

mysql_free_result($allRoomType);
?>
