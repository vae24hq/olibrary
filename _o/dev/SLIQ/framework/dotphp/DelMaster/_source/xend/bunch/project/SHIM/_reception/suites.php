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

mysql_select_db($database_dbcon, $dbcon);
$query_roomData = "SELECT * FROM room_type ORDER BY Title ASC";
$roomData = mysql_query($query_roomData, $dbcon) or die(mysql_error());
$row_roomData = mysql_fetch_assoc($roomData);
$totalRows_roomData = mysql_num_rows($roomData);


$showManageRoom = showUrlArea("room");
$showManage = showUrlArea("manage");
$showDelete = showUrlArea("delete");
?>

<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>


<?php if ($totalRows_roomData > 0) { // Show if recordset not empty ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td colspan="15" class="tabTitle" scope="col"><strong>RESULT</strong></td>
  </tr>
  <tr class="cellTitle">
    <th width="30" height="24" align="center" valign="middle" style="border-left:solid 1px #EFEFEF;" scope="col">S/N</th>
    <th align="left" valign="middle" scope="col">SUITES</th>
    <?php if($showManageRoom != 'yes' && $showManage != 'yes') {?>
    <th width="40" align="center" valign="middle" scope="col">ROOMS</th>
    <?php } ?>
    <?php if($showManageRoom != 'yes') {?>
    <th width="70" align="right" valign="middle" scope="col">(&#8358;) PRICE </th>
    <th width="70" align="right" valign="middle" scope="col">(&#8358;) DEPOSIT</th>
    <?php } ?>
    
    <th width="50" align="center" valign="middle" scope="col">OPEN</th>
    <th width="50" align="center" valign="middle" scope="col">BOOKED</th>
    <th width="50" align="center" valign="middle" scope="col">TOTAL</th>
    <?php if($showManageRoom == 'yes') {?>
    <th colspan="2" align="center" valign="middle" scope="col">MANAGE ROOMS</th>
    <?php }?>
    
    <?php if($showManage == 'yes') {?>
    <th width="40" align="center" valign="middle" scope="col">UPDATE</th>
    <?php } ?>
    
    <?php if($showDelete == 'yes') {?>
    <th width="40" align="center" valign="middle" scope="col">DELETE</th>
    <?php } ?>
  </tr>
  <?php  $sn = '0'; $totalQtyOfRooms = '0'; $totalQtyOfBooked ='0'; $totalQtyOfOpen = '0'?>
  <?php do { ?>
    <tr>
      <td height="30" align="center" valign="middle" scope="col"><?php echo $sn = ($sn + 1) ?></td>
      <td align="left" scope="col">	  
	  <?php echo $row_roomData['Title']; ?>
      
     <?php if($showManageRoom != 'yes' && $showManage != 'yes') {?>
     <td align="middle" scope="col">	
      <a href="?url=rooms_reception&act=view&suite=<?php echo $row_roomData['fuid']; ?>&loc=<?php echo $loc; ?>" class="infoNav">view</a>        
     </td>
     <?php } ?>
     
      </td>
      <?php if($showManageRoom != 'yes') {?>
      <td align="right" valign="middle" scope="col" ><?php echo number_format($row_roomData['Price'],2); ?></td>
      <td align="right" valign="middle" scope="col" ><?php echo number_format($row_roomData['Deposit'],2); ?></td>
      <?php }?>
      <td align="center" scope="col">
	  <?php 
	  //Calculate Rooms AVALIBALE
	$RoomQty = $row_roomData['fuid'];
  	$query_roomOpen = "SELECT * FROM rooms WHERE `RoomType` = '$RoomQty' AND `Status` = 'available'";
	$roomOpen = mysql_query($query_roomOpen, $dbcon) or die(mysql_error());
	$row_roomOpen = mysql_fetch_assoc($roomOpen);
	$totalRows_roomOpen = mysql_num_rows($roomOpen);
	$totalQtyOfOpen =($totalQtyOfOpen + $totalRows_roomOpen);
	 ?>
     <a href="?url=rooms_reception&act=view&state=open&suite=<?php echo $row_roomData['fuid']; ?>&loc=<?php echo $loc; ?>" class="infoNav"><?php echo $totalRows_roomOpen; ?></a>
     </td>
      
      <td align="center" scope="col">
	  <?php 
	  //Calculate Rooms BOOKED
	$RoomQty = $row_roomData['fuid'];
  	$query_roomBooked = "SELECT * FROM rooms WHERE `RoomType` = '$RoomQty' AND `Status` != 'available'";
	$roomBooked = mysql_query($query_roomBooked, $dbcon) or die(mysql_error());
	$row_roomBooked = mysql_fetch_assoc($roomBooked);
	$totalRows_roomBooked = mysql_num_rows($roomBooked);	
	$totalQtyOfBooked =  ($totalQtyOfBooked + $totalRows_roomBooked);
	 ?>
     <a href="?url=rooms_reception&act=view&state=booked&suite=<?php echo $row_roomData['fuid']; ?>&loc=<?php echo $loc; ?>" class="infoNav2"><?php echo $totalRows_roomBooked; ?></a>
     </td>
     
      <td align="center" valign="middle" scope="col" >
        <?php $totalQtyOfRooms =  ($totalQtyOfRooms + $row_roomData['Qty']);?>
        <?php echo $row_roomData['Qty']; ?>
      </td>
      <?php if($showManageRoom == 'yes') {?>
      <td width="30" align="center" scope="col">
      <a href="?url=create-room_reception&item=<?php echo $row_roomData['fuid']; ?>&loc=<?php echo $loc; ?>" class="btnUpdate">new</a>
      </td>
      <td width="50" align="center" scope="col">
      <a href="?url=rooms_reception&act=manage&suite=<?php echo $row_roomData['fuid']; ?>&loc=<?php echo $loc; ?>" class="btnUpdate">manage</a>
      </td>
      <?php } ?>
      
      <?php if($showManage == 'yes') {?>
      <td  align="center" scope="col">
        <a href="?url=update-suite_reception&item=<?php echo $row_roomData['fuid']; ?>&loc=<?php echo $loc; ?>" class="btnUpdate">go</a>
        </td>
      <?php } ?>
      <?php if($showDelete == 'yes') {?>
      <td align="center" scope="col">
        <a href="?url=delete-suite_reception&suite=<?php echo $row_roomData['fuid']; ?>&loc=<?php echo $loc; ?>" class="btnDelete">go</a>
        </td>
     <?php } ?>
    </tr>
   <?php } while ($row_roomData = mysql_fetch_assoc($roomData)); ?>
    <tr>
      <?php $colspan = '2'; if($showManageRoom != 'yes' && $showManage != 'yes') { $colspan = '5';} else if($showManageRoom != 'yes') { $colspan = '4';}?>
      <td height="30" colspan="<?php echo $colspan; ?>" align="center" valign="middle" scope="col" style="border:0px;border-right:dotted 1px #CCCCCC;">&nbsp;</td>
      
      
      <td align="center" bgcolor="#F9F9F9" scope="col"><strong><?php echo $totalQtyOfOpen;?></strong></td>
      <td align="center" bgcolor="#F9F9F9" scope="col"><strong><?php echo $totalQtyOfBooked;?></strong></td>
      <td align="center" bgcolor="#F6F6F6" scope="col"><strong><?php echo $totalQtyOfRooms; ?></strong></td>
    </tr>
    
</table>
<?php }  ?>
<?php if ($totalRows_roomData == 0) { // Show if recordset empty ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tab_viewB">
  <tr>
    <td colspan="2" class="table_title" scope="col"><strong>RESULT </strong></td>
  </tr>
  <?php  @$sn = $startRow_PatientNo; ?>
  <tr>
    <td height="30" align="center" valign="middle" class="colorRed" scope="col">no record found!</td>
  </tr>
</table>
<?php } // Show if recordset empty ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<?php
mysql_free_result($roomData);
?>