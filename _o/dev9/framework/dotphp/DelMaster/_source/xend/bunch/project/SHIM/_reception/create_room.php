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

$colname_Suite = "-1";
if (isset($_GET['item'])) {
  $colname_Suite = $_GET['item'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_Suite = sprintf("SELECT * FROM room_type WHERE fuid = %s", GetSQLValueString($colname_Suite, "text"));
$Suite = mysql_query($query_Suite, $dbcon) or die(mysql_error());
$row_Suite = mysql_fetch_assoc($Suite);
$totalRows_Suite = mysql_num_rows($Suite);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "CreateForm")) {
  $insertSQL = sprintf("INSERT INTO rooms (suid, tuid, fuid, Title, Acronym, `Description`, RoomType) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Suid'], "text"),
                       GetSQLValueString($_POST['Tuid'], "text"),
                       GetSQLValueString($_POST['Fuid'], "text"),
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Acronym'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['RoomType'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());
  
  
  $DSuiteO = $row_Suite['fuid'];
  $Qty = ($row_Suite['Qty'] + 1);
  $QtyAvaliable = ($row_Suite['QtyAvaliable'] + 1);
  $updateSQL2 = sprintf("UPDATE room_type SET Qty=%s, QtyAvaliable=%s WHERE `fuid`=%s",
  						GetSQLValueString($Qty, "text"),
						GetSQLValueString($QtyAvaliable, "text"),
						GetSQLValueString($DSuiteO, "text"));
	$Result2 = mysql_query($updateSQL2, $dbcon) or die(mysql_error());	
	

  $insertGoTo = "./?url=suites_reception&act=rooms&loc=$loc";
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
    <th align="right" valign="middle" scope="row"><label for="Title">Room No:</label></th>
    <td style="min-width:440px;" align="left" valign="middle"><span id="spryTitle">
      <input name="Title" type="text" id="Title" tabindex="1" size="30">
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
            <th align="right" valign="middle" scope="row">
            <label for="Description">Description:</label>
            </th>
            <td align="left" valign="middle"><span id="spryDescription">
              
              <textarea name="Description" id="Description" cols="30" tabindex="4"></textarea>
</span></td>
          </tr>
          
          <tr>
            <td colspan="2" class="spacer" height="8">
              <input name="Suid" type="hidden" id="Suid" value="<?php echo do_rand('s'); ?>">
              <input name="Tuid" type="hidden" id="Tuid" value="<?php echo do_rand('t'); ?>">
              <input name="Fuid" type="hidden" id="Fuid" value="<?php echo do_rand('f'); ?>">
            <input name="RoomType" type="hidden" id="RoomType" value="<?php echo $_GET['item']; ?>" />
            <input name="Period" type="hidden" id="Period" value="<?php echo unix_time(); ?>" /></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
              <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="6">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Clear" tabindex="7"></td>
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
</script>
<?php
mysql_free_result($Suite);
?>
