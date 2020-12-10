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
$ra9 = $rand_content[$rand_keys[2]] ;
$radv1 = $rand_content[$rand_keys[11]] ;
$radv2 = $rand_content[$rand_keys[14]] ;
$radv3 = $rand_content[$rand_keys[41]] ;
$randn= ($ra1.$ra2.$radv3.$ra3.$ra4.$radv3.$ra5.$radv2.$ra7.$ra8.$radv1.$ra9);

$tenot = ('To upload photo click on browse and then upload button');
$not = ('You are only allowed to upload image files.');
$tnot = ('Note :');

$dpic = ('<img id="imgPic" alt="Passport Preview" width="120" height="140" src="upload/noimage.jpg" />');


if ( isset($_POST['upload']) && $_POST['upload'] == 'yes')
	{
		 $uploaddir = 'upload/' . $randn . '.jpg';
	
		$uploadfile = move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir);
		
		if (!$uploadfile)
		{
			$pagetitle = (' Photo Upload Error'); 
			$tenot = ('An error occured while trying to upload file');
            $dpic = ('<img id="imgPic" alt="Passport Preview" width="120" border="1" />');
					
					}
		else
		{
			$upsql = "UPDATE clients SET passport = '$randn.jpg' WHERE uname='$row_client[uname]'";
			
			$runq = mysql_query($upsql, $ifund) or die(mysql_error());
			
			$pagetitle = ' Upload Successfull';
		    $tenot = 'Your photo upload has been successfull';
			$tenot2 = 'Now updating photo...';
            $dpic = '';
			$not = '';
			$tnot = '';
			if(!empty($row_student['fgid'])) {echo $row_student['fgid'];}
			echo "<meta http-equiv='refresh' content='0;URL=come.php' />";						
		}
	}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>i-Fund NetSoft | <?php echo $row_company['bname']; ?></title>
<link rel="stylesheet" type="text/css" href="../source/ifund.css"/>
<script  type="text/javascript">
function ShowPic(type) {
  document.uploader.imgPic.src=document.getElementById("userfile").files[0].name;
}
</script>
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
            <td class="ifsty2b">UPDATE PASSPORT MANAGEMENT</td>
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
      <td height="40" align="center" valign="middle"><form name="uploader" id="uploader" method="post" enctype="multipart/form-data">
        <table width="98%" border="1" cellpadding="0" cellspacing="1" bordercolor="#E0C6C5">
<tr align="center" bgcolor="#E0C6C5">
                                <td height="22" class="ifsty1b"><span class="div01">
                                  
                                </span><?php echo $tenot; ?></td>
                              </tr>
                              <tr valign="bottom">
                                <td height="98" align="center" valign="middle" bordercolor="#FBF9F7"><table width="95%" border="0" cellspacing="2" cellpadding="0">
                                    <tr>
                                      <td height="26" align="center" valign="middle">
                                      </td>
                                    </tr>
                                    <tr>
                                      <td height="26" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr align="left" valign="middle">
                                            <td height="24" align="center">
                                            <span class="DateText">
                                              <span class="ifsty1n"><?php if(!empty($dpic)) {echo $dpic;} ?><?php if(!empty($tenot2)) {echo $tenot2;}?></span>
                                            </span>
                                            </td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td width="71%" height="26" align="center" valign="middle"><input name="userfile" type="file" class="fs01" id="userfile" onchange="ShowPic('p')" size="30" /></td>
                                    </tr>
                                    <tr>
                                      <td height="26" align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr align="left" valign="middle">
                                            <td height="24" align="center"><input name="UPBtn" type="submit" class="fs02" id="UPBtn" value="Upload" /></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="26" align="center" valign="middle" class="ifsty2n"><strong><?php echo $tnot; ?></strong>&nbsp;<?php if(!empty($not)) {echo $not;}?>&nbsp;<?php if(!empty($page1)) {echo $page1; }?></td>
                                    </tr>
                                </table></td>
                              </tr>
          </table>
                          <br />
                            <input type="hidden" name="upload" value="yes" />
                            <br />
                            <p></p>
      </form></td>
    </tr>
  </tbody>
</table>
<table cellspacing="0" cellpadding="0" width="100%" 
                              border="0">
  <tbody>
    <tr>
      <td><table cellspacing="0" cellpadding="0" width="94%" 
                                align="left" border="0">
        <tbody>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle"><p class="ifsty2b"><a href="javascript:history.go(-1);" class="ifsty1b">&laquo;Go Back</a> | <a href="javascript:location.reload()" class="ifsty1b">Refresh</a> | <a href="javascript:printWindow()" class="ifsty1b">Print</a></p></td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($company);

mysql_free_result($client);
?>
