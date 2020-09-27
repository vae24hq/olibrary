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



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "CreateForm")) {
	
$CheckInDate = $_POST['CheckInDate'];
$CheckInDate = getCleanDate($CheckInDate);
$CheckOutDate = $_POST['CheckOutDate'];
$CheckOutDate = getCleanDate($CheckOutDate);
$insertSQL = sprintf("INSERT INTO accommodation (suid, tuid, fuid, Customer, Room, Type, CheckInDate, CheckOutDate) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Suid'], "text"),
                       GetSQLValueString($_POST['Tuid'], "text"),
                       GetSQLValueString($_POST['Fuid'], "text"),
                       GetSQLValueString($_POST['Customer'], "text"),
                       GetSQLValueString($_POST['Room'], "text"),
                       GetSQLValueString($_POST['Type'], "text"),
                       GetSQLValueString($CheckInDate, "text"),
                       GetSQLValueString($CheckOutDate, "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?url=check-in_reception&checkin={$_POST['Suid']}";
   header(sprintf("Location: %s", $insertGoTo));
}
?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">
  
  
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
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
          </tr>
            
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td height="24" align="left" valign="middle" style="min-width:440px;">
            <span style="padding-left:3px; padding-right:4px; text-transform:uppercase; font-weight:bold; color:#333; border:dotted #CCC 1px;">
            <?php //Personal Information
					if(isset($_GET['customer'])) {
					$CustomerInfo = $_GET['customer'];
					} else { $CustomerInfo = '%';}
					mysql_select_db($database_dbcon, $dbcon);
$query_CustomerInfo = "SELECT * FROM customer_info WHERE `fuid` = '$CustomerInfo'";
$CustomerInfo = mysql_query($query_CustomerInfo, $dbcon) or die(mysql_error());
$row_CustomerInfo = mysql_fetch_assoc($CustomerInfo);
$totalRows_CustomerInfo = mysql_num_rows($CustomerInfo);
					//Persnal Info for Display
					$PersonInfo = $row_CustomerInfo['PersonInfo'];
					$query_PersonInfo = "SELECT * FROM person_info WHERE `fuid` = '$PersonInfo'";
					$PersonInfo = mysql_query($query_PersonInfo, $dbcon) or die(mysql_error());
					$row_PersonInfo = mysql_fetch_assoc($PersonInfo);
					$totalRows_PersonInfo = mysql_num_rows($PersonInfo);
					echo $row_PersonInfo['FullName']; ?>
                    </span>
            <input name="Customer" type="hidden" id="Customer" value="<?php echo $row_CustomerInfo['fuid']; ?>">
            </td>
          </tr>
          
          
          
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="Room">Room:</label></th>
            <td align="left" valign="middle">
            
            <?php 
			 //room infomation
			 mysql_select_db($database_dbcon, $dbcon);
					$query_RoomInfo = "SELECT * FROM rooms WHERE Status = 'available' ORDER BY Title ASC";
					$RoomInfo = mysql_query($query_RoomInfo, $dbcon) or die(mysql_error());
					$row_RoomInfo = mysql_fetch_assoc($RoomInfo);
					$totalRows_RoomInfo = mysql_num_rows($RoomInfo);
					?>
                      
              <section class="container">
                
                <div class="dropdown"><span id="sprySubCat">
                  <select name="Room" id="Room" class="dropdown-select">
                    <option value="">Select</option>
                    <?php
do {  
?>
                    <option value="<?php echo $row_RoomInfo['fuid']?>"><?php echo $row_RoomInfo['Title']?></option>
                    <?php
} while ($row_RoomInfo = mysql_fetch_assoc($RoomInfo));
  $rows = mysql_num_rows($RoomInfo);
  if($rows > 0) {
      mysql_data_seek($RoomInfo, 0);
	  $row_RoomInfo = mysql_fetch_assoc($RoomInfo);
  }
?>
                  </select>
                <span class="selectRequiredMsg"></span></span>
                </div>                  
              </section>
            </td>
          </tr>
          
          <tr>
            <th align="right" valign="middle" scope="row"><label for="Type">Type:</label></th>
            <td align="left" valign="middle">
            <section class="container">                
              <div class="dropdown">
               <span id="spryType">              
              <select name="Type" id="Type" class="dropdown-select">
                <option>Select</option>
                <option value="check-in" selected="selected">Check-In</option>
               
              </select>
            <span class="selectRequiredMsg"></span></span>
           </div>
          </section></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">
            <label for="CheckInDate">Check-In:</label></th>
            <td align="left" valign="middle"><span id="spryCheckInDate">
            <input name="CheckInDate" type="text" id="CheckInDate" tabindex="2" value="<?php echo do_date("QD1"); ?>" size="10" />
            <span class="textfieldInvalidFormatMsg">Invalid format.</span>
            <span class="textfieldRequiredMsg">Required!</span></span></td>
          </tr>
         
         <tr>
           <th align="right" valign="middle" scope="row"><label for="CheckOutDate">Check-Out:</label></th>
           <td  align="left" valign="middle"><span id="spryCheckOutDate">
           <input name="CheckOutDate" type="text" id="CheckOutDate" tabindex="1" size="10" value="<?php echo do_date("QD1","next day"); ?>"/>
           <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldRequiredMsg">Required!</span></span></td>
         </tr>
    
     <tr>
            <td colspan="2" class="spacer" height="8">
              <input name="Suid" type="hidden" id="Suid" value="<?php echo do_rand('s'); ?>">
              <input name="Tuid" type="hidden" id="Tuid" value="<?php echo do_rand('t'); ?>">
              <input name="Fuid" type="hidden" id="Fuid" value="<?php echo do_rand('f'); ?>">
            <input name="run_process" type="hidden" id="run_process" value="go" />
            <input name="Period" type="hidden" id="Period" value="<?php echo unix_time(); ?>" /></td>
          </tr>
          <tr>
            <th align="right" valign="middle" scope="row">&nbsp;</th>
            <td class="buttonCell">
              <input type="submit" name="SaveBtn" id="SaveBtn" value="Save" tabindex="6">
            <input type="reset" name="ResetBtn" id="ResetBtn" value="Clear" tabindex="7"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="CreateForm" />
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryCheckInDate", "date", {hint:"DD/MM/YYYY", format:"dd/mm/yyyy"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryCheckOutDate", "date", {format:"dd/mm/yyyy", hint:"DD/MM/YYYY"});
var spryselect1 = new Spry.Widget.ValidationSelect("sprySubCat");
var spryselect2 = new Spry.Widget.ValidationSelect("spryType");
</script>
<?php
mysql_free_result($CustomerInfo);
?>
