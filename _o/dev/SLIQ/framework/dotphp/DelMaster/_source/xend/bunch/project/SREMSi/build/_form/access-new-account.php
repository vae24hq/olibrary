<?php
if(empty($_POST['CreateBtn'])){
  $msg = 'Please complete the form with valid details';
  $isNotify = isNotify($msg,'info');
  $showForm = TRUE;
}
else {
  $BindID = randomize('bind');
  $Username = SQLSafe($_POST['Username']);
  $Password = SQLSafe($_POST['Password']);
  $SecurityQuestion = SQLSafe($_POST['SecurityQuestion'], "text");
  $SecurityAnswer = SQLSafe($_POST['SecurityAnswer'], "text");
  $UsernameExistCondition = 'WHERE `Username`='."'".$Username."'";
  $UsernameExist = Select('Username','user',$UsernameExistCondition);
  if($UsernameExist){
    $msg ='Please choose a different username';
    $isNotify = isNotify($msg,'error');
    $showForm = TRUE;
  }
  else {
    #INSERT RECORD
    global $pypeAction;
    $userType = strtolower($pypeAction);
    $Status = 'active';
    $data = array('Username'=>$Username,'Password'=>$Password,
                  'SecurityQuestion'=>$SecurityQuestion,'SecurityAnswer'=>$SecurityAnswer,
                  'UserType'=>$userType, 'Status'=>$Status, 'BindID'=>$BindID);
    
    $insert = InsertRecord($data,'user');
    
    if($insert){#UPDATE RECORD
      $updateData = array('Status'=>'active','User'=>$BindID);
      $updateCondition = " WHERE `MatNo` ='$_SESSION[newMatNo]'";
      $update = Update($updateData,$userType,$updateCondition);
      if($update){
        $msg = 'Your registration is complete!<br>';
        $msg .='Please <a href="'.isURL('access!student-login').'">login</a> to your account';
        $isNotify = isNotify($msg,'success');
        redirect(isURL('access!student-login'),'3');
        $showForm = FALSE;
      }
    }
  }
}
?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0"  class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Username">Username:</label></th>
      <td><span id="spryUsername">
        
        <input type="text" name="Username" id="Username">
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Password">Password:</label></th>
      <td><span id="spryPassword">
        
        <input type="password" name="Password" id="Password">
      <span class="passwordRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="ConfirmPassword">Confirm Password:</label></th>
      <td><span id="spryConfirmPassword">
        
        <input type="password" name="ConfirmPassword" id="ConfirmPassword">
      <span class="confirmRequiredMsg"></span>
      <span class="confirmInvalidMsg">Password don't match</span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="SecurityQuestion">Security Question:</label></th>
      <td><span id="sprySecurityQuestion">
        
        <input type="text" name="SecurityQuestion" id="SecurityQuestion">
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="SecurityAnswer">Security Answer:</label></th>
      <td><span id="sprySecurityAnswer">
        
        <input type="password" name="SecurityAnswer" id="SecurityAnswer">
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
    </tr>
  </table>
<script type="text/javascript">
var spryUsername = new Spry.Widget.ValidationTextField("spryUsername", "none", {validateOn:["blur", "change"]});
var spryPassword = new Spry.Widget.ValidationPassword("spryPassword", {validateOn:["blur", "change"]});
var spryConfirmPassword = new Spry.Widget.ValidationConfirm("spryConfirmPassword", "Password", {validateOn:["blur", "change"]});
var sprySecurityQuestion = new Spry.Widget.ValidationTextField("sprySecurityQuestion", "none", {validateOn:["blur", "change"]});
var sprySecurityAnswer = new Spry.Widget.ValidationPassword("sprySecurityAnswer", {validateOn:["blur", "change"]});
</script>
  <?php } ?>
</form>