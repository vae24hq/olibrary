<?php
if(empty($_POST['staffLoginBtn'])){
	$msg = 'Please enter your staff login information';
	$isNotify = isNotify($msg,'info');
	$showForm = TRUE;
}
else {
	  $Username = GetSQLValueString($_POST['StaffID'], "text");
	  $Password = GetSQLValueString($_POST['StaffPassword'], "text");
	  $QueryCondition = 'WHERE Username = '.$Username.
	  					' AND Password = '.$Password.
	  					" AND Status = 'active' LIMIT 1";
	  $LoginStaff = Select('*','user', $QueryCondition);

	  if(!$LoginStaff){
	  	$msg = 'You provided incorrect login details';
	  	$isNotify = isNotify($msg,'error');
	  	$showForm = TRUE;
	  }
	  else {
	  	$StaffRecord = $LoginStaff['row'];
	  	if($StaffRecord['UserType'] =='student'){
			$msg = 'You are not a staff!';
			$isNotify = isNotify($msg,'error');
			$showForm = TRUE;
	    }
	    else {#LOGIN STAFF
			inSession();
			$_SESSION['Username'] = $StaffRecord['Username'];
			$_SESSION['UserType'] = $StaffRecord['UserType'];
			$_SESSION['Dashboard'] = 'staff';
			$_SESSION['UserBindID'] = $StaffRecord['BindID'];

			redirect(isURL('staff'),0,'off');
			$msg = 'You are being logged in, please wait';
		  	$isNotify = isNotify($msg,'success');		  	
			
			$showForm = FALSE;
	    }
	}
}
?>

<form id="staffLoginForm" name="staffLoginForm" method="POST" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0"  class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label for="StaffID">Staff ID:</label></th>
      <td><span id="spryStaffID">
        <input type="text" name="StaffID" id="StaffID">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="StaffPassword">Password:</label></th>
      <td><span id="spryStaffPassword">
        <input type="password" name="StaffPassword" id="StaffPassword">
        <span class="passwordRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td><input type="submit" name="staffLoginBtn" id="staffLoginBtn" value="Login"></td>
    </tr>
  </table>
  <script type="text/javascript">
var spryStaffID = new Spry.Widget.ValidationTextField("spryStaffID");
var spryStaffPassword = new Spry.Widget.ValidationPassword("spryStaffPassword");
</script>
  <?php } ?>
</form>