<?php
/* Cigna™ - a micro web content management system by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | util:user - manages user
 * Dependency » 
 */
	
	function ActiveUser(){
		runSession();
		$ActiveUserIs = 'guest';
		require('Connections/dbcon.php');
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

		$colname_ActiveUser = "-1";
		if (isset($_SESSION['MM_Username'])) {
		  $colname_ActiveUser = $_SESSION['MM_Username'];
		}
		mysql_select_db($database_dbcon, $dbcon);
		$query_ActiveUser = sprintf("SELECT * FROM users WHERE UserID = %s", GetSQLValueString($colname_ActiveUser, "text"));
		$ActiveUser = mysql_query($query_ActiveUser, $dbcon) or die(mysql_error());
		$row_ActiveUser = mysql_fetch_assoc($ActiveUser);
		$totalRows_ActiveUser = mysql_num_rows($ActiveUser);
		
		if ($totalRows_ActiveUser > 0) { 
			$ActiveUserIs = doCrypt($colname_ActiveUser,'reverse');
		}
		mysql_free_result($ActiveUser);
		
		return $ActiveUserIs;
	} 
	
	
	function doLogout() {
		runSession();
		 $_SESSION['MM_Username'] = NULL;
		  $_SESSION['MM_UserGroup'] = NULL;
		  $_SESSION['PrevUrl'] = NULL;
		  unset($_SESSION['MM_Username']);
		  unset($_SESSION['MM_UserGroup']);
		  unset($_SESSION['PrevUrl']);
		  
		  $logoutGoTo = "./?link=login-logout";
		  if ($logoutGoTo) {header("Location: $logoutGoTo"); exit;}
	}
?>