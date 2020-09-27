<?php do_session(); require('../Connections/dbcon.php'); $loc = getAppLoc();

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
  $insertSQL = sprintf("INSERT INTO report_expenditure (suid, tuid, fuid, Title, `Description`, Category, Period, Amount) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['suid'], "text"),
                       GetSQLValueString($_POST['tuid'], "text"),
                       GetSQLValueString($_POST['fuid'], "text"),
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['Category'], "text"),
                       GetSQLValueString($_POST['Period'], "text"),
                       GetSQLValueString($_POST['Amount'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?url=notification&loc=$loc&act=expense-posted&success";
  header(sprintf("Location: %s", $insertGoTo));
}
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
      <input name="Title" type="text" id="Title" tabindex="1" size="40">
      <span class="textfieldRequiredMsg">Required!</span></span></td>
    </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Acronym">Amount:</label></th>
            <td align="left" valign="middle"><span id="spryAmount">
            <input name="Amount" type="text" id="Amount" tabindex="2" size="16" />
            <span class="textfieldRequiredMsg">Required!</span>
            <span class="textfieldInvalidFormatMsg">Number only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Category">Category:</label></th>
            <td align="left" valign="middle">  
              <section class="container">
                
                <div class="dropdown"><span id="spryCat">
                  <select name="Category" id="Category" class="dropdown-select" tabindex="5">
                    <option value="">Select</option>
                    <option value="disel">Diesel</option>
                    <option value="kitchen">Kitchen</option>
                    <option value="drinks">Drinks</option>
                    <option value="wine">Wine</option>
                    <option value="salary">Salary</option>
                    <option value="other">Other</option>
                  </select>
                <span class="selectRequiredMsg"></span></span></div>  
                
              </section>
            </td>
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
              <input name="suid" type="hidden" id="suid" value="<?php echo do_rand('s'); ?>">
              <input name="tuid" type="hidden" id="tuid" value="<?php echo do_rand('t'); ?>">
              <input name="fuid" type="hidden" id="fuid" value="<?php echo do_rand('f'); ?>">
            <input name="run_process" type="hidden" id="run_process" value="go" />
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
  <input type="hidden" name="MM_insert" value="CreateForm" />
</form>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryDescription", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryAmount", "integer", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryTitle", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryCat");
</script>
</body>
</html>