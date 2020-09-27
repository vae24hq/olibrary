<?php
global $dbconnect;
$BindID = $_GET['id'];

if(!getRecord('isRecord',$BindID,'course')){
  $msg = 'Record not found';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
} 
else {
  //LOAD RECORD TO BE UPDATED
  $query_rsSameRecord = "SELECT * FROM course WHERE `BindID` = '$BindID'";
  $rsSameRecord = mysql_query($query_rsSameRecord, $dbconnect) or die(mysql_error());
  $row_rsSameRecord = mysql_fetch_assoc($rsSameRecord);
  $totalRows_rsSameRecord = mysql_num_rows($rsSameRecord);

  if(!empty($_POST['DeleteBtn']) && $_POST['ConfirmDelete'] == 'DeleteIT'){
 	 //DELETE THE RECORD
      $deleteSQL = "DELETE FROM `course` WHERE `BindID` = '$BindID'";
      $delete = mysql_query($deleteSQL, $dbconnect) or die(mysql_error());

      $deleteSQL2 = "DELETE FROM `exam_question` WHERE `Course` = '$BindID'";
      $delete2 = mysql_query($deleteSQL2, $dbconnect) or die(mysql_error());

      $msg = 'The record has been deleted successfully';
      $isNotify = isNotify($msg,'success');
      $showForm = FALSE;
  }
  else {
    $msg = 'Please confirm that you wish to remove this record';
  	$isNotify = isNotify($msg,'info');
  	$showForm = TRUE;
  }
}
?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
 <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0"  class="hrView">
    <tr>
      
      <td colspan="2"><p>Are you sure you want to delete<b><?php if(!empty($row_rsSameRecord['Title'])){echo ' '.$row_rsSameRecord['Title'];}?></b>?</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><span id="spryConfirmDelete">
        <input name="ConfirmDelete" type="checkbox" id="ConfirmDelete" value="DeleteIT">
        <label for="ConfirmDelete" class="inline"> <span class="checkboxRequiredMsg">Yes, I want this record deleted.</span></label>
        </span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td><input type="submit" name="DeleteBtn" id="DeleteBtn" value="Delete">
        </td>
    </tr>
  </table>
  <script type="text/javascript">
var spryConfirmDelete = new Spry.Widget.ValidationCheckbox("spryConfirmDelete");
</script>
  <?php } ?>
</form>
 