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

mysql_select_db($database_dbcon, $dbcon);
$query_applicationRecord = "SELECT * FROM app WHERE fuid ='QN9962987171429HB1360552385PX' AND AppStatus = 'avaliable' LIMIT 1";
$applicationRecord = mysql_query($query_applicationRecord, $dbcon) or die(mysql_error());
$row_applicationRecord = mysql_fetch_assoc($applicationRecord);
$totalRows_applicationRecord = mysql_num_rows($applicationRecord);

mysql_select_db($database_dbcon, $dbcon);
$query_SPRecord = "SELECT * FROM app_sp WHERE fuid = 'QN1952199098886IC1360556503PW' AND AccountID = 'Seamlux' LIMIT 1";
$SPRecord = mysql_query($query_SPRecord, $dbcon) or die(mysql_error());
$row_SPRecord = mysql_fetch_assoc($SPRecord);
$totalRows_SPRecord = mysql_num_rows($SPRecord);



$appInfo_DataSet = $row_applicationRecord;

	class appInfo {
		function getInfo($value) {
			global $appInfo_DataSet;
			global $row_SPRecord;
			
			if($value == 'brand') {
				$taskResult = $appInfo_DataSet['Acronym'];	 
			} 			
			elseif($value == 'product') {
				$taskResult = $appInfo_DataSet['Title']; 
			}
			elseif($value == 'copyright') {
				$copyright = $appInfo_DataSet['DevTime'];
				$taskResult = do_date("F Y", "$copyright");
			}			
			elseif($value == 'producer') {
				$taskResult = $appInfo_DataSet['Developer'];
			}
			
			
			elseif($value == 'powered') {
				$taskResult = $row_SPRecord['Name'];
			}
			elseif($value == 'poweredAKA') {
				$taskResult = $row_SPRecord['Acronym'];
			}
			
			elseif($value == 'client') {
				$taskResult = "Rialto Hotels &amp; Resorts";
			}
			elseif($value == 'clientAKA') {
				$taskResult = "RHR";
			}
			
			return $taskResult;
		}	
	}
	

mysql_free_result($applicationRecord);

mysql_free_result($SPRecord);

?>
