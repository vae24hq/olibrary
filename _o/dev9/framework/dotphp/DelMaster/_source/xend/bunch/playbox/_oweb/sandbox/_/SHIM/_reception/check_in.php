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



$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "CreateForm")) {
 
 $calCost = ($_POST['UnitCost'] * $_POST['NoOfDays']);
 $TotalCost = ($calCost - $_POST['DiscountedAmount']);
 $Balance = ($_POST['AmountDeposited'] - $TotalCost);
 
 $updateSQL = sprintf("UPDATE accommodation SET AccommodationStatus=%s, DateCheckedIn=%s, NoOfDays=%s, ReceiptNo=%s, DiscountedAmount=%s, DepositRequired=%s, UnitCost=%s, AmountDeposited=%s, InvoiceStatus=%s, Balance=%s,TotalCost=%s WHERE suid=%s",
                       GetSQLValueString($_POST['AccommodationStatus'], "text"),
                       GetSQLValueString($_POST['DateCheckedIn'], "text"),
                       GetSQLValueString($_POST['NoOfDays'], "text"),
                       GetSQLValueString($_POST['ReceiptNo'], "text"),
                       GetSQLValueString($_POST['DiscountedAmount'], "text"),
                       GetSQLValueString($_POST['DepositRequired'], "text"),
                       GetSQLValueString($_POST['UnitCost'], "text"),
                       GetSQLValueString($_POST['AmountDeposited'], "text"),
                       GetSQLValueString($_POST['InvoiceStatus'], "text"),
					   GetSQLValueString($Balance, "text"),
					   GetSQLValueString($TotalCost, "text"),
					   GetSQLValueString($_POST['suid'], "text"));
					   
	

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());
  
  //IF TYPE IS SET TO ROOM STAY
 	$DSuid = $_POST['suid'];
  	$query_accommoDation = "SELECT * FROM accommodation WHERE `suid` = '$DSuid'";
	$accommoDation = mysql_query($query_accommoDation, $dbcon) or die(mysql_error());
	$row_accommoDation = mysql_fetch_assoc($accommoDation);
	$totalRows_accommoDation = mysql_num_rows($accommoDation);
	
	$DSuite = $_POST['DSuite'];
	$query_roomtype = "SELECT * FROM room_type WHERE `suid` = '$DSuite'";
	$roomtype = mysql_query($query_roomtype, $dbcon) or die(mysql_error());
	$row_roomtype = mysql_fetch_assoc($roomtype);
	$totalRows_roomtype = mysql_num_rows($roomtype);
	
	
	if($row_accommoDation['Type'] == 'check-in') {
		
		$InStay = "instay";
		$updateSQL2 = sprintf("UPDATE rooms SET Status=%s WHERE `fuid`=%s",
  						GetSQLValueString($InStay, "text"),
				   GetSQLValueString($_POST['DRoom'], "text"));
		$Result2 = mysql_query($updateSQL2, $dbcon) or die(mysql_error());
		
		
		
	/* 	$QtyInstay = ($row_roomtype['QtyInStay'] + 1);
		$QtyAvaliable = ($row_roomtype['Qty'] - $QtyInstay);
		

  		$updateSQL3 = sprintf("UPDATE room_type SET QtyAvaliable=%s, QtyInStay=%s WHERE fuid=%s",
  						GetSQLValueString($QtyAvaliable, "text"),
						GetSQLValueString($QtyInstay, "text"),
					   GetSQLValueString($row_accommoDation['fuid'], "text"));
		$Result3 = mysql_query($updateSQL3, $dbcon) or die(mysql_error()); */
	

	} 
	
 


	
					   

  $updateGoTo = "./?url=notification&loc=$loc&act=reception-checked-in&success";
  header(sprintf("Location: %s", $updateGoTo));
}

//Accommodation Info
/*$AccommodationInfo = $_GET['checkin'];
$query_AccommodationInfo = "SELECT * FROM accommodation WHERE `suid` = '$AccommodationInfo'";
$AccommodationInfo = mysql_query($query_AccommodationInfo, $dbcon) or die(mysql_error());
$row_AccommodationInfo = mysql_fetch_assoc($AccommodationInfo);
$totalRows_AccommodationInfo = mysql_num_rows($AccommodationInfo);*/

$dataSet = $_GET['checkin'];
$query_dataSet = "SELECT * FROM accommodation WHERE `suid` = '$dataSet'";
$dataSet = mysql_query($query_dataSet, $dbcon) or die(mysql_error());
$row_dataSet = mysql_fetch_assoc($dataSet);
$totalRows_dataSet = mysql_num_rows($dataSet);


