<?php do_session(); $loc = getAppLoc(); ?>
<?php require('../Connections/dbcon.php'); ?>
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

$colname_UserRecord = "-1";
if (isset($_SESSION['userID'])) {
  $colname_UserRecord = $_SESSION['userID'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_UserRecord = sprintf("SELECT * FROM users WHERE UserID = %s LIMIT 1", GetSQLValueString($colname_UserRecord, "text"));
$UserRecord = mysql_query($query_UserRecord, $dbcon) or die(mysql_error());
$row_UserRecord = mysql_fetch_assoc($UserRecord);
$totalRows_UserRecord = mysql_num_rows($UserRecord);

mysql_select_db($database_dbcon, $dbcon);
$query_personRecord = "SELECT * FROM person_info WHERE fuid = '$row_UserRecord[PersonInfo]' LIMIT 1";
$personRecord = mysql_query($query_personRecord, $dbcon) or die(mysql_error());
$row_personRecord = mysql_fetch_assoc($personRecord);
$totalRows_personRecord = mysql_num_rows($personRecord);


class UserOn {	
	function is_logged(){ //is user logged in - returns yes or no
		global $totalRows_UserRecord;
		if ($totalRows_userOn == 0) {  
			$taskResult = "no";
		} else {
			$taskResult = "yes";
		}
		return $taskResult;
	}
	
	
	function do_authenticate(){ //authenticate user 
		$taskResult = is_logged();
		global $loc;		
		if ($taskResult == 'no') { 
			$loadurl = new loader();
			$currenturladd = $loadurl->get_set_url();
			redirect("?url=login_&status=expiredlogin&prevurl={$currenturladd}&loc=$loc");
		} else {
			//check status of account
			global $row_UserRecord;
				//prep account status
				if($row_UserRecord['AccountStatus'] =='0') { $UserRecord_AccountStatus = "new";}
				elseif($row_UserRecord['AccountStatus'] =='1') { $UserRecord_AccountStatus = "active";}
				elseif($row_UserRecord['AccountStatus'] =='2') { $UserRecord_AccountStatus = "suspended";}
				elseif($row_UserRecord['AccountStatus'] =='4') { $UserRecord_AccountStatus = "deactivated";}
				elseif($row_UserRecord['AccountStatus'] =='5') { $UserRecord_AccountStatus = "closed";}
			
			if($UserRecord_AccountStatus != 'active') {
				redirect("?url=login_&status=inactive&acc_status={$UserRecord_AccountStatus}&loc=$loc");					
			}
		}
		return;
	}
		
	function is_restrict($to = 'staff'){ // restrict access to page
		global $loc;
		
		$UserAccountType = $getLoginInfo("AccountType");
		if($UserAccountType =='0') { $UserRecord_AccountType = "dummy";}
		elseif($UserAccountType =='1') { $UserRecord_AccountType = "demo";}
		elseif($UserAccountType =='2') { $UserRecord_AccountType = "customer";}
		elseif($UserAccountType =='3') { $UserRecord_AccountType = "staff";}
		elseif($UserAccountType =='4') { $UserRecord_AccountType = "administrator";}
		elseif($UserAccountType =='5') { $UserRecord_AccountType = "service provider";}
		elseif($UserAccountType =='7') { $UserRecord_AccountType = "developer";}
						
		//redirect users with no privilege
		if($UserAccountType < $to) {  //if user account type is 
			redirect("?url=login_&status=noprivilege&loc=$loc");
		} 
	}
	
	function getLoginInfo($value) {
		global $row_UserRecord;
		if($value != ''){
		$taskResult = $row_userOn["$value"];
		}
		
		if($taskResult == '') {
			$taskResult = '';
		}
		return $taskResult;				
	}
	
	function getPersonInfo($value) {
		global $row_personRecord;
		if($value != ''){
			if($value == 'FullName') {
				if($row_personRecord['FullName'] != '') {
					$taskResult = $row_personRecord["FullName"];	
				} else {
					$taskResult = "Guest";
				}
			}
			else {
				$taskResult = $row_personRecord["$value"];
				if($taskResult == '') {
					$taskResult = '';
				}
			}
		}		
		return $taskResult;				
	}
}
?>

<?php
mysql_free_result($UserRecord);
mysql_free_result($personRecord);
?>
