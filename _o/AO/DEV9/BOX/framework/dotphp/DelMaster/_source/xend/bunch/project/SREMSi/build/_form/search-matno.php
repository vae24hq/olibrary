<?php
if(empty($_POST['SearchBtn'])){
  $msg = "Please enter the student's MAT Number";
  $isNotify = isNotify($msg,'info');
  $showForm = TRUE;
}
else {
  $MatNo = SQLSafe($_POST['MatNo']);
  $RSCondition = 'WHERE `MatNo`='."'".$MatNo."'";
  $RS = Select('*','student',$RSCondition);
  if($RS == 0){
    $msg = 'No record found!'; 
    $isNotify = isNotify($msg,'error');
    $showForm = TRUE;
  }
  else {
    $RSRow = $RS['row'];
    inSession();
    $_SESSION['StudentMatNo'] = $RSRow['MatNo'];
    $_SESSION['StudentBindID'] = $RSRow['BindID'];
    $_SESSION['StudentPersonBindID'] = $RSRow['Person'];
    $_SESSION['AdmissionBindID'] = $RSRow['Admission'];
    $class = 'success';
    $msg = "Record found!<br>Please use the menu below to manage this student's record";
    $isNotify = isNotify($msg,'success');
    $showForm = FALSE;
    $showSubNav = TRUE;
  }
}
?>
<form id="SearchForm" name="SearchForm" method="POST" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
<table border="0" cellspacing="0" cellpadding="0" class="hrView">
  <tr>
    <th align="right" valign="middle" scope="row"><label for="MatNo">MAT Number:</label></th>
    <td><span id="spryMatNo">
      <input type="text" name="MatNo" id="MatNo">
      <span class="textfieldRequiredMsg"></span></span></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><input type="submit" name="SearchBtn" id="SearchBtn" value="Search"></td>
  </tr>
</table>
<script type="text/javascript">
var spryMatNo = new Spry.Widget.ValidationTextField("spryMatNo");
</script>
<?php } ?>
</form>