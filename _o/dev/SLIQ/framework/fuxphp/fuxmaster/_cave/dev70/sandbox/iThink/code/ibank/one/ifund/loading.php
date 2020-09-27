<?php require_once('../Connections/ifund.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

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
    if (($strUsers == "") && true) { 
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
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>i-Fund NetSoft | <?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="../source/bgtopline.jpg">&nbsp;</td>
  </tr>
</table>
<table width="1000" border="0" background="../source/bgtop.jpg"align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="258" height="80" align="left" valign="middle" style="padding-left:10px;">&nbsp;</td>
    <td width="512" align="left" valign="middle" style="padding-left:10px;">&nbsp;</td>
    <td width="230" align="right" valign="middle" style="padding-right:10px;"><img src="../source/ifundlogo.jpg" width="200" height="60" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td height="400" align="center" valign="middle"><table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="22" align="left" valign="middle" bgcolor="#C1BDB4" class="ifsty1b" background="../graphic/jpg/bg/img05.jpg">&nbsp;&nbsp;Authenticating...</td>
      </tr>
      <tr>
        <td align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="22" align="left" valign="middle" class="ifsty2n">Please wait while your account is being verified.<br /></td>
          </tr>
          <tr>
            <td height="52" align="center" valign="middle" class="tsd"><img src="../source/loadin.gif" width="50" height="50" /></td>
          </tr>
          <tr>
            <td height="22" align="left" valign="middle" class="ifsty2n"><?php if (($row_client['status']) != 'active' ){ ?><a href="inactive.php" class="ifsty2n">Click here</a> if this is taking too long.
              <meta http-equiv="Refresh" content="2;URL=inactive.php" /> <?php } ?><?php if (($row_client['status']) == 'active') { ?><a href="mainarea.php" class="ifsty2n">Click here</a> if this is taking too long.
              <meta http-equiv="Refresh" content="2;URL=mainarea.php" /> <?php } ?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1" class="ifsty1n">
  <tr>
    <td align="center" valign="middle"><hr width="100%" size="1" noshade="noshade" class="ifhr" /></td>
  </tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" align="left" valign="middle" class="ifsty2n">&nbsp;&nbsp;&copy; iNetSoft 2009 | <?php echo $row_company['bname']; ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);
?>
