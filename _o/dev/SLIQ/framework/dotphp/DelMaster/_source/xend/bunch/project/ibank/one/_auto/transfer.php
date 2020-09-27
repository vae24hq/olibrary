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

$process_serial = '0101' ;
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "newtrans")) {
	$insertSQL = sprintf("INSERT INTO transfers (`by`, type, amount, toaccount, toaccholder, tobank, transdate, trasno, email, phone, fullname, bnkloc, process_serial) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['by'], "text"),
					   GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['amount'], "text"),
					   GetSQLValueString($_POST['toaccount'], "text"),
					   GetSQLValueString($_POST['toaccholder'], "text"),
					   GetSQLValueString($_POST['tobank'], "text"),
					   GetSQLValueString($_POST['transdate'], "text"),					   
					   GetSQLValueString($_POST['trasno'], "text"),
					   GetSQLValueString($_POST['email'], "text"),
					   GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['fullname'], "text"),
                       GetSQLValueString($_POST['bnkloc'], "text"),
					   GetSQLValueString($process_serial, "text")
					   );

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($insertSQL, $ifund) or die(mysql_error());
  $dlinkin = 'trasno=';
  $insertGoTo = "process.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?" . "$dlinkin" . "$_POST[trasno]";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

$maxRows_transf = 1;
$pageNum_transf = 0;
if (isset($_GET['pageNum_transf'])) {
  $pageNum_transf = $_GET['pageNum_transf'];
}
$startRow_transf = $pageNum_transf * $maxRows_transf;

$colname_transf = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_transf = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_transf = sprintf("SELECT * FROM transfers WHERE `by` = %s AND process_serial != 'completed' ORDER BY id DESC", GetSQLValueString($colname_transf, "text"));
$query_limit_transf = sprintf("%s LIMIT %d, %d", $query_transf, $startRow_transf, $maxRows_transf);
$transf = mysql_query($query_limit_transf, $ifund) or die(mysql_error());
$row_transf = mysql_fetch_assoc($transf);

if (isset($_GET['totalRows_transf'])) {
  $totalRows_transf = $_GET['totalRows_transf'];
} else {
  $all_transf = mysql_query($query_transf);
  $totalRows_transf = mysql_num_rows($all_transf);
}
$totalPages_transf = ceil($totalRows_transf/$maxRows_transf)-1;

?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>i-Fund NetSoft |<?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<style type="text/css">
<!--
.style2 {
	FONT-WEIGHT: bold;
	COLOR: #ffffff
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
      <td height="40" align="center" valign="middle">
      <?php if ($totalRows_transf > 0) { // Show if recordset not empty ?>
        <?php do { ?>
          <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#BDD5ED">
            <tr>
              <td width="71%" align="center" valign="middle" bordercolor="#FFFFFF" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="20" align="left" valign="middle" bgcolor="#A4C6E8" class="ifsty2n">Serial No : <strong><?php echo $row_transf['trasno']; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; Date :&nbsp;<strong><?php echo $row_transf['transdate']; ?></strong></td>
                </tr>
                <tr>
                  <td height="50" align="left" valign="middle" class="ifsty2n">You Initiated, <strong><?php echo $row_transf['type']; ?></strong> of the sum of <strong><?php echo $row_transf['amount']; ?></strong> <?php echo $row_client['currency']; ?>, from your <?php echo $row_company['bname']; ?> online account to an account with the following details<br />
                    <span class="ifsty1b">Account Title :</span> <strong><?php echo $row_transf['toaccholder']; ?></strong><br />
                    <span class="ifsty1b">Account Number :</span> <strong><?php echo $row_transf['toaccount']; ?></strong><br />
                    <span class="ifsty1b">Destination :</span> <strong><?php echo $row_transf['tobank']; ?></strong><br />
                    <span class="ifsty1b">Location :</span> <strong><?php echo $row_transf['bnkloc']; ?></strong>.
                   </td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td height="22" align="right" valign="middle" bordercolor="#FFFFFF" bgcolor="#A4C6E8" class="ifsty1n" style="padding-right:4px;" scope="col">[<a href="process.php?trasno=<?php echo $row_transf['trasno']; ?>" class="ifsty1b">Continue With  Transfer Process</a>]</td>
            </tr>
          </table>
          <?php } while ($row_transf = mysql_fetch_assoc($transf)); ?>
        <?php } // Show if recordset not empty ?>
        
        <?php if ($totalRows_transf == 0) { // Show if recordset empty ?>

 
        <table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#E0C6C5">
          <tr align="center" bgcolor="#E0C6C5">
            <td width="53%" height="22" class="ifsty1b"><span class="div01">NEW TRANSFER DETAILS</span></td>
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
                     
                      <input name="trasno" type="hidden" id="trasno" value="<?php echo mt_rand();?>" />
                      <input name="transdate" type="hidden" id="transdate" value="<?php echo date ("jS-M-Y"); ?>" />
                      <input name="by" type="hidden" id="by" value="<?php echo $row_client['uname']; ?>" />
                      </span></td>
                  </tr>
                </table>
                <input type="hidden" name="MM_insert" value="newtrans" />
              </form></td>
          </tr>
        </table>
        
         <?php } // Show if recordset empty ?>
         </td>
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
//-->
</script>
</body>
</html>
<?php
mysql_free_result($company);
mysql_free_result($client);
mysql_free_result($transf);
?>
