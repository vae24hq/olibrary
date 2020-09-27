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
		
		
mysql_select_db($database_dbcon, $dbcon);
$query_DataSet = "SELECT * FROM pos_resturant_sales ORDER BY tuid DESC";
$DataSet = mysql_query($query_DataSet, $dbcon) or die(mysql_error());
$row_DataSet = mysql_fetch_assoc($DataSet);
$totalRows_DataSet = mysql_num_rows($DataSet);
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
			$resultGoTo = "?url=income-summary_restaurant&loc=$loc&period=$timePost";
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
 
 
 <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="viewTabHr">
   <tr>
     <td height="20" colspan="2" align="left" valign="middle" class="tabTitle" scope="col" style="text-transform:none;"><strong>
       <?php if ($totalRows_DataSet == 0) { echo "NO "; }?>
       RESTAURANT </strong></td>
   </tr>
   <tr class="cellTitle">
     <th height="24" align="left" valign="middle" scope="col"> PERIOD </th>
     <th width="120" align="right" valign="middle" scope="col"> AMOUNT </th>
   </tr>
   <?php if ($totalRows_DataSet > 0) { ?>
	   <?php $calAmount = '0';
	   	do {  //REPEAT RECORD
	   				//Calculate Amount
					if(!isset($_GET['period'])) {
						$calAmount = $calAmount + $row_DataSet['Amount'];
					} else {
						
						//PERIOD CHECK
						$showtime = $row_DataSet['tuid'];
						$showtime = get_date($showtime, 'timedate');
						
						$timeDate = $_GET['period'];
						if($_GET['period'] == 'today') { $timeDate = get_unixtime_string($timeDate);}
						$timeDate = get_date($timeDate, 'timedate');
						
						if($showtime == $timeDate) {
							$calAmount = $calAmount + $row_DataSet['Amount'];
						}
						
					}
            } while ($row_DataSet = mysql_fetch_assoc($DataSet)); //END REPEAT RECORD 
       ?>
   <tr class="tabContent">
     <td height="30" align="left" valign="middle" style="text-transform:none;">
	 <?php 	
		if(!isset($_GET['period'])) { $description = "Summary since <strong>".do_date()."</strong> till now";}
		elseif ($_GET['period'] == 'today') { $description = "Summary for today <strong>".do_date("l, F d, Y", "today")."</strong>";}
		else { $description = "Summary for <strong>".do_date("l, F d, Y", "{$_GET['period']}")."</strong>";}
		echo $description;
	 ?>
     </td>
     <td align="right" valign="middle"><?php echo "&#8358;".number_format($calAmount, '2');  $summaryRestaurant = $calAmount;?></td>
   </tr>
   <?php  } //END SHOW IF RECORD FOUND
    else { //SHOW IF RECORD NOT FOUND ?>
   <tr class="tabContent infoError">
     <td height="30" colspan="2" align="center" valign="middle" scope="col" style="text-transform:none;">There were no records found!</td>
   </tr>
   <?php } //END SHOW IF RECORD NOT FOUND ?>
 </table>

<?php } 


mysql_free_result($DataSet);
?>