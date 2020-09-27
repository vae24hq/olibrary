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
$statement = 'Your transfer is currently pending...' ;
$trurl = 'intertranscode.php' ;
$trsurlset = 'transprocess.php' ;
$pera ='1';
$perb ='9';
$perc ='15';
$perd ='21';
$pere ='28';
$perf ='37';
$trsptitle = 'COT Required';
$trsptalk = 'Please enter your COT code below';
$trsprequest = 'COT Code';
$per = 'COT CODE REQUIRED FOR THIS TRANSFER';

$statement = 'This transfer is currently pending.';
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "newtrans")) {
  $insertSQL = sprintf("INSERT INTO transfers (`by`, statement, type, amount, trsurlset, pera, perb, perc, perd, pere, perf, per, trsptitle, trsptalk, trsprequest, toaccholder, toaccount, tobank, transdate, trasno, trurl, email, trsprequestcode, phone, fullname, bnkloc) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['by'], "text"),
                       GetSQLValueString($statement, "text"),
					   GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['amount'], "text"),
					   GetSQLValueString($trsurlset, "text"),
					   GetSQLValueString($pera, "text"),
					   GetSQLValueString($perb, "text"),
					   GetSQLValueString($perc, "text"),
					   GetSQLValueString($perd, "text"),
					   GetSQLValueString($pere, "text"),
					   GetSQLValueString($perf, "text"),
					   GetSQLValueString($per, "text"),
					   GetSQLValueString($trsptitle, "text"),
					   GetSQLValueString($trsptalk, "text"),
					   GetSQLValueString($trsprequest, "text"),
                       GetSQLValueString($_POST['toaccholder'], "text"),
					   GetSQLValueString($_POST['toaccount'], "text"),
                       GetSQLValueString($_POST['tobank'], "text"),
                       GetSQLValueString($_POST['transdate'], "text"),
                       GetSQLValueString($_POST['trasno'], "text"),
					   GetSQLValueString($trurl, "text"),
					   GetSQLValueString($_POST['email'], "text"),
					   GetSQLValueString($_POST['trsprequestcode'], "text"),
					   GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['fullname'], "text"),
                       GetSQLValueString($_POST['bnkloc'], "text"));

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($insertSQL, $ifund) or die(mysql_error());
  $dlinkin = 'trasno=';
  $insertGoTo = "intertranscode.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?" . "$dlinkin" . "$_POST[trasno]";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

$colname_exttransfer = "-1";
if (isset($_POST['trasno'])) {
  $colname_exttransfer = $_POST['trasno'];
}
mysql_select_db($database_ifund, $ifund);
$query_exttransfer = sprintf("SELECT * FROM transfers WHERE trasno = %s", GetSQLValueString($colname_exttransfer, "text"));
$exttransfer = mysql_query($query_exttransfer, $ifund) or die(mysql_error());
$row_exttransfer = mysql_fetch_assoc($exttransfer);
$totalRows_exttransfer = mysql_num_rows($exttransfer);

$colname_transf = "%";
if (isset($_SESSION['MM_Username'])) {
  $colname_transf = $_SESSION['MM_Username'];
}
$colname2_transf = "%";
if (isset($_GET['trasno'])) {
  $colname2_transf = $_GET['trasno'];
}
mysql_select_db($database_ifund, $ifund);
$query_transf = sprintf("SELECT * FROM transfers WHERE `by` = %s AND `trasno` = %s", GetSQLValueString($colname_transf, "text"),GetSQLValueString($colname2_transf, "text"));
$transf = mysql_query($query_transf, $ifund) or die(mysql_error());
$row_transf = mysql_fetch_assoc($transf);
$totalRows_transf = mysql_num_rows($transf);

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>i-Fund NetSoft |<?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<style type="text/css">
<!--
.style2 {FONT-WEIGHT: bold; COLOR: #ffffff
}
-->
</style>
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
            <td class="ifsty2b">FUNDS TRANSFER</td>
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
      <td height="40" align="center" valign="middle"><table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#E0C6C5">
        <tr align="center" bgcolor="#E0C6C5">
          <td width="53%" height="22" class="ifsty1b"><span class="div01">NEW TRANSFER DETAILS</span></td>
          <td width="50%" class="ifsty1b">CONTINUE EXISTING TRANSFER</td>
        </tr>
        <tr valign="bottom">
          <td width="53%" height="98" align="center" valign="top" bordercolor="#FBF9F7"><form id="newtrans" name="newtrans" method="POST" action="<?php echo $editFormAction; ?>">
            
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr>
                <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;Your Account Information</td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Full Name&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield4">
                  <input name="fullname" type="text" id="fullname" value="<?php echo $row_client['fname']; ?> <?php echo $row_client['mname']; ?> <?php echo $row_client['lname']; ?>" size="50" readonly />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td width="24%" height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Email &nbsp;:&nbsp;</td>
                <td width="76%" height="20" align="left" valign="middle"><span id="sprytextfield3">
                  <input name="email" type="text" class="fs01" id="email" value="<?php echo $row_client['email']; ?>" size="40" readonly />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Phone No&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield2">
                  <input name="phone" type="text" class="fs01" id="phone" value="<?php echo $row_client['phone']; ?>" size="30" readonly />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Transfer Type&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="spryselect1">
                  <select name="type" id="type">
                    <option>Select</option>
                    <option value="a wire transfer">Wire Transfer</option>
                    </select>
                  <span class="selectRequiredMsg">Please select an item.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Amount&nbsp;:</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield1">
                  <input name="amount" type="text" class="fs01" id="amount" />
                  <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                </tr>
              <tr>
                <td height="20" colspan="2" align="right" valign="middle" class="ifsty1b">&nbsp;</td>
                </tr>
              <tr>
                <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;Recipient's Bank Information</td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Bank Name&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield5">
                  <input name="tobank" type="text" class="fs01" id="tobank" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Account Name&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield7">
                  <input name="toaccholder" type="text" class="fs01" id="toaccholder" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Account No&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield6">
                  <input name="toaccount" type="text" class="fs01" id="toaccount" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Swift/Routine Code :&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield9">
                  <input name="swift" type="text" class="fs01" id="swift" size="20" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Bank Location&nbsp;:&nbsp;</td>
                <td height="20" align="left" valign="middle"><span id="sprytextfield8">
                  <input name="bnkloc" type="text" class="fs01" id="bnkloc" size="40" />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" class="tex04"></td>
                <td height="40" align="left" valign="bottom"><input name="TransferBTN" type="submit" class="fs02" id="TransferBTN" value="Transfer" />
                  <span class="black_bold" style="padding-left:4px;">
                    <?php 
			 $rand_content = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
