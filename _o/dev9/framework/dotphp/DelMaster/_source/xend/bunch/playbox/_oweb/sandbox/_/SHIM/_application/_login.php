<?php do_session(); $loc = getAppLoc(); require('../Connections/dbcon.php'); ?>
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

$colname_LoginRecord = "-1";
if (isset($_POST['UserID'])) {
  $colname_LoginRecord = $_POST['UserID'];
}
$colname2_LoginRecord = "-1";
if (isset($_POST['Password'])) {
  $colname2_LoginRecord = $_POST['Password'];
  $colname2_LoginRecord = clean_value($colname2_LoginRecord, "clean");
  $colname2_LoginRecord = do_crypt($colname2_LoginRecord, "crypt");
}
mysql_select_db($database_dbcon, $dbcon);
$query_LoginRecord = sprintf("SELECT * FROM users WHERE UserID = %s AND Password = %s", GetSQLValueString($colname_LoginRecord, "text"),GetSQLValueString($colname2_LoginRecord, "text"));
$LoginRecord = mysql_query($query_LoginRecord, $dbcon) or die(mysql_error());
$row_LoginRecord = mysql_fetch_assoc($LoginRecord);
$totalRows_LoginRecord = mysql_num_rows($LoginRecord);

	function processLogin() {
		global $totalRows_LoginRecord;
		global $loc;
		
				if ($totalRows_LoginRecord == 0) {  
					$login_task['allow'] = "no";
					redirect("?url=login_&status=incorrect&loc=$loc");
				} 
				else { //if logged in, check and return status
					global $row_LoginRecord;
					$login_task['allow'] = "yes";
					$login_task['status'] = $row_LoginRecord['AccountStatus'];
					$login_task['UserID'] = $row_LoginRecord['UserID'];
					$_SESSION['userID'] = $login_task['UserID'];					
					
					if($login_task['allow'] == 'yes') {
						if($login_task['status'] == 'active') {
							//login user
							redirect("?url=login_&status=loggin&loc=$loc");
							return;						
						} else {
							redirect("?url=login_&status=inactive&acc_status=${login_task['status']}&loc=$loc");
							return;
						}						
					} else {
						//login failed
							redirect("?url=login_&status=incorrect&loc=$loc");
							return;					
					}
				}
				return $login_task; 
	}
	
	
function login_msg(){
		global $loc;
		
		if(isset($_GET['status'])) {
			if($_GET['status'] == 'incorrect') {
				$message['msg'] = "You have entered an incorrect login information";
				$message['msg_type'] = "error";
				reset_session();
			}
			elseif ($_GET['status'] == 'expiredlogin') {
				$message['msg'] = "Your session has expired";
				$message['msg_type'] = "error";
				reset_session();
				if(isset($_GET['prevurl'])){
					$message['prevurl'] = $_GET['prevurl'];
					$_SESSION['prevurl'] = $message['prevurl'];
				}			
			}
			elseif ($_GET['status'] == 'inactive') {
				if(isset($_GET['acc_status'])) {
				$message['msg'] = "Your account is currently {$_GET['acc_status']}";
				} else {
					$message['msg'] = "Your account is currently inactive";
				}
				$message['msg_type'] = "error";
				reset_session();
			}
			elseif ($_GET['status'] == 'logout') {
				$message['msg'] = "You have logged out successfully";
				$message['msg_type'] = "info";
				reset_session();
			}
			elseif ($_GET['status'] == 'noprivilege') {
				$message['msg'] = "You have no privilege to access the section you attempted";
				$message['msg_type'] = "error";
				reset_session();
			}
			elseif ($_GET['status'] == 'loggedin') {
				$message['msg'] = "You are already logged in, please wait...";
				$message['msg_type'] = "info";
				redirect("?url=_client-area&loc=$loc", "1");
			}
			elseif ($_GET['status'] == 'loggin') {
				$message['msg'] = "You are now been logged in, please wait...";
				$message['msg_type'] = "info";
				//login user
				if(isset($_SESSION['prevurl']) && ($_SESSION['prevurl'] != '')) {
					redirect("?url={$_SESSION['prevurl']}&loc=$loc");
				} else {
					redirect("?url=_client-area&loc=$loc");
				}
			}
			else {
				$message['msg'] = "Please enter your login information below";
			}
		}
		//get login message from post result
		else {			
			if(isset($_POST['run_process'])) {
				//check for empty submission
				if(($_POST['UserID'] == '') || ($_POST['Password'] == '')) {
					$message['msg'] = "You must enter a username and password";
					$message['msg_type'] = "error";						
					reset_session();
				}
				else {
				 //process post information for login
					$login_task = processLogin();
					$message['msg'] = "Authenticating...Please wait";
					$message['msg_type'] = "notice";
				}							
			}
			else {
				$message['msg'] = "Please enter your login information below";
				$message['msg_type'] = "notice";
			}
		}
		return $message;
	}

mysql_free_result($LoginRecord);
?>