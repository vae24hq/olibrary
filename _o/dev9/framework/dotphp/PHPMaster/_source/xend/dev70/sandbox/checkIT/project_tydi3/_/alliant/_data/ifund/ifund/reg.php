<?php require_once('../Connections/ifund.php'); ?>
<?php
// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="nameexist.php";
  $loginUsername = $_POST['uname'];
  $LoginRS__query = "SELECT uname FROM clients WHERE uname='" . $loginUsername . "'";
  mysql_select_db($database_ifund, $ifund);
  $LoginRS=mysql_query($LoginRS__query, $ifund) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "reg")) {
  $insertSQL = sprintf("INSERT INTO clients (pin, uname, securityhint, acctype, `currency`, fname, lname, mname, title, sex, email, phone, birthdate, nationality, address, city, `state`, country, passw, annual, passport) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['pin'], "text"),
                       GetSQLValueString($_POST['uname'], "text"),
                       GetSQLValueString($_POST['securityhint'], "text"),
                       GetSQLValueString($_POST['acctype'], "text"),
                       GetSQLValueString($_POST['currency'], "text"),
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
					   GetSQLValueString($_POST['passw'], "text"),
					   GetSQLValueString($_POST['annual'], "text"),
                       GetSQLValueString($_POST['passport'], "text"));

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($insertSQL, $ifund) or die(mysql_error());

  $insertGoTo = "regdone.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>eRegistration::</title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css">
<script src="../source/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../source/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../source/SpryValidationPassword.js" type="text/javascript"></script>
<script src="../source/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="../source/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../source/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../source/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<link href="../source/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
<link href="../source/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" align="left" valign="middle">&nbsp;</td>
  </tr>
</table>
<table width="900" height="23" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E5CFBF">
  <tr>
    <td width="839" height="23" align="center" valign="middle" class="ifsty1br">ONLINE  REGISTRATION </td>
  </tr>
</table>
<table width="900"  align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ECE9D8">
  <tr>
    <td align="center" valign="middle"><form name="reg" id="reg" method="POST" action="<?php echo $editFormAction; ?>">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
          <tr>
            <td height="20" colspan="2" align="left" valign="middle" bgcolor="#D75A53" class="ifsty1b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Information</td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Title&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprytitle">
              <select name="title" id="title">
                <option>Select</option>
                <option value="Mr.">Mr.</option>
                <option value="Mrs.">Mrs.</option>
                <option value="Miss">Miss.</option>
                <option value="Dr.">Dr.</option>
                <option value="Engr.">Engr.</option>
                <option value="Prof.">Prof.</option>
              </select>
              <span class="selectRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td width="24%" height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">First Name&nbsp;:&nbsp;</td>
            <td width="76%" height="20" align="left" valign="middle" class="ifsty2b"><span id="spryfname">
              <input name="fname" type="text" id="fname" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Middle Name&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprymname">
              <input name="mname" type="text" id="mname" size="40">
</span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Last Name&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprylname">
              <input name="lname" type="text" id="lname" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Gender&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprysex">
              <select name="sex" size="1" id="sex">
                <option>Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <span class="selectRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Date of Birth&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprybirthdate">
            <input name="birthdate" type="text" id="birthdate">
            <span class="textfieldRequiredMsg"> *</span><span class="textfieldInvalidFormatMsg">[DD/MM/YYYY]</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Nationality&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprynationality">
              <input name="nationality" type="text" id="nationality" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" colspan="2" align="right" valign="middle" bgcolor="#ECE9D8" class="ifsty2b"></td>
          </tr>
          <tr>
            <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Information</td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Company Name :&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprycomp_name">
              <input class="textfield" size="40" name="comp_name">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Email Address&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="spryemail">
              <input name="email" type="text" id="email" size="40">
              <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg"></span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Password:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprypassw">
              <input name="passw" type="password" id="passw" size="40">
              <span class="passwordRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Annual Income:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="spryannual">
              <input name="annual" type="text" id="annual" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Phone No&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="spryphone">
              <input name="phone" type="text" id="phone" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Residential Address&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="spryaddress">
              <input name="address" type="text" id="address" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">City&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprycity">
              <input name="city" type="text" id="city" size="40">
              <span class="textfieldRequiredMsg"> *</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">State&nbsp;:</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprystate">
              <input name="state" type="text" id="state" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Country of residence :&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprycountry">
              <select size="1" name="country" id="country">
                <option value="" selected>Select Your Country</option>
                <option value="USA">United States of America</option>
                <option value="CAN">Canada</option>
                <option value="DEU">Germany</option>
                <option value="FRA">France</option>
                <option value="GBR">United Kingdom</option>
                <option value="IND">India</option>
                <option value="AFG">Afghanistan</option>
                <option value="ALB">Albania</option>
                <option value="DZA">Algeria</option>
                <option value="ASM">American Samoa</option>
                <option value="AND">Andorra</option>
                <option value="AGO">Angola</option>
                <option value="AIA">Anguilla</option>
                <option value="ATA">Antarctica</option>
                <option value="ATG">Antigua and Barbuda</option>
                <option value="ARG">Argentina</option>
                <option value="ARM">Armenia</option>
                <option value="ABW">Aruba</option>
                <option value="AUS">Australia</option>
                <option value="AUT">Austria</option>
                <option value="AZE">Azerbaijan</option>
                <option value="BHS">Bahamas</option>
                <option value="BHR">Bahrain</option>
                <option value="BGD">Bangladesh</option>
                <option value="BRB">Barbados</option>
                <option value="BLR">Belarus</option>
                <option value="BEL">Belgium</option>
                <option value="BLZ">Belize</option>
                <option value="BEN">Benin</option>
                <option value="BMU">Bermuda</option>
                <option value="BTN">Bhutan</option>
                <option value="BOL">Bolivia</option>
                <option value="BIH">Bosnia and Herzegowina</option>
                <option value="BWA">Botswana</option>
                <option value="BVT">Bouvet Island</option>
                <option value="BRA">Brazil</option>
                <option value="IOT">British Indian Ocean Territory</option>
                <option value="BRN">Brunei Darussalam</option>
                <option value="BGR">Bulgaria</option>
                <option value="BFA">Burkina Faso</option>
                <option value="BDI">Burundi</option>
                <option value="KHM">Cambodia</option>
                <option value="CMR">Cameroon</option>
                <option value="CPV">Cape Verde</option>
                <option value="CYM">Cayman Islands</option>
                <option value="CAF">Central African Republic</option>
                <option value="TCD">Chad</option>
                <option value="CHL">Chile</option>
                <option value="CHN">China</option>
                <option value="CXR">Christmas Island</option>
                <option value="CCK">Cocoa (Keeling) Islands</option>
                <option value="COL">Colombia</option>
                <option value="COM">Comoros</option>
                <option value="COG">Congo</option>
                <option value="COK">Cook Islands</option>
                <option value="CRI">Costa Rica</option>
                <option value="CIV">Cote Divoire</option>
                <option value="HRV">Croatia (local name: Hrvatska)</option>
                <option value="CUB">Cuba</option>
                <option value="CYP">Cyprus</option>
                <option value="CZE">Czech Republic</option>
                <option value="DNK">Denmark</option>
                <option value="DJI">Djibouti</option>
                <option value="DMA">Dominica</option>
                <option value="DOM">Dominican Republic</option>
                <option value="TMP">East Timor</option>
                <option value="ECU">Ecuador</option>
                <option value"egy">Egypt</option>
                <option value="SLV">El Salvador</option>
                <option value="GNQ">Equatorial Guinea</option>
                <option value="ERI">Eritrea</option>
                <option value="EST">Estonia</option>
                <option value="ETH">Ethiopia</option>
                <option value="FLK">Falkland Islands (Malvinas)</option>
                <option value="FRO">Faroe Islands</option>
                <option value="FJI">Fiji</option>
                <option value="FIN">Finland</option>
                <option value="FXX">France, Metropolitan</option>
                <option value="GUF">French Guiana</option>
                <option value="PYF">French Polynesia</option>
                <option value="ATF">French Southern Territories</option>
                <option value="GAB">Gabon</option>
                <option value="GMB">Gambia</option>
                <option value="GEO">Georgia</option>
                <option value="GHA">Ghana</option>
                <option value="GIB">Gibraltar</option>
                <option value="GRC">Greece</option>
                <option value="GRL">Greenland</option>
                <option value="GRD">Grenada</option>
                <option value="GLP">Guadeloupe</option>
                <option value="GUM">Guam</option>
                <option value="GTM">Guatemala</option>
                <option value="GIN">Guinea</option>
                <option value="GNB">Guinea-Bissau</option>
                <option value="GUY">Guyana</option>
                <option value="HMD">Heard and Mc Donald Islands</option>
                <option value="HND">Honduras</option>
                <option value="HKG">Hong Kong</option>
                <option value="HUN">Hungary</option>
                <option value="ISL">Iceland</option>
                <option value="IDN">Indonesia</option>
                <option value="IRN">Iran (Islamic Republic of)</option>
                <option value="IRQ">Iraq</option>
                <option value="IRL">Ireland</option>
                <option value="ISR">Israel</option>
                <option value="ITA">Italy</option>
                <option value="JAM">Jamaica</option>
                <option value="JPN">Japan</option>
                <option value="JOR">Jordan</option>
                <option value="KAZ">Kazakhstan</option>
                <option value="KEN">Kenya</option>
                <option value="KIR">Kiribati</option>
                <option value="PRK">Korea, Democratic Peoples Republic of</option>
                <option value="KOR">Korea, Republic of</option>
                <option value="KWT">Kuwait</option>
                <option value="KGZ">Kyrgyzstan</option>
                <option value="LAO">Lao Peoples Democratic Republic</option>
                <option value="LVA">Latvia</option>
                <option value="LBN">Lebanon</option>
                <option value="LSO">Lesotho</option>
                <option value="LBR">Liberia</option>
                <option value="LBY">Libyan Arab Jamahiriya</option>
                <option value="LIE">Liechtenstein</option>
                <option value="LTU">Lithuania</option>
                <option value="LUX">Luxembourg</option>
                <option value="MAC">Macau</option>
                <option value="MKD">Macedonia, The Former Yugoslav Republic of</option>
                <option value="MDG">Madagascar</option>
                <option value="MWI">Malawi</option>
                <option value="MYS">Malaysia</option>
                <option value="MDV">Maldives</option>
                <option value="MLI">Mali</option>
                <option value="MLT">Malta</option>
                <option value="MHL">Marshall Islands</option>
                <option value="MTQ">Martinique</option>
                <option value="MRT">Mauritania</option>
                <option value="MVS">Mauritius</option>
                <option value="MYT">Mayotte</option>
                <option value="MEX">Mexico</option>
                <option value="FSM">Micronesia</option>
                <option value="MDA">Moldova</option>
                <option value="MCO">Monaco</option>
                <option value="MNG">Mongolia</option>
                <option value="MSR">Montserrat</option>
                <option value="MAR">Morocco</option>
                <option value="MOZ">Mozambique</option>
                <option value="MMR">Myanmar</option>
                <option value="NAM">Namibia</option>
                <option value="NRU">Nauru</option>
                <option value="NPL">Nepal</option>
                <option value="NLD">Netherlands</option>
                <option value="ANT">Netherlands Antilles</option>
                <option value="NCL">New Caledonia</option>
                <option value="NZL">New Zealand</option>
                <option value="NIC">Nicaragua</option>
                <option value="NER">Niger</option>
                <option value="NGR">Nigeria</option>
                <option value="NIU">Niue</option>
                <option value="NFK">Norfolk Island</option>
                <option value="MNP">Northern Mariana Islands</option>
                <option value="MOR">Norway</option>
                <option value="OMN">Oman</option>
                <option value="PAK">Pakistan</option>
                <option value="PLW">Palau</option>
                <option value="PAN">Panama</option>
                <option value="PNG">Papua New Guinea</option>
                <option value="PRY">Paraguay</option>
                <option value="PER">Peru</option>
                <option value="PHL">Philippines</option>
                <option value="PCN">Pitcairn</option>
                <option value="POL">Poland</option>
                <option value="PRT">Portugal</option>
                <option value="PRI">Puerto Rico</option>
                <option value="QAT">Qatar</option>
                <option value="REU">Reunion</option>
                <option value="ROM">Romania</option>
                <option value="RUS">Russian Federation</option>
                <option value="RWA">Rwanda</option>
                <option value="KNA">Saint Kitts and Nevis</option>
                <option value="LCA">Saint Lucia</option>
                <option value="VCT">Saint Vincent and the Grenadines</option>
                <option value="WSM">Samoa</option>
                <option value="SMR">San Marino</option>
                <option value="STP">Sao Tome and Principe</option>
                <option value="SAU">Saudi Arabia</option>
                <option value="SEN">Senegal</option>
                <option value="SYC">Seychelles</option>
                <option value="SLE">Sierra Leone</option>
                <option value="SGP">Singapore</option>
                <option value="SVK">Slovakia</option>
                <option value="SVN">Slovenia</option>
                <option value="SLB">Solomon Islands</option>
                <option value="SOM">Somalia</option>
                <option value="ZAF">South Africa</option>
                <option value="SGS">South Georgia</option>
                <option value="ESP">Spain</option>
                <option value="LKA">Sri Lanka</option>
                <option value="SHN">St. Helena</option>
                <option value="SPM">St. Pierre and Miquelon</option>
                <option value="SDN">Sudan</option>
                <option value="SUR">Suriname</option>
                <option value="SJM">Svalbard and Jan Mayen Islands</option>
                <option value="SWZ">Swaziland</option>
                <option value="SWE">Sweden</option>
                <option value="CHE">Switzerland</option>
                <option value="SYR">Syrian Arab Republic</option>
                <option value="TWN">Taiwan</option>
                <option value="TJK">Tajikistan</option>
                <option value="TZA">Tanzania</option>
                <option value="THA">Thailand</option>
                <option value="TGO">Togo</option>
                <option value="TKL">Tokelau</option>
                <option value="TON">Tonga</option>
                <option value="TTO">Trinidad and Tobago</option>
                <option value="TUN">Tunisia</option>
                <option value="TUR">Turkey</option>
                <option value="TKM">Turkmenistan</option>
                <option value="TCA">Turks and Caicos Islands</option>
                <option value="TUV">Tuvalu</option>
                <option value="UGA">Uganda</option>
                <option value="UKR">Nigeriaraine</option>
                <option value="ARE">United Arab Emirates</option>
                <option value="UMI">United States Minor Outlying Islands</option>
                <option value="URY">Uruguay</option>
                <option value="UZB">Uzbekistan</option>
                <option value="VUT">Vanuatu</option>
                <option value="VAT">Vatican City State (Holy See)</option>
                <option value="VEN">Venezuela</option>
                <option value="VNM">Viet Nam</option>
                <option value="VGB">Virgin Islands (British)</option>
                <option value="VIR">Virgin Islands (U.S.)</option>
                <option value="WLF">Wallisw and Futuna Islands</option>
                <option value="ESH">Western Sahara</option>
                <option value="YEM">Yeman</option>
                <option value="YUG">Yugoslavia</option>
                <option value="ZAR">Zaire</option>
                <option value="ZMB">Zambia</option>
                <option value="ZWE">Zimbabwe</option>
                <option value="NL">Not Listed</option>
              </select>
              <span class="selectRequiredMsg"> *</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Zip Code&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="spryzipcode">
              <input name="zipcode" type="text" id="zipcode" size="20">
</span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#ECE9D8" class="ifsty2b"></td>
            <td height="20" align="left" valign="middle" class="ifsty2b">&nbsp;</td>
          </tr>
          <tr>
            <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login Information</td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Username&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="spryuname">
              <input name="uname" type="text" id="uname" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Security PIN :&nbsp; </td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprypin">
              <input name="pin" type="password" id="pin" size="40">
              <span class="passwordRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Retype Security PIN :</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="spryrepin">
              <input name="repin" type="password" id="repin" size="40">
              <span class="confirmRequiredMsg">*</span><span class="confirmInvalidMsg">Pin don't match.</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Security Hint&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprysecurityhint">
              <input name="securityhint" type="text" id="securityhint" size="40">
              <span class="textfieldRequiredMsg"> *</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#ECE9D8" class="ifsty2b"><input name="acctype" type="hidden" id="acctype" value="Direct"></td>
            <td height="20" align="left" valign="middle" class="ifsty2b">&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Currency:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprycurrency">
              <select name="currency" id="currency">
                <option value="Dollars">USD</option>
                <option value="Euro">Euro</option>
                <option value="Pounds">GBP</option>
                <option value="Yen">Yen</option>
              </select>
              <span class="selectRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other Information</td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Next of Kin Name &nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="middle" class="ifsty2b"><span id="sprytextfield17">
              <input name="nok" type="text" id="nok" size="40">
              <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty2b">Next of Kin Address&nbsp;:&nbsp;</td>
            <td height="20" align="left" valign="top" class="ifsty2b"><span id="sprynokaddress"> <span class="textareaRequiredMsg"></span><br>
              <textarea name="nokaddress" id="nokaddress" cols="45" rows="5"></textarea>
              </span></td>
          </tr>
          <tr>
            <td height="65" align="right" valign="middle" bgcolor="#ECE9D8" class="tex04"></td>
            <td height="60" align="left" valign="middle"><input name="RegisterBTN" type="submit" class="fs02" id="RegisterBTN" value="Register">
              <input name="Reset" type="reset" class="fs02" id="button" value="Clear">
              <input name="passport" type="hidden" id="passport" value="none.jpg"></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="reg">
      </form></td>
  </tr>
</table>
<table width="900" height="50" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E5CFBF">
  <tr>
    <td height="19" align="center" valign="middle" class="ifsty2b"><hr>
      Copyright &copy; 2010. All Rights Reserved!</td>
  </tr>
</table>
<script type="text/javascript">
<!--
var sprytitle = new Spry.Widget.ValidationSelect("sprytitle", {validateOn:["change"]});
var spryfname = new Spry.Widget.ValidationTextField("spryfname", "none", {validateOn:["change"]});
var sprymname = new Spry.Widget.ValidationTextField("sprymname", "none", {validateOn:["change"], isRequired:false});
var sprylname = new Spry.Widget.ValidationTextField("sprylname", "none", {validateOn:["change"]});
var sprysex = new Spry.Widget.ValidationSelect("sprysex", {validateOn:["change"]});
var sprybirthdate = new Spry.Widget.ValidationTextField("sprybirthdate", "date", {hint:"DD/MM/YYYY", validateOn:["change"], format:"dd/mm/yyyy"});
var sprynationality = new Spry.Widget.ValidationTextField("sprynationality", "none", {validateOn:["change"]});
var sprycomp_name = new Spry.Widget.ValidationTextField("sprycomp_name", "none", {validateOn:["change"], isRequired:false});
var spryemail = new Spry.Widget.ValidationTextField("spryemail", "email", {validateOn:["change"]});
var spryphone = new Spry.Widget.ValidationTextField("spryphone", "none", {validateOn:["change"]});
var spryaddress = new Spry.Widget.ValidationTextField("spryaddress", "none", {validateOn:["change"]});
var sprycity = new Spry.Widget.ValidationTextField("sprycity", "none", {validateOn:["change"]});
var sprystate = new Spry.Widget.ValidationTextField("sprystate", "none", {validateOn:["change"]});
var sprycountry = new Spry.Widget.ValidationSelect("sprycountry", {validateOn:["change"]});
var spryzipcode = new Spry.Widget.ValidationTextField("spryzipcode", "none", {validateOn:["change"], isRequired:false});
var spryuname = new Spry.Widget.ValidationTextField("spryuname", "none", {validateOn:["change"]});
var sprypin = new Spry.Widget.ValidationPassword("sprypin", {validateOn:["change"]});
var spryrepin = new Spry.Widget.ValidationConfirm("spryrepin", "pin", {validateOn:["change"]});
var sprysecurityhint = new Spry.Widget.ValidationTextField("sprysecurityhint", "none", {validateOn:["change"]});
var sprytextfield17 = new Spry.Widget.ValidationTextField("sprytextfield17", "none", {validateOn:["change"]});
var sprynokaddress = new Spry.Widget.ValidationTextarea("sprynokaddress", {validateOn:["change"]});
var sprycurrency = new Spry.Widget.ValidationSelect("sprycurrency", {validateOn:["change"]});
var sprypassw = new Spry.Widget.ValidationPassword("sprypassw");
var spryannual = new Spry.Widget.ValidationTextField("spryannual", "none", {validateOn:["change"]});
//-->
</script>
</body>
</html>
