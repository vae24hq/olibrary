<?php require_once('../Connections/ifund.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "active";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "log.php?cmd=out";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "uploader")) {
  $updateSQL = sprintf("UPDATE clients SET fname=%s, lname=%s, mname=%s, title=%s, sex=%s, email=%s, phone=%s, birthdate=%s, nationality=%s, address=%s, city=%s, `state`=%s, country=%s WHERE id=%s",
                       GetSQLValueString($_POST['fname'], "text"),
                       GetSQLValueString($_POST['lname'], "text"),
                       GetSQLValueString($_POST['mname'], "text"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['sex'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['birthdate'], "text"),
                       GetSQLValueString($_POST['nationality'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($updateSQL, $ifund) or die(mysql_error());

  $updateGoTo = "come.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "cpassw")) {
  $updateSQL = sprintf("UPDATE clients SET pin=%s WHERE id=%s",
                       GetSQLValueString($_POST['pin'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($updateSQL, $ifund) or die(mysql_error());

 
  $updateGoTo = "cpass.php?cmd=cpass";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&kll" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_ifund, $ifund);
$query_company = "SELECT * FROM company";
$company = mysql_query($query_company, $ifund) or die(mysql_error());
$row_company = mysql_fetch_assoc($company);
$totalRows_company = mysql_num_rows($company);

$colname_client = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_client = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_client = sprintf("SELECT * FROM clients WHERE uname = %s", GetSQLValueString($colname_client, "text"));
$client = mysql_query($query_client, $ifund) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>i-Fund NetSoft |<?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<script src="../source/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../source/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../source/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tbody>
    <tr>
      <td  
                                height="28"><table cellspacing="0" cellpadding="0" width="99%" 
                                align="center" border="0">
        <tbody>
          <tr>
            <td class="ifsty2b">UPDATE PERSONAL INFORMATION</td>
            <td width="4%"></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0" width="94%" 
                                align="left" border="0">
        <tbody>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle"><form action="<?php echo $editFormAction; ?>" name="uploader" id="uploader" method="POST" enctype="multipart/form-data">
        <table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#E0C6C5">
          <tr align="center" bgcolor="#E0C6C5">
            <td height="22" class="ifsty1b"><span class="div01"> </span></td>
          </tr>
          <tr valign="bottom">
            <td height="98" align="center" valign="middle" bordercolor="#FBF9F7"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr>
                <td height="20" colspan="2" align="left" valign="middle" bgcolor="#D75A53" class="ifsty1b">&nbsp;Personal Information</td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Title&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="spryselect1">
                  <select name="title" class="fs01" id="title">
                    <option value="" <?php if (!(strcmp("", $row_client['title']))) {echo "selected=\"selected\"";} ?>>Select</option>
                    <option value="Mr." <?php if (!(strcmp("Mr.", $row_client['title']))) {echo "selected=\"selected\"";} ?>>Mr.</option>
                    <option value="Mrs." <?php if (!(strcmp("Mrs.", $row_client['title']))) {echo "selected=\"selected\"";} ?>>Mrs.</option>
                    <option value="Miss" <?php if (!(strcmp("Miss", $row_client['title']))) {echo "selected=\"selected\"";} ?>>Miss.</option>
                    <option value="Dr." <?php if (!(strcmp("Dr.", $row_client['title']))) {echo "selected=\"selected\"";} ?>>Dr.</option>
                    <option value="Engr." <?php if (!(strcmp("Engr.", $row_client['title']))) {echo "selected=\"selected\"";} ?>>Engr.</option>
                    <option value="Prof." <?php if (!(strcmp("Prof.", $row_client['title']))) {echo "selected=\"selected\"";} ?>>Prof.</option>
                  </select>
                  <span class="selectRequiredMsg">Please select an item.</span></span></td>
              </tr>
              <tr>
                <td width="24%" height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">First Name&nbsp;:&nbsp;</td>
                <td width="76%" height="20" align="left" valign="middle"><span id="sprytextfield1">
                  <input name="fname" type="text" class="fs01" id="fname" value="<?php echo $row_client['fname']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Middle Name&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield2">
                  <input name="mname" type="text" class="fs01" id="mname" value="<?php echo $row_client['mname']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Last Name&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield3">
                  <input name="lname" type="text" class="fs01" id="lname" value="<?php echo $row_client['lname']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Gender&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="spryselect2">
                  <select name="sex" size="1" class="fs01" id="sex">
                    <option value="" <?php if (!(strcmp("", $row_client['sex']))) {echo "selected=\"selected\"";} ?>>Select</option>
                    <option value="Male" <?php if (!(strcmp("Male", $row_client['sex']))) {echo "selected=\"selected\"";} ?>>Male</option>
                    <option value="Female" <?php if (!(strcmp("Female", $row_client['sex']))) {echo "selected=\"selected\"";} ?>>Female</option>
                  </select>
                  <span class="selectRequiredMsg">Please select an item.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Date of Birth&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield4">
                  <input name="birthdate" type="text" class="fs01" id="birthdate" value="<?php echo $row_client['birthdate']; ?>" />
                  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format eg.(31/12/2009).</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Nationality&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield5">
                  <input name="nationality" type="text" class="fs01" id="nationality" value="<?php echo $row_client['nationality']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#ECE9D8" class="tex04"></td>
                <td height="20" align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;Contact Information</td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Email Address&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield6">
                  <input name="email" type="text" class="fs01" id="email" value="<?php echo $row_client['email']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Please enter a valid email.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Phone No&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield7">
                  <input name="phone" type="text" class="fs01" id="phone" value="<?php echo $row_client['phone']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Phone number only.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Address&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield8">
                  <input name="address" type="text" class="fs01" id="address" value="<?php echo $row_client['address']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">City&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield9">
                  <input name="city" type="text" class="fs01" id="city" value="<?php echo $row_client['city']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">State&nbsp;:</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield10">
                  <input name="state" type="text" class="fs01" id="state" value="<?php echo $row_client['state']; ?>" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Country</td>
                <td height="20" align="left" valign="middle"><span id="spryselect3">
                  <select name="country" 
                        size="1" class="fs01" id="country">
                    <option value="" selected="selected" <?php if (!(strcmp("", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Select Your Country</option>
                    <option value="USA" <?php if (!(strcmp("USA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>United States of America</option>
                    <option value="CAN" <?php if (!(strcmp("CAN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Canada</option>
                    <option value="DEU" <?php if (!(strcmp("DEU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Germany</option>
                    <option 
                          value="FRA" <?php if (!(strcmp("FRA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>France</option>
                    <option value="GBR" <?php if (!(strcmp("GBR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>United Kingdom</option>
                    <option value="IND" <?php if (!(strcmp("IND", $row_client['country']))) {echo "selected=\"selected\"";} ?>>India</option>
                    <option value="" <?php if (!(strcmp("", $row_client['country']))) {echo "selected=\"selected\"";} ?>>---------------------</option>
                    <option value="AFG" <?php if (!(strcmp("AFG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Afghanistan</option>
                    <option 
                          value="ALB" <?php if (!(strcmp("ALB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Albania</option>
                    <option 
                          value="DZA" <?php if (!(strcmp("DZA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Algeria</option>
                    <option value="ASM" <?php if (!(strcmp("ASM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>American Samoa</option>
                    <option value="AND" <?php if (!(strcmp("AND", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Andorra</option>
                    <option value="AGO" <?php if (!(strcmp("AGO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Angola</option>
                    <option 
                          value="AIA" <?php if (!(strcmp("AIA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Anguilla</option>
                    <option 
                          value="ATA" <?php if (!(strcmp("ATA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Antarctica</option>
                    <option 
                          value="ATG" <?php if (!(strcmp("ATG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Antigua and Barbuda</option>
                    <option 
                          value="ARG" <?php if (!(strcmp("ARG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Argentina</option>
                    <option 
                          value="ARM" <?php if (!(strcmp("ARM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Armenia</option>
                    <option 
                          value="ABW" <?php if (!(strcmp("ABW", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Aruba</option>
                    <option 
                          value="AUS" <?php if (!(strcmp("AUS", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Australia</option>
                    <option 
                          value="AUT" <?php if (!(strcmp("AUT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Austria</option>
                    <option 
                          value="AZE" <?php if (!(strcmp("AZE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Azerbaijan</option>
                    <option 
                          value="BHS" <?php if (!(strcmp("BHS", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bahamas</option>
                    <option 
                          value="BHR" <?php if (!(strcmp("BHR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bahrain</option>
                    <option 
                          value="BGD" <?php if (!(strcmp("BGD", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bangladesh</option>
                    <option 
                          value="BRB" <?php if (!(strcmp("BRB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Barbados</option>
                    <option 
                          value="BLR" <?php if (!(strcmp("BLR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Belarus</option>
                    <option 
                          value="BEL" <?php if (!(strcmp("BEL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Belgium</option>
                    <option 
                          value="BLZ" <?php if (!(strcmp("BLZ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Belize</option>
                    <option 
                          value="BEN" <?php if (!(strcmp("BEN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Benin</option>
                    <option 
                          value="BMU" <?php if (!(strcmp("BMU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bermuda</option>
                    <option 
                          value="BTN" <?php if (!(strcmp("BTN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bhutan</option>
                    <option 
                          value="BOL" <?php if (!(strcmp("BOL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bolivia</option>
                    <option value="BIH" <?php if (!(strcmp("BIH", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bosnia and Herzegowina</option>
                    <option 
                          value="BWA" <?php if (!(strcmp("BWA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Botswana</option>
                    <option value="BVT" <?php if (!(strcmp("BVT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bouvet Island</option>
                    <option value="BRA" <?php if (!(strcmp("BRA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Brazil</option>
                    <option value="IOT" <?php if (!(strcmp("IOT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>British Indian Ocean Territory</option>
                    <option value="BRN" <?php if (!(strcmp("BRN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Brunei Darussalam</option>
                    <option 
                          value="BGR" <?php if (!(strcmp("BGR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Bulgaria</option>
                    <option value="BFA" <?php if (!(strcmp("BFA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Burkina Faso</option>
                    <option value="BDI" <?php if (!(strcmp("BDI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Burundi</option>
                    <option value="KHM" <?php if (!(strcmp("KHM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cambodia</option>
                    <option 
                          value="CMR" <?php if (!(strcmp("CMR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cameroon</option>
                    <option value="CPV" <?php if (!(strcmp("CPV", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cape Verde</option>
                    <option value="CYM" <?php if (!(strcmp("CYM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cayman Islands</option>
                    <option value="CAF" <?php if (!(strcmp("CAF", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Central African Republic</option>
                    <option value="TCD" <?php if (!(strcmp("TCD", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Chad</option>
                    <option value="CHL" <?php if (!(strcmp("CHL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Chile</option>
                    <option 
                          value="CHN" <?php if (!(strcmp("CHN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>China</option>
                    <option value="CXR" <?php if (!(strcmp("CXR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Christmas Island</option>
                    <option value="CCK" <?php if (!(strcmp("CCK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cocoa (Keeling) Islands</option>
                    <option value="COL" <?php if (!(strcmp("COL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Colombia</option>
                    <option value="COM" <?php if (!(strcmp("COM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Comoros</option>
                    <option 
                          value="COG" <?php if (!(strcmp("COG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Congo</option>
                    <option value="COK" <?php if (!(strcmp("COK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cook Islands</option>
                    <option value="CRI" <?php if (!(strcmp("CRI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Costa Rica</option>
                    <option value="CIV" <?php if (!(strcmp("CIV", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cote Divoire</option>
                    <option 
                          value="HRV" <?php if (!(strcmp("HRV", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Croatia (local name: Hrvatska)</option>
                    <option value="CUB" <?php if (!(strcmp("CUB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cuba</option>
                    <option 
                          value="CYP" <?php if (!(strcmp("CYP", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Cyprus</option>
                    <option value="CZE" <?php if (!(strcmp("CZE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Czech Republic</option>
                    <option value="DNK" <?php if (!(strcmp("DNK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Denmark</option>
                    <option value="DJI" <?php if (!(strcmp("DJI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Djibouti</option>
                    <option 
                          value="DMA" <?php if (!(strcmp("DMA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Dominica</option>
                    <option 
                          value="DOM" <?php if (!(strcmp("DOM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Dominican Republic</option>
                    <option 
                          value="TMP" <?php if (!(strcmp("TMP", $row_client['country']))) {echo "selected=\"selected\"";} ?>>East Timor</option>
                    <option 
                          value="ECU" <?php if (!(strcmp("ECU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Ecuador</option>
                    <option 
                          value="EGY" <?php if (!(strcmp("EGY", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Egypt</option>
                    <option value="SLV" <?php if (!(strcmp("SLV", $row_client['country']))) {echo "selected=\"selected\"";} ?>>El Salvador</option>
                    <option value="GNQ" <?php if (!(strcmp("GNQ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Equatorial Guinea</option>
                    <option value="ERI" <?php if (!(strcmp("ERI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Eritrea</option>
                    <option value="EST" <?php if (!(strcmp("EST", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Estonia</option>
                    <option 
                          value="ETH" <?php if (!(strcmp("ETH", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Ethiopia</option>
                    <option value="FLK" <?php if (!(strcmp("FLK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Falkland Islands (Malvinas)</option>
                    <option value="FRO" <?php if (!(strcmp("FRO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Faroe Islands</option>
                    <option value="FJI" <?php if (!(strcmp("FJI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Fiji</option>
                    <option value="FIN" <?php if (!(strcmp("FIN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Finland</option>
                    <option 
                          value="FXX" <?php if (!(strcmp("FXX", $row_client['country']))) {echo "selected=\"selected\"";} ?>>France, Metropolitan</option>
                    <option 
                          value="GUF" <?php if (!(strcmp("GUF", $row_client['country']))) {echo "selected=\"selected\"";} ?>>French Guiana</option>
                    <option 
                          value="PYF" <?php if (!(strcmp("PYF", $row_client['country']))) {echo "selected=\"selected\"";} ?>>French Polynesia</option>
                    <option 
                          value="ATF" <?php if (!(strcmp("ATF", $row_client['country']))) {echo "selected=\"selected\"";} ?>>French Southern Territories</option>
                    <option 
                          value="GAB" <?php if (!(strcmp("GAB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Gabon</option>
                    <option 
                          value="GMB" <?php if (!(strcmp("GMB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Gambia</option>
                    <option 
                          value="GEO" <?php if (!(strcmp("GEO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Georgia</option>
                    <option 
                          value="GHA" <?php if (!(strcmp("GHA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Ghana</option>
                    <option 
                          value="GIB" <?php if (!(strcmp("GIB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Gibraltar</option>
                    <option 
                          value="GRC" <?php if (!(strcmp("GRC", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Greece</option>
                    <option 
                          value="GRL" <?php if (!(strcmp("GRL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Greenland</option>
                    <option 
                          value="GRD" <?php if (!(strcmp("GRD", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Grenada</option>
                    <option 
                          value="GLP" <?php if (!(strcmp("GLP", $row_client['country']))) {echo "selected=\"selected\"";} ?>>&gt;Guadeloupe</option>
                    <option 
                          value="GUM" <?php if (!(strcmp("GUM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Guam</option>
                    <option 
                          value="GTM" <?php if (!(strcmp("GTM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Guatemala</option>
                    <option 
                          value="GIN" <?php if (!(strcmp("GIN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Guinea</option>
                    <option 
                          value="GNB" <?php if (!(strcmp("GNB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Guinea-Bissau</option>
                    <option 
                          value="GUY" <?php if (!(strcmp("GUY", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Guyana</option>
                    <option 
                          value="HTI" <?php if (!(strcmp("HTI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Haiti</option>
                    <option value="HMD" <?php if (!(strcmp("HMD", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Heard and Mc Donald Islands</option>
                    <option 
                          value="HND" <?php if (!(strcmp("HND", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Honduras</option>
                    <option value="HKG" <?php if (!(strcmp("HKG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Hong Kong</option>
                    <option value="HUN" <?php if (!(strcmp("HUN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Hungary</option>
                    <option value="ISL" <?php if (!(strcmp("ISL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Iceland</option>
                    <option 
                          value="IDN" <?php if (!(strcmp("IDN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Indonesia</option>
                    <option value="IRN" <?php if (!(strcmp("IRN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Iran (Islamic Republic of)</option>
                    <option 
                          value="IRQ" <?php if (!(strcmp("IRQ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Iraq</option>
                    <option 
                          value="IRL" <?php if (!(strcmp("IRL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Ireland</option>
                    <option 
                          value="ISR" <?php if (!(strcmp("ISR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Israel</option>
                    <option 
                          value="ITA" <?php if (!(strcmp("ITA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Italy</option>
                    <option 
                          value="JAM" <?php if (!(strcmp("JAM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Jamaica</option>
                    <option 
                          value="JPN" <?php if (!(strcmp("JPN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Japan</option>
                    <option 
                          value="JOR" <?php if (!(strcmp("JOR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Jordan</option>
                    <option 
                          value="KAZ" <?php if (!(strcmp("KAZ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Kazakhstan</option>
                    <option 
                          value="KEN" <?php if (!(strcmp("KEN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Kenya</option>
                    <option 
                          value="KIR" <?php if (!(strcmp("KIR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Kiribati</option>
                    <option value="PRK" <?php if (!(strcmp("PRK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Korea, Democratic Peoples Republic of</option>
                    <option 
                          value="KOR" <?php if (!(strcmp("KOR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Korea, Republic of</option>
                    <option 
                          value="KWT" <?php if (!(strcmp("KWT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Kuwait</option>
                    <option 
                          value="KGZ" <?php if (!(strcmp("KGZ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Kyrgyzstan</option>
                    <option value="LAO" <?php if (!(strcmp("LAO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Lao Peoples Democratic Republic</option>
                    <option 
                          value="LVA" <?php if (!(strcmp("LVA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Latvia</option>
                    <option 
                          value="LBN" <?php if (!(strcmp("LBN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Lebanon</option>
                    <option 
                          value="LSO" <?php if (!(strcmp("LSO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Lesotho</option>
                    <option 
                          value="LBR" <?php if (!(strcmp("LBR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Liberia</option>
                    <option value="LBY" <?php if (!(strcmp("LBY", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Libyan Arab Jamahiriya</option>
                    <option 
                          value="LIE" <?php if (!(strcmp("LIE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Liechtenstein</option>
                    <option 
                          value="LTU" <?php if (!(strcmp("LTU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Lithuania</option>
                    <option 
                          value="LUX" <?php if (!(strcmp("LUX", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Luxembourg</option>
                    <option 
                          value="MAC" <?php if (!(strcmp("MAC", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Macau</option>
                    <option value="MKD" <?php if (!(strcmp("MKD", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Macedonia, The Former Yugoslav Republic of</option>
                    <option 
                          value="MDG" <?php if (!(strcmp("MDG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Madagascar</option>
                    <option 
                          value="MWI" <?php if (!(strcmp("MWI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Malawi</option>
                    <option 
                          value="MYS" <?php if (!(strcmp("MYS", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Malaysia</option>
                    <option 
                          value="MDV" <?php if (!(strcmp("MDV", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Maldives</option>
                    <option 
                          value="MLI" <?php if (!(strcmp("MLI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Mali</option>
                    <option 
                          value="MLT" <?php if (!(strcmp("MLT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Malta</option>
                    <option value="MHL" <?php if (!(strcmp("MHL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Marshall Islands</option>
                    <option value="MTQ" <?php if (!(strcmp("MTQ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Martinique</option>
                    <option value="MRT" <?php if (!(strcmp("MRT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Mauritania</option>
                    <option 
                          value="MVS" <?php if (!(strcmp("MVS", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Mauritius</option>
                    <option 
                          value="MYT" <?php if (!(strcmp("MYT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Mayotte</option>
                    <option 
                          value="MEX" <?php if (!(strcmp("MEX", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Mexico</option>
                    <option 
                          value="FSM" <?php if (!(strcmp("FSM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Micronesia</option>
                    <option 
                          value="MDA" <?php if (!(strcmp("MDA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Moldova</option>
                    <option 
                          value="MCO" <?php if (!(strcmp("MCO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Monaco</option>
                    <option 
                          value="MNG" <?php if (!(strcmp("MNG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Mongolia</option>
                    <option 
                          value="MSR" <?php if (!(strcmp("MSR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Montserrat</option>
                    <option 
                          value="MAR" <?php if (!(strcmp("MAR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Morocco</option>
                    <option 
                          value="MOZ" <?php if (!(strcmp("MOZ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Mozambique</option>
                    <option 
                          value="MMR" <?php if (!(strcmp("MMR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Myanmar</option>
                    <option 
                          value="NAM" <?php if (!(strcmp("NAM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Namibia</option>
                    <option 
                          value="NRU" <?php if (!(strcmp("NRU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Nauru</option>
                    <option 
                          value="NPL" <?php if (!(strcmp("NPL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Nepal</option>
                    <option 
                          value="NLD" <?php if (!(strcmp("NLD", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Netherlands</option>
                    <option 
                          value="ANT" <?php if (!(strcmp("ANT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Netherlands Antilles</option>
                    <option 
                          value="NCL" <?php if (!(strcmp("NCL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>New Caledonia</option>
                    <option value="NZL" <?php if (!(strcmp("NZL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>New Zealand</option>
                    <option value="NIC" <?php if (!(strcmp("NIC", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Nicaragua</option>
                    <option value="NER" <?php if (!(strcmp("NER", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Niger</option>
                    <option 
                          value="NGR" <?php if (!(strcmp("NGR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Nigeria</option>
                    <option 
                          value="NIU" <?php if (!(strcmp("NIU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Niue</option>
                    <option value="NFK" <?php if (!(strcmp("NFK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Norfolk Island</option>
                    <option value="MNP" <?php if (!(strcmp("MNP", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Northern Mariana Islands</option>
                    <option value="MOR" <?php if (!(strcmp("MOR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Norway</option>
                    <option value="OMN" <?php if (!(strcmp("OMN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Oman</option>
                    <option 
                          value="PAK" <?php if (!(strcmp("PAK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Pakistan</option>
                    <option 
                          value="PLW" <?php if (!(strcmp("PLW", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Palau</option>
                    <option 
                          value="PAN" <?php if (!(strcmp("PAN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Panama</option>
                    <option value="PNG" <?php if (!(strcmp("PNG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Papua New Guinea</option>
                    <option value="PRY" <?php if (!(strcmp("PRY", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Paraguay</option>
                    <option value="PER" <?php if (!(strcmp("PER", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Peru</option>
                    <option 
                          value="PHL" <?php if (!(strcmp("PHL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Philippines</option>
                    <option 
                          value="PCN" <?php if (!(strcmp("PCN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Pitcairn</option>
                    <option 
                          value="POL" <?php if (!(strcmp("POL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Poland</option>
                    <option 
                          value="PRT" <?php if (!(strcmp("PRT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Portugal</option>
                    <option value="PRI" <?php if (!(strcmp("PRI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Puerto Rico</option>
                    <option value="QAT" <?php if (!(strcmp("QAT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Qatar</option>
                    <option 
                          value="REU" <?php if (!(strcmp("REU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Reunion</option>
                    <option 
                          value="ROM" <?php if (!(strcmp("ROM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Romania</option>
                    <option value="RUS" <?php if (!(strcmp("RUS", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Russian Federation</option>
                    <option value="RWA" <?php if (!(strcmp("RWA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Rwanda</option>
                    <option value="KNA" <?php if (!(strcmp("KNA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Saint Kitts and Nevis</option>
                    <option value="LCA" <?php if (!(strcmp("LCA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Saint Lucia</option>
                    <option 
                          value="VCT" <?php if (!(strcmp("VCT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Saint Vincent and the Grenadines</option>
                    <option value="WSM" <?php if (!(strcmp("WSM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Samoa</option>
                    <option value="SMR" <?php if (!(strcmp("SMR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>San Marino</option>
                    <option value="STP" <?php if (!(strcmp("STP", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Sao Tome and Principe</option>
                    <option value="SAU" <?php if (!(strcmp("SAU", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Saudi Arabia</option>
                    <option value="SEN" <?php if (!(strcmp("SEN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Senegal</option>
                    <option value="SYC" <?php if (!(strcmp("SYC", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Seychelles</option>
                    <option 
                          value="SLE" <?php if (!(strcmp("SLE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Sierra Leone</option>
                    <option 
                          value="SGP" <?php if (!(strcmp("SGP", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Singapore</option>
                    <option 
                          value="SVK" <?php if (!(strcmp("SVK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Slovakia</option>
                    <option 
                          value="SVN" <?php if (!(strcmp("SVN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Slovenia</option>
                    <option value="SLB" <?php if (!(strcmp("SLB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Solomon Islands</option>
                    <option value="SOM" <?php if (!(strcmp("SOM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Somalia</option>
                    <option value="ZAF" <?php if (!(strcmp("ZAF", $row_client['country']))) {echo "selected=\"selected\"";} ?>>South Africa</option>
                    <option 
                          value="SGS" <?php if (!(strcmp("SGS", $row_client['country']))) {echo "selected=\"selected\"";} ?>>South Georgia</option>
                    <option 
                          value="ESP" <?php if (!(strcmp("ESP", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Spain</option>
                    <option value="LKA" <?php if (!(strcmp("LKA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Sri Lanka</option>
                    <option value="SHN" <?php if (!(strcmp("SHN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>St. Helena</option>
                    <option value="SPM" <?php if (!(strcmp("SPM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>St. Pierre and Miquelon</option>
                    <option value="SDN" <?php if (!(strcmp("SDN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Sudan</option>
                    <option 
                          value="SUR" <?php if (!(strcmp("SUR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Suriname</option>
                    <option value="SJM" <?php if (!(strcmp("SJM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Svalbard and Jan Mayen Islands</option>
                    <option 
                          value="SWZ" <?php if (!(strcmp("SWZ", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Swaziland</option>
                    <option 
                          value="SWE" <?php if (!(strcmp("SWE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Sweden</option>
                    <option 
                          value="CHE" <?php if (!(strcmp("CHE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Switzerland</option>
                    <option 
                          value="SYR" <?php if (!(strcmp("SYR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Syrian Arab Republic</option>
                    <option 
                          value="TWN" <?php if (!(strcmp("TWN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Taiwan</option>
                    <option 
                          value="TJK" <?php if (!(strcmp("TJK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Tajikistan</option>
                    <option 
                          value="TZA" <?php if (!(strcmp("TZA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Tanzania</option>
                    <option 
                          value="THA" <?php if (!(strcmp("THA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Thailand</option>
                    <option 
                          value="TGO" <?php if (!(strcmp("TGO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Togo</option>
                    <option 
                          value="TKL" <?php if (!(strcmp("TKL", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Tokelau</option>
                    <option 
                          value="TON" <?php if (!(strcmp("TON", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Tonga</option>
                    <option value="TTO" <?php if (!(strcmp("TTO", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Trinidad and Tobago</option>
                    <option value="TUN" <?php if (!(strcmp("TUN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Tunisia</option>
                    <option value="TUR" <?php if (!(strcmp("TUR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Turkey</option>
                    <option 
                          value="TKM" <?php if (!(strcmp("TKM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Turkmenistan</option>
                    <option 
                          value="TCA" <?php if (!(strcmp("TCA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Turks and Caicos Islands</option>
                    <option 
                          value="TUV" <?php if (!(strcmp("TUV", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Tuvalu</option>
                    <option 
                          value="UGA" <?php if (!(strcmp("UGA", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Uganda</option>
                    <option 
                          value="UKR" <?php if (!(strcmp("UKR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Nigeriaraine</option>
                    <option 
                          value="ARE" <?php if (!(strcmp("ARE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>United Arab Emirates</option>
                    <option 
                          value="UMI" <?php if (!(strcmp("UMI", $row_client['country']))) {echo "selected=\"selected\"";} ?>>United States Minor Outlying Islands</option>
                    <option value="URY" <?php if (!(strcmp("URY", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Uruguay</option>
                    <option value="UZB" <?php if (!(strcmp("UZB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Uzbekistan</option>
                    <option 
                          value="VUT" <?php if (!(strcmp("VUT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Vanuatu</option>
                    <option value="VAT" <?php if (!(strcmp("VAT", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Vatican City State (Holy See)</option>
                    <option 
                          value="VEN" <?php if (!(strcmp("VEN", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Venezuela</option>
                    <option value="VNM" <?php if (!(strcmp("VNM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Viet Nam</option>
                    <option value="VGB" <?php if (!(strcmp("VGB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Virgin Islands (British)</option>
                    <option value="VIR" <?php if (!(strcmp("VIR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Virgin Islands (U.S.)</option>
                    <option value="WLF" <?php if (!(strcmp("WLF", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Wallisw and Futuna Islands</option>
                    <option value="ESH" <?php if (!(strcmp("ESH", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Western Sahara</option>
                    <option value="YEM" <?php if (!(strcmp("YEM", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Yeman</option>
                    <option value="YUG" <?php if (!(strcmp("YUG", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Yugoslavia</option>
                    <option 
                          value="ZAR" <?php if (!(strcmp("ZAR", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Zaire</option>
                    <option 
                          value="ZMB" <?php if (!(strcmp("ZMB", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Zambia</option>
                    <option 
                          value="ZWE" <?php if (!(strcmp("ZWE", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Zimbabwe</option>
                    <option value="UNK" <?php if (!(strcmp("UNK", $row_client['country']))) {echo "selected=\"selected\"";} ?>>Not Listed</option>
                  </select>
                  <span class="selectRequiredMsg">Please select an item.</span></span></td>
              </tr>
              <tr>
                <td height="20" align="right" valign="middle" class="tex04"></td>
                <td height="40" align="left" valign="bottom"><input name="UpdateBTN" type="submit" class="fs02" id="UpdateBTN" value="Update" />
                  <input name="id" type="hidden" id="id" value="<?php echo $row_client['id']; ?>" /></td>
              </tr>
            </table>
              <br /></td>
          </tr>
        </table>
        <br />
        <br />
        <p></p>
        <input type="hidden" name="MM_update" value="uploader" />
      </form></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
<!--
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3", {validateOn:["blur"]});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {validateOn:["blur"]});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {validateOn:["blur"]});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {validateOn:["blur"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "integer", {validateOn:["blur"]});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "email", {validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "date", {format:"dd/mm/yyyy", validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["blur"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);
?>
