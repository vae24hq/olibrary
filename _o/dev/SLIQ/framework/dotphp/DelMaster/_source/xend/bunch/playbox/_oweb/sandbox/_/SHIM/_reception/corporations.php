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

mysql_select_db($database_dbcon, $dbcon);
$query_DataSet = "SELECT * FROM corporate_info ORDER BY Corporation ASC";
$DataSet = mysql_query($query_DataSet, $dbcon) or die(mysql_error());
$row_DataSet = mysql_fetch_assoc($DataSet);
$totalRows_DataSet = mysql_num_rows($DataSet);
?>


<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>


<?php if ($totalRows_DataSet > 0) { // Show if recordset not empty ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="7" class="tabTitle" scope="col"><strong>RESULT</strong> 
   
    
   
    </td>
  </tr>
  <tr class="cellTitle">
    <th width="50" align="center" valign="middle" scope="col" style="border-left:solid 1px #EFEFEF;">S/N</th>
    <th width="120" align="left" valign="middle" scope="col">CORPORATION ID</th>
    <th align="left" valign="middle" scope="col">CORPORATION NAME</th>
    <th width="160" align="left" valign="middle" scope="col">ACRONYM</th>
    <th width="90" align="left" valign="middle" scope="col">TYPE </th>
    
    <th width="120" align="center" valign="middle" scope="col">DATE</th>
  </tr>
  <?php  $sn = ''; ?>

    <?php do { ?>
      <tr class="tabContent">
        <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
        <td align="left"><?php echo $row_DataSet['CustomerID']; ?>
        
        <td align="left">
         
            <?php echo $row_DataSet['Corporation']; ?>
          
        </td>
        <td align="left" valign="middle" >
        <?php echo $row_DataSet['Acronym']; ?></td>
        <td align="left" valign="middle"><?php echo $row_DataSet['CustomerType']; ?></td>
        
        
        <td align="center"><?php echo get_date($row_DataSet['tuid'], 'report'); ?></td>
      </tr>
      <?php } while ($row_DataSet = mysql_fetch_assoc($DataSet)); ?>
</table>

<?php } // Show if recordset not empty ?>

<?php if ($totalRows_DataSet == 0) { // Show if recordset empty ?>
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
mysql_free_result($DataSet);
?>
