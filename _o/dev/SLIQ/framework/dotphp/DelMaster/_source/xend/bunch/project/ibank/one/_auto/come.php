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

mysql_select_db($database_ifund, $ifund);
$query_accofficer = "SELECT * FROM officer";
$accofficer = mysql_query($query_accofficer, $ifund) or die(mysql_error());
$row_accofficer = mysql_fetch_assoc($accofficer);
$totalRows_accofficer = mysql_num_rows($accofficer);

$maxRows_transf = 2;
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
<title>i-Fund NetSoft | <?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<script src="../source/SpryValidationPassword.js" type="text/javascript"></script>
<script src="../source/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="../source/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link href="../source/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="44%" align="left" valign="top" scope="col"><table width="98%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td height="20" colspan="2" align="left" valign="middle"   bgcolor="#E0C6C5" class="ifsty2b" scope="col">&nbsp;PERSONAL INFORMATION</td>
      </tr>
      <tr>
        <td width="76%" align="left" valign="top"  scope="col"><table width="99%" border="1" cellpadding="0" cellspacing="1" bordercolor="#B2D0EC">
          <tr>
            <td width="33%" height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">Full Name : </td>
            <td width="67%" height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-right:2px;"><?php echo $row_client['fname']; ?> <?php echo $row_client['mname']; ?> <?php echo $row_client['lname']; ?></td>
          </tr>
          <tr>
            <td height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">E-mail : </td>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['email']; ?></td>
          </tr>
          <tr>
            <td height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">Phone No : </td>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['phone']; ?></td>
          </tr>
          <tr>
            <td height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">Birthdate : </td>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['birthdate']; ?></td>
          </tr>
          <tr>
            <td height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">Gender : </td>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['sex']; ?></td>
          </tr>
          <tr>
            <td height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">Nationality : </td>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['nationality']; ?></td>
          </tr>
          <tr>
            <td height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">City/ State :</td>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['city']; ?>/ <?php echo $row_client['state']; ?></td>
          </tr>
          <tr>
            <td height="20" align="left" valign="middle" bgcolor="#E1ECF7" class="ifsty1b" scope="col" style="padding-left:2px;">Address : </td>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['address']; ?></td>
          </tr>
        </table></td>
        <td width="24%" align="right" valign="top" class="ifsty2n" scope="col"><img src="upload/<?php echo $row_client['passport']; ?>" alt="" width="120" height="120" border="1" class="texsty05" /><br />
          <br />
          [<a href="upload.php" class="ifsty2n">Upload Photo</a>]<br />
          <br />
          [<a href="update.php" class="ifsty2n">Update Information</a>]</td>
      </tr>
    </table>
      <table width="90%" border="0" cellpadding="0" cellspacing="0" class="space">
        <tr>
          <td height="10" align="center" valign="middle" scope="col">&nbsp;</td>
        </tr>
      </table>
      <table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
        <tr>
          <td width="71%" height="20" align="left" valign="middle" bordercolor="#BDD5ED" bgcolor="#E0C6C5"   class="ifsty2b" scope="col"> YOUR TRANSFERS</td>
        </tr>
      </table>
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
  <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#9EC2E6">
    <tr>
      <td align="center" valign="middle" bordercolor="#F4F4F4" class="ifsty1br">NO RECENT TRANSFER HAS BEEN MADE FROM YOUR ACCOUNT! </td>
      </tr>
  </table>
  <?php } // Show if recordset empty ?></td>
    <td width="25%" align="center" valign="top" scope="col"><table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
      <tr>
        <td width="71%" height="20" align="center" valign="middle" bordercolor="#BDD5ED"  bgcolor="#E0C6C5" class="ifsty2b" scope="col">ACCOUNT OFFICER  </td>
      </tr>
    </table>
      <table width="98" border="0" cellpadding="0" cellspacing="0" class="space">
        <tr>
          <td height="1">&nbsp;</td>
        </tr>
      </table>
      <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#BDD5ED">
        <tr>
          <td width="71%" align="center" valign="middle" bordercolor="#FFFFFF" scope="col"><table width="98%" border="0" cellspacing="1" cellpadding="0">
            <tr>
              <td width="30%" height="18" align="left" valign="middle" class="ifsty1b" scope="col">Name: </td>
              <td width="68%" height="18" align="left" valign="middle" class="ifsty1n" scope="col"><?php echo $row_accofficer['fulname']; ?></td>
            </tr>
            <tr>
              <td height="18" align="left" valign="middle" class="ifsty1b" scope="col">ID: </td>
              <td height="18" align="left" valign="middle" class="ifsty1n" scope="col"><?php echo $row_accofficer['officer']; ?></td>
            </tr>
            <tr>
              <td height="18" align="left" valign="middle" class="ifsty1b" scope="col">Email: </td>
              <td height="18" align="left" valign="middle" class="ifsty1n" scope="col"><?php echo $row_accofficer['email']; ?></td>
            </tr>
            <tr>
              <td height="18" align="left" valign="middle" class="ifsty1b" scope="col">Phone: </td>
              <td height="18" align="left" valign="middle" class="ifsty1n" scope="col"><?php echo $row_accofficer['phone']; ?></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="90%" border="0" cellpadding="0" cellspacing="0" class="space">
        <tr>
          <td height="10" align="center" valign="middle" scope="col">&nbsp;</td>
        </tr>
      </table>
      <table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
        <tr class="ifsty2b">
          <td width="70%" align="left" valign="middle" bgcolor="#E0C6C5"   class="dline03" scope="col">&nbsp;i-SERVICES </td>
          <td width="30%" align="center" valign="middle" bgcolor="#E0C6C5"   class="dline03" scope="col">STATUS</td>
        </tr>
        <tr class="ifsty1n">
          <td align="left" valign="middle" bgcolor="#DFEAF7" class="texsty02" scope="col" style="padding-left:4px;">Online Fund  Manager </td>
          <td align="center" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" scope="col">Enabled</td>
        </tr>
        <tr class="ifsty1n">
          <td align="left" valign="middle" bgcolor="#DFEAF7" class="texsty02" scope="col" style="padding-left:4px;">Bank Transfer</td>
          <td align="center" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" scope="col">Enabled</td>
        </tr>
        <tr class="ifsty1n">
          <td align="left" valign="middle" bgcolor="#DFEAF7" class="texsty02" scope="col" style="padding-left:4px;">C.C Transfer</td>
          <td align="center" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" scope="col">Enabled</td>
        </tr>
        <tr class="ifsty1n">
          <td align="left" valign="middle" bgcolor="#DFEAF7" class="texsty02" scope="col" style="padding-left:4px;">Account Checking</td>
          <td align="center" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" scope="col">Enabled</td>
        </tr>
        <tr class="ifsty1n">
          <td width="70%" align="left" valign="middle" bgcolor="#DFEAF7" class="texsty02" scope="col" style="padding-left:4px;">Customer Support</td>
          <td width="30%" align="center" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" scope="col">Enabled</td>
        </tr>
      </table>
      <table width="90%" border="0" cellpadding="0" cellspacing="0" class="space">
        <tr>
          <td height="10" align="center" valign="middle" scope="col">&nbsp;</td>
        </tr>
      </table>
      <table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
        <tr>
          <td width="71%" height="20" align="center" valign="middle" bordercolor="#BDD5ED"   bgcolor="#E0C6C5" class="ifsty2b" scope="col">WORLD CURRENCY EXCHANGE </td>
        </tr>
      </table>
      <table width="98" border="0" cellpadding="0" cellspacing="0" class="space">
        <tr>
          <td height="1">&nbsp;</td>
        </tr>
      </table>
      <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#BDD5ED">
        <tr>
          <td width="71%" align="center" valign="middle" bordercolor="#FFFFFF" class="dline03" scope="col"><table width="98%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="middle" scope="col"><img src="../source/xelogo.gif" alt="" width="240" height="47" /></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="ifsty1n" scope="col">To check current world currency exchange rates please visit  XE exchange website. <a href="http://www.xe.com/ucc/full/" target="_blank" class="ifsty2n">Click here</a></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    <td width="31%" align="center" valign="top" scope="col"><table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
      <tr>
        <td width="71%" height="20" align="left" valign="middle" bordercolor="#BDD5ED" bgcolor="#E0C6C5"   class="ifsty2b" scope="col">&nbsp;&nbsp;NEWS ON ACCOUNT</td>
      </tr>
    </table>
      <table width="80" border="0" cellpadding="0" cellspacing="0" class="space">
        <tr>
          <td height="1">&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#8BCFED">
        <tr>
          <td align="center" valign="middle" bordercolor="#FFFFFF"  scope="col"><table width="98%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="20" align="left" valign="middle" class="ifsty1n"  scope="col"><?php echo nl2br($row_client['statement']); ?></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="90%" border="0" cellpadding="0" cellspacing="0" class="space">
        <tr>
          <td height="10" align="center" valign="middle" scope="col">&nbsp;</td>
        </tr>
      </table>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
        <tr>
          <td width="71%" height="20" align="left" valign="middle" bordercolor="#BDD5ED" bgcolor="#E0C6C5"   class="ifsty2b" scope="col">&nbsp;&nbsp;ACCOUNT DETAILS&nbsp;</td>
        </tr>
      </table>
