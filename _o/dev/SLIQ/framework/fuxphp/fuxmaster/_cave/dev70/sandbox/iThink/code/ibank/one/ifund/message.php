<?php 
	require_once('../Connections/ifund.php');
	require('dw.php');


$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_ifund, $ifund);
$query_company = "SELECT * FROM company";
$company = mysql_query($query_company, $ifund) or die(mysql_error());
$row_company = mysql_fetch_assoc($company);
$totalRows_company = mysql_num_rows($company);

mysql_select_db($database_ifund, $ifund);
$query_client = "SELECT * FROM officer";
$client = mysql_query($query_client, $ifund) or die(mysql_error());
$row_client = mysql_fetch_assoc($client);
$totalRows_client = mysql_num_rows($client);

$maxRows_mails = 10;
$pageNum_mails = 0;
if (isset($_GET['pageNum_mails'])) {
  $pageNum_mails = $_GET['pageNum_mails'];
}
$startRow_mails = $pageNum_mails * $maxRows_mails;

$colname_mails = "%";
if (isset($_SESSION['MM_Username'])) {
  $colname_mails = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_mails = sprintf("SELECT * FROM mails WHERE mridno = %s AND mrclocation='inbox' AND mrtrash !='yes' ORDER BY id DESC", GetSQLValueString($colname_mails, "text"));
$query_limit_mails = sprintf("%s LIMIT %d, %d", $query_mails, $startRow_mails, $maxRows_mails);
$mails = mysql_query($query_limit_mails, $ifund) or die(mysql_error());
$row_mails = mysql_fetch_assoc($mails);

if (isset($_GET['totalRows_mails'])) {
  $totalRows_mails = $_GET['totalRows_mails'];
} else {
  $all_mails = mysql_query($query_mails);
  $totalRows_mails = mysql_num_rows($all_mails);
}
$totalPages_mails = ceil($totalRows_mails/$maxRows_mails)-1;

mysql_select_db($database_ifund, $ifund);
$query_unreadinbox = "SELECT * FROM mails WHERE mridno = '$_SESSION[MM_Username]' AND mrclocation='inbox' AND mrtrash !='yes' AND mrread = 'no'";
$unreadinbox = mysql_query($query_unreadinbox, $ifund) or die(mysql_error());
$row_unreadinbox = mysql_fetch_assoc($unreadinbox);
$totalRows_unreadinbox = mysql_num_rows($unreadinbox);

$maxRows_sentma = 10;
$pageNum_sentma = 0;
if (isset($_GET['pageNum_sentma'])) {
  $pageNum_sentma = $_GET['pageNum_sentma'];
}
$startRow_sentma = $pageNum_sentma * $maxRows_sentma;

$scolname_sentma = "%";
if (isset($_SESSION['MM_Username'])) {
  $scolname_sentma = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_sentma = sprintf("SELECT * FROM mails WHERE msidno = %s AND msclocation='sent' AND mstrash !='yes' ORDER BY id DESC", GetSQLValueString($scolname_sentma, "text"));
$query_limit_sentma = sprintf("%s LIMIT %d, %d", $query_sentma, $startRow_sentma, $maxRows_sentma);
$sentma = mysql_query($query_limit_sentma, $ifund) or die(mysql_error());
$row_sentma = mysql_fetch_assoc($sentma);

if (isset($_GET['totalRows_sentma'])) {
  $totalRows_sentma = $_GET['totalRows_sentma'];
} else {
  $all_sentma = mysql_query($query_sentma);
  $totalRows_sentma = mysql_num_rows($all_sentma);
}
$totalPages_sentma = ceil($totalRows_sentma/$maxRows_sentma)-1;

$maxRows_draftma = 10;
$pageNum_draftma = 0;
if (isset($_GET['pageNum_draftma'])) {
  $pageNum_draftma = $_GET['pageNum_draftma'];
}
$startRow_draftma = $pageNum_draftma * $maxRows_draftma;

$colname6_draftma = "%";
if (isset($_SESSION['MM_Username'])) {
  $colname6_draftma = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_draftma = sprintf("SELECT * FROM mails WHERE msidno = %s AND msclocation ='draft' AND mstrash ='no' OR mridno = %s AND mrclocation ='draft' AND mrtrash ='no' ORDER BY id DESC", GetSQLValueString($colname6_draftma, "text"),GetSQLValueString($colname6_draftma, "text"));
$query_limit_draftma = sprintf("%s LIMIT %d, %d", $query_draftma, $startRow_draftma, $maxRows_draftma);
$draftma = mysql_query($query_limit_draftma, $ifund) or die(mysql_error());
$row_draftma = mysql_fetch_assoc($draftma);

if (isset($_GET['totalRows_draftma'])) {
  $totalRows_draftma = $_GET['totalRows_draftma'];
} else {
  $all_draftma = mysql_query($query_draftma);
  $totalRows_draftma = mysql_num_rows($all_draftma);
}
$totalPages_draftma = ceil($totalRows_draftma/$maxRows_draftma)-1;

$maxRows_trashma = 10;
$pageNum_trashma = 0;
if (isset($_GET['pageNum_trashma'])) {
  $pageNum_trashma = $_GET['pageNum_trashma'];
}
$startRow_trashma = $pageNum_trashma * $maxRows_trashma;

$colname4_trashma = "%";
if (isset($_SESSION['MM_Username'])) {
  $colname4_trashma = $_SESSION['MM_Username'];
}
mysql_select_db($database_ifund, $ifund);
$query_trashma = sprintf("SELECT * FROM mails WHERE msidno = %s AND msclocation ='trash' AND mstrash ='yes' AND dstrash !='yes' OR mridno = %s AND mrclocation ='trash' AND mrtrash ='yes' AND drtrash !='yes' ORDER BY id DESC", GetSQLValueString($colname4_trashma, "text"),GetSQLValueString($colname4_trashma, "text"));
$query_limit_trashma = sprintf("%s LIMIT %d, %d", $query_trashma, $startRow_trashma, $maxRows_trashma);
$trashma = mysql_query($query_limit_trashma, $ifund) or die(mysql_error());
$row_trashma = mysql_fetch_assoc($trashma);

if (isset($_GET['totalRows_trashma'])) {
  $totalRows_trashma = $_GET['totalRows_trashma'];
} else {
  $all_trashma = mysql_query($query_trashma);
  $totalRows_trashma = mysql_num_rows($all_trashma);
}
$totalPages_trashma = ceil($totalRows_trashma/$maxRows_trashma)-1;

$colme_readmail = "%";
if (isset($_GET['mailid'])) {
  $colme_readmail = $_GET['mailid'];
}
mysql_select_db($database_ifund, $ifund);
$query_readmail = sprintf("SELECT * FROM mails WHERE mrg_id = %s", GetSQLValueString($colme_readmail, "text"));
$readmail = mysql_query($query_readmail, $ifund) or die(mysql_error());
$row_readmail = mysql_fetch_assoc($readmail);
$totalRows_readmail = mysql_num_rows($readmail);

$cozxinae_repmail = "%";
if (isset($_GET['rmid'])) {
  $cozxinae_repmail = $_GET['rmid'];
}
mysql_select_db($database_ifund, $ifund);
$query_repmail = sprintf("SELECT * FROM mails WHERE mrg_id = %s", GetSQLValueString($cozxinae_repmail, "text"));
$repmail = mysql_query($query_repmail, $ifund) or die(mysql_error());
$row_repmail = mysql_fetch_assoc($repmail);
$totalRows_repmail = mysql_num_rows($repmail);

$queryString_mails = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_mails") == false && 
        stristr($param, "totalRows_mails") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_mails = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_mails = sprintf("&totalRows_mails=%d%s", $totalRows_mails, $queryString_mails);

$queryString_sentma = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_sentma") == false && 
        stristr($param, "totalRows_sentma") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_sentma = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_sentma = sprintf("&totalRows_sentma=%d%s", $totalRows_sentma, $queryString_sentma);

$queryString_draftma = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_draftma") == false && 
        stristr($param, "totalRows_draftma") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_draftma = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_draftma = sprintf("&totalRows_draftma=%d%s", $totalRows_draftma, $queryString_draftma);

$queryString_trashma = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_trashma") == false && 
        stristr($param, "totalRows_trashma") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_trashma = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_trashma = sprintf("&totalRows_trashma=%d%s", $totalRows_trashma, $queryString_trashma);
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>i-Fund NetSoft |<?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<script src="../source/SpryValidationTextarea.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<link href="../source/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body, td, th {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #069;
}
body {
	background-color: #FFF;
	margin-left: 0px;
	margin-top: 4px;
	margin-right: 0px;
	margin-bottom: 0px;
}
a:link {
	color: #036;
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
	color: #036;
}
a:hover {
	text-decoration: none;
	color: #A60000;
}
a:active {
	text-decoration: underline;
	color: #036;
}
-->
</style>
</head>

<body>

<table width="900" 
                              border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td  
                                height="28"><table cellspacing="0" cellpadding="0" width="99%" 
                                align="center" border="0">
          <tbody>
            <tr>
              <td width="8%" align="center" valign="middle" bgcolor="#D6D6D6" class="ifsty2b">MESSAGES</td>
              <td width="88%" align="right" valign="middle" class="ifsty2b"><a href="../i-fund/?page=compose" class="ifsty1b">-WRITE A MESSAGE</a>&nbsp;|&nbsp;<a href="../i-fund/?page=messages" class="ifsty1b">-INBOX
                <?php if ($totalRows_unreadinbox > 0) { // Show if recordset not empty ?>
                  <strong>(<?php echo $totalRows_unreadinbox ?>)</strong>
                  <?php } // Show if recordset not empty ?>
                </a>&nbsp;|&nbsp;<a href="../i-fund/?page=sent" class="ifsty1b">-SENT ITEMS</a> | <a href="../i-fund/?page=draft" class="ifsty1b">-DRAFT</a> | <a href="../i-fund/?page=trash" class="ifsty1b">-STORED ITEMS </a></td>
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
      <td height="40" align="center" valign="middle"><?php if(isset($_GET['page']) && $_GET['page'] == 'messages' ) { ?>
        <table width="900" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="file:///D|/wamp/www/images/jpg/common/bgbluetop.jpg" bgcolor="#8694AE">&nbsp;&nbsp;&nbsp;<span class="ifsty2n"> &nbsp;&nbsp;Inbox
                    <?php if ($totalRows_mails > 0) { // Show if recordset not empty ?>
                      (showing <?php echo ($startRow_mails + 1) ?>&nbsp;to&nbsp;<?php echo min($startRow_mails + $maxRows_mails, $totalRows_mails) ?> of&nbsp; <?php echo $totalRows_mails ?> )
                      <?php } // Show if recordset not empty ?>
                    </span></td>
                </tr>
              </table>
              <?php if ($totalRows_mails > 0) { // Show if recordset not empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr class="ifsty1b">
                    <td width="19%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="dline03" scope="col">Sender</td>
                    <td width="48%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="dline03" scope="col">Subject of Message </td>
                    <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="dline03" scope="col">Date</td>
                  </tr>
                </table>
                <?php do { ?>
                  <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF">
                    <?php // BEGINS THE REPEAT REGION FOR INBOX MESSAGES ?>
                    <tr>
                      <td width="19%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle" class="ifsty1b">&nbsp;<?php echo $row_mails['msidno']; ?></td>
                          </tr>
                        </table></td>
                      <td width="48%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><?php if ($row_mails['mrread']==' yes') { // Show if recordset empty ?>
                        <table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="18" align="left" valign="middle"><a href="../i-fund/?page=readmail&mailid=<?php echo $row_mails['mrg_id']; ?>" class="ifsty2n"><?php echo $row_mails['msubject']; ?></a></td>
                          </tr>
                        </table>
                        <?php } // Show if recordset empty ?>
                        <?php if ($row_mails['mrread'] == 'no') { // Show if recordset empty ?>
                        <table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="18" align="left" valign="middle"><a href="../i-fund/?page=readmail&mailid=<?php echo $row_mails['mrg_id']; ?>" class="ifsty1b"><?php echo $row_mails['msubject']; ?></a></td>
                          </tr>
                        </table>
                        <?php } // Show if recordset empty ?></td>
                      <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle" class="ifsty1n"><?php echo $row_mails['msdate']; ?>-<?php echo $row_mails['msmonth']; ?>-<?php echo $row_mails['msyear']; ?></td>
                          </tr>
                        </table></td>
                    </tr>
                    <?php // ENDS THE REPEAT REGION FOR INBOX MESSAGES ?>
                  </table>
                  <?php } while ($row_mails = mysql_fetch_assoc($mails)); ?>
                <table width="98%" border="0" cellpadding="0" cellspacing="0" class="space">
                  <tr>
                    <td height="2">&nbsp;</td>
                  </tr>
                </table>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr>
                    <td height="22" align="center" valign="middle" bordercolor="#C5E7F6" bgcolor="#C5E7F6" scope="col"><span class="ifsty2b"><a href="<?php printf("%s?pageNum_mails=%d%s", $currentPage, 0, $queryString_mails); ?>" class="ifsty1b">First</a> | <a href="<?php printf("%s?pageNum_mails=%d%s", $currentPage, max(0, $pageNum_mails - 1), $queryString_mails); ?>" class="ifsty1b">Previous</a> | <a href="<?php printf("%s?pageNum_mails=%d%s", $currentPage, min($totalPages_mails, $pageNum_mails + 1), $queryString_mails); ?>" class="ifsty1b">Next</a> | <a href="<?php printf("%s?pageNum_mails=%d%s", $currentPage, $totalPages_mails, $queryString_mails); ?>" class="ifsty1b">Last</a></span></td>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_mails == 0) { // Show if recordset empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#8BCFED">
                  <tr>
                    <td height="44" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#E6F4FB" class="texsty05" scope="col"><p class="ifsty1br">YOU HAVE NO MESSAGES !</p></td>
                  </tr>
                </table>
                <?php } // Show if recordset empty ?></td>
          </tr>
        </table>
        <?php } ?>
        <?php if($_GET['page'] == 'sent' ) { // BEGINS THE QUERY SET FOR SENT ITEM PAGE?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg" bgcolor="#8694AE"><span class="ifsty2n"> &nbsp;&nbsp;Sent Item
                    <?php if ($totalRows_sentma > 0) { // Show if recordset not empty ?>
                      (showing <?php echo ($startRow_sentma + 1) ?>&nbsp;to&nbsp;<?php echo min($startRow_sentma + $maxRows_sentma, $totalRows_sentma) ?> of&nbsp; <?php echo $totalRows_sentma ?> )
                      <?php } // Show if recordset not empty ?>
                    </span></td>
                </tr>
              </table>
              <?php if ($totalRows_sentma > 0) { // Show if recordset not empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr class="ifsty1b">
                    <td height="22" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="dline03" scope="col">&nbsp;&nbsp;&nbsp;Message Subject </td>
                    <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="dline03" scope="col">Date</td>
                  </tr>
                </table>
                <?php do { ?>
                  <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                    <?php // BEGINS THE REPEAT REGION FOR SENT MESSAGES ?>
                    <tr>
                      <td height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="18" align="left" valign="middle"><a href="../i-fund/?page=readmail&mailid=<?php echo $row_sentma['mrg_id']; ?>" class="ifsty1b"><?php echo $row_sentma['msubject']; ?></a></td>
                          </tr>
                        </table></td>
                      <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle" class="ifsty1n"><?php echo $row_sentma['msdate']; ?>-<?php echo $row_sentma['msmonth']; ?>-<?php echo $row_sentma['msyear']; ?></td>
                          </tr>
                        </table></td>
                    </tr>
                    <?php // ENDS THE REPEAT REGION FOR SENT MESSAGES ?>
                  </table>
                  <?php } while ($row_sentma = mysql_fetch_assoc($sentma)); ?>
                <table width="98%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr>
                    <td height="22" align="right" valign="middle" bordercolor="#C5E7F6" bgcolor="#C5E7F6" scope="col"><span class="ifsty2b"><a href="<?php printf("%s?pageNum_sentma=%d%s", $currentPage, 0, $queryString_sentma); ?>" class="ifsty1b">First</a> | <a href="<?php printf("%s?pageNum_sentma=%d%s", $currentPage, max(0, $pageNum_sentma - 1), $queryString_sentma); ?>" class="ifsty1b">Previous</a> | <a href="<?php printf("%s?pageNum_sentma=%d%s", $currentPage, min($totalPages_sentma, $pageNum_sentma + 1), $queryString_sentma); ?>" class="ifsty1b">Next</a> | <a href="<?php printf("%s?pageNum_sentma=%d%s", $currentPage, $totalPages_sentma, $queryString_sentma); ?>" class="ifsty1b">Last</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_sentma == 0) { // Show if recordset empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#8BCFED">
                  <tr>
                    <td height="44" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#E6F4FB" class="texsty05" scope="col"><p class="ifsty1br">YOU HAVE NO MESSAGES !</p></td>
                  </tr>
                </table>
                <?php } // Show if recordset empty ?></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR SENT ITEM PAGE ?>
        <?php if($_GET['page'] == 'draft' ) { // BEGINS THE QUERY SET FOR DRAFT PAGE?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg" bgcolor="#8694AE"><span class="ifsty2n"> &nbsp;&nbsp;Draft Item
                    <?php if ($totalRows_draftma > 0) { // Show if recordset not empty ?>
                      (showing <?php echo ($startRow_draftma + 1) ?>&nbsp;to&nbsp;<?php echo min($startRow_draftma + $maxRows_draftma, $totalRows_draftma) ?> of&nbsp; <?php echo $totalRows_draftma ?> )
                      <?php } // Show if recordset not empty ?>
                    </span></td>
                </tr>
              </table>
              <?php if ($totalRows_draftma > 0) { // Show if recordset not empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr class="ifsty1b">
                    <td height="22" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="tse" scope="col">&nbsp;&nbsp;&nbsp;Message Subject </td>
                    <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="tsi" scope="col">Date</td>
                  </tr>
                </table>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <?php // BEGINS THE REPEAT REGION FOR DRAFT MESSAGES ?>
                  <tr>
                    <?php do { ?>
                      <td height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="18" align="left" valign="middle"><a href="../i-fund/?page=readmail&mailid=<?php echo $row_draftma['mrg_id']; ?>" class="ifsty1b"><?php echo $row_draftma['msubject']; ?></a></td>
                          </tr>
                        </table></td>
                      <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle" class="ifsty1n"><?php echo $row_draftma['msdate']; ?>-<?php echo $row_draftma['msmonth']; ?>-<?php echo $row_draftma['msyear']; ?></td>
                          </tr>
                        </table></td>
                      <?php } while ($row_draftma = mysql_fetch_assoc($draftma)); ?>
                  </tr>
                  <?php // ENDS THE REPEAT REGION FOR DRAFT MESSAGES ?>
                </table>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr>
                    <td height="22" align="right" valign="middle" bordercolor="#C5E7F6" bgcolor="#C5E7F6" scope="col"><span class="ifsty2b"><a href="<?php printf("%s?pageNum_draftma=%d%s", $currentPage, 0, $queryString_draftma); ?>" class="ifsty1b">First</a> | <a href="<?php printf("%s?pageNum_draftma=%d%s", $currentPage, max(0, $pageNum_draftma - 1), $queryString_draftma); ?>" class="ifsty1b">Previous</a> | <a href="<?php printf("%s?pageNum_draftma=%d%s", $currentPage, min($totalPages_draftma, $pageNum_draftma + 1), $queryString_draftma); ?>" class="ifsty1b">Next</a> | <a href="<?php printf("%s?pageNum_draftma=%d%s", $currentPage, $totalPages_draftma, $queryString_draftma); ?>" class="ifsty1b">Last</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_draftma == 0) { // Show if recordset empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#8BCFED">
                  <tr>
                    <td height="44" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#E6F4FB" class="texsty05" scope="col"><p class="ifsty1br">YOU HAVE NO MESSAGES !</p></td>
                  </tr>
                </table>
                <?php } // Show if recordset empty ?></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR DRAFT ITEM PAGE?>
        <?php if($_GET['page'] == 'trash' ) { // BEGINS THE QUERY SET FOR TRASH PAGE ?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg" bgcolor="#8694AE">&nbsp;&nbsp;<span class="ifsty2n">Stored Item
                    <?php if ($totalRows_trashma > 0) { // Show if recordset not empty ?>
                      (showing <?php echo ($startRow_trashma + 1) ?>&nbsp;to&nbsp;<?php echo min($startRow_trashma + $maxRows_trashma, $totalRows_trashma) ?> of&nbsp; <?php echo $totalRows_trashma ?> )
                      <?php } // Show if recordset not empty ?>
                    </span></td>
                </tr>
              </table>
              <?php if ($totalRows_trashma > 0) { // Show if recordset not empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr class="ifsty1b">
                    <td height="22" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="dline03" scope="col">&nbsp;&nbsp;&nbsp;Message Subject </td>
                    <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="dline03" scope="col">Date</td>
                  </tr>
                </table>
                <?php do { ?>
                  <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF">
                    <?php // BEGINS THE REPEAT REGION FOR TRASH MESSAGES ?>
                    <tr>
                      <td height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="18" align="left" valign="middle"><a href="../i-fund/?page=readmail&mailid=<?php echo $row_trashma['mrg_id']; ?>" class="ifsty1b"><?php echo $row_trashma['msubject']; ?></a></td>
                          </tr>
                        </table></td>
                      <td width="23%" height="22" align="center" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="footerstyle01"><table width="96%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" valign="middle" class="ifsty1n"><?php echo $row_trashma['msdate']; ?>-<?php echo $row_trashma['msmonth']; ?>-<?php echo $row_trashma['msyear']; ?></td>
                          </tr>
                        </table></td>
                    </tr>
                    <?php // ENDS THE REPEAT REGION FOR DRAFT MESSAGES ?>
                  </table>
                  <?php } while ($row_trashma = mysql_fetch_assoc($trashma)); ?>
                <table width="900" border="1" cellpadding="0" cellspacing="1" bordercolor="#C7DCF1">
                  <tr>
                    <td height="22" align="right" valign="middle" bordercolor="#C5E7F6" bgcolor="#C5E7F6" scope="col"><span class="ifsty2b"><a href="<?php printf("%s?pageNum_trashma=%d%s", $currentPage, 0, $queryString_trashma); ?>" class="ifsty1b">First</a> | <a href="<?php printf("%s?pageNum_trashma=%d%s", $currentPage, max(0, $pageNum_trashma - 1), $queryString_trashma); ?>" class="ifsty1b">Previous</a> | <a href="<?php printf("%s?pageNum_trashma=%d%s", $currentPage, min($totalPages_trashma, $pageNum_trashma + 1), $queryString_trashma); ?>" class="ifsty1b">Next</a> | <a href="<?php printf("%s?pageNum_trashma=%d%s", $currentPage, $totalPages_trashma, $queryString_trashma); ?>" class="ifsty1b">Last</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
                  </tr>
                </table>
                <?php } // Show if recordset not empty ?>
              <?php if ($totalRows_trashma == 0) { // Show if recordset empty ?>
                <table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#8BCFED">
                  <tr>
                    <td height="44" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#E6F4FB" class="texsty05" scope="col"><p class="ifsty1br">YOU HAVE NO MESSAGES !</p></td>
                  </tr>
                </table>
                <?php } // Show if recordset empty ?></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR TRASH ITEM PAGE?>
        <?php if($_GET['page'] == 'readmail' ) { ?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg" bgcolor="#8694AE">&nbsp;&nbsp;&nbsp;<span class="ifsty2b">&nbsp;Message Details </span></td>
                </tr>
              </table>
              <table width="900" height="359" border="1" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF">
                <tr>
                  <td width="21%" height="20" align="right" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="ifsty1b">Sender's Data&nbsp;::&nbsp;&nbsp;</td>
                  <td width="79%" height="20" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="ifsty1n">&nbsp; <span class="dline01"><?php echo $row_readmail['msidno']; ?></span><span class="dline02">, </span><span class="div01">&nbsp;</span>'<?php echo $row_readmail['msfn']; ?>&nbsp;<?php echo $row_readmail['msln']; ?>'&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="ifsty1b">Date/Time&nbsp;::&nbsp;&nbsp;</td>
                  <td height="20" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="ifsty1n">&nbsp;&nbsp;<?php echo $row_readmail['msday']; ?>,&nbsp;<?php echo $row_readmail['msmonth']; ?>&nbsp;<?php echo $row_readmail['msdate']; ?>,&nbsp;<?php echo $row_readmail['msyear']; ?>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_readmail['msthrs']; ?>:<?php echo $row_readmail['mstmins']; ?>:<?php echo $row_readmail['mstsecs']; ?> <?php echo $row_readmail['mstd']; ?></td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="ifsty1b">Subject&nbsp;::&nbsp;&nbsp;</td>
                  <td height="20" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="ifsty1n">&nbsp;&nbsp;<?php echo $row_readmail['msubject']; ?></td>
                </tr>
                <tr>
                  <td height="20" colspan="2" align="center" valign="middle" bordercolor="#8BCFED"><table width="900" border="0" cellpadding="0" cellspacing="0" class="space">
                      <tr>
                        <td height="10" align="center" valign="middle">&nbsp;</td>
                      </tr>
                    </table>
                    <table width="98%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="160" align="left" valign="top" class="ifsty2n"><?php echo (nl2br ($row_readmail['mbcontent'])); ?></td>
                      </tr>
                    </table>
                    <table width="900" border="0" cellpadding="0" cellspacing="0" class="space">
                      <tr>
                        <td height="10" align="center" valign="middle">&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td height="20" align="left" valign="middle" bordercolor="#FFFFFF"><?php 
	//begins check mails sender
	if ($row_readmail['mridno'] == $_SESSION['MM_Username']) 
	{ $upsql = "UPDATE mails SET mrread = 'yes' WHERE mrg_id='$row_readmail[mrg_id]'";
	  $runq = mysql_query($upsql, $ifund) or die(mysql_error());
	
	} 
	
		if ($row_readmail['msidno'] == $_SESSION['MM_Username']) 
		{ 
		 $upsql = "UPDATE mails SET msread = 'yes' WHERE mrg_id='$row_readmail[mrg_id]'";
	  $runq = mysql_query($upsql, $ifund) or die(mysql_error());
	
		}
		
	
//ends check mails sender ?></td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td height="20" align="left" valign="middle" bordercolor="#FFFFFF"><input name="Reply" type="submit" class="button01" id="Reply" onclick="MM_goToURL('self','../i-fund/?page=compose&amp;mailto=<?php echo $row_readmail['msidno']; ?>&amp;rmid=<?php echo $row_readmail['mrg_id']; ?>');return document.MM_returnValue" value="Reply" />
                    &nbsp;&nbsp;
                    <input name="SaveDraft" type="submit" class="button01" id="SaveDraft" onclick="MM_goToURL('self','../i-fund/?page=draftmail&amp;mailid=<?php echo $row_readmail['mrg_id']; ?>&amp;urgid=<?php if(isset($_SESSION['urgid'])) {echo $_SESSION['urgid'];} ?>');return document.MM_returnValue" value="Save to Draft" />
                    &nbsp;&nbsp;
                    <input name="MoveStore" type="submit" class="button01" id="MoveStore" onclick="MM_goToURL('self','../i-fund/?page=trashmail&amp;mailid=<?php echo $row_readmail['mrg_id']; ?>&amp;urgid=<?php if(isset($_SESSION['urgid'])) {echo $_SESSION['urgid'];} ?>');return document.MM_returnValue" value="Move to Store" />
                    &nbsp;&nbsp;
                    <input name="Delete" type="submit" class="button01" id="Delete" onclick="MM_goToURL('self','../i-fund/?page=deletemail&amp;mailid=<?php echo $row_readmail['mrg_id']; ?>&amp;urgid=<?php if(isset($_SESSION['urgid'])) {echo $_SESSION['urgid'];} ?>');return document.MM_returnValue" value="Delete" /></td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR READMAIL ITEM PAGE ?>
        <?php if($_GET['page'] == 'trashmail' ) { //BEGINS THE QUERY SET FOR MOVE TO TRASH PAGE ?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg" bgcolor="#8694AE">&nbsp;&nbsp;&nbsp;<span class="ifsty1b">&nbsp;Message Details </span></td>
                </tr>
              </table>
              <table width="900" height="145" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                <tr>
                  <td height="21" colspan="2" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="ifsty2b">&nbsp;&nbsp;&nbsp;Moved to Storage </td>
                </tr>
                <tr>
                  <td height="20" colspan="2" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="ifsty2n">&nbsp;&nbsp;Your message has been saved.</td>
                </tr>
                <meta http-equiv="Refresh" content="3;URL=../i-fund/?page=trash" />
                <tr>
                  <td width="46%" height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td width="54%" height="20" align="left" valign="middle" bordercolor="#FFFFFF"><?php 
	//begins check mails sender
	if ($row_readmail['msidno'] == $_SESSION['MM_Username']) 
	{ $upsql = "UPDATE mails SET msclocation = 'trash' WHERE mrg_id='$_GET[mailid]'"; 
	$runq = mysql_query($upsql, $ifund) or die(mysql_error());
	$upsql = "UPDATE mails SET mstrash = 'yes' WHERE mrg_id='$_GET[mailid]'"; 
	$runq = mysql_query($upsql, $ifund) or die(mysql_error());
	$upsql = "UPDATE mails SET dstrash = 'no' WHERE mrg_id='$_GET[mailid]'"; 
	$runq = mysql_query($upsql, $ifund) or die(mysql_error());
	
	} 
	
		if ($row_readmail['mridno'] == $_SESSION['MM_Username']) 
		{ 
		 $upsql = "UPDATE mails SET mrclocation = 'trash' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
            $upsql = "UPDATE mails SET mrtrash = 'yes' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
               $upsql = "UPDATE mails SET drtrash = 'no' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());

	
		}
		
	
//ends check mails sender ?></td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td height="20" align="left" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR MOVE TO TRASH PAGE ?>
        <?php if($_GET['page'] == 'draftmail' ) { // BEGINS THE QUERY SET FOR MOVE TO DRAFT PAGE ?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg" bgcolor="#8694AE">&nbsp;&nbsp;&nbsp;<span class="ifsty1b">&nbsp;Message Details </span></td>
                </tr>
              </table>
              <table width="900" height="154" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                <tr>
                  <td height="21" colspan="2" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="ifsty2b">&nbsp;&nbsp;&nbsp;Moved to draft </td>
                </tr>
                <tr>
                  <td height="20" colspan="2" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="ifsty2n">&nbsp;&nbsp;Your message has been moved to draft items. </td>
                </tr>
                <meta http-equiv="Refresh" content="3;URL=../i-fund/?page=draft" />
                <tr>
                  <td width="46%" height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td width="54%" height="20" align="left" valign="middle" bordercolor="#FFFFFF"><?php 
	//begins check mails sender
	if ($row_readmail['msidno'] == $_SESSION['MM_Username']) 
	{  $upsql = "UPDATE mails SET msclocation = 'draft' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error()); 
               $upsql = "UPDATE mails SET mstrash = 'no' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());	
	} 
	
		if ($row_readmail['mridno'] == $_SESSION['MM_Username']) 
		{ 
		  $upsql = "UPDATE mails SET mrclocation = 'draft' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
              $upsql = "UPDATE mails SET mrtrash = 'no' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());

	
		}
		
	
//ends check mails sender ?></td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td height="20" align="left" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR MOVE TO DRAFT PAGE?>
        <?php if($_GET['page'] == 'deletemail' ) { // BEGINS THE QUERY SET FOR MOVE TO DELETE PAGE ?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                <tr>
                  <td width="32%" height="22" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg" bgcolor="#8694AE">&nbsp;&nbsp;&nbsp;<span class="ifsty1b">&nbsp;Message Details </span></td>
                </tr>
              </table>
              <table width="900" height="154" border="1" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF">
                <tr>
                  <td height="21" colspan="2" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#C5E7F6" class="ifsty2b">&nbsp;&nbsp;&nbsp;Delete message </td>
                </tr>
                <tr>
                  <td height="20" colspan="2" align="left" valign="middle" bordercolor="#8BCFED" bgcolor="#E6F4FB" class="ifsty2n">&nbsp;&nbsp;Your message has been deleted. </td>
                </tr>
                <meta http-equiv="Refresh" content="3;URL=../i-fund/?page=messages" />
                <tr>
                  <td width="46%" height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td width="54%" height="20" align="left" valign="middle" bordercolor="#FFFFFF"><?php 
	//begins check mails sender
	if ($row_readmail['msidno'] == $_SESSION['MM_Username']) 
	{  $upsql = "UPDATE mails SET msclocation = 'trash' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
               $upsql = "UPDATE mails SET mstrash = 'yes' WHERE mrg_id='$_GET[mailid]]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
              $upsql = "UPDATE mails SET dstrash = 'yes' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
	} 
	
		if ($row_readmail['mridno'] == $_SESSION['MM_Username']) 
		{ 
   $upsql = "UPDATE mails SET mrclocation = 'trash' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
              $upsql = "UPDATE mails SET mrtrash = 'yes' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());
          $upsql = "UPDATE mails SET drtrash = 'yes' WHERE mrg_id='$_GET[mailid]'"; 
$runq = mysql_query($upsql, $ifund) or die(mysql_error());

	
		}
		
	
//ends check mails sender ?></td>
                </tr>
                <tr>
                  <td height="20" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                  <td height="20" align="left" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td height="21" colspan="2" align="right" valign="middle" bordercolor="#FFFFFF">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR MOVE TO DELETE PAGE  ?>
        <?php if($_GET['page'] == 'compose' ) { // BEGINS THE QUERY SET FOR UPLOAD PASSPORT PAGE ?>
        <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="right" valign="top"><?php if(empty($_POST['msend']) || $_POST['msend'] == 'yes1' && empty($_POST['mridno']) ||  empty($_POST['msubject']) || empty($_POST['mbcontent'])) {?>
              <table width="900" border="1" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="32%" align="left" valign="middle" bordercolor="#FFFFFF" background="../graphic/jpg/bg/img07.jpg">&nbsp;&nbsp;&nbsp;<span class="ifsty2b">&nbsp;Compose new message </span></td>
                </tr>
                <tr>
                  <td align="center" valign="middle" bordercolor="#FFFFFF"><table width="99%" border="0" cellpadding="0" cellspacing="0" class="space">
                      <tr>
                        <td height="5">&nbsp;</td>
                      </tr>
                    </table>
                    <?php if (empty($_POST['msend'])) { ?>
                    <table width="98%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle" class="ifsty2n">Here you can post a message to your account officer and other support team. </td>
                      </tr>
                    </table>
                    <?php }  else {?>
                    <span class="div01">
                    <?php if ($_POST['msend'] == 'yes1' &&  (empty($_POST['mridno']) || empty($_POST['msubject']) || empty($_POST['mbcontent']))) { ?>
                    </span>
                    <table width="99%" border="1" cellpadding="0" cellspacing="0" bordercolor="#970000" bgcolor="#CE6E6F">
                      <tr>
                        <td height="20" align="left" valign="middle" bordercolor="#D98789" background="file:///D|/wamp/www/images/jpg/common/bgredtop.jpg" class="ifsty1b">&nbsp;Opps, one or more errors occured ! </td>
                      </tr>
                      <tr align="center" valign="middle">
                        <td height="22" bordercolor="#E9E0D1" bgcolor="#E9E0D1"><span class="ifsty2n"> You may have left one  or more fields  empty. </span></td>
                      </tr>
                    </table>
                    <?php } } ?>
                    <?php
			 $rand_content = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9');
$rand_keys = array_rand($rand_content, 49);
$ra1 = ($rand_content[$rand_keys[2]] );
$ra2 = $rand_content[$rand_keys[4]] ;
$ra3 = $rand_content[$rand_keys[18]] ;
$ra4 = $rand_content[$rand_keys[0]] ;
$ra5 = $rand_content[$rand_keys[6]] ;
$ra6 = $rand_content[$rand_keys[13]] ;
$ra7 = $rand_content[$rand_keys[5]] ;
$ra8 = $rand_content[$rand_keys[9]] ;
$ra9 = $rand_content[$rand_keys[22]] ;
$radv1 = $rand_content[$rand_keys[11]] ;
$radv2 = $rand_content[$rand_keys[14]] ;
$radv3 = $rand_content[$rand_keys[41]] ;
$mailid = ($ra2.$ra6.$radv1.$ra8.$ra3.$radv2.$ra9.$ra7.$ra4.$radv2);?>
                    <table width="99%" border="0" cellpadding="0" cellspacing="0" class="space">
                      <tr>
                        <td height="5">&nbsp;</td>
                      </tr>
                    </table>
                    <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                      <tr>
                        <td align="center" valign="top" bordercolor="#FFFFFF"><form id="sendmail" name="sendmail" method="post" action="">
                            <table width="99%" border="0" cellpadding="0" cellspacing="0" class="space">
                              <tr>
                                <td height="10">&nbsp;</td>
                              </tr>
                            </table>
                            <table width="98%" border="0" cellspacing="1" cellpadding="0">
                              <tr>
                                <td width="16%" height="20" align="right" valign="middle" class="ifsty2b">To&nbsp;:&nbsp;</td>
                                <td height="20" colspan="2" align="left" valign="middle" class="footerstyle01">
                                  <?php if (empty($_POST['msend']) && (empty($_POST['mridno']))) { ?>                   
                                  <input name="mridno" type="text" class="fs01" id="mridno" value="<?php if(!empty($_GET['mailto'])) {echo $_GET['mailto']; }?>" size="30" />
                                   <?php } ?>
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == "yes1" && empty($_POST['mridno'])) { ?>
                                    <input name="mridno" type="text" class="fs01" id="mridno" size="30" />
                                 
                                    <?php } ?>
                               
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == 'yes1' && !empty($_POST['mridno'])) { ?>
                                    
                                    <input name="mridno" type="text" class="fs01" id="mridno" value="<?php echo $_POST['mridno']; ?>" size="30" />
                                    <?php } ?>
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == 'yes1' && empty($_POST['mridno'])) { ?>
                                    &nbsp;<img src="../graphic/icons/jpg/wrong_red.jpg" alt="Required field" width="16" height="16" border="0" /> <span class="tsf">(Please enter the Officer  ID or Username) </span>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <tr>
                                <td height="20" align="right" valign="middle" class="ifsty2b">Subject&nbsp;:&nbsp;</td>
                                <td height="20" colspan="2" align="left" valign="middle">
                                  <?php if (empty($_POST['msend']) && empty($_POST['msubject'])) { ?>
                                  <input name="msubject" type="text" class="fs01" id="msubject" value="<?php if ($totalRows_repmail > 0) { // Show if recordset not empty ?>Re: <?php } // Show if recordset not empty ?><?php echo $row_repmail['msubject']; ?>" size="40" />
                                  <?php } ?>
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == "yes1" && empty($_POST['msubject'])) { ?>
                                    <input name="msubject" type="text" class="fs01" id="msubject" size="40" />
                                    <?php } ?>                                  
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == 'yes1' && !empty($_POST['msubject'])) { ?>                                  
                                    <input name="msubject" type="text" class="fs01" id="msubject" value="<?php echo $_POST['msubject']; ?>" size="40" />
                                    <?php } ?>
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == "yes1" && empty($_POST['msubject'])) { ?>
                                    &nbsp;<span class="footerstyle01"><img src="../graphic/icons/jpg/wrong_red.jpg" alt="Required field" width="16" height="16" border="0" /></span>
                                    <span class="tsf">(Please title your message here)</span>
                                    <?php } ?>
                                  </td>
                              </tr>
                              <tr>
                                <td height="10" align="right" valign="middle" class="ifsty2b">Message&nbsp;:&nbsp;</td>
                                <td width="67%" align="left" valign="top">
                                  <?php if (empty($_POST['msend']) && empty($_POST['mbcontent'])) { ?>
                                 <span id="sprytextarea1">
                                  <?php if (isset($_GET['mailto'])) { ?>                                   
                                    <textarea name="mbcontent" cols="70" rows="10" class="fs01" id="mbcontent"></textarea>
                                    <?php } ?>
                                  <?php if (!isset($_GET['mailto'])) { ?>
                                    <textarea name="mbcontent" cols="70" rows="10" class="fs01" id="mbcontent"></textarea>
                                    <?php } ?>
                                  <span class="textareaRequiredMsg"></span></span>
                                  <?php } ?>
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == "yes1" && empty($_POST['mbcontent'])) { ?>
                                    <span id="sprytextarea1">
                                    <textarea name="mbcontent" cols="70" rows="10" class="fs01" id="mbcontent"></textarea>
                                    <span class="textareaRequiredMsg"></span></span>
                                    <?php } ?>
                                  
                                  <?php if (isset($_POST['msend']) && $_POST['msend'] == 'yes1' && !empty($_POST['mbcontent'])) { ?>
                                     <span id="sprytextarea1">
                                    <textarea name="mbcontent" cols="70" rows="10" class="fs01" id="mbcontent"><?php echo $_POST['mbcontent']; ?></textarea>
                                    <span class="textareaRequiredMsg"></span></span>
                                    <?php } ?>
                                 </td>
                                <td width="17%" align="center" valign="middle" class="formtexterror"><?php if (isset($_POST['msend']) && $_POST['msend'] == "yes1" && empty($_POST['mbcontent'])) { ?>
                                    <table width="96%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td align="center" valign="middle" class="ifsty1br">Required !</td>
                                      </tr>
                                    </table>
                                    <?php } ?></td>
                              </tr>
                              <tr>
                                <td height="20" align="right" valign="middle" class="footerstyle01brv">&nbsp;</td>
                                <td height="20" colspan="2" align="left" valign="middle"><input name="mrg_id" type="hidden" id="mrg_id" value="<?php echo $mailid ?>" />
                                  <input name="msend" type="hidden" id="msend" value="yes1" />
                                  <span class="Title04">
                                  <input name="msread" type="hidden" id="msread" value="no" />
                                  <input name="mrread" type="hidden" id="mrread" value="no" />
                                  <input name="msclocation" type="hidden" id="msclocation" value="sent" />
                                  <input name="mrclocation" type="hidden" id="mrclocation" value="inbox" />
                                  <input name="macontent" type="hidden" id="macontent" value="none" />
                                  <input name="msfn" type="hidden" id="msfn" value="<?php echo $row_client['fulname']; ?>" />
                                  <input name="msln" type="hidden" id="msln" />
                                  <input name="mrtrash" type="hidden" id="mrtrash" value="no" />
                                  <input name="mstrash" type="hidden" id="mstrash" value="no" />
                                  <input name="dstrash" type="hidden" id="dstrash" value="no" />
                                  <input name="drtrash" type="hidden" id="drtrash" value="no" />
                                  <input name="msidno" type="hidden" id="msidno" value="<?php echo $row_client['officer']; ?>" />
                                  <input name="msday" type="hidden" id="msday" value="<?php echo date ('l'); ?>" />
                                  <input name="msdate" type="hidden" id="msdate" value="<?php echo date ('d'); ?>" />
                                  <input name="msmonth" type="hidden" id="msmonth" value="<?php echo date ('F'); ?>" />
                                  <input name="msyear" type="hidden" id="msyear" value="<?php echo date ('Y'); ?>" />
                                  <input name="msthrs" type="hidden" id="msthrs" value="<?php echo date ('h'); ?>" />
                                  <input name="mstmins" type="hidden" id="mstmins" value="<?php echo date ('i'); ?>" />
                                  <input name="mstsecs" type="hidden" id="mstsecs" value="<?php echo date ('s'); ?>" />
                                  <input name="mstd" type="hidden" id="mstd" value="<?php echo date (' A'); ?>" />
                                  </span></td>
                              </tr>
                              <tr>
                                <td rowspan="2" align="right" valign="middle" class="footerstyle01brv">&nbsp;</td>
                                <td colspan="2" align="left" valign="middle"><input name="Send" type="submit" class="button01" id="Send" value="Send Mail" />
                                  <?php if ($totalRows_repmail == 0) { // Show if recordset empty ?>
                                    <?php if (empty($_POST['msend'])) { ?>
                                    &nbsp;&nbsp;&nbsp;
                                    <input name="Clear" type="reset" class="button01" id="Clear" value="Clear Data" />
                                    <?php } ?>
                                  <?php } // Show if recordset empty ?>
                                  &nbsp;&nbsp;&nbsp;&nbsp;</td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center" valign="middle">&nbsp;</td>
                              </tr>
                            </table>
                          </form></td>
                      </tr>
                    </table>
                    <table width="98%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <?php } ?>
              <span class="div01">
              <?php if (isset($_POST['msend']) && $_POST['msend'] == 'yes1' &&  !empty($_POST['mridno']) &&  !empty($_POST['msubject']) && !empty($_POST['mbcontent'])) { ?>
                </span>
                <table width="900" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                  <tr>
                    <td height="22" align="left" valign="middle" bordercolor="#FFFFFF"  bgcolor="#8694AE" class="ifsty1b">&nbsp;&nbsp;&nbsp;&nbsp;Message Information </td>
                  </tr>
                  <tr>
                    <td align="center" valign="top" bordercolor="#F4F4F4"><table width="99%" border="0" cellpadding="0" cellspacing="0" class="space">
                        <tr>
                          <td height="5">&nbsp;</td>
                        </tr>
                      </table>
                      <table width="98%" border="1" cellpadding="0" cellspacing="0" bordercolor="#9CC3EA">
                        <tr>
                          <td align="left" valign="top" bordercolor="#FFFFFF" class="texsty05"><?php 
					 
	$streetidselect = "SELECT uname FROM clients WHERE uname='" . $_POST['mridno']. "'"; 
	$streetid2select = "SELECT officer FROM officer WHERE officer='" . $_POST['mridno']. "'"; 
	$mailidselect = "SELECT mrg_id FROM mails WHERE mrg_id='" . $_REQUEST['mrg_id']. "'"; 

	mysql_select_db($database_ifund, $ifund);

	$checkstreetid=mysql_query($streetidselect, $ifund) or die(mysql_error());
		$checkstreetid2=mysql_query($streetid2select, $ifund) or die(mysql_error());
	$checkmailid=mysql_query($mailidselect, $ifund) or die(mysql_error());

	$streetidfound = mysql_num_rows($checkstreetid) || mysql_num_rows($checkstreetid2);
	
	$mailidfound = mysql_num_rows($checkmailid);
	
if($mailidfound) {
$pagetitle = (' :: Processing Error');
echo "<table width='98%' border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td colspan='2' align='left' valign='middle' bordercolor='#F4F1EC' class='ifsty1br'>Dear <span class='ifsty2b'> " . $_REQUEST['msfn'] . " ,</span><br />You already sent a mail on this session.<br />You should click compose on the side of this page.</td>
                      </tr>
                    </table>";
} else {
$pagetitle = (' :: Processing Error');
if(!$streetidfound) {
echo "<table width='98%' border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td colspan='2' align='left' valign='middle' bordercolor='#F4F1EC' class='ifsty1br'>Sorry <span class='ifsty2b'> " . $_REQUEST['msfn'] . " " . $_REQUEST['msln'] . "</span>,<br /><br />Your mail could not be delivered to the recipent <span class='sidel'>('" . $_REQUEST['mridno'] . "')</span> you entered. <br />Please check vality of recipient address, observe presence of space, and special characters, etc  to solve this problem.</span></td>
                      </tr>
                    </table>";
} else {

$insertvar = "INSERT INTO mails (mrg_id, msidno, mridno, msread, mrread, msubject, msday, msdate, msmonth, msyear, msthrs, mstmins, mstsecs, mstd, msclocation, mrclocation, mbcontent, macontent, msfn, msln, mrtrash, mstrash, dstrash, drtrash) 
					VALUES 
							('$_REQUEST[mrg_id]',
							 '$_REQUEST[msidno]',
							 '$_REQUEST[mridno]',
							 '$_REQUEST[msread]',
							 '$_REQUEST[mrread]',
							 '$_REQUEST[msubject]',
							 '$_REQUEST[msday]',
							 '$_REQUEST[msdate]',
							 '$_REQUEST[msmonth]',
							 '$_REQUEST[msyear]',
							 '$_REQUEST[msthrs]',
							 '$_REQUEST[mstmins]',
							 '$_REQUEST[mstsecs]',
							 '$_REQUEST[mstd]',
							 '$_REQUEST[msclocation]',
							 '$_REQUEST[mrclocation]',
							 '$_REQUEST[mbcontent]',
							 '$_REQUEST[macontent]',
							 '$_REQUEST[msfn]',
							 '$_REQUEST[msln]',
							 '$_REQUEST[mrtrash]',
							 '$_REQUEST[mstrash]',
							 '$_REQUEST[dstrash]',
							 '$_REQUEST[drtrash]')";
							 
	mysql_select_db($database_ifund, $ifund);
	mysql_query($insertvar, $ifund) or die(mysql_error());
	
$pagetitle = (' Message Sent');
echo "<table width='98%' border='0' cellpadding='0' cellspacing='0'>
                      <tr>
                        <td colspan='2' align='left' valign='middle' bordercolor='#F4F1EC' class='ifsty2b'>Hi <span class='ifsty1br'> " . $_REQUEST['msfn'] . " " . $_REQUEST[msln] . ",</span><br />Your mail has successfully been delivered to its recipent.</span></td>
                      </tr>
                    </table>";


}
}
					
?></td>
                        </tr>
                      </table>
                      <table width="99%" border="0" cellpadding="0" cellspacing="0" class="space">
                        <tr>
                          <td height="5">&nbsp;</td>
                        </tr>
                      </table></td>
                  </tr>
                </table>
                <span class="div01">
                <?php } ?>
              </span></span></td>
          </tr>
        </table>
        <?php } // ENDS THE QUERY SET FOR READMAIL ITEM PAGE ?></td>
    </tr>
  </tbody>
</table>
<table cellspacing="0" cellpadding="0" width="100%" 
                              border="0">
  <tbody>
    <tr>
      <td background="../img/heading_bg.jpg" 
                                height="28">&nbsp;</td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0" width="94%" 
                                align="left" border="0">
          <tbody>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle"><p class="black_bold"><a href="javascript:history.go(-1);">&laquo;Go Back</a> | <a href="javascript:location.reload()">Refresh</a></p></td>
    </tr>
  </tbody>
</table>
<script type="text/javascript">
<!--
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);

mysql_free_result($mails);

mysql_free_result($unreadinbox);

mysql_free_result($sentma);

mysql_free_result($draftma);

mysql_free_result($trashma);

mysql_free_result($readmail);

mysql_free_result($repmail);
?>
