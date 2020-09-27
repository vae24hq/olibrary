<?php require('../Connections/dbcon.php'); $loc = getAppLoc();  ?>
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

if ((isset($_POST['suid'])) && ($_POST['suid'] != "") && (isset($_POST['run_process']))) {
  $deleteSQL = sprintf("DELETE FROM `inventory_item` WHERE suid=%s",
                       GetSQLValueString($_POST['suid'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($deleteSQL, $dbcon) or die(mysql_error());

  $deleteGoTo = "./?url=notification&loc=$loc&act=vipbar-item-deleted&success";
  header(sprintf("Location: %s", $deleteGoTo));
}



$colname_DataSet = "-1";
if (isset($_GET['item'])) {
  $colname_DataSet = $_GET['item'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_DataSet = sprintf("SELECT * FROM inventory_item WHERE suid = %s", GetSQLValueString($colname_DataSet, "text"));
$DataSet = mysql_query($query_DataSet, $dbcon) or die(mysql_error());
$row_DataSet = mysql_fetch_assoc($DataSet);
$totalRows_DataSet = mysql_num_rows($DataSet);
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<?php if ($totalRows_DataSet == 0) { // Show if recordset empty ?>
 
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
    <tr>
      <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>NOTIFICATION</strong></td>
    </tr>
    <tr class="tabContent infoError">
      <td height="50" colspan="6" align="left" valign="middle" style="text-transform:none; padding-left:20px;">RECORD NOT FOUND!</td>
    </tr>
</table>
<?php } // Show if recordset empty ?>

 
 <?php if ($totalRows_DataSet > 0) { // Show if recordset not empty ?>
 <form action="" method="post" name="DeleteRecord" id="DeleteRecord">

 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
    <tr>
      <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>CONFIRMATION</strong></td>
     </tr>
    <tr class="tabContent">
      <td height="80" colspan="6" align="left" valign="middle" style="text-transform:none; padding-left:20px; padding-bottom:20px;">
      <p>You have requested to delete <strong><?php echo $row_DataSet['Title']; ?></strong> from the resturant menu.</p>


      <span class="infoError h3">Are you sure you want to delete this record?</span><br />
      Click on <strong>delete record</strong> button to confirm or simply leave this page to cancel.

      
   
      </td>
     </tr>
  </table>
  
  <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
    <tr>
      <td align="center" valign="middle"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
        <tr>
          <td colspan="2" align="left" valign="middle" scope="row">&nbsp;</td>
        </tr>
        <tr>
          <th align="right" valign="middle" scope="row"> <input name="run_process" type="hidden" id="run_process" value="go" />            <input name="suid" type="hidden" id="suid" value="<?php echo $row_DataSet['suid']; ?>" /></th>
          <td class="buttonCell"><input type="submit" name="SaveBtn" id="SaveBtn" value="Delete Record"  /></td>
        </tr>
        </table></td>
</tr>
    <tr>
      <td align="center" valign="middle"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
        <tr> </tr>
        <tr> </tr>
        <tr> </tr>
        <tr> </tr>
      </table></td>
    </tr>
  </table>
 </form> 
  <?php } // Show if recordset not empty ?>
<?php
mysql_free_result($DataSet);
?>
