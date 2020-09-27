<?php
do_session(); require('../Connections/dbcon.php');
function getAppLoc($set = 'launched', $return = 'record') {			
			//process GET VALUE
			if(isset($_GET['loc']) && ($_GET['loc'] != '')) {
				$_SESSION['loc'] = $_GET['loc'];
				$loc = $_SESSION['loc'];				
			}
			elseif(isset($_SESSION['loc']) && ($_SESSION['loc'] != '')) {
				$loc = $_SESSION['loc'];
			}
			else {
				$loc = 'undefined';
			}
			//end process GET VALUE
			
			
			if($set == 'launched') {
				if(isset($_SESSION['iniLaunch'])){
					$task = $_SESSION['iniLaunch'];
				}
				else {
					$task = 'undefined';
				}				 
			}
			elseif($set == 'store') {
				mysql_select_db($database_dbcon, $dbcon);
				$query_dataSet = "SELECT * FROM `hr_set` WHERE `fuid` = '$loc' AND `IsStore` = 'yes'";
				$dataSet = mysql_query($query_dataSet, $dbcon) or die(mysql_error());
				$row_dataSet = mysql_fetch_assoc($dataSet);
				$totalRows_dataSet = mysql_num_rows($dataSet);
				if ($totalRows_dataSet == 0) {
					$task = 'undefined';
				}
				else {
					if($return == 'record') {
						$task = $row_dataSet['fuid'];
					} else {
						$task = $row_dataSet[$return];
					} 
				}
				mysql_free_result($dataSet);
			}
			elseif($set == 'dept') {
				mysql_select_db($database_dbcon, $dbcon);
				$query_dataSet = "SELECT * FROM `hr_set` WHERE `fuid` = '$loc' AND `IsDept` = 'yes'";
				$dataSet = mysql_query($query_dataSet, $dbcon) or die(mysql_error());
				$row_dataSet = mysql_fetch_assoc($dataSet);
				$totalRows_dataSet = mysql_num_rows($dataSet);
				if ($totalRows_dataSet == 0) {
					$task = 'undefined';
				}
				else {
					if($return == 'record') {
						$task = $row_dataSet['fuid'];
					} else {
						$task = $row_dataSet[$return];
					}
				}
				mysql_free_result($dataSet);
			}
			elseif($set == 'service') {
				mysql_select_db($database_dbcon, $dbcon);
				$query_dataSet = "SELECT * FROM `hr_set` WHERE `fuid` = '$loc' AND `SetType` = 'service'";
				$dataSet = mysql_query($query_dataSet, $dbcon) or die(mysql_error());
				$row_dataSet = mysql_fetch_assoc($dataSet);
				$totalRows_dataSet = mysql_num_rows($dataSet);
				if ($totalRows_dataSet == 0) {
					$task = 'undefined';
				}
				else {
					
					if($return == 'record') {
						$task = $row_dataSet['fuid'];
					} else {
						$task = $row_dataSet[$return];
					}
				}
				mysql_free_result($dataSet);
			}
			 
			return $task;
}	
?>