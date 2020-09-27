<?php do_session(); $loc = getAppLoc(); require('../Connections/dbcon.php');?>
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


$currentPage = currentPage();
		//process sort by date  and use refrence inside rows of result;
		if(isset($_GET['period'])) {
			$timeDate = $_GET['period'];
			$timeDate = get_date($timeDate, 'timedate');
			$_SESSION['timeDate'] = $timeDate;
		}
		
$maxRows_DataSet = 20;
$pageNum_DataSet = 0;
if (isset($_GET['pageNum_DataSet'])) {
  $pageNum_DataSet = $_GET['pageNum_DataSet'];
}
$startRow_DataSet = $pageNum_DataSet * $maxRows_DataSet;
mysql_select_db($database_dbcon, $dbcon);

$query_DataSet = "SELECT * FROM `pos_resturant_sales` WHERE RecordType = 'reciept'";
		
		
		if(isset($_GET['show']) && $_GET['show'] != '') {
			$query_DataSet .= " AND `InvoiceNo` = '{$_GET['show']}'";	}
				
		
			$query_DataSet .= " ORDER BY tuid DESC";
		


	$query_limit_DataSet = sprintf("%s LIMIT %d, %d", $query_DataSet, $startRow_DataSet, $maxRows_DataSet);

if(isset($_GET['period'])){ //period taken care of as well
	$DataSet = mysql_query($query_DataSet, $dbcon) or die(mysql_error());
	} else {
	$DataSet = mysql_query($query_limit_DataSet, $dbcon) or die(mysql_error());
	}
	
$row_DataSet = mysql_fetch_assoc($DataSet);

if (isset($_GET['totalRows_DataSet'])) {
  $totalRows_DataSet = $_GET['totalRows_DataSet'];
}
elseif(isset($_GET['period'])){
	$totalRows_DataSet = mysql_num_rows($DataSet);
}
else {
  $all_DataSet = mysql_query($query_DataSet);
  $totalRows_DataSet = mysql_num_rows($all_DataSet);
  
}
$totalPages_DataSet = ceil($totalRows_DataSet/$maxRows_DataSet)-1;

