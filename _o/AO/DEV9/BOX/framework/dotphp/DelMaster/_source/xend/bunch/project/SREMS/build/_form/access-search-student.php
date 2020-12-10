<?php
if(empty($_POST['SearchBtn'])){
  $msg = 'Please enter your MAT Number';
  $isNotify = isNotify($msg,'info');
  $showForm = TRUE;
}
else {
  $MatNo = GetSQLValueString($_POST['MatNo'], "text");
  $QueryCondition = 'WHERE MatNo = '.$MatNo.' LIMIT 1';
    $Result = Select('*','student', $QueryCondition);
    if(!$Result){
      $msg = 'The information you entered returned no record';
      $isNotify = isNotify($msg,'error');
      $showForm = TRUE;
    }
    else {
      $showForm = TRUE;
      $ResultSet = $Result['row'];
      if($ResultSet['Status'] != 'new'){
        $msg = 'This student already has an account!<br>';
        $msg .='Please '.markupURL('access','login').' instead';
        $isNotify = isNotify($msg,'notice');       
      }
      else { #GO TO ACCOUNT CREATION
        inSession();
        $_SESSION['newMatNo'] = $ResultSet['MatNo'];
        redirect(isURL('access_new-account!student'),0,'off');
        $msg = 'Your record was found, please wait to create your account';
        $isNotify = isNotify($msg,'success');
      }
    }
}
?>
<form id="SearchForm" name="SearchForm" method="post" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0"  class="hrView">
    <tr>
      <th scope="row"><label for="MatNo">MAT Number:</label></th>
      <td><span id="spryMatNo">
        <input type="text" name="MatNo" id="MatNo">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><input type="submit" name="SearchBtn" id="SearchBtn" value="Search"></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>I already have an account, I want to <?php echo markupURL('access','login');?></p>
  <script type="text/javascript">
var spryspryMatNo = new Spry.Widget.ValidationTextField("spryMatNo");
</script>
<?php }?>
</form>