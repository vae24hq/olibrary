<?php require_once('../core.php');
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
$clientStatus = client('status');
?>
<head>
<meta charset="utf-8">
<title>iNetSoft -<?php echo firm('bname');?></title>
<link rel="stylesheet" type="text/css" href="../source/inetsoft.css">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>

<body>

<?php include ('slice_header.php');?>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td height="400" align="center" valign="middle"><table width="500" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="22" align="left" valign="middle" bgcolor="#C1BDB4" class="ifsty1b">&nbsp;&nbsp;Authenticating...</td>
        </tr>
        <tr>
          <td align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="22" align="left" valign="middle" class="info">Please wait while your account is being verified.<br /></td>
              </tr>
              <tr>
                <td height="52" align="center" valign="middle" class="tsd"><img src="../source/loadin.gif" width="50" height="50" /></td>
              </tr>
              <tr>
                <td height="22" align="left" valign="middle" class="info"><?php if ($clientStatus != 'active' ){ ?>
                  <a href="inactive.php" class="info">Click here</a> if this is taking too long.
                  <meta http-equiv="Refresh" content="2; URL=inactive.php" />
                  <?php } ?>
                  <?php if ($clientStatus == 'active') { ?>
                  <a href="./" class="info">Click here</a> if this is taking too long.
                  <meta http-equiv="Refresh" content="2; URL=./">
                  <?php } ?></td>
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


<?php include ('slice_footer.php');?>
</body>
</html>