$queryString_DataSet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_DataSet") == false && 
        stristr($param, "totalRows_DataSet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_DataSet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_DataSet = sprintf("&totalRows_DataSet=%d%s", $totalRows_DataSet, $queryString_DataSet);
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>


<?php if(isset($_GET['search'])) { ?>
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>SEARCH</strong></td>
  </tr>
</table>
    <form id="PeriodForm" name="PeriodForm" method="post" action="">
 
 		
	   <?php //PROCESS PERIOD FORM
		if(isset($_POST['doPeriod'])) {
			$timePost = $_POST['DateEntry'];
			$timePost = get_unixtime_string($timePost, 'timedate');
			$resultGoTo = "?url=sales-report_restaurant&loc=$loc&period=$timePost";
			header(sprintf("Location: %s", $resultGoTo));
		} 
		?>
        

 

      <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
        <tr>
          <td align="center" valign="middle">
          
          <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
            <tr>
              <td colspan="2" align="left" valign="middle" scope="row">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="left" valign="middle" scope="row">Please enter a particular date string to check report for that period</td>
            </tr>
            <tr>
              <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
            </tr>
            <tr>
              <th align="right" valign="middle" scope="row"><label for="Title">Period:</label></th>
              <td style="min-width:440px;" align="left" valign="middle"><span id="spryDateEntry">
                <input name="DateEntry" type="text" id="DateEntry" value="<?php echo do_date("F d Y"); ?>" size="30" />
              <span class="textfieldRequiredMsg">[Required]</span></span></td>
            </tr>
            <tr>
              <td colspan="2" class="spacer" height="8"> <input name="doPeriod" type="hidden" id="doPeriod" value="go" /></td>
            </tr>
            <tr>
              <th align="right" valign="middle" scope="row">&nbsp;</th>
              <td class="buttonCell"><input type="submit" name="SaveBtn" id="SaveBtn" value="Check" tabindex="9">
                <input type="reset" name="ResetBtn" id="ResetBtn" value="Reset" tabindex="10"></td>
            </tr>
          </table></td>
</tr>
        
      </table>
    </form>
 
  
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryDateEntry", "none", {validateOn:["blur", "change"]});
</script>
      
 <?php } else { //END SEARCH, SHOW RESULT ?>
      
      
     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td height="20" colspan="7" align="left" valign="middle" class="tabTitle" scope="col">
    <strong>
    <?php if ($totalRows_DataSet == 0) { echo "NO "; }?> RESULT
    </strong>
    <?php if ($totalRows_DataSet > 0) {
		if(!isset($_GET['period'])){?>
    <span style="text-transform:none;">
    (showing <?php echo ($startRow_DataSet + 1) ?> - <?php echo min($startRow_DataSet + $maxRows_DataSet, $totalRows_DataSet) ?> of <?php echo $totalRows_DataSet ?>)
    </span>
    <?php }
	} ?>
    
    <span style="float:right; padding-right:10px; display:inline; text-transform:none;">
    	<?php if(!isset($_GET['period'])){
		 if ($pageNum_DataSet > 0) { ?>
  		<a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, 0, $queryString_DataSet); ?>">First</a>
        ~
        <a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, max(0, $pageNum_DataSet - 1), $queryString_DataSet); ?>">Previous</a>        
        <?php if ($pageNum_DataSet < $totalPages_DataSet) { ?>
        ~
        <?php } 
		}
		
		if ($pageNum_DataSet < $totalPages_DataSet) { ?>
        <a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, min($totalPages_DataSet, $pageNum_DataSet + 1), $queryString_DataSet); ?>">Next</a>
        ~
        <a href="<?php printf("%s?pageNum_DataSet=%d%s", $currentPage, $totalPages_DataSet, $queryString_DataSet); ?>">Last</a>
        <?php }
		}?>
    </span>    
    </td>
  </tr>
  <tr class="cellTitle">
    <th width="30" height="24" align="center" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">S/N</th>
    <th align="left" valign="middle" scope="col">DESCRIPTION
    
    </th>
    
    <th width="68" align="center" valign="middle" scope="col">
    INVOICE NO
    </th>
    <th width="20" align="center" valign="middle" scope="col">
    QTY
    </th>
    <th width="60" align="right" valign="middle" scope="col">
    (&#8358;) PRICE
    </th>
    <th width="80" align="right" valign="middle" scope="col">
    
    (&#8358;) AMOUNT
    </th>
    
  <th width="150" align="center" valign="middle" scope="col">DATE</th>
  </tr>
  
  
      <?php if ($totalRows_DataSet > 0) { ?>
        <?php $rowNo = '';
		do {  //REPEAT RECORD 
		
		 	//check for period and choose to show or hide row
	 		if(isset($_GET['period'])) {
			$showtime = $row_DataSet['tuid'];
			$showtime = get_date($showtime, 'timedate');
				if($showtime == "{$_SESSION['timeDate']}") {?>
<tr class="tabContent"> 
        <td height="30" align="center" valign="middle" scope="col"><?php echo $rowNo = $rowNo + 1; ?></td>
          <td align="left" style="text-transform:none;">
		  <?php echo $row_DataSet['PosItemName']; ?>
    </td>
          
    <td align="center" valign="middle">
    <a href="?<?php cleanUrlShow("{$row_DataSet['InvoiceNo']}"); ?>" class="infoNav">
    #<?php echo $row_DataSet['InvoiceNo']; ?>
    </a></td>
<td align="center" valign="middle"><?php echo $row_DataSet['Qty']; ?></td>
         <td align="right" valign="middle"><?php echo number_format($row_DataSet['UnitPrice'], '2'); ?></td>
         <td align="right" valign="middle"><?php echo number_format($row_DataSet['Amount'], '2'); ?></td>
         <td align="center" valign="middle"><?php echo get_date($row_DataSet['tuid'], 'report'); ?> </td>     
  </tr>
       
        <?php } } else { //end period check  ?>
        
        <tr class="tabContent"> 
        <td height="30" align="center" valign="middle" scope="col"><?php echo $rowNo = $rowNo + 1; ?></td>
          <td align="left" style="text-transform:none;">
		  <?php echo $row_DataSet['PosItemName']; ?>
    </td>
          
    <td align="center" valign="middle">
    <a href="?<?php cleanUrlShow("{$row_DataSet['InvoiceNo']}"); ?>" class="infoNav">
    #<?php echo $row_DataSet['InvoiceNo']; ?>
    </a></td>
<td align="center" valign="middle"><?php echo $row_DataSet['Qty']; ?></td>
         <td align="right" valign="middle"><?php echo number_format($row_DataSet['UnitPrice'], '2'); ?></td>
         <td align="right" valign="middle"><?php echo number_format($row_DataSet['Amount'], '2'); ?></td>
         <td align="center" valign="middle"><?php echo get_date($row_DataSet['tuid'], 'report'); ?> </td>     
  </tr>
		
		
		<?php } //show with period off
        	} while ($row_DataSet = mysql_fetch_assoc($DataSet)); //END REPEAT RECORD 
	  } else { //end show if record found ?>        
  <tr class="tabContent infoError">
         <td height="30" colspan="7" align="center" valign="middle" scope="col" style="text-transform:none;">There were no records found!</td>
       </tr>
   <?php } ?>
</table>
<?php } //END SHOW RESULT ?>
<?php
mysql_free_result($DataSet);
?>