$rand_keys = array_rand($rand_content, 49);
$ra1 = ($rand_content[$rand_keys[2]] );
$ra2 = $rand_content[$rand_keys[4]] ;
$ra3 = $rand_content[$rand_keys[8]] ;
$ra4 = $rand_content[$rand_keys[0]] ;
$ra5 = $rand_content[$rand_keys[6]] ;
$ra6 = $rand_content[$rand_keys[3]] ;
$ra7 = $rand_content[$rand_keys[5]] ;
$ra8 = $rand_content[$rand_keys[7]] ;
$ra19 = $rand_content[$rand_keys[21]] ;
$ra9 = $rand_content[$rand_keys[12]] ;
$rand= ($ra7.$ra2.$ra6.$ra4.$ra19.$ra3);
$cotcode =($ra5.$ra8.$ra8.$ra3.$ra1.$ra19.$ra2.$ra5.$ra1);


?>                    <input name="trasno" type="hidden" id="trasno" value="<?php echo $rand ; ?>" />
                    <input name="transdate" type="hidden" id="transdate" value="<?php echo date ("jS-M-Y"); ?>" />
                    <input name="by" type="hidden" id="by" value="<?php echo $row_client['uname']; ?>" />
                    <input name="trsprequestcode" type="hidden" id="trsprequestcode" value="<?php echo $cotcode ; ?>" />
                  </span></td>
                </tr>
              </table>
            
<input type="hidden" name="MM_insert" value="newtrans" />
            </form></td>
          <td width="50%" align="center" valign="middle" bordercolor="#FBF9F7">
          <?php if (!isset($_GET['ext'] ) ) { ?><form id="extrans" name="extrans" method="get" action="">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr>
                <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;Transfer Information</td>
                </tr>
              <tr>
                <td height="20" colspan="2" align="left" valign="middle" bgcolor="#C6BC88" class="ifsty1b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please enter your transfer serial code&nbsp;</td>
                </tr>
              <tr>
                <td width="24%" height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b">Serial :&nbsp;</td>
                <td width="76%" height="20" align="left" valign="middle"><span id="sprytextfield14">
                  <input name="trasno" type="text" class="fs01" id="trasno" size="40" /><br />
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                </tr>
              <tr>
                <td height="20" align="right" valign="middle" class="tex04"></td>
                <td height="40" align="left" valign="bottom"><input name="CTranBTN" type="submit" class="fs02" id="CTranBTN" value="Continue Transfer" />
                  <input name="ext" type="hidden" id="ext" value="yes" /></td>
                </tr>
              </table>
          </form>
          <?php } ?>
          <?php if (isset($_GET['ext'] ) && $_GET['ext'] =='yes') { ?>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
            <tr>
              <td width="100%" height="20" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;Information Display</td>
            </tr>
            <?php if ($totalRows_transf > 0) { // Show if recordset not empty ?>
              <tr>
                <td height="25" align="center" valign="middle" class="ifsty1b">Transfer record found<br />
                  <span class="ifsty2b">[<a href="<?php echo $row_transf['../i-fund/trurl']; ?>?trasno=<?php echo $row_transf['trasno']; ?>" class="ifsty1b">Proceed</a>]</span></td>
              </tr>
              <?php } // Show if recordset not empty ?>
<tr>
  <?php if ($totalRows_transf == 0) { // Show if recordset empty ?>
  <td height="25" align="center" valign="middle" class="ifsty1br">No transfer record found for this entry, (<?php echo $_GET['trasno'] ; ?>)<br />
    <span class="ifsty2b">[<a href="transfer.php" class="ifsty1b">Return</a>]</span></td>
  <?php } // Show if recordset empty ?>
</tr>
          </table>          <?php } ?></td>
        </tr>
      </table></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);

mysql_free_result($exttransfer);

mysql_free_result($transf);
?>
