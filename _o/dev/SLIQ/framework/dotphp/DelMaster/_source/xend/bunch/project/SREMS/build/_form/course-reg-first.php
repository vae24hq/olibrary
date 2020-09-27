<?php

$queryFSub = "SELECT `Course` FROM `course_reg` WHERE `SessionYear` = '".$YearNow."'";
$queryFSub .= " AND `Semester` = '".$SemesterBindID."' AND `Student` = '".$_SESSION['UserBindID']."'";

$query_rsRegFirstCourse = "SELECT * FROM course WHERE `Semester` = '$SemesterBindID'";
$query_rsRegFirstCourse .= " AND `BindID` NOT IN (".$queryFSub.")";

$rsRegFirstCourse = Query($query_rsRegFirstCourse);
$row_rsRegFirstCourse = mysql_fetch_assoc($rsRegFirstCourse);
$totalRows_rsRegFirstCourse = mysql_num_rows($rsRegFirstCourse);

if(!empty($_POST['RegisterBtn']) && !empty($_POST['RegFirstCourse']) &&$_POST['RegFirstCourse'] =='yes'){
  $puid = randomize('puid');
  $suid = randomize('suid');
  $tuid = randomize('tuid');
  $BindID = randomize('bind');
  $time = randomize('time');
  $Course = GetSQLValueString($_POST['Course'], "text");

  #CHECK DOUBLE RECORD
    $query_rsCheckData1 = "SELECT * FROM course_reg WHERE `SessionYear` = '$YearNow' AND `Semester` = '$SemesterBindID'
          AND `Student` = '$_SESSION[UserBindID]' AND `Course`= $Course";
    $rsCheckData1 = mysql_query($query_rsCheckData1, $dbconnect) or die(mysql_error());
    $row_rsCheckData1 = mysql_fetch_assoc($rsCheckData1);
    $totalRows_rsCheckData1 = mysql_num_rows($rsCheckData1);

    if($totalRows_rsCheckData1 !=0){
      $msg = 'You have already registered this course!';
      echo isNotify($msg,'error');
      redirect(isURL('course_registration'),10,'off');
    }
    else {
      $insertSQL = "INSERT INTO `course_reg` (Course, Student, Semester, SessionYear, ";
      $insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
      $insertSQL .=" VALUES ($Course, '$_SESSION[UserBindID]', '$SemesterBindID', $YearNow, ";
      $insertSQL .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";
      $insert = Query($insertSQL);
      $msg = 'You have registered this course!';
      echo isNotify($msg,'success');
      redirect(isURL('course_registration'),0,'off');
    }
}

#RESTRICT TO CREDIT LIMIT
$studentOn = new ActiveUser;
$studentOnBind = $studentOn->Retrieve('BindID');

  $studentRSCondiction ='WHERE `User` ='."'".$studentOnBind."'";
  $studentRS = Select('*','student', $studentRSCondiction);
  $studentRSRow = '';
  if($studentRS){
    $studentRSRow = $studentRS['row'];

      $admissionRSCondiction ='WHERE `BindID` ='."'".$studentRSRow['Admission']."'";
      $admissionRS = Select('*','admission', $admissionRSCondiction);
      if($admissionRS){
        $admissionRSRow = $admissionRS['row'];

        #PROCESS CRDIT LIMIT
        $creditLimitCondiction = 'WHERE `Program` ='."'".$admissionRSRow['Program']."'";
        $creditLimitCondiction .= ' AND `ProgramType` ='."'".$admissionRSRow['ProgramType']."'";
        $creditLimitCondiction .= ' AND `ProgramDegree` ='."'".$admissionRSRow['ProgramDegree']."'";
        $creditLimitCondiction .= ' AND `Level` ='."'".$admissionRSRow['CurrentYear']."'";
        $creditLimitCondiction .= ' AND `Semester` ='."'".$SemesterBindID."'";        
        $creditLimit = Select('*','academic_credit', $creditLimitCondiction);        
        if($creditLimit['totalRows'] !=0){
          $maxUnit = $creditLimit['row']['MaxUnit'];
            if($maxUnit > $FCRegUnit){
              $showRegForm = TRUE;
              echo isNotify('Credit limit is ['.$creditLimit['row']['MaxUnit'].']','info');
            }
            else
              if($maxUnit == $FCRegUnit) {echo isNotify('You have reached the credit limit','success');}
              else {
                echo isNotify('You have exceeded the credit limit of ['.$creditLimit['row']['MaxUnit'].']<br>
                  Please drop a course till you are inline with the limit','error');
              }
            }
        }
        else {
          $showRegForm = TRUE;
        }
      }



 ?>

<?php if(!empty($showRegForm)){?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span id="spryCourse">
        <select name="Course" id="Course">
          <option value="">Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsRegFirstCourse['BindID']?>">
		  <?php echo $row_rsRegFirstCourse['Acronym'].$row_rsRegFirstCourse['Code'].' '.substr($row_rsRegFirstCourse['Title'],0,24);if(strlen($row_rsRegFirstCourse['Title'])>24){echo '...';}?>
          </option>
          <?php
} while ($row_rsRegFirstCourse = mysql_fetch_assoc($rsRegFirstCourse));
  $rows = mysql_num_rows($rsRegFirstCourse);
  if($rows > 0) {
      mysql_data_seek($rsRegFirstCourse, 0);
    $row_rsRegFirstCourse = mysql_fetch_assoc($rsRegFirstCourse);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
  </tr>
  <tr>
    <td><input type="submit" name="RegisterBtn" id="RegisterBtn" value="Register Course">
      <input name="RegFirstCourse" type="hidden" id="RegFirstCourse" value="yes"></td>
  </tr>
</table>


</form>
<script type="text/javascript">
var spryCourse = new Spry.Widget.ValidationSelect("spryCourse");
</script>
<?php }
mysql_free_result($rsRegFirstCourse);
?>