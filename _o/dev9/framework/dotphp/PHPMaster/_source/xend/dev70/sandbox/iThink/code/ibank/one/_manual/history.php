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
$query_transf = sprintf("SELECT * FROM transfers WHERE `by` = %s AND trurl != 'completed.php' ORDER BY id DESC", GetSQLValueString($colname_transf, "text"));
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
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" scope="col"><table width="98%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td height="20" align="left" valign="middle"   bgcolor="#E0C6C5" class="ifsty2b" scope="col">&nbsp;TRANSACTION HISTORY</td>
        </tr>
      <tr>
        <td align="left" valign="top"  scope="col">
        <table width="100%" border="1" cellpadding="0" cellspacing="1" bordercolor="#B2D0EC">
         <?php if(!empty($row_client['trans_1'])){?> <tr>
          <tr>
            <td width="67%" height="20" align="left" valign="middle" class="ifsty1n" style="padding-left:2px;" scope="col"><?php echo $row_client['trans_1']; ?></td>
          </tr>
          <?php }?>
         <?php if(!empty($row_client['trans_2'])){?> <tr>
          <tr>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['trans_2']; ?></td>
            </tr>
          <?php }?>
         <?php if(!empty($row_client['trans_3'])){?>
         <tr>
          <tr>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['trans_3']; ?></td>
            </tr>
          <?php }?>
         <?php if(!empty($row_client['trans_4'])){?> <tr>

          <tr>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['trans_4']; ?></td>
            </tr>
          <?php }?>
         <?php if(!empty($row_client['trans_5'])){?>
         <tr>
          <tr>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['trans_5']; ?></td>
            </tr>
          <?php }?>
         <?php if(!empty($row_client['trans_6'])){?>
         <tr>
          <tr>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['trans_6']; ?></td>
            </tr>
          <?php }?>
         <?php if(!empty($row_client['trans_7'])){?>
         <tr>
            <td height="20" align="left" valign="middle" class="ifsty1n" scope="col" style="padding-left:2px;"><?php echo $row_client['trans_7']; ?></td>
            </tr>
          <?php }?>
        </table></td>
        </tr>
      </table>      </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);

mysql_free_result($accofficer);

mysql_free_result($transf);
?>
