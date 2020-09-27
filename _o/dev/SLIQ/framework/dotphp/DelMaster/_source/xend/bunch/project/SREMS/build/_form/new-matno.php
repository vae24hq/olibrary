<?php
if(empty($_POST['CreateBtn'])){
  $msg = 'Please enter a new MAT Number';
  $isNotify = isNotify($msg,'info');
  $showForm = TRUE;
}
else {
  $BindID = randomize('bind');
  $PersonBindID = randomize('bind');
  $AdmissionBindID = randomize('bind');
  $MatNo = SQLSafe($_POST['MatNo']);
  $RecordExistCondition = 'WHERE `MatNo`='."'".$MatNo."'";
  $RecordExist = Select('MatNo','student',$RecordExistCondition);
  if($RecordExist){
    $msg = 'There is a student with this MAT Number!<br>';
    $msg .='Please generate a different MAT Number for a new student'; 
    $isNotify = isNotify($msg,'error');
    $showForm = TRUE;
  }
  else {
    #INSERT RECORD
    global $pypeAction;
    $userType = strtolower($pypeAction);
    $Status = 'active';
    $insertData = array('MatNo'=>$MatNo,'Person'=>$PersonBindID,'Admission'=>$AdmissionBindID,
      'Status'=>'new','BindID'=>$BindID);    
    $insert = InsertRecord($insertData,'student');

    inSession();
    $_SESSION['StudentMatNo'] = $MatNo;
    $_SESSION['StudentBindID'] = $BindID;
    $_SESSION['StudentPersonBindID'] = $PersonBindID;
    $_SESSION['AdmissionBindID'] = $AdmissionBindID;

    $msg = 'The new student record has been created successfully';
    $isNotify = isNotify($msg,'success');
    $showForm = FALSE;
    $showSubNav = 'yes';
  }
}
?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label for="MatNo">Mat Number:</label></th>
      <td><span id="spryMatNo">
        <input type="text" name="MatNo" id="MatNo">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
    </tr>
  </table>
  <script type="text/javascript">
var spryMatNo = new Spry.Widget.ValidationTextField("spryMatNo");
</script>
  <?php } ?>
</form>
