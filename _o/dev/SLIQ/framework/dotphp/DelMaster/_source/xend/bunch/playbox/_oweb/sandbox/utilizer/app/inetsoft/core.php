<?php
if (!isset($_SESSION)) {session_start();}

//DB Connection
error_reporting (E_ALL ^ E_DEPRECATED);
$dbhost = "fdb7.biz.nf";
$db = "2063675_db";
$dbuser = "2063675_db";
$dbpassword = "bizNexi16";
$konect = mysql_connect($dbhost, $dbuser, $dbpassword) or trigger_error(mysql_error(),E_USER_ERROR);

if (!function_exists("GetSQLValueString")){
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
		if (PHP_VERSION < 6) {$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;}
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

function firm($record=''){
	global $db; global $konect;
	mysql_select_db($db, $konect);
	$query_firm = "SELECT * FROM company";
	$firm = mysql_query($query_firm, $konect) or die(mysql_error());
	$row_firm = mysql_fetch_assoc($firm);
	$totalRows_firm = mysql_num_rows($firm);
  	mysql_free_result($firm);
	if(!empty($record)){return $row_firm[$record];}
}

function client($record=''){
	global $db; global $konect;
	$colname_client = "-1";
	if(isset($_SESSION['MM_Username'])){$colname_client = $_SESSION['MM_Username'];}
	mysql_select_db($db, $konect);
	$query_client = sprintf("SELECT * FROM clients WHERE uname = %s", GetSQLValueString($colname_client, "text"));
	$client = mysql_query($query_client, $konect) or die(mysql_error());
	$row_client = mysql_fetch_assoc($client);
	$totalRows_client = mysql_num_rows($client);
  	mysql_free_result($client);
	if(!empty($record)){return $row_client[$record];}
}

function transfers($record=''){
	global $db; global $konect;
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
	mysql_select_db($db, $konect);
	$query_transf = sprintf("SELECT * FROM transfers WHERE `by` = %s AND process_serial != 'completed' ORDER BY id DESC", GetSQLValueString($colname_transf, "text"));
	$query_limit_transf = sprintf("%s LIMIT %d, %d", $query_transf, $startRow_transf, $maxRows_transf);
	$transf = mysql_query($query_limit_transf, $konect) or die(mysql_error());
	$row_transf = mysql_fetch_assoc($transf);

	if (isset($_GET['totalRows_transf'])) {
	  $totalRows_transf = $_GET['totalRows_transf'];
	} else {
	  $all_transf = mysql_query($query_transf);
	  $totalRows_transf = mysql_num_rows($all_transf);
	}
	$totalPages_transf = ceil($totalRows_transf/$maxRows_transf)-1;

	if($record == 'totalPages'){return $totalPages_transf;}
	if($record == 'totalRows'){return $totalRows_transf;}
	if($record == 'transf'){return $transf;}
	elseif(!empty($record)){return $row_transf[$record];}
}

?>