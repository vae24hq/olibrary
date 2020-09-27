<?php do_session(); $loc = getAppLoc(); require('../Connections/dbcon.php');?>
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


$currentPage = currentPage();

$maxRows_DataSet = 20;
$pageNum_DataSet = 0;
if (isset($_GET['pageNum_DataSet'])) {
  $pageNum_DataSet = $_GET['pageNum_DataSet'];
}
$startRow_DataSet = $pageNum_DataSet * $maxRows_DataSet;
mysql_select_db($database_dbcon, $dbcon);

$query_DataSet = "SELECT * FROM inventory_item WHERE InvStore = '0550783'";

		if(isset($_GET['show']) && $_GET['show'] != '') {
			$showOnly = $_GET['show'];
			if($showOnly == 'service'){
				$query_DataSet .= " AND ItemType = 'service'";
			}
			elseif($showOnly == 'drinks') {
				$query_DataSet .= " AND InvCat = 'UK3650462408254FB1362928458TX' AND ItemType = 'comodity'";
			}
			elseif($showOnly == 'bear') {
				$query_DataSet .= " AND InvCat = 'RM7485836922389FC1362928509OW' AND ItemType = 'comodity'";
			}
			elseif($showOnly == 'wine') {
				$query_DataSet .= " AND InvCat = 'VJ5917748801774FC1362928434UZ' AND ItemType = 'comodity'";
			}
			else {
				$query_DataSet .= " AND `Title` LIKE '{$_GET['show']}%'";
			}
		}
				
		if(isset($_GET['sorting'])) {
			$query_DataSet .= " ORDER BY {$_GET['sorting']} {$_GET['order']}";
		}
		else {
			$query_DataSet .= " ORDER BY Title ASC";
		}		

$query_limit_DataSet = sprintf("%s LIMIT %d, %d", $query_DataSet, $startRow_DataSet, $maxRows_DataSet);
$DataSet = mysql_query($query_limit_DataSet, $dbcon) or die(mysql_error());
$row_DataSet = mysql_fetch_assoc($DataSet);

if (isset($_GET['totalRows_DataSet'])) {
  $totalRows_DataSet = $_GET['totalRows_DataSet'];
} else {
  $all_DataSet = mysql_query($query_DataSet);
  $totalRows_DataSet = mysql_num_rows($all_DataSet);
}
$totalPages_DataSet = ceil($totalRows_DataSet/$maxRows_DataSet)-1;

