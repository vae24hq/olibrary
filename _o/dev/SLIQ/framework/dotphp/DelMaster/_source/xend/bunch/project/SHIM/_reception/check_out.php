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

$colname_AccommodationData = "-1";
if (isset($_GET['item'])) {
  $colname_AccommodationData = $_GET['item'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_AccommodationData = sprintf("SELECT * FROM accommodation WHERE suid = %s", GetSQLValueString($colname_AccommodationData, "text"));
$AccommodationData = mysql_query($query_AccommodationData, $dbcon) or die(mysql_error());
$row_AccommodationData = mysql_fetch_assoc($AccommodationData);
$totalRows_AccommodationData = mysql_num_rows($AccommodationData);

mysql_select_db($database_dbcon, $dbcon);
$query_RoomData = "SELECT * FROM rooms WHERE fuid = '{$row_AccommodationData['Room']}'";
$RoomData = mysql_query($query_RoomData, $dbcon) or die(mysql_error());
$row_RoomData = mysql_fetch_assoc($RoomData);
$totalRows_RoomData = mysql_num_rows($RoomData);

mysql_select_db($database_dbcon, $dbcon);
$query_SuiteData = "SELECT * FROM room_type WHERE fuid = '{$row_RoomData['RoomType']}'";
$SuiteData = mysql_query($query_SuiteData, $dbcon) or die(mysql_error());
$row_SuiteData = mysql_fetch_assoc($SuiteData);
$totalRows_SuiteData = mysql_num_rows($SuiteData);

mysql_select_db($database_dbcon, $dbcon);
$query_CustomerData = "SELECT * FROM person_info WHERE fuid = '{$row_AccommodationData['Customer']}'";
$CustomerData = mysql_query($query_CustomerData, $dbcon) or die(mysql_error());
$row_CustomerData = mysql_fetch_assoc($CustomerData);
$totalRows_CustomerData = mysql_num_rows($CustomerData);

$AmountDeposited = '';
$Balance = '';
$Deposit = '';
$Refund = '';


	

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "CreateForm")) {
	


$colname_AccommodationData = "-1";
if (isset($_POST['AccommoSuid'])) {
  $colname_AccommodationData = $_POST['AccommoSuid'];
}
mysql_select_db($database_dbcon, $dbcon);
$query_AccommodationData = sprintf("SELECT * FROM accommodation WHERE suid = %s", GetSQLValueString($colname_AccommodationData, "text"));
$AccommodationData = mysql_query($query_AccommodationData, $dbcon) or die(mysql_error());
$row_AccommodationData = mysql_fetch_assoc($AccommodationData);
$totalRows_AccommodationData = mysql_num_rows($AccommodationData);


if($Balance = strstr($row_AccommodationData['Balance'], '-')) {
	$Balance = str_replace('-', '', $Balance);
			if(isset($_POST['Cash'])) {$Deposit = $_POST['Cash'];}
			$AmountDeposited = ($row_AccommodationData['AmountDeposited'] + $Deposit);
			$Balance = ($row_AccommodationData['Balance'] + $Deposit);
	} else {
		if($row_AccommodationData['Balance'] != '0') {
			if(isset($_POST['Cash'])) {$Refund = $_POST['Cash'];}
			$row_AccommodationData['Balance'];
			$AmountDeposited = ($row_AccommodationData['AmountDeposited'] - $Refund);
			$Balance = ($row_AccommodationData['Balance'] - $Refund);				
		} 
	}
	
				   
$updateSQL = sprintf("UPDATE accommodation SET AccommodationStatus=%s,  DateCheckedOut=%s, AmountDeposited=%s,Balance=%s WHERE suid=%s",
                       GetSQLValueString($_POST['AccommodationStatus'], "text"),
                       GetSQLValueString($_POST['DateCheckedOut'], "text"),
                       GetSQLValueString($AmountDeposited, "text"),
					   GetSQLValueString($Balance, "text"),
					   GetSQLValueString($_POST['AccommoSuid'], "text"));


  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());
  
  
  $setRoomFree = 'available';
  $updateSQL2 = sprintf("UPDATE rooms SET Status=%s WHERE fuid=%s",
                       GetSQLValueString($setRoomFree, "text"),
                       GetSQLValueString($_POST['FreeRoom'], "text"));


  mysql_select_db($database_dbcon, $dbcon);
  $Result2 = mysql_query($updateSQL2, $dbcon) or die(mysql_error());

$periodate = $_GET['ped'];
  $updateGoTo = "?url=accommodation_reception&loc=$loc&period=$periodate&act=check-out";
  header(sprintf("Location: %s", $updateGoTo));
}

?>


