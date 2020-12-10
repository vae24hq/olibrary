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

$colname_DataSet = "-1";
if (isset($_SESSION['InvoiceNo'])) {
  $colname_DataSet = $_SESSION['InvoiceNo'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_DataSet = sprintf("SELECT * FROM pos_resturant_sales WHERE InvoiceNo = %s ORDER BY PosItemName ASC", GetSQLValueString($colname_DataSet, "text"));
$DataSet = mysql_query($query_DataSet, $dbcon) or die(mysql_error());
$row_DataSet = mysql_fetch_assoc($DataSet);
$totalRows_DataSet = mysql_num_rows($DataSet);


if ((isset($_POST["run_process"])) && ($_POST["run_process"] == "go")) {
	$calAmount = ($_POST['UnitPrice'] * $_POST['Qty']);
	$insertSQL = sprintf("INSERT INTO `pos_resturant_sales` (suid, tuid, fuid, InvoiceNo, PosItemName, Qty, UnitPrice, Amount) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['suid'], "text"),
                       GetSQLValueString($_POST['tuid'], "text"),
                       GetSQLValueString($_POST['fuid'], "text"),
                       GetSQLValueString($_POST['InvoiceNo'], "text"),
                       GetSQLValueString($_POST['PosItemName'], "text"),
                       GetSQLValueString($_POST['Qty'], "text"),
                       GetSQLValueString($_POST['UnitPrice'], "int"),
                       GetSQLValueString($calAmount, "int"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

$insertGoTo = "./?url=invoice_restaurant&invoice={$_SESSION['InvoiceNo']}&loc=$loc";
 header(sprintf("Location: %s", $insertGoTo));
}


if(isset($_POST['DoReciept'])) {
	mysql_select_db($database_dbcon, $dbcon);
	$updatesql = "UPDATE `pos_resturant_sales` SET RecordType = 'reciept' WHERE InvoiceNo = '{$_SESSION['InvoiceNo']}'";			
	$runq = mysql_query($updatesql, $dbcon) or die(mysql_error());

//DESTORY INVOICE SESSION
unset($_SESSION['InvoiceNo']);

//DESTROY ALL ABANDONED INVOICE



$updateGoTo = "./?url=notification&loc=$loc&act=restaurant-reciept-prepared&success";
header(sprintf("Location: %s", $updateGoTo));
	
}

?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
  
  
  <?php if ($totalRows_DataSet > 0) { // Show if recordset not empty ?>

  
  
  
  
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
    <tr>
      <td colspan="7" class="tabTitle" scope="col"><small><strong>RECEIPT</strong></small></td>
    </tr>
    <tr class="cellTitle">
      <th width="10" align="center" valign="middle" scope="col" style="border-left:solid 1px #EFEFEF;">S/N</th>
      <th width="120" align="left" valign="middle" scope="col">ITEM</th>
      <th width="40" align="center" valign="middle" scope="col">NO OF PLATES</th>
      <th width="80" align="right" valign="middle" scope="col">(&#8358;) UNIT PRICE</th>
      <th width="90" align="right" valign="middle" scope="col">(&#8358;) AMOUNT </th>
    </tr>
    <?php  $sn = ''; $TotalCost = ''; ?>
  
   
      <?php do { ?> 
      <tr>
        <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
        <td align="left"><?php echo $row_DataSet['PosItemName']; ?></td>
        <td align="center" valign="middle" ><?php echo $row_DataSet['Qty']; ?></td>
        <td align="right" valign="middle" ><?php echo number_format($row_DataSet['UnitPrice']); ?></td>
        <td align="right" valign="middle"><?php echo number_format($row_DataSet['Amount']);
	 $TotalCost = ($TotalCost + $row_DataSet['Amount']); ?></td>
      </tr>
      <?php } while ($row_DataSet = mysql_fetch_assoc($DataSet)); ?>
    
   
    <tr>
      <td height="30" colspan="4" align="right" valign="middle" scope="col"><strong>(&#8358) TOTAL</strong></td>
      <td align="right" valign="middle"><?php echo number_format($TotalCost); ?></td>
    </tr>
  </table>
  <table  border="0" align="center" cellpadding="0" cellspacing="0" class="moduleboxHolder">
    <tr>
      <td align="center" valign="middle">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab"> 
           <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
              <form action="" method="POST" name="UpdateForm" id="UpdateForm">
              <a href="?url=food-menu_restaurant&act=pos&loc=<?php echo $loc; ?>" class="btnUpdate">ADD MORE ITEMS TO THIS ORDER</a>
              &nbsp;&nbsp;or&nbsp;
              <input type="submit" name="DoReciept" id="DoReciept" value="Prepare Reciept">
           </form> </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
<?php } // Show if recordset not empty ?>
<?php if ($totalRows_DataSet == 0) { // Show if recordset empty ?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
    <tr>
      <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>NOTIFICATION</strong></td>
    </tr>
    <tr class="tabContent infoError">
      <td height="50" colspan="6" align="left" valign="middle" style="text-transform:none; padding-left:20px;">NO PENDING INVOICE FOUND!</td>
    </tr>
  </table>
<?php } // Show if recordset empty ?>
<?php
mysql_free_result($DataSet);
?>
