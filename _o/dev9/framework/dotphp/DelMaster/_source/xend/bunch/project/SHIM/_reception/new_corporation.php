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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "CreateForm")) {
  $insertSQL = sprintf("INSERT INTO corporate_info (suid, tuid, fuid, CustomerID, Corporation, Acronym) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['suid'], "text"),
                       GetSQLValueString($_POST['tuid'], "text"),
                       GetSQLValueString($_POST['fuid'], "text"),
                       GetSQLValueString($_POST['CustomerID'], "text"),
					   GetSQLValueString($_POST['Corporation'], "text"),
                       GetSQLValueString($_POST['Acronym'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?url=notification&loc=$loc&act=reception-corporation-added&success";
  header(sprintf("Location: %s", $insertGoTo));
}


?>

<link rel="stylesheet" media="screen" type="text/css" href="../script/css/screen.css">
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
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
            <th align="right" valign="middle" scope="row"><label for="Corporation">Corporation Name:</label></th>
            <td style="min-width:440px;" align="left" valign="middle"><span id="spryTitle">
            
            <input name="Corporation" type="text"  id="Corporation" tabindex="1" size="38">
            <span class="textfieldRequiredMsg">Required!</span>
            <span class="textfieldMaxCharsMsg">Not more than 40 characters</span>
            </span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Acronym">Acronym:</label></th>
            <td align="left" valign="middle"><span id="spryAcronym">
            
            <input name="Acronym" type="text"  id="Acronym" tabindex="2" size="10">
            <span class="textfieldRequiredMsg">Required!</span><span class="textfieldMaxCharsMsg">Not more than 10 characters</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="CustomerID">Corporation ID:</label></th>
            <td align="left" valign="middle"><span id="spryCustomerID">
            
            <input name="CustomerID" type="text" id="CustomerID" value="<?php echo do_rand('cusid'); ?>" size="10" />
            <span class="textfieldRequiredMsg">Required!</span>
            <span class="textfieldInvalidFormatMsg">Numbers only.</span></span></td>
          </tr>
          <tr>
             <td colspan="2" class="spacer" height="8"><input name="run_process" type="hidden" id="run_process" value="go" /></td>
            </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
            <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="7">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Clear" tabindex="8"></td>
          </tr>
  </table>
  </td>
    </tr>
      </table>
<input name="suid" type="hidden" id="suid" value="<?php echo do_rand('s'); ?>">
         <input name="tuid" type="hidden" id="tuid" value="<?php echo do_rand('t'); ?>">
         <input name="fuid" type="hidden" id="fuid" value="<?php echo do_rand('f'); ?>">

  <input type="hidden" name="MM_insert" value="CreateForm">
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryTitle", "none", {validateOn:["blur", "change"], maxChars:50});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryAcronym", "none", {validateOn:["blur", "change"], isRequired:false, maxChars:10});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryCustomerID", "integer", {validateOn:["blur", "change"]});
</script>