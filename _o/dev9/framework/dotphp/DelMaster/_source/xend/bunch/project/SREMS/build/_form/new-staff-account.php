<?php
 global $dbconnect;
 $query_rsDepartment = "SELECT BindID, Title, Acronym FROM department ORDER BY Title ASC";
  $rsDepartment = mysql_query($query_rsDepartment, $dbconnect) or die(mysql_error());
  $row_rsDepartment = mysql_fetch_assoc($rsDepartment);
  $totalRows_rsDepartment = mysql_num_rows($rsDepartment);

  
if(empty($_POST['CreateBtn'])){
  $msg = 'Please complete the form with valid details';
  $isNotify = isNotify($msg,'info');
  $showForm = TRUE;
}
else {
 $userType = 'staff';
 $puid = randomize('puid');
 $suid = randomize('suid');
 $tuid = randomize('tuid');
 $BindID = randomize('bind');
 $time = randomize('time');
 inSession();

  $Username = GetSQLValueString($_POST['Username'], "text");
  $Password = GetSQLValueString($_POST['Password'], "text");
  $SecurityQuestion = GetSQLValueString($_POST['SecurityQuestion'], "text");
  $SecurityAnswer = GetSQLValueString($_POST['SecurityAnswer'], "text");
  $StaffIsA = GetSQLValueString($_POST['StaffIsA'], "text");
  $Department = GetSQLValueString($_POST['Department'], "text");

  $query_rsUser = "SELECT Username FROM `user` WHERE Username=$Username";
    $rsUser = mysql_query($query_rsUser, $dbconnect) or die(mysql_error());
    $totalRows_rsUser = mysql_num_rows($rsUser);

    if($totalRows_rsUser > 0){
      $msg ='Please choose a different username';
      $isNotify = isNotify($msg,'error');
      $showForm = TRUE;
    }
    else {
      $insertSQL = "INSERT INTO `user` (Username, Password, SecurityQuestion, SecurityAnswer, Status, UserType,";
        $insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
      $insertSQL .=" VALUES ($Username, $Password, $SecurityQuestion, $SecurityAnswer, 'active', 'staff',";
        $insertSQL .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";
      $insert = mysql_query($insertSQL, $dbconnect) or die(mysql_error());

      $insertSQL2 = "INSERT INTO `staff` (User, StaffIsA, Department, ";
    $insertSQL2 .= " PUID, SUID, TUID, BindID, EntryStamp)";
      $insertSQL2 .=" VALUES ('$BindID', $StaffIsA, $Department,";
      $insertSQL2 .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";
      $insert2 = mysql_query($insertSQL2, $dbconnect) or die(mysql_error());

      $msg = 'The account creation for staff was successfull!';
      $isNotify = isNotify($msg,'success');
      $showForm = FALSE;
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
        <span class="confirmRequiredMsg"></span> <span class="confirmInvalidMsg">Password don't match</span></span></td>
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
      <th align="right" valign="middle" scope="row"><label for="StaffIsA">Staff Is A:</label></th>
      <td><span id="spryStaffIsA">
        <select name="StaffIsA" id="StaffIsA">
          <option>Select</option>
          <option value="lecturer">Lecturer</option>
          <option value="supervisor">Supervisor</option>
          <option value="admin">Admin</option>
        </select>
        <span class="selectRequiredMsg">Please select an item.</span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Department">Department:</label></th>
      <td><span id="spryDepartment">
        <select name="Department" id="Department">
          <option value="">Select</option>
          <option value="general">General</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsDepartment['BindID']?>"><?php echo ucwords($row_rsDepartment['Title']);?></option>
          <?php
} while ($row_rsDepartment = mysql_fetch_assoc($rsDepartment));
  $rows = mysql_num_rows($rsDepartment);
  if($rows > 0) {
      mysql_data_seek($rsDepartment, 0);
	  $row_rsDepartment = mysql_fetch_assoc($rsDepartment);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
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
var spryDepartment = new Spry.Widget.ValidationSelect("spryDepartment");
var spryStaffIsA = new Spry.Widget.ValidationSelect("spryStaffIsA");
</script>
  <?php } ?>
</form>
