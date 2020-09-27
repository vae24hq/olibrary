<?php require_once('../konect.php'); ?>
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

$colname_transpro = "-1";
if (isset($_GET['trasno'])) {
  $colname_transpro = $_GET['trasno'];
}
mysql_select_db($database_ifund, $ifund);
$query_transpro = sprintf("SELECT * FROM transfers WHERE trasno = %s", GetSQLValueString($colname_transpro, "text"));
$transpro = mysql_query($query_transpro, $ifund) or die(mysql_error());
$row_transpro = mysql_fetch_assoc($transpro);
$totalRows_transpro = mysql_num_rows($transpro);


	//Required Process Data
	$query_processdata = sprintf("SELECT * FROM trans_process WHERE serial = %s", GetSQLValueString($row_transpro['process_serial'], "text"));
	$processdata = mysql_query($query_processdata, $ifund) or die(mysql_error());
	$row_processdata = mysql_fetch_assoc($processdata);



$post_code = "%";
if (isset($_POST['dcode'])) {$post_code = $_POST['dcode'];}
mysql_select_db($database_ifund, $ifund);
$query_validatecode = sprintf("SELECT * FROM trans_process WHERE serial = %s AND value = %s", GetSQLValueString($row_transpro['process_serial'], "text"), GetSQLValueString($post_code, "text"));
$validatecode = mysql_query($query_validatecode, $ifund) or die(mysql_error());
$row_validatecode = mysql_fetch_assoc($validatecode);
$totalRows_validatecode = mysql_num_rows($validatecode);

?>
<!DOCTYPE html>

<head>
<meta charset="utf-8">
<title>iNetSoft - <?php echo $row_company['bname'];?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<script src="../source/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../source/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tbody>
    <tr>
      <td height="28"><table cellspacing="0" cellpadding="0" width="99%" 
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
      <td height="40" align="center" valign="middle"><?php if (!isset($_POST['ext'] ) ) { ?>
        <table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#E0C6C5">
          <tr align="center" bgcolor="#E0C6C5">
            <td width="53%" height="22" align="left" valign="middle" class="ifsty1b"><span class="div01">&nbsp;<?php echo $row_processdata['title']; ?> </span></td>
          </tr>
          <tr valign="bottom">
            <td width="50%" height="98" align="center" valign="top" bordercolor="#FBF9F7"><form id="newtrans" name="newtrans" method="post">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
                  <tr>
                    <td height="20" colspan="2" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b"><?php echo $row_processdata['line']; ?></td>
                  </tr>
                  <tr>
                    <td width="24%" height="20" align="right" valign="middle" bgcolor="#C6BC88" class="ifsty1b"><?php echo $row_processdata['label']; ?>&nbsp;</td>
                    <td width="76%" height="20" align="left" valign="middle"><span id="sprytextfield1">
                      <input name="dcode" type="text" id="dcode" size="50" />
                      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                  </tr>
                  <tr>
                    <td height="20" align="right" valign="middle" class="tex04"></td>
                    <td height="40" align="left" valign="bottom"><input name="transferBTN" type="submit" class="fs02" id="transferBTN" value="Proceed to Transfer" />
                      <input name="ext" type="hidden" id="ext" value="yes" /></td>
                  </tr>
                </table>
              </form></td>
          </tr>
        </table>
        <?php } ?>
        <?php if (isset($_POST['ext'] ) && $_POST['ext'] =='yes') { ?>
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
          <tr>
            <td width="100%" height="20" align="left" valign="middle" bgcolor="#E18782" class="ifsty1b">&nbsp;Information Display</td>
          </tr>
          <?php if ($totalRows_validatecode > 0) { // Show if recordset not empty ?>
            <tr>
              <td height="25" align="center" valign="middle" class="ifsty1b">You have entered a valid <?php echo $row_validatecode['label']; ?>.<br />
                <?php if($row_validatecode['next'] != 'completed'){?>
                <span class="ifsty2b">[<a href="process.php?trasno=<?php echo $_GET['trasno']; ?>" class="ifsty1b">Proceed</a>]</span>
                <?php } else {?>
                <span class="ifsty2b">[<a href="process.php?act=done&trasno=<?php echo $_GET['trasno']; ?>" class="ifsty1b">Proceed</a>]</span>
                <?php }?>
                <?php
			//Update Transfer's next destination
			$updateSQL = sprintf("UPDATE transfers SET process_serial=%s WHERE trasno=%s",
			   GetSQLValueString($row_validatecode['next'], "text"),
			   GetSQLValueString($colname_transpro, "text"));
			mysql_select_db($database_ifund, $ifund);
			$updated = mysql_query($updateSQL, $ifund) or die(mysql_error());
			?></td>
            </tr>
            <?php } // Show if recordset not empty ?>
          <?php if ($totalRows_validatecode == 0) { // Show if recordset empty ?>
            <tr>
              <td height="25" align="center" valign="middle" class="ifsty1br">Invalid &quot;<?php echo $row_processdata['label']; ?>&quot; entered<br />
                <span class="ifsty2b">[<a href="javascript:history.go(-1);" class="ifsty1b">Return</a>]</span></td>
            </tr>
            <?php } // Show if recordset empty ?>
        </table>
        <?php } ?></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html><?php
mysql_free_result($company);
mysql_free_result($client);
mysql_free_result($transpro);
mysql_free_result($validatecode);
?>
