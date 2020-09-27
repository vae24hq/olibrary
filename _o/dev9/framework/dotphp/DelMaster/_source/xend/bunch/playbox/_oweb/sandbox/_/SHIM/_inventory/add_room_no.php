<?php
do_session();
do_authenticate();
//is_StaffRestrict();

require("../Connections/dbcon.php");

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
  $insertSQL = sprintf("INSERT INTO rooms (suid, tuid, fuid, Title, Acronym, `Description`, RoomType, Status) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Suid'], "text"),
                       GetSQLValueString($_POST['Tuid'], "text"),
                       GetSQLValueString($_POST['Fuid'], "text"),
                       GetSQLValueString($_POST['Title'], "text"),
                       GetSQLValueString($_POST['Acronym'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['RoomCategory'], "text"),
                       GetSQLValueString($_POST['Status'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());
  
   //Get Category from POST
   $Post_RoomCategory = $_POST['RoomCategory'];
   mysql_select_db($database_dbcon, $dbcon);
   $query_PostRoomsCat = "SELECT * FROM room_type WHERE fuid = '$Post_RoomCategory'";
   $PostRoomsCat = mysql_query($query_PostRoomsCat, $dbcon) or die(mysql_error());
   $row_PostRoomsCat = mysql_fetch_assoc($PostRoomsCat);
   echo $totalRows_PostRoomsCat = mysql_num_rows($PostRoomsCat);
   
  //update Category quantity
  $newQty = ($row_PostRoomsCat['Qty'] + 1);
  $newQtyAvaliable = ($row_PostRoomsCat['QtyAvaliable'] + 1);
  $updateSQL = sprintf("UPDATE room_type SET Qty=%s, QtyAvaliable=%s WHERE suid=%s",
                       GetSQLValueString($newQty, "text"),
					   GetSQLValueString($newQtyAvaliable, "text"),
                       GetSQLValueString($row_PostRoomsCat['suid'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($updateSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?url=action-completed_manage&opp=add-room-no&return=success";
  if (isset($_SERVER['QUERY_STRING'])) {
    //$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    //$insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_dbcon, $dbcon);
$query_RoomsCat = "SELECT * FROM room_type WHERE Status = 'available' ORDER BY Title ASC";
$RoomsCat = mysql_query($query_RoomsCat, $dbcon) or die(mysql_error());
$row_RoomsCat = mysql_fetch_assoc($RoomsCat);
$totalRows_RoomsCat = mysql_num_rows($RoomsCat);
?>

<link rel="stylesheet" media="screen" type="text/css" href="../script/css/screen.css">
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../script/spry/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../script/spry/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />

<form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">  
 <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
        <tr>
          <td align="center" valign="middle">     
<table width="96%" border="0" cellspacing="0" cellpadding="0" class="inputTab">
          <tr>
            <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
        </tr>
          <tr>
          
<tr>
            <th align="right" valign="middle"  scope="row"><label for="Title">Room Number:</label></th>
            <td align="left" valign="top" class="value" style="min-width:440px;"><span id="spryTitle">
            <input name="Title" type="text" class="inputField" id="Title" tabindex="1" size="10" />
      <span class="textfieldRequiredMsg">Required!</span><span class="textfieldMaxCharsMsg">Not more than 5 characters</span><span class="textfieldInvalidFormatMsg">Numbers only</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle"  scope="row">
            <label for="Acronym">Acronym:</label></th>
            <td align="left" valign="top" class="value"><span id="spryAcronym">
              <input name="Acronym" type="text" class="inputField" id="Acronym"  size="10" />
            <span class="textfieldMaxCharsMsg">Not more than 10 characters</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle"  scope="row"><label for="RoomCategory">Category:</label></th>
            <td align="left" valign="top" class="value">
              <section class="container">
     
     <div class="dropdown">
              <span id="spryRoomCategory">
              <select name="RoomCategory" id="RoomCategory" tabindex="2" class="dropdown-select">
                <option value="">Select</option>
                <?php
do {  
?>
            <option value="<?php echo $row_RoomsCat['fuid']?>"><?php echo $row_RoomsCat['Title']?></option>
                <?php
} while ($row_RoomsCat = mysql_fetch_assoc($RoomsCat));
  $rows = mysql_num_rows($RoomsCat);
  if($rows > 0) {
      mysql_data_seek($RoomsCat, 0);
	  $row_RoomsCat = mysql_fetch_assoc($RoomsCat);
  }
?>        </select>
            <span class="selectRequiredMsg"></span></span>
            </div>
           </section>
           </td>
          </tr>
          <tr>
            <th align="right" valign="middle"  scope="row">
            <label for="Description">Description:</label></th>
            <td align="left" valign="top" class="value"><span id="spryDescription">
            <textarea name="Description" cols="30" id="Description" tabindex="4"></textarea>
<span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span></td>
          </tr>
          <tr>
            <th align="right" valign="middle"  scope="row">
            <label for="Status">Availability:</label></th>
            <td align="left" valign="top" class="value">
            <section class="container">
             <div class="dropdown">
             <span id="spryStatus">
              <select name="Status" id="Status" tabindex="5" class="dropdown-select">
                <option>Select</option>
                <option value="available" selected>Available</option>
                <option value="unavailable ">Unavailable</option>
              </select>
            <span class="selectRequiredMsg"></span></span>
            </div>
            </section>
            </td>
          </tr>
          
          <tr>
             <td colspan="2" class="spacer" height="8"><input name="run_process" type="hidden" id="run_process" value="go" /></td>
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
         <input name="Suid" type="hidden" id="Suid" value="<?php echo do_rand('s'); ?>">
         <input name="Tuid" type="hidden" id="Tuid" value="<?php echo do_rand('t'); ?>">
         <input name="Fuid" type="hidden" id="Fuid" value="<?php echo do_rand('f'); ?>">
 
  <input type="hidden" name="MM_insert" value="CreateForm" />
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryAcronym", "none", {validateOn:["blur", "change"], isRequired:false, maxChars:10});
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryTitle", "integer", {validateOn:["blur", "change"], maxChars:5});
var spryselect1 = new Spry.Widget.ValidationSelect("spryRoomCategory", {validateOn:["change", "blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryStatus", {validateOn:["blur", "change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("spryDescription", {maxChars:500, isRequired:false, validateOn:["blur", "change"]});
</script>

<?php
mysql_free_result($RoomsCat);
?>
