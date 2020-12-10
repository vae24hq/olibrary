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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateForm")) {
  $updateSQL = sprintf("UPDATE inventory_item SET Title=%s, Acronym=%s, `Description`=%s, UnitPrice=%s WHERE suid=%s",
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Acronym'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['UnitPrice'], "int"),
                       GetSQLValueString($_POST['suid'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "./?url=notification&loc=$loc&act=restaurant-menu-updated&success";
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_DataSet = "-1";
if (isset($_GET['item'])) {
  $colname_DataSet = $_GET['item'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_DataSet = sprintf("SELECT * FROM inventory_item WHERE suid = %s LIMIT 1", GetSQLValueString($colname_DataSet, "text"));
$DataSet = mysql_query($query_DataSet, $dbcon) or die(mysql_error());
$row_DataSet = mysql_fetch_assoc($DataSet);
$totalRows_DataSet = mysql_num_rows($DataSet);
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<script src="../script/spry/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<?php if ($totalRows_DataSet > 0) { // Show if recordset not empty ?>

<form action="<?php echo $editFormAction; ?>" method="POST" name="UpdateForm" id="UpdateForm">
<table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
    <tr>
      <td align="center" valign="middle">
        <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
          <tr>
            <td colspan="2" align="left" valign="middle" scope="row">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="middle" scope="row">Please complete the form below with correct information</td>
          </tr>
          <tr>
            <td height="14" colspan="2" class="spacer" scope="row">P</td>
          </tr>
          <tr>
    <th align="right" valign="middle" scope="row"><label for="Title">Title:</label></th>
    <td style="min-width:440px;" align="left" valign="middle"><span id="spryTitle">
      <input name="Title" type="text" id="Title" tabindex="1" value="<?php echo $row_DataSet['Title']; ?>" size="50">
      <span class="textfieldRequiredMsg">Required!</span></span></td>
    </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Acronym">Acronym:</label></th>
            <td align="left" valign="middle"><span id="spryAcronym">
              <input name="Acronym" type="text" id="Acronym" tabindex="2" value="<?php echo $row_DataSet['Acronym']; ?>" size="20">
</span></td>
          </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row"><label for="UnitPrice">Amount:</label></th>
            <td align="left" valign="middle"><span id="spryUnitPrice">
              
              <input name="UnitPrice" type="text" id="UnitPrice" tabindex="3" value="<?php echo $row_DataSet['UnitPrice']; ?>" size="10">
            <span class="textfieldRequiredMsg"></span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Description">Description:</label>
            </th>
            <td align="left" valign="middle"><span id="spryDescription">
              
              <textarea name="Description" id="Description" cols="50" tabindex="8"><?php echo $row_DataSet['Description']; ?></textarea>
</span></td>
          </tr>
          
          <tr>
            <td colspan="2" class="spacer" height="8">
              <input name="suid" type="hidden" id="suid" value="<?php echo $row_DataSet['suid']; ?>">
            <input name="Period" type="hidden" id="Period" value="<?php echo unix_time(); ?>" /></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
              <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="9">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Reset" tabindex="10"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
<input type="hidden" name="MM_update" value="UpdateForm">
</form>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryDescription", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryAcronym", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryTitle", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryUnitPrice", "none", {validateOn:["blur", "change"]});
</script>
<?php } // Show if recordset not empty ?>
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
<?php
mysql_free_result($DataSet);
?>
