<?php
if(empty($_POST['studentLoginBtn'])){
	$msg = 'Please enter your student login information';
	$isNotify = isNotify($msg,'info');
	$showForm = TRUE;
}
else {
	  $Username = GetSQLValueString($_POST['Username'], "text");
	  $Password = GetSQLValueString($_POST['StudentPassword'], "text");
	  $QueryCondition = 'WHERE Username = '.$Username.
	  					' AND Password = '.$Password.
	  					" AND Status = 'active' LIMIT 1";
	  $LoginStudent = Select('*','user', $QueryCondition);

	  if(!$LoginStudent){
	  	$msg = 'Incorrect student login details';
	  	$isNotify = isNotify($msg,'error');
	  	$showForm = TRUE;
	  }
	  else {
	  	$UserLogIn = $LoginStudent['row'];
	  	if($UserLogIn['UserType'] !='student'){
			$msg = 'You are not a student!';
			$isNotify = isNotify($msg,'error');
			$showForm = TRUE;
	    }
	    else {#LOGIN STUDENT
			inSession();
			$_SESSION['Username'] = $UserLogIn['Username'];
			$_SESSION['UserType'] = $UserLogIn['UserType'];
			$_SESSION['Dashboard'] = 'student';
			$_SESSION['UserBindID'] = $UserLogIn['BindID'];
			//GET STUDENT BindID
			$queryFilter = "WHERE `User` = '".$UserLogIn['BindID']."' LIMIT 1";
			$Student = Select('*','student',$queryFilter);
			if($Student){
				$StudentRS = $Student['row'];
				$_SESSION['StudentBindID'] = $StudentRS['BindID'];
				$_SESSION['StudentPersonBindID'] = $StudentRS['Person'];
				$_SESSION['StudentAdmissionBindID'] = $StudentRS['Admission'];
			}

			redirect(isURL('student'),0,'off');
			$msg = 'You are being logged in, please wait';
		  	$isNotify = isNotify($msg,'success');		  	
			
			$showForm = FALSE;
	    }
	}
}
?>

<form id="studentLoginForm" name="studentLoginForm" method="post" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th scope="row"><label for="Username">Username:</label></th>
      <td><span id="spryUsername">
        <input type="text" name="Username" id="Username">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th scope="row"><label for="StudentPassword">Password:</label></th>
      <td><span id="spryStudentPassword">
        <input type="password" name="StudentPassword" id="StudentPassword">
        <span class="passwordRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input type="submit" name="studentLoginBtn" id="studentLoginBtn" value="Login"></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
  </table>
  <script type="text/javascript">
var spryUsername = new Spry.Widget.ValidationTextField("spryUsername");
var spryStudentPassword = new Spry.Widget.ValidationPassword("spryStudentPassword");
</script>
<p><b>New student?</b> Yes, I don't have an account. <?php echo markupURL('access_search-student','Register');?></p>
  <?php } ?>
</form>