<table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#D5E4F4">
  <tr>
    <td height="20" colspan="2" align="left" valign="middle" bgcolor="#939F9F" class="ifsty1b" scope="col">&nbsp;Account No&nbsp;:&nbsp;&nbsp;<?php echo $row_client['accountno']; ?></td>
  </tr>
  <tr>
    <td width="42%" height="8" align="left" valign="middle" bordercolor="#D5E4F4" bgcolor="#D5E4F4" class="ifsty1n" scope="col" style="padding-left:2px;">
    Account Type :</td>
    <td width="58%" height="8" align="left" valign="middle" class="ifsty1n" style="padding-left:2px;" scope="col"><?php echo $row_client['acctype']; ?></td>
  </tr>
  <tr>
    <td height="9" align="left" valign="middle" bordercolor="#D5E4F4" bgcolor="#D5E4F4" class="ifsty1n" scope="col" style="padding-left:2px;">Currency :</td>
    <td height="9" align="left" valign="middle" class="ifsty1n" style="padding-left:2px;" scope="col"><?php echo $row_client['currency']; ?></td>
  </tr>
  <tr>
    <td height="9" align="left" valign="middle" bordercolor="#D5E4F4" bgcolor="#D5E4F4" class="ifsty1n" scope="col" style="padding-left:2px;">Incoming Transfer : </td>
    <td height="9" align="left" valign="middle" class="ifsty1n" style="padding-left:2px;" scope="col"><?php echo $row_client['income']; ?></td>
  </tr>
  <tr>
    <td height="9" align="left" valign="middle" bordercolor="#D5E4F4" bgcolor="#D5E4F4" class="ifsty1n" scope="col" style="padding-left:2px;">Outgoing Transfer :</td>
    <td height="9" align="left" valign="middle" class="ifsty1n" style="padding-left:2px;" scope="col"><?php echo $row_client['outgo']; ?></td>
  </tr>
  <tr>
    <td height="9" align="left" valign="middle" bordercolor="#D5E4F4" bgcolor="#D5E4F4" class="ifsty1n" scope="col" style="padding-left:2px;">Swift Code:</td>
    <td width="58%" height="9" align="left" valign="middle" class="ifsty1n" style="padding-left:2px;" scope="col"><?php echo $row_client['swift']; ?></td>
  </tr>
  <tr>
    <td height="18" align="left" valign="middle" bordercolor="#C0C7C7" bgcolor="#C0C7C7" class="ifsty1b" scope="col" style="padding-left:2px;">Current Balance : </td>
    <td height="18" align="left" valign="middle" bgcolor="#D5E4F4" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['accbal']; ?></td>
  </tr>
