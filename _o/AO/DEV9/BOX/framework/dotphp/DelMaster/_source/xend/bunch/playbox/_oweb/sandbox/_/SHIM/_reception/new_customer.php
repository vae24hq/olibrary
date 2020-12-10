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

if(isset($_GET['corporate'])){
mysql_select_db($database_dbcon, $dbcon);
$query_corporateDate = "SELECT * FROM corporate_info ORDER BY Corporation ASC";
$corporateDate = mysql_query($query_corporateDate, $dbcon) or die(mysql_error());
$row_corporateDate = mysql_fetch_assoc($corporateDate);
$totalRows_corporateDate = mysql_num_rows($corporateDate);
}




$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "CreateForm")) {	
	$insertPersonInfo = sprintf("INSERT INTO person_info (suid, tuid, fuid,FullName, PrimaryPhone, PrimaryEmail, PrimaryAddress, BirthDate, Sex) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Suid'], "text"),
                       GetSQLValueString($_POST['Tuid'], "text"),
                       GetSQLValueString($_POST['Fuid'], "text"),
					   GetSQLValueString($_POST['FullName'], "text"),
					   GetSQLValueString($_POST['PrimaryPhone'], "text"),
					   GetSQLValueString($_POST['PrimaryEmail'], "text"),
					   GetSQLValueString($_POST['PrimaryAddress'], "text"),
					   GetSQLValueString($_POST['BirthDate'], "text"),
					   GetSQLValueString($_POST['Sex'], "text"));					    
					   
  $insertCorporateInfo = sprintf("INSERT INTO customer_info (suid, tuid, fuid, CustomerID, PersonInfo) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Suid'], "text"),
                       GetSQLValueString($_POST['Tuid'], "text"),
                       GetSQLValueString($_POST['Fuid'], "text"),
                       GetSQLValueString($_POST['CustomerID'], "text"),
					   GetSQLValueString($_POST['Fuid'], "text")); 
					   
  mysql_select_db($database_dbcon, $dbcon);
  $ResultInsert = mysql_query($insertPersonInfo, $dbcon) or die(mysql_error());
  $ResultInsert2 = mysql_query($insertCorporateInfo, $dbcon) or die(mysql_error()); 
  
  
		  if(isset($_POST['CorporateInfo'])){
		  $updateSQL = sprintf("UPDATE customer_info SET CorporateInfo=%s WHERE suid=%s",
							   GetSQLValueString($_POST['CorporateInfo'], "text"),
							   GetSQLValueString($_POST['Suid'], "text"));

		  mysql_select_db($database_dbcon, $dbcon);
		  $ResultUpdate = mysql_query($updateSQL, $dbcon) or die(mysql_error());
		}

  $insertGoTo = "./?url=customers_reception&loc=$loc";
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
<form action="" method="POST" name="CreateForm" id="CreateForm">
  
  
  <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
    <tr>
      <td align="center" valign="middle">
        <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
          <tr>
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
          </tr>
        
            
          <tr>
            <th align="right" valign="middle" scope="row" style="min-width:140px;"><label for="CustomerID">Customer ID:</label></th>
            <td style="min-width:440px;" align="left" valign="middle">
			<span style="padding-left:3px;">
			<?php $cusid = 'RHR'; $cusid .= do_rand("cusid"); echo $cusid; ?>
            </span>
            <input name="CustomerID" type="hidden" id="CustomerID" value="<?php echo $cusid; ?>"></td>
          </tr>
          
		  <tr>
    <th align="right" valign="middle" scope="row"><label for="FullName">Full Name:</label></th>
    <td style="min-width:440px;" align="left" valign="middle"><span id="spryFullName">
      <input name="FullName" type="text" id="FullName"  size="36">
      <span class="textfieldRequiredMsg">Required!</span></span></td>
    </tr>
	
	
          
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="PrimaryPhone">Phone No:</label></th>
            <td align="left" valign="middle"><span id="spryPrimaryPhone">
              <input name="PrimaryPhone" type="text" id="PrimaryPhone" size="20">
            <span class="textfieldInvalidFormatMsg">Numbers only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="PrimaryEmail">Email:</label></th>
            <td align="left" valign="middle"><span id="spryPrimaryEmail">
              
              <input type="text" name="PrimaryEmail" id="PrimaryEmail">
              <span class="textfieldInvalidFormatMsg">Check!</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="BirthDate">Birth Date:</label></th>
            <td align="left" valign="middle">  
              <span id="spryBirthDate">
              
              <input name="BirthDate" type="text" id="BirthDate" size="16">
<span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
          </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Sex">Sex:</label></th>
            <td align="left" valign="middle">
            
            <section class="container">
     
     <div class="dropdown">
      
     
                
                <span id="sprySex">
              
              <select name="Sex" id="Sex" class="dropdown-select">
                <option>Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            <span class="selectRequiredMsg"></span></span>
            </div>
            </section>
            </td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="PrimaryAddress">Address:</label>
            </th>
            <td align="left" valign="middle"><span id="spryPrimaryAddress">
              
              <textarea name="PrimaryAddress" id="PrimaryAddress" cols="30" ></textarea>
</span></td>
          </tr>
          
          <tr>
            <td colspan="2" class="spacer" height="8">
              <input name="Suid" type="hidden" id="Suid" value="<?php echo do_rand('s'); ?>">
              <input name="Tuid" type="hidden" id="Tuid" value="<?php echo do_rand('t'); ?>">
              <input name="Fuid" type="hidden" id="Fuid" value="<?php echo do_rand('f'); ?>">
            
            <input type="hidden" name="MM_insert" value="CreateForm" />
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
      <td width="20" align="center" valign="middle">&nbsp;</td>
      <td align="center" valign="top" style="padding-top:40px;">
      
      <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
          <tr>
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
          </tr>
          
          
          <?php if(isset($_GET['corporate'])){?>
          <tr>
            <th align="right" valign="middle" scope="row"><label for="CorporateInfo">Corporation:</label>
            </th>
            <td style="min-width:440px;" align="left" valign="middle">      
              
              <span id="spryCorporateInfo">
              
              <select name="CorporateInfo" size="20" id="CorporateInfo" class="selectbox" style="height:300px;">
                <?php
do {  
?>
                <option value="<?php echo $row_corporateDate['fuid']?>">
				<?php echo substr($row_corporateDate['Corporation'],0,45);if(strlen($row_corporateDate['Corporation']) > '45') { echo "...";} ?> 
                </option>
                <?php
} while ($row_corporateDate = mysql_fetch_assoc($corporateDate));
  $rows = mysql_num_rows($corporateDate);
  if($rows > 0) {
      mysql_data_seek($corporateDate, 0);
	  $row_corporateDate = mysql_fetch_assoc($corporateDate);
  }
?>
              </select>
            <span class="selectRequiredMsg">Please select an item.</span></span>
           
            </td>
          </tr>
          <?php // end corporate client 
		  } ?>
          </table>
      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryPrimaryAddress", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryPrimaryPhone", "integer", {validateOn:["blur", "change"], isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryFullName", "none", {validateOn:["blur", "change"], hint:"Surname first"});
<?php if(isset($_GET['corporate'])){?>var spryselect2 = new Spry.Widget.ValidationSelect("spryCorporateInfo", {validateOn:["change", "blur"]});<?php }?>
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryPrimaryEmail", "email", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryBirthDate", "date", {format:"dd/mm/yyyy", hint:"DD/MM/YYYY", isRequired:false});
var spryselect1 = new Spry.Widget.ValidationSelect("sprySex", {validateOn:["change", "blur"]});
</script>
<?php if(isset($_GET['corporate'])){
mysql_free_result($corporateDate);
}
?>
