<?php 
do_session();
//do_authenticate();
//is_StaffRestrict();

require("../Connections/dbcon.php");

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
                       GetSQLValueString($_POST['UnitPrice'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?url=action-completed_inventory&opp=create-item&return=success";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //$insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_storeList = "SELECT * FROM hr_set WHERE IsStore = 'yes' ORDER BY Title ASC";
$storeList = mysql_query($query_storeList, $dbcon) or die(mysql_error());
$row_storeList = mysql_fetch_assoc($storeList);
$totalRows_storeList = mysql_num_rows($storeList);

mysql_select_db($database_dbcon, $dbcon);
$query_categoryList = "SELECT * FROM inventory_category ORDER BY SubSetOf, Title, Title ASC";
$categoryList = mysql_query($query_categoryList, $dbcon) or die(mysql_error());
$row_categoryList = mysql_fetch_assoc($categoryList);
$totalRows_categoryList = mysql_num_rows($categoryList);
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>

<script src="../script/spry/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">
  
  
  <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
    <tr>
      <td align="center" valign="middle">
        <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
          <tr>
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
          </tr>
          <tr>
            
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
            <th align="right" valign="middle" scope="row"><label for="QtyInStore">Qty InStore:</label></th>
            <td align="left" valign="middle"><span id="spryQtyInStore">
              
              <input name="QtyInStore" type="text" id="QtyInStore" tabindex="4" value="0" size="5">
            <span class="textfieldRequiredMsg"></span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="ItemType">Item Type:</label></th>
            <td align="left" valign="middle">
             <section class="container">
                
                <div class="dropdown"><span id="spryItemType" >
              
              <select name="ItemType" id="ItemType" class="dropdown-select" tabindex="5">
                <option>Select</option>
                <option value="comodity" selected>Comodity</option>
                <option value="service" >Service</option>
              </select>
            <span class="selectRequiredMsg"></span></span>
            </div>
            </section></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="InvCat">Category:</label></th>
            <td align="left" valign="middle">  
              <section class="container">
                
                <div class="dropdown"><span id="spryInvCat">
                  <select name="InvCat" id="InvCat" class="dropdown-select" tabindex="6">
                    <option value="">Select</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_categoryList['fuid']?>"><?php echo $row_categoryList['Title']?></option>
                    <?php
} while ($row_categoryList = mysql_fetch_assoc($categoryList));
  $rows = mysql_num_rows($categoryList);
  if($rows > 0) {
      mysql_data_seek($categoryList, 0);
	  $row_categoryList = mysql_fetch_assoc($categoryList);
  }
?>
                  </select>
                <span class="selectRequiredMsg"></span></span></div>  
                
              </section>
            </td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="InvStore">Store:</label></th>
            <td align="left" valign="middle">
              
             <section class="container">
                
                <div class="dropdown">
                <span id="spryInvStore">
                 <select name="InvStore" id="InvStore" class="dropdown-select" tabindex="7">
                   <option value="">Select</option>
                   <?php
do {  
?>
                   <option value="<?php echo $row_storeList['fuid']?>"><?php echo $row_storeList['Title']?></option>
                   <?php
} while ($row_storeList = mysql_fetch_assoc($storeList));
  $rows = mysql_num_rows($storeList);
  if($rows > 0) {
      mysql_data_seek($storeList, 0);
	  $row_storeList = mysql_fetch_assoc($storeList);
  }
?>
                 </select>
            <span class="selectRequiredMsg">&nbsp;</span></span>
            </div>
            </section>
            </td>
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
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
              <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="9">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Clear" tabindex="10"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="CreateForm">
</form>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryDescription", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryAcronym", "none", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryTitle", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryInvCat");
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryUnitPrice", "none", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryQtyInStore");
var spryselect2 = new Spry.Widget.ValidationSelect("spryInvStore");
var spryselect3 = new Spry.Widget.ValidationSelect("spryItemType");
</script>
</body>
</html><?php
mysql_free_result($storeList);

mysql_free_result($categoryList);
?>
