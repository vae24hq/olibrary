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
  $insertSQL = sprintf("INSERT INTO pos_hall (suid, tuid, fuid, FullName, Deposit, Amount, `Description`, Period ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Suid'], "text"),
                       GetSQLValueString($_POST['Tuid'], "text"),
                       GetSQLValueString($_POST['Fuid'], "text"),
                       GetSQLValueString($_POST['FullName'], "text"),
					   GetSQLValueString($_POST['Deposit'], "text"),
					   GetSQLValueString($_POST['Amount'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['Period'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?url=notification&loc=$loc&act=reception-hall-invoice&success";
  header(sprintf("Location: %s", $insertGoTo));
}
?>


<link rel="stylesheet" media="screen" type="text/css" href="../script/css/screen.css">
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css">


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
            <th align="right" valign="middle" scope="row"><label for="FullName">Customer:</label></th>
            <td align="left" valign="middle"><span id="spryFullName">
              <input name="FullName" type="text"  id="FullName" tabindex="1" size="38" />
            <span class="textfieldRequiredMsg">Required!</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Deposit">Deposit:</label></th>
            <td align="left" valign="middle"><span id="spryDeposit">
            <input name="Deposit" type="text"  id="Deposit" tabindex="2" size="16" />
            <span class="textfieldRequiredMsg">Required!</span>
            <span class="textfieldInvalidFormatMsg">Numbers only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="Amount">Amount:</label></th>
            <td align="left" valign="middle" style="min-width:440px;"><span id="spryAmount">
            <input name="Amount" type="text"  id="Amount" tabindex="3" size="16">
            <span class="textfieldRequiredMsg">Required!</span>
            <span class="textfieldInvalidFormatMsg">Numbers only.</span></span></td>
          </tr>
          
           <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Description">Description:</label></th>
            <td align="left" valign="middle" >
            <span id="spryDescription">
            <textarea name="Description" cols="30" id="Description" tabindex="4"></textarea>
            <span class="textareaMaxCharsMsg">Too many text</span></span></td> </tr>

<tr>
             <td colspan="2" class="spacer" height="8">
             <input name="run_process" type="hidden" id="run_process" value="go" />
             <input type="hidden" name="Period" id="Period" value="<?php echo unix_time(); ?>"></td>
            </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
            <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="6">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Cancel" tabindex="7"></td>
          </tr>
  </table>
  </td>
    </tr>
      </table>
<input name="Suid" type="hidden" id="Suid" value="<?php echo do_rand('s'); ?>">
         <input name="Tuid" type="hidden" id="Tuid" value="<?php echo do_rand('t'); ?>">
         <input name="Fuid" type="hidden" id="Fuid" value="<?php echo do_rand('f'); ?>">
         <input type="hidden" name="MM_insert" value="CreateForm">
</form>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryDescription", {validateOn:["blur", "change"], maxChars:500, isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryAmount", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryDeposit", "integer", {validateOn:["blur", "change"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryFullName", "none", {validateOn:["blur", "change"]});
</script>