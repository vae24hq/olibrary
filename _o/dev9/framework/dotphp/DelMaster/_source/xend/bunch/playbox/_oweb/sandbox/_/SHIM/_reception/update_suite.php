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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "UpdateForm")) {
  $updateSQL = sprintf("UPDATE room_type SET Title=%s, Acronym=%s, `Description`=%s, Price=%s, Deposit=%s, Status=%s WHERE suid=%s",
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Acronym'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['Price'], "text"),
                       GetSQLValueString($_POST['Deposit'], "text"),
                       GetSQLValueString($_POST['Status'], "text"),
                       GetSQLValueString($_POST['suid'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $updateGoTo = "./?url=notification&loc=$loc&act=reception-suite-updated&success";
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_DataSet = "-1";
if (isset($_GET['item'])) {
  $colname_DataSet = $_GET['item'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_DataSet = sprintf("SELECT * FROM room_type WHERE fuid = %s", GetSQLValueString($colname_DataSet, "text"));
$DataSet = mysql_query($query_DataSet, $dbcon) or die(mysql_error());
$row_DataSet = mysql_fetch_assoc($DataSet);
$totalRows_DataSet = mysql_num_rows($DataSet);
?>
<link rel="stylesheet" media="screen" type="text/css" href="../script/css/screen.css">
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">

<link href="../script/spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css">

<link href="../script/spry/SpryValidationSelect.css" rel="stylesheet" type="text/css">

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
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
          </tr>
         
          
<tr>
            <th align="right" valign="middle" scope="row"><label for="Title">Suite:</label></th>
            <td style="min-width:440px;" align="left" valign="middle"><span id="spryTitle">
            
            <input name="Title" type="text"  id="Title" tabindex="1" value="<?php echo $row_DataSet['Title']; ?>" size="38">
            <span class="textfieldRequiredMsg">Required!</span>
            <span class="textfieldMaxCharsMsg">Not more than 40 characters</span>
            </span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Acronym">Acronym:</label></th>
            <td align="left" valign="middle"><span id="spryAcronym">
            
            <input name="Acronym" type="text"  id="Acronym" tabindex="2" value="<?php echo $row_DataSet['Acronym']; ?>" size="10">
            <span class="textfieldRequiredMsg">Required!</span><span class="textfieldMaxCharsMsg">Not more than 10 characters</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="Price">Price:</label></th>
            <td align="left" valign="middle"><span id="spryPrice">
            
            <input name="Price" type="text"  id="Price" tabindex="3" value="<?php echo $row_DataSet['Price']; ?>" size="10">
            <span class="textfieldRequiredMsg">Required!</span><span class="textfieldInvalidFormatMsg">Numbers only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="Deposit">Deposit:</label></th>
            <td align="left" valign="middle"><span id="spryDeposit">
            
            <input name="Deposit" type="text" id="Deposit" tabindex="4" value="<?php echo $row_DataSet['Deposit']; ?>" size="10" />
            <span class="textfieldRequiredMsg">Required!</span>
            <span class="textfieldInvalidFormatMsg">Numbers only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Description">Description:</label></th>
            <td align="left" valign="middle"><span id="spryDescription">
            <textarea name="Description" cols="30"  id="Description" tabindex="5"><?php echo $row_DataSet['Deposit']; ?></textarea>
            <span id="countspryDescription">&nbsp;</span><span class="textareaMaxCharsMsg">Not more than 500 characters</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Status">Service:</label></th>
            <td align="left" valign="middle">  
    <section class="container">
     
     <div class="dropdown">
      
      	<span id="spryStatus">
        <select name="Status" id="Status" class="dropdown-select" tabindex="6">
          <option value="" <?php if (!(strcmp("", $row_DataSet['Status']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <option value="available" <?php if (!(strcmp("available", $row_DataSet['Status']))) {echo "selected=\"selected\"";} ?>>Available</option>
          <option value="unavailable" <?php if (!(strcmp("unavailable", $row_DataSet['Status']))) {echo "selected=\"selected\"";} ?>>Unavailable</option>
         </select>
         <span class="selectRequiredMsg"></span></span>
      
   </div>  
   	
  </section>
       </td>
         </tr>
          
          <tr>
            <td colspan="2" class="spacer" height="8"><input name="suid" type="hidden" id="suid" value="<?php echo $row_DataSet['suid']; ?>"></td>
            </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
            <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="7">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Reset" tabindex="8"></td>
          </tr>
  </table>
  </td>
    </tr>
      </table>
<input type="hidden" name="MM_update" value="UpdateForm">
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryTitle", "none", {validateOn:["blur", "change"], maxChars:50});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryAcronym", "none", {validateOn:["blur", "change"], isRequired:false, maxChars:10});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryDescription", {validateOn:["blur", "change"], maxChars:500, counterId:"countspryDescription", useCharacterMasking:false, isRequired:false});
var spryselect1 = new Spry.Widget.ValidationSelect("spryStatus", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryPrice", "integer", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryDeposit", "integer", {validateOn:["blur", "change"]});
</script>
<?php
mysql_free_result($DataSet);
?>
