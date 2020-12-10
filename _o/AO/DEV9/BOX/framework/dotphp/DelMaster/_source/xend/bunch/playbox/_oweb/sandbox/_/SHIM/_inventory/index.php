<?php require('../Connections/dbcon.php'); ?>
<?php
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

$maxRows_expensData = 30;
$pageNum_expensData = 0;
if (isset($_GET['pageNum_expensData'])) {
  $pageNum_expensData = $_GET['pageNum_expensData'];
}
$startRow_expensData = $pageNum_expensData * $maxRows_expensData;

mysql_select_db($database_dbcon, $dbcon);


$sqlQuery = "SELECT * FROM inventory_category";


		//SET QUERY FOR STORES
		if(isset($_GET['store']) && $_GET['store'] != '') {			
			$getstore = $_GET['store'];
			
			
			if($getstore == '0330783') {//Restaurant
			$sqlQuery .= " WHERE `fuid` IN ('UK3650462408254FB1362928458TX', 'UP8185332608557GD1362938623TZ')";
			} 
			elseif($getstore == '0550783') { //VIP Bar
			$sqlQuery .= " WHERE `fuid` IN ('VJ5917748801774FC1362928434UZ', 'UK3650462408254FB1362928458TX', 'RM7485836922389FC1362928509OW','UP8185332608557GD1362938623TZ')";
			}
			elseif($getstore == '665232') { //Bush Bar
			$sqlQuery .= " WHERE `fuid` IN ('VJ5917748801774FC1362928434UZ', 'UK3650462408254FB1362928458TX', 'RM7485836922389FC1362928509OW', 'TM7359360929307HC1362932487SZ')";
			}
					
		
		}
		


$sqlQuery .= " ORDER BY `Title`";
$query_expensData = $sqlQuery; 
//$query_expensData = "SELECT * FROM expenditure ORDER BY Period DESC";
$query_limit_expensData = sprintf("%s LIMIT %d, %d", $query_expensData, $startRow_expensData, $maxRows_expensData);
$expensData = mysql_query($query_limit_expensData, $dbcon) or die(mysql_error());
$row_expensData = mysql_fetch_assoc($expensData);

if (isset($_GET['totalRows_expensData'])) {
  $totalRows_expensData = $_GET['totalRows_expensData'];
} else {
  $all_expensData = mysql_query($query_expensData);
  $totalRows_expensData = mysql_num_rows($all_expensData);
}
$totalPages_expensData = ceil($totalRows_expensData/$maxRows_expensData)-1;

$queryString_expensData = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_expensData") == false && 
        stristr($param, "totalRows_expensData") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_expensData = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_expensData = sprintf("&totalRows_expensData=%d%s", $totalRows_expensData, $queryString_expensData);
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>


<?php if ($totalRows_expensData > 0) { // Show if recordset not empty ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="7" class="tabTitle" scope="col"><strong>RESULT</strong> 
    <span style="text-transform:none;">
    (Showing <?php echo ($startRow_expensData + 1) ?> - 
	<?php echo min($startRow_expensData + $maxRows_expensData, $totalRows_expensData) ?> of 
	<?php echo $totalRows_expensData ?>   records)</span>
    
    
     <span style="float:right; padding-right:10px; text-transform:none;"> 
     <a href="<?php printf("%s?pageNum_expensData=%d%s", $currentPage, 0, $queryString_expensData); ?>">First</a> ~ 
     <a href="<?php printf("%s?pageNum_expensData=%d%s", $currentPage, min($totalPages_expensData, $pageNum_expensData + 1), $queryString_expensData); ?>">Next</a> ~ 
     <a href="<?php printf("%s?pageNum_expensData=%d%s", $currentPage, max(0, $pageNum_expensData - 1), $queryString_expensData); ?>">Previous</a> ~ 
     <a href="<?php printf("%s?pageNum_expensData=%d%s", $currentPage, $totalPages_expensData, $queryString_expensData); ?>">Last</a>
     </span>
    </td>
  </tr>
  <tr class="cellTitle">
    <th width="30" align="center" valign="middle" scope="col" style="border-left:solid 1px #EFEFEF;">S/N</th>
    <th width="200" align="left" valign="middle" scope="col">CATEGORY</th>
    <th width="80" align="center" valign="middle" scope="col">TYPE</th>
    <th align="left" valign="middle" scope="col">DETAILS</th>
    <th width="160" align="left" valign="middle" scope="col"><small>SUB of</small> CATEGORY</th>
    
    <th width="120" align="center" valign="middle" scope="col">DATE <a href="?url=inventory&sort=date">[sort]</a></th>
  </tr>
  <?php  $sn = ''; ?>

    <?php do { ?>
      <tr>
        <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
        <td align="left">
		<?php echo $row_expensData['Title']; ?>
        <span style="float:right;">
        <a href="?url=items_inventory&store=<?php echo $_SESSION['store']; ?>&cate=<?php echo $row_expensData['fuid']; ?>" class="infoNav2">view</a>
        </span>
          
        </td>
        
        
         <td align="center" valign="middle" >
         <?php
		 //GET INVENTORY ITEMS
		 	$invQuery = "SELECT * FROM inventory_item WHERE ";
		 
		 //SET QUERY FOR STORES
		if(isset($_GET['store']) && $_GET['store'] != '') {			
			$getstore = $_GET['store'];
			//store array
			$storearray = array('0330783','0550783','665232');		
			
			if(in_array($getstore, $storearray)) {
			$invQuery .= " `InvStore` = '$getstore' AND";
			}
		
		
		}
		 mysql_select_db($database_dbcon, $dbcon);
		//$query_invStore = "SELECT * FROM inventory_item WHERE InvCat = '$row_expensData[fuid]' ORDER BY Title ASC";
		$invQuery .= " `InvCat` = '$row_expensData[fuid]'";
		$query_invStore = $invQuery;
		$invStore = mysql_query($query_invStore, $dbcon) or die(mysql_error());
		$row_invStore = mysql_fetch_assoc($invStore);
		$totalRows_invStore = mysql_num_rows($invStore);
		?> 
        
         
        <?php echo $totalRows_invStore; ?>
        
        
        
        
        </td>
        
        
        <td align="left">         
            <?php echo $row_expensData['Description']; ?>          
        </td>
        <td align="left" valign="middle" >
        <?php
        mysql_select_db($database_dbcon, $dbcon);
		$query_invCat = "SELECT * FROM inventory_category WHERE fuid = '$row_expensData[SubSetOf]' ORDER BY Title ASC";
		$invCat = mysql_query($query_invCat, $dbcon) or die(mysql_error());
		$row_invCat = mysql_fetch_assoc($invCat);
		$totalRows_invCat = mysql_num_rows($invCat);
		?>

        <a href="?url=inventory&cate=<?php echo $row_invCat['fuid']; ?>" class="infoNav">
		<?php echo $row_invCat['Title']; ?></a>
        <?php 
			if(!isset($_GET['sub'])) { 
		  			if($totalRows_invCat > '0') {?>
        <span style="float:right;">
        <a href="?url=inventory&sub=<?php echo $row_invCat['fuid']; ?>" class="infoNav2">view</a>
        </span>
        <?php }
		} ?>
        </td>
        
        <td align="center"><?php echo get_date($row_expensData['tuid'], 'report'); ?></td>
      </tr>
      <?php } while ($row_expensData = mysql_fetch_assoc($expensData)); ?>
</table>

<?php } else {
 echo "No Record Found";
} // Show if recordset empty ?>
<?php
mysql_free_result($expensData);
?>
