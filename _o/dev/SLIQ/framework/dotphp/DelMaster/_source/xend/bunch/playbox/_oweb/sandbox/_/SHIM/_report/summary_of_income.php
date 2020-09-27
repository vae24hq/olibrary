<?php
require('../Connections/dbcon.php'); 

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

$timeNow = unix_time();
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="6" class="tabTitle" scope="col"><strong>RESULT</strong> 
    </td>
  </tr>
  <tr class="cellTitle">
    <th width="30" align="center" valign="middle" scope="col" style="border-left:solid 1px #EFEFEF;">S/N</th>
    <th align="left" valign="middle" scope="col">DEPARTMENT/STORE</th>
    
    <th width="120" align="right" valign="middle" scope="col">AMOUNT </th>
    
    <th width="160" align="center" valign="middle" scope="col">DATE</th>
  </tr>
    <?php $finalTotal = ''; ?>
   <tr>
        <td height="30" align="center" valign="middle" scope="col">1</td>
        <td align="left" valign="middle"><strong>Accommodation</strong></td>
        
        <td align="right" valign="middle">&nbsp;</td>
        
        <td align="center">&nbsp;</td>
      </tr>
   <tr>
     <td height="30" align="center" valign="middle" scope="col">2</td>
     <td align="left" valign="middle">Car Hire</td>
     <td align="right" valign="middle">&nbsp;</td>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td height="30" align="center" valign="middle" scope="col">3</td>
     <td align="left" valign="middle">gymnasium</td>
     <td align="right" valign="middle">&nbsp;</td>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td height="30" align="center" valign="middle" scope="col">4</td>
     <td align="left" valign="middle">confrence hall</td>
     <td align="right" valign="middle">&nbsp;</td>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td height="30" align="center" valign="middle" scope="col">5</td>
     <td align="left" valign="middle">swimming pool</td>
     <td align="right" valign="middle">&nbsp;</td>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td height="30" align="center" valign="middle" scope="col">6</td>
     <td align="left" valign="middle"><strong>Bush Bar</strong></td>
     <td align="right" valign="middle">
     <?php include("summBushbar.php"); ?>
     </td>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td height="30" align="center" valign="middle" scope="col">7</td>
     <td align="left" valign="middle"><strong>VIP Bar</strong></td>
     <td align="right" valign="middle">
     <?php include("summVIPbar.php"); ?>         
     </td>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td height="30" align="center" valign="middle" scope="col">8</td>
     <td align="left" valign="middle"><strong>Restaurant</strong></td>
     <td align="right" valign="middle"> <?php include("summRes.php"); ?>
     
     </td>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td height="30" colspan="2" align="right" valign="middle" scope="col">TOTAL</td>
     <td align="right" valign="middle"><?php echo "&#8358;". number_format($finalTotal); ?></td>
     <td align="center">&nbsp;</td>
   </tr>
  
</table>
<?php
mysql_free_result($posReciept);

mysql_free_result($dataSet);
?>
