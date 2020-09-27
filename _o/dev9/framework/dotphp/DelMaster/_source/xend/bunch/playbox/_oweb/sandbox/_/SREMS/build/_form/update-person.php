<?php
$isRecord = getRecord('isRecord',$_GET['id'], 'person');
if(!$isRecord){
  $url = 'create_personal-data&id='.$_SESSION['StudentPersonBindID'];
  $msg = 'This person does not have a profile<br>';
  $msg .= 'You may want to '.markupURL($url,'create new profile','create new profile').' information instead';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
}
else {
  $BindID = $_GET['id'];
  $RecordSameCondtion = 'WHERE BindID = '."'".$BindID."'".' LIMIT 1';
  $RecordSame = Select('*','person', $RecordSameCondtion);
  $RecordSameRow = $RecordSame['row'];

  if(empty($_POST['UpdateBtn'])){
    $msg = 'Please update the field below';
    $isNotify = isNotify($msg,'info');
    $showForm = TRUE;
  }
  else {
    #PREP FORM INPUT
    $FirstName = GetSQLValueString($_POST['FirstName'], "text");
    $OtherName = GetSQLValueString($_POST['OtherName'], "text");
    $LastName = GetSQLValueString($_POST['LastName'], "text");
    $OriginLGA = GetSQLValueString($_POST['OriginLGA'], "text");
    $OriginState = GetSQLValueString($_POST['OriginState'], "text");
    $OriginCountry = GetSQLValueString($_POST['OriginCountry'], "text");
    $BirthDate = GetSQLValueString($_POST['BirthDate'], "text");
    $EmailAddress = GetSQLValueString($_POST['EmailAddress'], "text");
    $PhoneNumber = GetSQLValueString($_POST['PhoneNumber'], "text");
    $Sex = GetSQLValueString($_POST['Sex'], "text");
    $ContactAddress = GetSQLValueString($_POST['ContactAddress'], "text");

    //UPDATE MAT NUMBER
    $updateSQL = "UPDATE `person` SET FirstName = $FirstName, OtherName = $OtherName, LastName = $LastName, OriginLGA = $OriginLGA, OriginState =$OriginState, OriginCountry = $OriginCountry, BirthDate = $BirthDate, EmailAddress = $EmailAddress, PhoneNumber = $PhoneNumber, Sex = $Sex, ContactAddress = $ContactAddress WHERE BindID = '$BindID'"; 
    
    $update = Query($updateSQL);    

    $msg = 'The record has been updated successfully';
    $isNotify = isNotify($msg,'success');
    $showForm = FALSE;
  }
}
?>
<form id="UpdateForm" name="UpdateForm" method="POST" action="">
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
        <input type="text" name="FirstName" id="FirstName" value="<?php if(!empty($RecordSameRow['FirstName'])){echo $RecordSameRow['FirstName'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
      <td><span id="spryOtherName">
        <input type="text" name="OtherName" id="OtherName" value="<?php if(!empty($RecordSameRow['OtherName'])){echo $RecordSameRow['OtherName'];}?>">
        </span></td>
      <td><span id="spryLastName">
        <input type="text" name="LastName" id="LastName" value="<?php if(!empty($RecordSameRow['LastName'])){echo $RecordSameRow['LastName'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th><label for="OriginLGA">LGA of Origin:</label></th>
      <th><label for="OriginState">State of Origin:</label></th>
      <th><label for="OriginCountry">Nationality:</label></th>
    </tr>
    <tr>
      <td><span id="spryOriginLGA">
        <input type="text" name="OriginLGA" id="OriginLGA" value="<?php if(!empty($RecordSameRow['OriginLGA'])){echo $RecordSameRow['OriginLGA'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
      <td><span id="spryOriginState">
        <input type="text" name="OriginState" id="OriginState"  value="<?php if(!empty($RecordSameRow['OriginState'])){echo $RecordSameRow['OriginState'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
      <td><span id="spryOriginCountry">
        <input type="text" name="OriginCountry" id="OriginCountry" value="<?php if(!empty($RecordSameRow['OriginCountry'])){echo $RecordSameRow['OriginCountry'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th><label for="BirthDate">Date of Birth:</label></th>
      <th><label for="EmailAddress">Email Address:</label></th>
      <th><label for="PhoneNumber">Phone Number:</label></th>
    </tr>
    <tr>
      <td><span id="spryDateBirth">
        <input type="text" name="BirthDate" id="BirthDate" value="<?php if(!empty($RecordSameRow['BirthDate'])){echo $RecordSameRow['BirthDate'];}?>">
        <span class="textfieldRequiredMsg"></span> <span class="textfieldInvalidFormatMsg">Invalid format.</span></span>&nbsp;</td>
      <td><span id="spryEmailAddress">
        <input type="text" name="EmailAddress" id="EmailAddress" value="<?php if(!empty($RecordSameRow['EmailAddress'])){echo $RecordSameRow['EmailAddress'];}?>">
        <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      <td><span id="spryPhoneNumber">
        <input type="text" name="PhoneNumber" id="PhoneNumber" value="<?php if(!empty($RecordSameRow['PhoneNumber'])){echo $RecordSameRow['PhoneNumber'];}?>">
        </span></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label class="inline">Select Sex:</label></th>
      <td><span id="sprySex">
        <label class="inline">
          <input <?php if (!(strcmp($RecordSameRow['Sex'],"male"))) {echo "checked=\"checked\"";} ?> type="radio" name="Sex" value="male" id="Sex[male]">
          Male</label>
        <label class="inline">
          <input <?php if (!(strcmp($RecordSameRow['Sex'],"female"))) {echo "checked=\"checked\"";} ?> type="radio" name="Sex" value="female" id="Sex[female]">
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
        <textarea name="ContactAddress" id="ContactAddress" cols="40" rows="5"><?php if(!empty($RecordSameRow['ContactAddress'])){echo $RecordSameRow['ContactAddress'];}?>
</textarea>
        <span class="textareaRequiredMsg"></span></span></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th scope="col">&nbsp;</th>
      <td><input type="submit" name="UpdateBtn" id="UpdateBtn" value="Update">
        <input type="reset" name="ResetBtn" id="button" value="Reset"></td>
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
