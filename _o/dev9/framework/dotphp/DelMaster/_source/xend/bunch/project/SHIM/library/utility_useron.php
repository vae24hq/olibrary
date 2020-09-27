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
//$_SESSION['fuid'] = $row_userOn['fuid'];

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

class UserOn {
	function getUserOn($value) {
		global $row_userOn;
		if($value != ''){
			$taskResult = $row_userOn["$value"];
		}
		else {
			$taskResult = '';
		}		
		return $taskResult;				
	}
	
	function getStaffOn($value) {
		global $row_staffOn;
		if($value != ''){
			$taskResult = $row_staffOn["$value"];
		}
		else {
			$taskResult = '';
		}		
		return $taskResult;				
	}
	
	function getPersonInfo($value) {
		global $row_personOn;
		if($value != ''){
			if($value == 'FullName') {
				if($row_personOn['FullName'] != '') {
					$taskResult = $row_personOn["FullName"];	
				} else {
					$taskResult = "Guest";
				}
			}
			else {
				$taskResult = $rowSet["$value"];
				if($taskResult == '') {
					$taskResult = '';
				}
			}
		}		
		return $taskResult;				
	}
}
		
mysql_free_result($userOn);
mysql_free_result($personOn);
mysql_free_result($staffOn);
?>