</table>
<table width="90%" border="0" cellpadding="0" cellspacing="0" class="space">
  <tr>
    <td height="10" align="center" valign="middle" scope="col">&nbsp;</td>
  </tr>
</table>
<form id="cpassw" name="cpassw" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
    <tr>
      <td width="71%" height="20" align="left" valign="middle" bordercolor="#BDD5ED" bgcolor="#E0C6C5"   class="ifsty2b" scope="col">&nbsp;&nbsp;CHANGE PASSWORD&nbsp;</td>
    </tr>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#BDD5ED">
    <tr class="ifsty1n">
      <td height="22" colspan="2" align="left" valign="middle" bgcolor="#DFEAF7" class="texsty02" style="padding-left:4px;" scope="col">Change your account login PIN</td>
      </tr>
    <tr class="ifsty1n">
      <td height="22" align="left" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" style="padding-left:4px;" scope="col">New PIN :</td>
      <td height="22" align="left" valign="middle" bgcolor="#DFEAF7" scope="col"><span id="sprypassword1">
        <input name="pin" type="password" class="fs01" id="pin" size="15" />
        <span class="passwordRequiredMsg">Required.</span></span></td>
    </tr>
    <tr class="ifsty1n">
      <td width="29%" height="22" align="left" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" style="padding-left:4px;" scope="col">Re-type PIN : </td>
      <td width="71%" height="22" align="left" valign="middle" bgcolor="#DFEAF7" scope="col"><span id="spryconfirm1">
        <input name="repin" type="password" class="fs01" id="repin" size="15" />
        <span class="confirmRequiredMsg">Required.</span><span class="confirmInvalidMsg">Don't match.</span></span></td>
    </tr>
    <tr class="ifsty1n">
      <td height="22" align="left" valign="middle" bgcolor="#DFEAF7" class="texsty02" style="padding-left:4px;" scope="col"><input name="uname" type="hidden" id="uname" value="<?php echo $row_client['uname']; ?>" /></td>
      <td height="22" align="left" valign="middle" bgcolor="#DFEAF7" class="ifsty1b" scope="col"><input name="button" type="submit" class="fs02" id="button" value="Save" />
        <input name="id" type="hidden" id="id" value="<?php echo $row_client['id']; ?>" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="cpassw" />
</form></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["blur"]});
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "pin", {validateOn:["blur"]});
//-->
</script>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);

mysql_free_result($accofficer);

mysql_free_result($transf);
?>
