<?php 
$isRecord = getRecord('isRecord',$_GET['id'], 'person');
if($isRecord){
  $url = 'update_personal-data&id='.$_SESSION['StudentPersonBindID'];
  $msg = 'This person already has a profile<br>';
  $msg .= 'You may want to '.markupURL($url,'update profile','update profile').' information instead';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
}
else {
  if(empty($_POST['CreateBtn'])){
    $msg = 'Please complete the field with valid entries';
    $isNotify = isNotify($msg,'info');
    $showForm = TRUE;
  }
  else {
    #PREP FORM INPUT
    $FirstName = SQLSafe($_POST['FirstName']);
    $OtherName = SQLSafe($_POST['OtherName']);
    $LastName = SQLSafe($_POST['LastName']);
    $OriginLGA = SQLSafe($_POST['OriginLGA']);
    $OriginState = SQLSafe($_POST['OriginState']);
    $OriginCountry = SQLSafe($_POST['OriginCountry']);
    $BirthDate = SQLSafe($_POST['BirthDate']);
    $EmailAddress = SQLSafe($_POST['EmailAddress']);
    $PhoneNumber = SQLSafe($_POST['PhoneNumber']);
    $Sex = SQLSafe($_POST['Sex']);
    $ContactAddress = SQLSafe($_POST['ContactAddress']);
    $BindID = $_GET['id'];

    $Status = 'active';
    $insertData = array('FirstName'=>$FirstName,'OtherName'=>$OtherName,'LastName'=>$LastName,
      'OriginLGA'=>$OriginLGA,'OriginState'=>$OriginState,'OriginCountry'=>$OriginCountry,
      'BirthDate'=>$BirthDate,'EmailAddress'=>$EmailAddress,'PhoneNumber'=>$PhoneNumber,
      'Sex'=>$Sex,'ContactAddress'=>$ContactAddress,
      'Status'=>$Status,'BindID'=>$BindID);    
    $insert = InsertRecord($insertData,'person');

    $msg = 'The record has been created successfully';
    $isNotify = isNotify($msg,'success');
    $showForm = FALSE;
  }
}
?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
 <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0" class="vtView">
    <tr>
      <th scope="col"><label for="FirstName">First Name:</label></th>
      <th scope="col"><label for="OtherName">Middle Name:</label></th>
      <th scope="col"><label for="LastName">Last Name:</label></th>
    </tr>
    <tr>
      <td><span id="spryFirstName">
        <input type="text" name="FirstName" id="FirstName">
        <span class="textfieldRequiredMsg"></span></span></td>
      <td><span id="spryOtherName">
        <input type="text" name="OtherName" id="OtherName">
        </span></td>
      <td><span id="spryLastName">
        <input type="text" name="LastName" id="LastName">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th><label for="OriginLGA">LGA of Origin:</label></th>
      <th><label for="OriginState">State of Origin:</label></th>
      <th><label for="OriginCountry">Nationality:</label></th>
    </tr>
    <tr>
      <td><span id="spryOriginLGA">
        <input type="text" name="OriginLGA" id="OriginLGA">
        <span class="textfieldRequiredMsg"></span></span></td>
      <td><span id="spryOriginState">
        <input type="text" name="OriginState" id="OriginState">
        <span class="textfieldRequiredMsg"></span></span></td>
      <td><span id="spryOriginCountry">
        <input type="text" name="OriginCountry" id="OriginCountry">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th><label for="BirthDate">Date of Birth:</label></th>
      <th><label for="EmailAddress">Email Address:</label></th>
      <th><label for="PhoneNumber">Phone Number:</label></th>
    </tr>
    <tr>
      <td><span id="spryDateBirth">
        <input type="text" name="BirthDate" id="BirthDate">
        <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span>&nbsp;</td>
      <td><span id="spryEmailAddress">
        <input type="text" name="EmailAddress" id="EmailAddress">
        <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      <td><span id="spryPhoneNumber">
        <input type="text" name="PhoneNumber" id="PhoneNumber">
        </span></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label class="inline">Select Sex:</label></th>
      <td><span id="sprySex">
        <label class="inline">
          <input type="radio" name="Sex" value="male" id="Sex[male]">
          Male</label>
        <label class="inline">
          <input type="radio" name="Sex" value="female" id="Sex[female]">
          Female</label>
        <span class="radioRequiredMsg">Please make a selection.</span></span></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="vtView">
    <tr>
      <th scope="col"><label for="ContactAddress">Contact Address:</label></th>
    </tr>
    <tr>
      <td><span id="spryContactAddress">
        <textarea name="ContactAddress" id="ContactAddress" cols="40" rows="5"></textarea>
        <span class="textareaRequiredMsg"></span></span></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th scope="col">&nbsp;</th>
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
    </tr>
  </table>
  <script type="text/javascript">
var spryFirstName = new Spry.Widget.ValidationTextField("spryFirstName", "none");
var spryLastName = new Spry.Widget.ValidationTextField("spryLastName");
var spryOtherName = new Spry.Widget.ValidationTextField("spryOtherName", "none", {isRequired:false});
var spryDateBirth = new Spry.Widget.ValidationTextField("spryDateBirth", "date", {format:"yyyy-mm-dd", hint:"YYYY-MM-DD"});
var sprySex = new Spry.Widget.ValidationRadio("sprySex");
var spryOriginLGA = new Spry.Widget.ValidationTextField("spryOriginLGA", "none");
var spryOriginState = new Spry.Widget.ValidationTextField("spryOriginState", "none");
var spryOriginCountry = new Spry.Widget.ValidationTextField("spryOriginCountry", "none");
var spryContactAddress = new Spry.Widget.ValidationTextarea("spryContactAddress");
var spryEmailAddress = new Spry.Widget.ValidationTextField("spryEmailAddress", "email", {isRequired:false});
var spryPhoneNumber = new Spry.Widget.ValidationTextField("spryPhoneNumber", "none", {isRequired:false});</script>
  <?php } ?>
</form>