$queryString_DataSet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_DataSet") == false && 
        stristr($param, "totalRows_DataSet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_DataSet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_DataSet = sprintf("&totalRows_DataSet=%d%s", $totalRows_DataSet, $queryString_DataSet);
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td height="20" colspan="7" align="left" valign="middle" class="tabTitle" scope="col">
    <strong>
    <?php if ($totalRows_DataSet == 0) { echo "NO "; }?> RESULT
    </strong>
    <?php if ($totalRows_DataSet > 0) {?>
    <span style="text-transform:none;">
    (showing <?php echo ($startRow_DataSet + 1) ?> - <?php echo min($startRow_DataSet + $maxRows_DataSet, $totalRows_DataSet) ?> of <?php echo $totalRows_DataSet ?>)
    </span>
    <?php } ?>
    
    <span style="float:right; padding-right:10px; display:inline; text-transform:none;">
    	<?php if ($pageNum_DataSet > 0) { ?>
  		<a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, 0, $queryString_DataSet); ?>">First</a>
        ~
        <a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, max(0, $pageNum_DataSet - 1), $queryString_DataSet); ?>">Previous</a>        
        <?php if ($pageNum_DataSet < $totalPages_DataSet) { ?>
        ~
        <?php } 
		}
		
		if ($pageNum_DataSet < $totalPages_DataSet) { ?>
        <a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, min($totalPages_DataSet, $pageNum_DataSet + 1), $queryString_DataSet); ?>">Next</a>
        ~
        <a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, $totalPages_DataSet, $queryString_DataSet); ?>">Last</a>
        <?php } ?>
    </span>
    </td>
  
    
    </td>
  </tr>
  <tr class="cellTitle">
    <th width="30" height="24" align="center" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">S/N</th>
    <th align="left" valign="middle" scope="col">DESCRIPTION
    <span style="float:clear; text-transform:none;">    
    <a href="?<?php cleanUrlSort("Title"); ?>" class="infoNav2"><small><?php echo toggleSortOrder("Title"); ?></small></a>
    <?php inc("../_application/util_showAlpha.php"); ?>
    </span>
    </th>
    
    <th width="30" height="24" align="center" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">QTY</th>
    
    <th width="120" align="right" valign="middle" scope="col">
    <span style="float:left; text-transform:none;">    
    <a href="?<?php cleanUrlSort("UnitPrice"); ?>" class="infoNav2"><small><?php echo toggleSortOrder("UnitPrice"); ?></small></a>
    </span>
    (&#8358;) AMOUNT
    </th>
    
   <?php
      		$rowNo = $startRow_DataSet;
					 
   		$showManage = showUrlArea("manage");
		if($showManage == 'yes') { 
         		 ?> 
   <td width="2" rowspan="<?php echo $maxRows_DataSet + 1; ?>" align="center" valign="middle" bgcolor="#FFFFFF" class="viewTabHr" scope="col">&nbsp;</td>
   <th width="40" align="center" valign="middle" scope="col" >UPDATE</th>
   <th width="40" align="center" valign="middle" scope="col"  >DELETE</th>
    <?php } ?>
  </tr>
  
  
      <?php if ($totalRows_DataSet > 0) { ?>
        <?php do {  //REPEAT RECORD?>
       <tr class="tabContent"> 
        <td height="30" align="center" valign="middle" scope="col"><?php echo $rowNo = $rowNo + 1; ?></td>
          <td align="left" style="text-transform:none;">
		  <?php echo $row_DataSet['Title']; ?>
          
          
          <?php $showPOS = showUrlArea("pos"); if($showPOS == 'yes') { ?>
           <?php
		   		if(!isset($_SESSION['InvoiceNo']) || ($_SESSION['InvoiceNo'] == '')) {
					$genInvoiceNo = do_rand('cusid'); 
					$_SESSION['InvoiceNo'] = $genInvoiceNo;
					}
					
				$InvoiceNo = $_SESSION['InvoiceNo']; 
			?>
           <div style="float:right">
           <?php if($row_DataSet['QtyInStore'] > '0') { ?>
           <form action="./?url=invoice_vip-bar&invoice=<?php echo $InvoiceNo?>&loc=<?php echo $loc;?>" method="post" name="posForm" id="posForm">
          
            <input name="InvoiceNo" type="hidden" id="InvoiceNo" value="<?php echo $InvoiceNo; ?>">
            <input name="PosItemName" type="hidden" id="PosItemName" value="<?php echo $row_DataSet['Title']; ?>">
            <input name="UnitPrice" type="hidden" id="UnitPrice" value="<?php echo $row_DataSet['UnitPrice']; ?>">
            <input name="suid" type="hidden" id="suid" value="<?php echo do_rand('s'); ?>">
         	<input name="tuid" type="hidden" id="tuid" value="<?php echo do_rand('t'); ?>">
         	<input name="fuid" type="hidden" id="fuid" value="<?php echo do_rand('f'); ?>">
            <input name="run_process" type="hidden" id="run_process" value="go" />
            <input name="Period" type="hidden" id="Period" value="<?php echo unix_time(); ?>" />
            <input name="QtyInStore" type="hidden" id="QtyInStore" value="<?php echo $row_DataSet['QtyInStore']; ?>" />
            <input name="ItemSuid" type="hidden" id="ItemSuid" value="<?php echo $row_DataSet['suid']; ?>" />
            <label>Quantiy:&nbsp;</label>
              <input name="Qty" type="text" id="Qty" value="1" size="1" />
            
<input type="submit" name="POSBtn" id="POSBtn" value="Sell" class="btnSmall"/>
          
           </form>
           <?php }
		   elseif($row_DataSet['ItemType'] == 'service') { ?>
           ...          
           <?php } else { ?>
           
           Out of Stock!
           <?php } ?>
          </div>
          <?php } ?>
          
          </td>
          
         <td align="center" valign="middle">
		 <?php if($row_DataSet['ItemType'] == 'service') { echo "infinite"; } else { echo $row_DataSet['QtyInStore']; } ?>
         </td>
         <td align="right" valign="middle"><?php echo number_format($row_DataSet['UnitPrice'], '2'); ?></td>
          
        <?php if($showManage == 'yes') { ?>
         <td align="center" valign="middle">
           <a href="?url=update-item_vip-bar&item=<?php echo $row_DataSet['suid']; ?>&loc=<?php echo $loc; ?>" class="btnUpdate">Go</a>
         </td> 
         <td align="center" valign="middle"> 
           <a href="?url=delete-item_vip-bar&item=<?php echo $row_DataSet['suid']; ?>&loc=<?php echo $loc; ?>" class="btnDelete">Go</a>
         </td>
         <?php } ?>
        </tr>
       
        <?php } while ($row_DataSet = mysql_fetch_assoc($DataSet)); //END REPEAT RECORD 
	  } else { //end show if record found ?>        
  <tr class="tabContent infoError">
     <?php if($showManage == 'yes') { $colspan = '6'; } else {$colspan = '3'; } ?>
      <td height="60" colspan="6" align="center" valign="middle" scope="col" style="text-transform:none;">There were no records found!</td>
       </tr>
   <?php } ?>
</table>
<?php
mysql_free_result($DataSet);
?>
