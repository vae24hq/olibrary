<?php do_session(); $loc = getAppLoc(); require('../Connections/dbcon.php');

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

$currentPage = currentPage();
		//PROCESS PERIOD
		if(isset($_GET['period'])) {
			$timeDate = $_GET['period'];
			$timeDate = get_date($timeDate, 'timedate');
			$_SESSION['timeDate'] = $timeDate;
		}

$maxRows_dataSet = 20;
$pageNum_dataSet = 0;
if (isset($_GET['pageNum_dataSet'])) {
  $pageNum_dataSet = $_GET['pageNum_dataSet'];
}
$startRow_dataSet = $pageNum_dataSet * $maxRows_dataSet;

mysql_select_db($database_dbcon, $dbcon);





		//USING SEARCH
		if(isset($_GET['filter']) && $_GET['filter'] == 'result') {
			$query_dataSet = "SELECT * FROM `person_info` WHERE `isCustomer` = 'yes'";
			
			if(isset($_GET['name'])) {
				$query_dataSet .=" AND `FullName` LIKE '%{$_GET['name']}%'";				
			}
			elseif(isset($_GET['email'])) {
				$query_dataSet .=" AND `PrimaryEmail` = '{$_GET['email']}'";				
			}
			elseif(isset($_GET['phone'])) {
				$query_dataSet .=" AND `PrimaryPhone` = '{$_GET['phone']}'";				
			}
			
		}
		else {
		
		$query_dataSet = "SELECT * FROM `customer_info`";		
		}
		
		
		//ORDER
		$query_dataSet .=" ORDER BY tuid DESC";
			
			
$query_limit_dataSet = sprintf("%s LIMIT %d, %d", $query_dataSet, $startRow_dataSet, $maxRows_dataSet);
if(isset($_GET['period'])){ //period taken care of as well
	$dataSet = mysql_query($query_dataSet, $dbcon) or die(mysql_error());
	} else {
	$dataSet = mysql_query($query_limit_dataSet, $dbcon) or die(mysql_error());
	}


$row_dataSet = mysql_fetch_assoc($dataSet);



if (isset($_GET['totalRows_dataSet'])) {
  $totalRows_dataSet = $_GET['totalRows_dataSet'];
}
elseif(isset($_GET['period'])){
	$totalRows_dataSet = mysql_num_rows($dataSet);
}
else {
  $all_dataSet = mysql_query($query_dataSet);
  $totalRows_dataSet = mysql_num_rows($all_dataSet);
  
}

$totalPages_dataSet = ceil($totalRows_dataSet/$maxRows_dataSet)-1;

$queryString_dataSet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_dataSet") == false && 
        stristr($param, "totalRows_dataSet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_dataSet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_dataSet = sprintf("&totalRows_dataSet=%d%s", $totalRows_dataSet, $queryString_dataSet);
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>




<?php //PREP SEARCH
	if(isset($_GET['act']) && $_GET['act'] == 'search') { 
    	include("inc_search_customers.php");
	} else // END SEARCH PREP
	{ //BEGIN SHOW RESULT 
?>
	<?php if ($totalRows_dataSet > 0) { // Show if recordset not empty ?>
    	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
        	<tr>
            	<td colspan="11" class="tabTitle" scope="col" valign="middle" height="20">
                	<strong>
                    <?php if ($totalRows_dataSet == 0) { echo "NO "; }?>
                    RESULT
                    </strong>
                    <?php if ($totalRows_dataSet > 0) {
					if(!isset($_GET['period'])){?>
                    <span style="text-transform:none;">
                    (showing <?php echo ($startRow_dataSet + 1) ?> - 
						<?php echo min($startRow_dataSet + $maxRows_dataSet, $totalRows_dataSet) ?> of 
                        <?php echo $totalRows_dataSet ?>   records)
                    </span>
                   <?php }
				   } ?>
    
    
                    <span style="float:right; padding-right:10px; display:inline; text-transform:none;">
                    <?php if(!isset($_GET['period'])){
						if ($pageNum_dataSet > 0) { ?>
                        	<a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, 0, $queryString_dataSet); ?>">First</a>
                            ~
                            <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, max(0, $pageNum_dataSet - 1), $queryString_dataSet); ?>">Previous</a>
                            <?php if ($pageNum_dataSet < $totalPages_dataSet) { ?>
                            ~
                            <?php } 
						}
						
						if ($pageNum_dataSet < $totalPages_dataSet) { ?>
                        	<a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, min($totalPages_dataSet, $pageNum_dataSet + 1), $queryString_dataSet); ?>">Next</a>
                            ~
                            <a href="<?php printf("%s?pageNum_dataSet=%d%s", $currentPage, $totalPages_dataSet, $queryString_dataSet); ?>">Last</a>
                       <?php }
					}?>
                    </span>
                    
               </td>
            </tr>
            
            
      <tr class="cellTitle">
        <th width="30" height="24" align="center" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">S/N</th>
        <th width="65" align="left" valign="middle" scope="col"><small>IDENTITY</small></th>
        <th width="260" align="left" valign="middle" scope="col">CUSTOMER NAME</th>
        <th width="70" align="left" valign="middle" scope="col"><small>PHONE NO</small></th>
        <th width="170" align="left" valign="middle" scope="col"><small>EMAIL</small></th>
        <th width="10" align="center" valign="middle" scope="col"><small>SEX</small></th>
        <th width="70" align="left" valign="middle" scope="col"><small>BIRTH DATE</small></th>
        <th width="160" align="left" valign="middle" scope="col"><small>CORPORATION</small></th>
        <th width="64" align="center" valign="middle" scope="col"><small>OPERATION</small></th>
        <th width="60" align="center" valign="middle" scope="col"><small>CHECK IN</small></th>
        <!--<th width="130" align="center" valign="middle" scope="col">DATE</th> -->
      </tr>
   
   <?php @$sn = $startRow_dataSet; 
   		do {  // DO REPEAT REGION 
			
			//PROCESS and HIDE for PERIOD
	 		if(isset($_GET['period'])) {
				$showtime = $row_dataSet['tuid'];
				$showtime = get_date($showtime, 'timedate');
				
				if($showtime == "{$_SESSION['timeDate']}") {
                	include("inc_customers.php");
				} 
				
			} else {
				
				//USING SEARCH
				if(isset($_GET['filter']) && $_GET['filter'] == 'result') {
					include("inc_customers_filter.php");
				}
				else {
					include("inc_customers.php"); 
				}
			}
			
			
      } while ($row_dataSet = mysql_fetch_assoc($dataSet)); ?>
	</table>
<?php } // end Show if recordset not empty ?>


<?php if ($totalRows_dataSet == 0) { // Show if recordset empty 
	include("../_notification/no_record.php"); 
 } // Show if recordset empty ?>

<?php  } // CLOSING search RESULT
mysql_free_result($dataSet);
?>
