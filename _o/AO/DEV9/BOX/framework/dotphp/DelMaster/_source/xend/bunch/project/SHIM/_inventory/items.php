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


if(isset($_POST['goupd'])) {
			$title = $_POST['Title'];
			$QtyInStore = $_POST['QtyInStore'];
			$suid = $_POST['suid'];
			$upsqlO = "UPDATE inventory_item SET Title = '$title', QtyInStore = '$QtyInStore' WHERE suid='$suid'";			
			$runq = mysql_query($upsqlO, $dbcon) or die(mysql_error());
			
}
			
			
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_expensData = 50;
$pageNum_expensData = 0;
if (isset($_GET['pageNum_expensData'])) {
  $pageNum_expensData = $_GET['pageNum_expensData'];
}
$startRow_expensData = $pageNum_expensData * $maxRows_expensData;

mysql_select_db($database_dbcon, $dbcon);


$sqlQuery = "SELECT * FROM inventory_item";

	//SEARCH PARAMETERS
	if(isset($_GET['store']) && $_GET['store'] != '' && isset($_GET['cate']) && $_GET['cate'] !='') {  //IF STORE and CATEGORY issset
		$urlstore = $_GET['store'];
		$urlcategory = $_GET['cate'];
		$sqlQuery .= " WHERE `InvStore` = '$urlstore' AND `InvCat` = '$urlcategory'";	
	}


    //SORTING
	if(isset($_GET['sort']) && $_GET['sort'] != '') {
		$sorting = $_GET['sort'];
		if($sorting = 'name') {
			$sortvalue = 'Title';
		}
		else {
			$sortvalue = 'Title';
		}
		$sqlQuery .= " ORDER BY $sortvalue ASC";
	}
	
/* if(isset($_GET['cate'])) {
	$urlshow = $_GET['cate'];
	$sqlQuery .= " WHERE `InvCat` = '$urlshow' ORDER BY Title ASC";
}
elseif(isset($_GET['store'])) {
	$urlshow = $_GET['store'];
	$sqlQuery .= " WHERE `InvStore` = '$urlshow' ORDER BY Title ASC";

}
else {
	$sqlQuery .= " ORDER BY Title ASC";
} */

$query_expensData = $sqlQuery; 
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
    <td colspan="9" class="tabTitle" scope="col"><strong>RESULT</strong> 
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
    <th width="220" align="left" valign="middle" scope="col">ITEMS</th>
    <th width="200" align="left" valign="middle" scope="col">CATEGORY</th>
    <th width="120" align="left" valign="middle" scope="col">STORE</th>
    <th width="50" align="center" valign="middle" scope="col">PRICE</th>
    <th width="50"  align="center" valign="middle" scope="col"><?php if(isset($_GET['update'])) {?><small>QUANTITY </small><?php } else { ?> STOCK<?php }?> </th>
    
    <th width="120" align="center" valign="middle" scope="col">
    <?php if(isset($_GET['update'])) {?>ACTION<?php } else { ?>DATE <?php } ?></th>
  </tr>
  <?php  $sn = $startRow_expensData; ?>

    <?php do { ?>
      <form id="add" name="add" method="post" action="">
       <tr>
        <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
        <td align="left">
        <?php if(isset($_GET['update'])) {?>
        <input name="Title" type="text" id="Title" value="<?php echo $row_expensData['Title']; ?>" />
        <?php } else {  echo $row_expensData['Title']; } ?>
         </td>
        <td align="left">
        	<?php
			mysql_select_db($database_dbcon, $dbcon);
			$query_invCat = "SELECT * FROM inventory_category WHERE fuid = '$row_expensData[InvCat]'";
			$invCat = mysql_query($query_invCat, $dbcon) or die(mysql_error());
			$row_invCat = mysql_fetch_assoc($invCat);
			$totalRows_invCat = mysql_num_rows($invCat);
			?>
            <a href="?url=inventory&cate=<?php echo $row_invCat['fuid']; ?>" class="infoNav">
		<?php echo $row_invCat['Title']; ?></a> 
            
            
             <?php 
			if(!isset($_GET['cate'])) { 
		  			if($totalRows_invCat > '0') {?>
        <span style="float:right;">
        <a href="?url=items_inventory&cate=<?php echo $row_invCat['fuid']; ?>" class="infoNav2">sort</a>
        </span>
        <?php }
		} ?>
        </td>
        <td align="left">
          <?php
			mysql_select_db($database_dbcon, $dbcon);
			$query_invStore = "SELECT * FROM hr_set WHERE fuid = '$row_expensData[InvStore]' AND IsStore = 'yes'";
			$invStore = mysql_query($query_invStore, $dbcon) or die(mysql_error());
			$row_invStore = mysql_fetch_assoc($invStore);
			$totalRows_invStore = mysql_num_rows($invStore);
			?>
          <?php echo $row_invStore['Title']; ?>
          
          
          <?php 
			if(!isset($_GET['store'])) { 
		  			if($totalRows_invCat > '0') {?>
          <span style="float:right;">
          <a href="?url=items_inventory&store=<?php echo $row_invStore['fuid']; ?>" class="infoNav2">sort</a>
          </span>
          <?php }
		} ?>
          
        </td>
        
        
         <td align="right" valign="middle" >
         <?php if(isset($_GET['update'])) {?>
        <input name="UnitPrice" type="text" id="UnitPrice" value="<?php echo $row_expensData['UnitPrice']; ?>" />
        <?php } else {  echo "&#8358;". number_format($row_expensData['UnitPrice']); } ?>
		</td>
        
        <td width="20" align="center" valign="middle" >
         <?php if(isset($_GET['update'])) {?>
          <input name="QtyInStore" type="text" id="QtyInStore" value="<?php echo $row_expensData['QtyInStore']; ?>" size="20" />
          <?php } else { echo $row_expensData['QtyInStore']; } ?> 
       </td>
        
      
        
         
       
        
                
        
        <td  align="center" valign="middle" >
		<?php if(isset($_GET['update'])) {?><input type="submit" name="GoBtn" id="GoBtn" value="Save" />
         <input name="suid" type="hidden" id="suid" value="<?php echo $row_expensData['suid']; ?>" />
         <input name="goupd" type="hidden" id="goupd" value="yea" /></td>
        <?php } else { ?>
        <?php echo get_date($row_expensData['tuid'], 'report'); ?>
        <?php } ?>
        
        </td>
      </tr> </form>
      <?php } while ($row_expensData = mysql_fetch_assoc($expensData)); ?>
</table>

<?php } else {
 echo "No Record Found";
} // Show if recordset empty ?>
<?php
mysql_free_result($expensData);
?>
