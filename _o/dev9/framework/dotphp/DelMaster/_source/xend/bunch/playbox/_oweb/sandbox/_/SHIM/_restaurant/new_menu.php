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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "CreateForm")) {
  $insertSQL = sprintf("INSERT INTO inventory_item (suid, tuid, fuid, Title, Acronym, `Description`, ItemType, InvCat, InvStore, QtyInStore, UnitPrice) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Suid'], "text"),
                       GetSQLValueString($_POST['Tuid'], "text"),
                       GetSQLValueString($_POST['Fuid'], "text"),
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Acronym'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['ItemType'], "text"),
                       GetSQLValueString($_POST['InvCat'], "text"),
                       GetSQLValueString($_POST['InvStore'], "text"),
                       GetSQLValueString($_POST['QtyInStore'], "text"),
                       GetSQLValueString($_POST['UnitPrice'], "int"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?url=notification&loc=$loc&act=restaurant-menu-added&success";
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>

<script src="../script/spry/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">
  
  
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
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
          </tr>
          <tr>
    <th align="right" valign="middle" scope="row"><label for="Title">Title:</label></th>
    <td style="min-width:440px;" align="left" valign="middle"><span id="spryTitle">
      <input name="Title" type="text" id="Title" tabindex="1" size="34">
      <span class="textfieldRequiredMsg">Required!</span></span></td>
    </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Acronym">Acronym:</label></th>
            <td align="left" valign="middle"><span id="spryAcronym">
              <input name="Acronym" type="text" id="Acronym" tabindex="2" size="20">
</span></td>
          </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row"><label for="UnitPrice">Unit Price:</label></th>
            <td align="left" valign="middle"><span id="spryUnitPrice">
              
              <input name="UnitPrice" type="text" id="UnitPrice" size="10" tabindex="3">
            <span class="textfieldRequiredMsg"></span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Description">Description:</label>
            </th>
            <td align="left" valign="middle"><span id="spryDescription">
              
              <textarea name="Description" id="Description" cols="30" tabindex="8"></textarea>
</span></td>
          </tr>
          
          <tr>
            <td colspan="2" class="spacer" height="8">
              <input name="Suid" type="hidden" id="Suid" value="<?php echo do_rand('s'); ?>">
              <input name="Tuid" type="hidden" id="Tuid" value="<?php echo do_rand('t'); ?>">
              <input name="Fuid" type="hidden" id="Fuid" value="<?php echo do_rand('f'); ?>">
            <input name="run_process" type="hidden" id="run_process" value="go" />
            <input name="Period" type="hidden" id="Period" value="<?php echo unix_time(); ?>" /></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <input name="InvStore" type="hidden" id="InvStore" value="0330783"> 
            <input name="InvCat" type="hidden" id="InvCat" value="UP8185332608557GD1362938623TZ">
            <input name="ItemType" type="hidden" id="ItemType" value="service">
            <input name="QtyInStore" type="hidden" id="QtyInStore" value="0">
            </th>
            <td class="buttonCell">
              <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="9">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Clear" tabindex="10"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="CreateForm" />
</form>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryDescription", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryAcronym", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryTitle", "none", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryUnitPrice", "none", {validateOn:["blur", "change"]});
</script>