<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">
  
  
  <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
    <tr>
      <td align="center" valign="middle">
        <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
          <tr>
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
          </tr>
          <tr>
    <th align="right" valign="middle" scope="row"><label>Customer:</label></th>
    <td style="min-width:440px;" align="left" valign="middle"><?php echo $row_CustomerData['FullName']; ?>
      
     </td>
    </tr>
          
         
          
          <tr>
            <th align="right" valign="middle" scope="row"><label>Room:</label></th>
            <td align="left" valign="middle"><?php echo $row_RoomData['Title']; ?>
            <input type="hidden" name="FreeRoom" id="FreeRoom" value="<?php echo $row_RoomData['fuid']; ?>"></td>
          </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Description">Suite:</label>
            </th>
            <td align="left" valign="middle"><?php echo $row_SuiteData['Title']; ?>
              
              
            </td>
          </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row"><label>Check-In Date:</label></th>
            <td align="left" valign="middle">
<?php echo do_date('QD1', $row_AccommodationData['tuid']); ?>            </td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label>No of Days:</label></th>
            <td align="left" valign="middle"><?php echo $row_AccommodationData['NoOfDays']; ?></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label>Reciept No:</label></th>
            <td align="left" valign="middle"><?php echo $row_AccommodationData['ReceiptNo']; ?></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label>Discount:</label></th>
            <td align="left" valign="middle"><?php echo $row_AccommodationData['DiscountedAmount']; ?></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label>Accommodation Cost:</label></th>
            <td align="left" valign="middle">&#8358;<?php echo number_format($row_AccommodationData['TotalCost']); ?></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label>Amount Deposited:</label></th>
            <td align="left" valign="middle">
			<?php if($row_AccommodationData['AmountDeposited'] > '0'){ echo "&#8358;" . number_format($row_AccommodationData['AmountDeposited']);} ?>
			</td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row"><label>Balance:</label></th>
            <td align="left" valign="middle">
			<?php 
				if($rowDataBalance = strstr($row_AccommodationData['Balance'], '-')) {
					$rowDataBalance = str_replace('-', '', $row_AccommodationData['Balance']);
				echo "&#8358;" . number_format($rowDataBalance) . " [Amount Owed]";
				
				}
			 else {
				 
				 if($row_AccommodationData['Balance'] != '0') {
					echo "&#8358;" . number_format($row_AccommodationData['Balance']) . " [Refund]";
				 } else {
					 echo "0";
					 }
						
				}
				?></td>
          </tr>
          
         
          <?php if($row_AccommodationData['Balance'] != '0') {?>
		  <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Cash">
			<?php 
				if($rowDataBalance = strstr($row_AccommodationData['Balance'], '-')) {
					$rowDataBalance = str_replace('-', '', $row_AccommodationData['Balance']);
				echo "Deposit:";
				$_SESSION['mathopp'] = '+';
				
				}
			 else {
				 
				 if($row_AccommodationData['Balance'] != '0') {
					echo "Refund:";
					$_SESSION['mathopp'] = '-';
				 }					
				}
				?></label>
            </th>
            <td align="left" valign="middle"><span id="spryCash">
            
 
 <input name="Cash" type="text" id="Cash" value="<?php 
				if($rowDataBalance = strstr($row_AccommodationData['Balance'], '-')) {
					$rowDataBalance = str_replace('-', '', $row_AccommodationData['Balance']);
				} else {
					$rowDataBalance = $row_AccommodationData['Balance'];
				}
				echo "{$rowDataBalance}";
				?>" />
<span class="textfieldInvalidFormatMsg">Invalid format.</span></span>
 &nbsp;</td>
          </tr><?php } ?>
         
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td align="left" valign="middle"><input name="AccommodationStatus" type="hidden" id="AccommodationStatus" value="checked-out" />
            <input name="DateCheckedOut" type="hidden" id="DateCheckedOut" value="<?php echo unix_time(); ?>" /></td>
          </tr>
          <tr>
            <td colspan="2" class="spacer" height="8">
              
            <input name="run_process" type="hidden" id="run_process" value="go" />
            <input name="AccommoSuid" type="hidden" id="AccommoSuid" value="<?php echo $row_AccommodationData['suid']; ?>" />
            <input name="RoomSuid" type="hidden" id="RoomSuid" value="<?php echo $row_RoomData['suid']; ?>" />
            <input name="SuiteSuid" type="hidden" id="SuiteSuid" value="<?php echo $row_SuiteData['suid']; ?>" /></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
              <input type="submit" name="SaveBtn" id="SaveBtn" value="Check-Out" tabindex="6"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="CreateForm" />
</form>
</script>
<?php
mysql_free_result($AccommodationData);

mysql_free_result($RoomData);

mysql_free_result($SuiteData);

mysql_free_result($CustomerData);
?>
<script type="text/javascript">
<?php if($row_AccommodationData['Balance'] != '0') {?>var sprytextfield1 = new Spry.Widget.ValidationTextField("spryCash", "integer", {validateOn:["blur", "change"], isRequired:false});
<?php }?></script>
