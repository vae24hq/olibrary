<?php do_session(); require('../Connections/dbcon.php'); ?>
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

$colname_userOn = "-1";
if (isset($_SESSION['userID'])) {
   $colname_userOn = $_SESSION['userID'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_userOn = sprintf("SELECT * FROM users WHERE UserID = %s LIMIT 1", GetSQLValueString($colname_userOn, "text"));
$userOn = mysql_query($query_userOn, $dbcon) or die(mysql_error());
$row_userOn = mysql_fetch_assoc($userOn);
$totalRows_userOn = mysql_num_rows($userOn);
//pass user info session
$_SESSION['fuid'] = $row_userOn['fuid'];

$colname_personOn = "-1";
if (isset($row_userOn['PersonInfo'])) {
  $colname_personOn = $row_userOn['PersonInfo'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_personOn = sprintf("SELECT * FROM person_info WHERE fuid = %s", GetSQLValueString($colname_personOn, "text"));
$personOn = mysql_query($query_personOn, $dbcon) or die(mysql_error());
$row_personOn = mysql_fetch_assoc($personOn);
$totalRows_personOn = mysql_num_rows($personOn);


$colname_staffOn = "-1";
if (isset($row_userOn['PersonInfo'])) {
  $colname_staffOn = $row_userOn['PersonInfo'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_staffOn = sprintf("SELECT * FROM staff_info WHERE PersonInfo = %s", GetSQLValueString($colname_staffOn, "text"));
$staffOn = mysql_query($query_staffOn, $dbcon) or die(mysql_error());
$row_staffOn = mysql_fetch_assoc($staffOn);
$totalRows_staffOn = mysql_num_rows($staffOn);

function UserOn($value = '') {
		global $row_userOn;
		global $row_personOn;
		global $row_staffOn;			
		$resultSet = array_merge($row_userOn, $row_personOn, $row_staffOn);
		if($value != ''){
			
			if($value == 'FullName') {
				if($resultSet['FullName'] != '') {
					$result = $resultSet["FullName"];	
				} else {
					$result = "Guest";
				}		 
			}
			//return result of $value
			else {
				$result = $resultSet;				
			}
		}
		return $result;
}

UserOn('UserID');

 		//is user logged in?
		function is_logged(){
			global $totalRows_userOn;
			if ($totalRows_userOn == 0) {  
			$is_logged_in = "no";
			} else {
				$is_logged_in = "yes";
			}
			return $is_logged_in;
		} 
				
		//authenticate user 
		function do_authenticate(){
			$authenticate = is_logged();
			if ($authenticate == 'no') { 
				$loadurl = new loader();
				$currenturladd = $loadurl->get_set_url();
				redirect("?url=login_&status=expiredlogin&prevurl={$currenturladd}");
			} else {
				//check status of account
				global $row_userOn;
				if($row_userOn['AccountStatus'] != 'active') {
					redirect("?url=login_&status=inactive&acc_status={$row_userOn['AccountStatus']}");					
				}
			}
			return;
		}
	

 		//determine user account type and restrict access to pages
			//developer = 7; admin = 5; staff = 3; customer = 1;
			function is_StaffRestrict(){
				$UserAccountType = UserOn("AccountType");
				if($UserAccountType < '3') {  //if user account type is 
					redirect("?url=login_&status=noprivilege");
				} 
			}  
			

mysql_free_result($userOn);
mysql_free_result($personOn);
mysql_free_result($staffOn);
?>
