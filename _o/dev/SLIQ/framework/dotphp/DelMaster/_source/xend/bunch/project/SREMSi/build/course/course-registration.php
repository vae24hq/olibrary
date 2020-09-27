<?php
  if(!empty($_POST['SaveRegCourse']) && $_POST['SaveRegCourse'] == 'yes'){
    $year = date("Y");
    $updateSQL = "UPDATE `course_reg` SET Status = 'saved' WHERE `SessionYear` = '$year' AND `Student` = '$_SESSION[UserBindID]'";
    $update = Query($updateSQL);    

    $msg = 'The record has been updated successfully';
    echo $isNotify = isNotify($msg,'success');
    redirect(isURL('course_registration'),2,'off');
  }

  global $pypeAction;
  $action = strtolower($pypeAction);
  if(!empty($action) && $action =='remove'){
    #DELETE RECORD
    $getTUID = '';
    global $dbconnect;
    if(!empty($_GET['id'])) {$getTUID = $_GET['id'];}
    $deleteSQL = "DELETE FROM `course_reg` WHERE `TUID` = '$getTUID'";
    $delete = mysql_query($deleteSQL, $dbconnect) or die(mysql_error());
    $msg = 'The record has been deleted successfully';
    echo $isNotify = isNotify($msg,'success');
    redirect(isURL('course_registration'),0,'off');
  }
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="courseReg">
  <tr>
    <td width="49%" align="left" valign="middle" class="semester">First Semester</td>
    <td width="2%" rowspan="4" align="left" valign="middle">&nbsp;</td>
    <td width="49%" align="left" valign="middle" class="semester">Second Semester</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><?php include('course-reg-first.php');?></td>
    <td align="left" valign="middle"><?php include('course-reg-second.php');?></td>
  </tr>

  <tr>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="middle"><?php include(FORMS.DS.'course-reg-first.php');?></td>
    <td align="left" valign="middle"><?php include(FORMS.DS.'course-reg-second.php');?></td>
  </tr>
  <tr>
    <td height="40" colspan="3" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle">
    <?php if(!empty($maxUnit) && !empty($maxUnit2) && ($maxUnit >= $FCRegUnit && $maxUnit2 >= $FCReg2Unit)){?>
    <form id="SaveRegForm"name="SaveRegForm" method="post" action="">
      <input name="SaveBtn" type="submit" class="form_button" id="SaveBtn" value="Submit My Course Registration">
      <input name="SaveRegCourse" type="hidden" id="SaveRegCourse" value="yes">
    </form>
    <?php } ?>
    </td>
  </tr>
</table>
