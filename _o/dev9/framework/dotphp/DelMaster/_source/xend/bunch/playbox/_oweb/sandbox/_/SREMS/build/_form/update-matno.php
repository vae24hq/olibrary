<?php
$isRecord = getRecord('isRecord',$_GET['id'], 'student');
if(!$isRecord){
  $msg = 'This person does not have a record';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
}
else {
  $BindID = $_GET['id'];
  $RecordSameCondtion = 'WHERE BindID = '."'".$BindID."'".' LIMIT 1';
  $RecordSame = Select('*','student', $RecordSameCondtion);
  $RecordSameRow = $RecordSame['row'];

  if(empty($_POST['UpdateBtn'])){
    $msg = 'Please update the field below';
    $isNotify = isNotify($msg,'info');
    $showForm = TRUE;
  }
  else {
    #CHECK IF RECORD EXIST
    $MatNo = SQLSafe($_POST['MatNo']);
    $RecordExistCondtion = 'WHERE MatNo = '."'".$MatNo."'".' LIMIT 1';
    $RecordExist = Select('*','student', $RecordExistCondtion);
    if($RecordExist && $RecordExist['row']['TUID'] != $RecordSameRow['TUID']){
      $msg = 'There is a student with this MAT Number!<br>';
      $msg .='Please generate a different MAT Number';
      $isNotify = isNotify($msg,'error');
      $showForm = TRUE;

    }
    else {
      //UPDATE MAT NUMBER
      $updateCondtion = 'WHERE BindID = '."'".$BindID."'".' LIMIT 1';
      $updateData = array('MatNo' =>$MatNo);
      $update = Update($updateData,'student',$updateCondtion);    

      $msg = 'The record has been updated successfully';
      $isNotify = isNotify($msg,'success');
      $showForm = FALSE;

    }
  }
}
?>
<form id="UpdateForm" name="UpdateForm" method="POST" action="">
 <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th scope="col"><label for="MatNo">MAT Number:</label></th>
      <td><span id="spryMatNo">
        <input type="text" name="MatNo" id="MatNo" value="<?php if(!empty($RecordSameRow['MatNo'])){echo $RecordSameRow['MatNo'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th scope="col">&nbsp;</th>
      <td><input type="submit" name="UpdateBtn" id="UpdateBtn" value="Update">
        <input type="reset" name="ResetBtn" id="ResetBtn" value="Reset"></td>
    </tr>
  </table>
  <script type="text/javascript">
var spryMatNo = new Spry.Widget.ValidationTextField("spryMatNo", "none");
</script>
  <?php } ?>
</form>