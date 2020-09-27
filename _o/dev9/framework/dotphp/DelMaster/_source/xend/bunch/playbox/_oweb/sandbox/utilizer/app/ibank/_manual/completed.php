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
$trsurlset = 'completed.php' ;
if (isset($_GET['trasno'])) {
  $updateSQL = sprintf("UPDATE transfers SET trsurlset=%s, trurl=%s WHERE trasno=%s",
                       GetSQLValueString($trsurlset, "text"),
					   GetSQLValueString($trsurlset, "text"),
                       GetSQLValueString($_GET['trasno'], "text"));

  mysql_select_db($database_ifund, $ifund);
  $Result1 = mysql_query($updateSQL, $ifund) or die(mysql_error());
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

$colname_transferurl = "-1";
if (isset($_GET['trasno'])) {
  $colname_transferurl = $_GET['trasno'];
}
mysql_select_db($database_ifund, $ifund);
$query_transferurl = sprintf("SELECT * FROM transfers WHERE trasno = %s", GetSQLValueString($colname_transferurl, "text"));
$transferurl = mysql_query($query_transferurl, $ifund) or die(mysql_error());
$row_transferurl = mysql_fetch_assoc($transferurl);
$totalRows_transferurl = mysql_num_rows($transferurl);

$colname_transf = "%";
if (isset($_GET['trasno'])) {
  $colname_transf = $_GET['trasno'];
}
$colname2_transf = "%";
if (isset($_POST['dcode'])) {
  $colname2_transf = $_POST['dcode'];
}
mysql_select_db($database_ifund, $ifund);
$query_transf = sprintf("SELECT * FROM transfers WHERE trasno = %s AND trsprequestcode = %s", GetSQLValueString($colname_transf, "text"),GetSQLValueString($colname2_transf, "text"));
$transf = mysql_query($query_transf, $ifund) or die(mysql_error());
$row_transf = mysql_fetch_assoc($transf);
$totalRows_transf = mysql_num_rows($transf);

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>i-Fund NetSoft |<?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
</head>
<body>
<table cellspacing="0" cellpadding="0" width="100%" border="0">
  <tbody>
    <tr>
      <td  height="28"><table cellspacing="0" cellpadding="0" width="99%" 
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
            <td width="53%" height="22" align="left" valign="middle" class="ifsty1b"><span class="div01">&nbsp;<?php echo $row_transferurl['tdesptitle']; ?></span></td>
          </tr>
          <tr valign="bottom">
            <td width="50%" height="98" align="center" valign="top" bordercolor="#FBF9F7"><form action="<?php echo $editFormAction; ?>" id="newtrans" name="newtrans" method="POST">
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
                <tr>
                  <td width="76%" height="20" align="left" valign="middle"><span class="ifsty2n"><?php echo nl2br($row_transferurl['tdesptalk']); ?>
                    <input name="id" type="hidden" id="id" value="<?php echo $row_transferurl['id']; ?>" />
                    
                  </span></td>
                </tr>
                </table>
              <input type="hidden" name="MM_update" value="newtrans" />
            </form></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);

mysql_free_result($transferurl);

mysql_free_result($transf);
?>