?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationSelect.css" rel="stylesheet" type="text/css">

<?php if ($totalRows_dataSet > 0) { // Show if recordset not empty ?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="11" class="tabTitle" scope="col"><strong>RESULT</strong>    </td>
  </tr>
  <tr class="cellTitle">
    <th width="200" height="24" align="center" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">CUSTOMER</th>
    <th width="40" align="left" valign="middle" scope="col">ROOM</th>
    <th width="160" align="left" valign="middle" scope="col">SUITE</th>
    <th width="80" align="center" valign="middle" scope="col">TYPE</th>
    <th width="100" align="center" valign="middle" scope="col">CHECK-IN </th>
    <th width="100" align="center" valign="middle" scope="col"> CHECK-OUT</th>
    <th width="100" align="center" valign="middle" scope="col"> STATUS</th>
    <?php if($row_dataSet['AccommodationStatus'] !='checked-in'){?>
    <th width="70" align="center" valign="middle" scope="col">ACTION</th>
    <?php }?>
    <th width="180" align="center" valign="middle" scope="col">DATE</th>
  </tr>
  <?php  $sn = ''; ?>

      <tr>
      
        <td height="20" align="left">
        <?php  
			//Personal Info for Display
			$PersonInfo = $row_dataSet['Customer'];
			$query_PersonInfo = "SELECT * FROM person_info WHERE `fuid` = '$PersonInfo'";
			$PersonInfo = mysql_query($query_PersonInfo, $dbcon) or die(mysql_error());
			$row_PersonInfo = mysql_fetch_assoc($PersonInfo);
			$totalRows_PersonInfo = mysql_num_rows($PersonInfo);
			echo $row_PersonInfo['FullName'];
					?>
        </td>
        <td align="left"><?php  
			//Room Info for Display
			$RoomInfo = $row_dataSet['Room'];
			$query_RoomInfo = "SELECT * FROM rooms WHERE `fuid` = '$RoomInfo'";
			$RoomInfo = mysql_query($query_RoomInfo, $dbcon) or die(mysql_error());
			$row_RoomInfo = mysql_fetch_assoc($RoomInfo);
			$totalRows_RoomInfo = mysql_num_rows($RoomInfo);
			echo $row_RoomInfo['Title'];

?></td>
        <td align="left">
        <?php
        //Room Info for Display
			$SuiteInfo = $row_RoomInfo['RoomType'];
			$query_SuiteInfo = "SELECT * FROM room_type WHERE `fuid` = '$SuiteInfo'";
			$SuiteInfo = mysql_query($query_SuiteInfo, $dbcon) or die(mysql_error());
			$row_SuiteInfo = mysql_fetch_assoc($SuiteInfo);
			$totalRows_SuiteInfo = mysql_num_rows($SuiteInfo);
			echo $row_SuiteInfo['Title'];
			?>
            </td>
        <td align="center"><?php echo $row_dataSet['Type']; ?></td>
        <td align="center"><?php echo do_date('QD1', $row_dataSet['CheckInDate']); ?></td>
        <td align="center"><?php echo do_date('QD1', $row_dataSet['CheckOutDate']); ?></td>
        <td align="center" valign="middle">
		<?php if($row_dataSet['AccommodationStatus'] == 'open') { echo "Free"; } else { echo $row_dataSet['AccommodationStatus'];} ?>
         
         
       	</td>
        <?php if($row_dataSet['AccommodationStatus'] !='checked-in'){?>
        <td align="center">
         <a href="?url=check-in_reception&checkin=<?php echo $row_dataSet['suid']; ?>&delete" class="infoNav2">cancel</a>
        </td>
         <?php } ?>
        <td align="center"><?php echo get_date($row_dataSet['tuid'], 'report'); ?></td>
      </tr>
     
</table>
<?php if($row_dataSet['AccommodationStatus'] == 'open') {?>
<form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">
  
  
  <table width="100" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="30">&nbsp;</td>
    </tr>
  </table>
  <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
    <tr>
      <td align="center" valign="middle">
        <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
          
           <tr>
            <td colspan="2" align="left" valign="middle" scope="row">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="left" valign="middle" scope="row">Please complete the form below with correct information</td>
          </tr>
          
          <tr>
            <td height="14" colspan="2" class="spacer" scope="row"><input name="AccommodationStatus" type="hidden" id="AccommodationStatus" value="checked-in" />
            <input name="DateCheckedIn" type="hidden" id="DateCheckedIn" value="<?php echo unix_time(); ?>" />
            <input name="suid" type="hidden" id="suid" value="<?php echo $row_dataSet['suid']; ?>" /></td>
          </tr>
          <tr>
          
          
            
  <tr>
    <th align="right" valign="middle" scope="row"><label for="ReceiptNo">Receipt No:</label></th>
    <td style="min-width:440px;" align="left" valign="middle"><span id="spryReceiptNo">
      <input name="ReceiptNo" type="text" id="ReceiptNo" tabindex="1" size="20">
      <span class="textfieldRequiredMsg">Required!</span></span></td>
    </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="DiscountedAmount">Discount:</label></th>
            <td align="left" valign="middle"><span id="spryDiscountedAmount">
              <input name="DiscountedAmount" type="text" id="DiscountedAmount" tabindex="2" size="20" />
            <span class="textfieldInvalidFormatMsg">Number only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label>Deposit:</label></th>
            <td align="left" valign="middle">
            <input name="DepositRequired" type="hidden" id="DepositRequired" value="<?php echo $row_SuiteInfo['Deposit']; ?>" />
           <span style="padding-left:3px; padding-right:4px; height:22px;">
		   &#8358;<?php echo number_format($row_SuiteInfo['Deposit']); ?>
           </span></td>
          </tr>
          
           <tr>
            <th align="right" valign="middle" scope="row"><label>Room Cost:</label></th>
            <td align="left" valign="middle">
            <input name="UnitCost" type="hidden" id="UnitCost" value="<?php echo $row_SuiteInfo['Price']; ?>" />
           <span style="padding-left:3px; padding-right:4px; height:22px;">
		   &#8358;<?php echo number_format($row_SuiteInfo['Price']); ?>
           </span></td>
          </tr>
          <tr>
             <th align="right" valign="middle" scope="row">
             <label for="NoOfDays">No Of Days:</label>
             </th>
             <td align="left" valign="middle">
           	   <span id="spryNoOfDays">
               <input name="NoOfDays" type="text" id="NoOfDays" size="10" />
            <span class="textfieldRequiredMsg">Required!</span><span class="textfieldInvalidFormatMsg">Number only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="AmountDeposited">Amount Paid:</label>
            </th>
            <td align="left" valign="middle"><span id="spryAmountDeposited">
            
            <input type="text" name="AmountDeposited" id="AmountDeposited" />
<span class="textfieldInvalidFormatMsg">Number only.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="InvoiceStatus">
              <input name="DRoom" type="hidden" id="DRoom" value="<?php echo $row_RoomInfo['fuid']; ?>" />
              <input name="DSuite" type="hidden" id="DSuite" value="<?php echo $row_SuiteInfo['fuid'];?>" />
            Invoice:</label></th>
            <td align="left" valign="middle">  
              <section class="container">
                
                <div class="dropdown"><span id="spryInvoiceStatus">
                  <!--<select name="InvoiceStatus" id="InvoiceStatus" class="dropdown-select" tabindex="5">
                    <option value="">Select</option>
                    <option value="paid">Paid</option>
                    <option value="credit">Credit</option>
                    <option value="corporate-tab">Corporate Tab</option>
                  </select> -->
                  <select name="InvoiceStatus" id="InvoiceStatus" class="dropdown-select" tabindex="5">
                    <option value="paid" selected="selected">Paid</option>
                    <option value="credit">Credit</option>
                  </select>
                <span class="selectRequiredMsg"></span></span></div>  
                
              </section>
            </td>
          </tr>
          
          <tr>
            <td colspan="2" class="spacer" height="8">&nbsp;</td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
              <input type="submit" name="SaveBtn" id="SaveBtn" value="Check-In" tabindex="6">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Clear" tabindex="7"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="CreateForm" />
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryDiscountedAmount", "integer", {isRequired:false, validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryReceiptNo", "none", {validateOn:["blur", "change"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryInvoiceStatus");
var sprytextfield3 = new Spry.Widget.ValidationTextField("spryNoOfDays", "integer", {validateOn:["blur", "change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("spryAmountDeposited", "integer", {validateOn:["blur", "change"], isRequired:false});
</script>
<?php } ?>


<?php  //delete record
if ((isset($_GET['checkin'])) && ($_GET['checkin'] != "") && (isset($_GET['delete']))) {
  $deleteSQL = sprintf("DELETE FROM accommodation WHERE suid=%s",
                       GetSQLValueString($_GET['checkin'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($deleteSQL, $dbcon) or die(mysql_error());

  $deleteGoTo = "./?url=view-customers_accommodation";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
   //$deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
} ?>



<?php } else {
 echo "No Record Found";
} // Show if recordset empty ?>
<?php
mysql_free_result($dataSet);
?>