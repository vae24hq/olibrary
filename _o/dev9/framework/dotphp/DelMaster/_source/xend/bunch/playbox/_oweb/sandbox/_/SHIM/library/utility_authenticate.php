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


class authenticate {		
	function is_logged(){
		global $totalRows_UserRecord;
		if ($totalRows_UserRecord == 0) {  
			$taskResult = "no";
		} else {
			$taskResult = "yes";
		}
		return $taskResult;
	}
		
	function __construct(){ 
		$taskResult = $this->is_logged();
		global $loc;		
		if ($taskResult == 'no') { 
			$loadurl = new loader();
			$currenturladd = $loadurl->get_set_url();
			redirect("?url=login_&status=expiredlogin&prevurl={$currenturladd}&loc=$loc");
			
		} else {
			//check status of account
			global $row_UserRecord;
			if($row_UserRecord['AccountStatus'] != 'active') {
				redirect("?url=login_&status=inactive&acc_status={$row_UserRecord['AccountStatus']}&loc=$loc", "3");	
				echo "Inactive";				
			}
		}
		return;
	}	
}
?>

<?php
mysql_free_result($UserRecord);
?>
