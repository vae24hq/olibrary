<?php
$queryFSub = "SELECT `Course` FROM `course_reg` WHERE `SessionYear` = '".$YearNow."'";
$queryFSub .= " AND `Semester` = '".$Semester2BindID."' AND `Student` = '".$_SESSION['UserBindID']."'";

$query_rsRegSecondCourse = "SELECT * FROM course WHERE `Semester` = '$Semester2BindID'";
$query_rsRegSecondCourse .= " AND `BindID` NOT IN (".$queryFSub.")";

$rsRegSecondCourse = Query($query_rsRegSecondCourse);
$row_rsRegSecondCourse = mysql_fetch_assoc($rsRegSecondCourse);
$totalRows_rsRegSecondCourse = mysql_num_rows($rsRegSecondCourse);

if(!empty($_POST['RegisterBtn']) && !empty($_POST['RegSecondCourse']) && $_POST['RegSecondCourse'] =='yes'){
  $puid = randomize('puid');
  $suid = randomize('suid');
  $tuid = randomize('tuid');
  $BindID = randomize('bind');
  $time = randomize('time');
  $Course2 = GetSQLValueString($_POST['Course2'], "text");

  #CHECK DOUBLE RECORD
    $query_rsCheckData2 = "SELECT * FROM course_reg WHERE `SessionYear` = '$YearNow' AND `Semester` = '$Semester2BindID'
          AND `Student` = '$_SESSION[UserBindID]' AND `Course`= $Course2";
    $rsCheckData2 = mysql_query($query_rsCheckData2, $dbconnect) or die(mysql_error());
    $row_rsCheckData2 = mysql_fetch_assoc($rsCheckData2);
    $totalRows_rsCheckData2 = mysql_num_rows($rsCheckData2);

    if($totalRows_rsCheckData2 !=0){
      $msg = 'You have already registered this course!';
      echo isNotify($msg,'error');
      redirect(isURL('course_registration'),10,'off');
    }
    else {
      $insertSQL = "INSERT INTO `course_reg` (Course, Student, Semester, SessionYear, ";
      $insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
      $insertSQL .=" VALUES ($Course2, '$_SESSION[UserBindID]', '$Semester2BindID', $YearNow, ";
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
        $creditLimitCondiction2 = 'WHERE `Program` ='."'".$admissionRSRow['Program']."'";
        $creditLimitCondiction2 .= ' AND `ProgramType` ='."'".$admissionRSRow['ProgramType']."'";
        $creditLimitCondiction2 .= ' AND `ProgramDegree` ='."'".$admissionRSRow['ProgramDegree']."'";
        $creditLimitCondiction2 .= ' AND `Level` ='."'".$admissionRSRow['CurrentYear']."'";
        $creditLimitCondiction2 .= ' AND `Semester` ='."'".$Semester2BindID."'";        
        $creditLimit2 = Select('*','academic_credit', $creditLimitCondiction2);        
        if($creditLimit2['totalRows'] !=0){
          $maxUnit2 = $creditLimit2['row']['MaxUnit'];
            if($maxUnit2 > $FCReg2Unit){
              $showReg2Form = TRUE;
              echo isNotify('Credit limit is ['.$creditLimit2['row']['MaxUnit'].']','info');
            }
            else {
              if($maxUnit2 == $FCReg2Unit) {echo isNotify('You have reached the credit limit','success');}
              else {
                echo isNotify('You have exceeded the credit limit of ['.$creditLimit2['row']['MaxUnit'].']<br>
                  Please drop a course till you are inline with the limit','error');}
            }
        }
        else {
          $showReg2Form = TRUE;
        }
      }
  }


 ?>

<?php if(!empty($showReg2Form)){?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><span id="spryCourse2">
        <select name="Course2" id="Course2">
          <option value="">Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsRegSecondCourse['BindID']?>">
		  <?php echo $row_rsRegSecondCourse['Acronym'].$row_rsRegSecondCourse['Code'].' '.substr($row_rsRegSecondCourse['Title'],0,24);if(strlen($row_rsRegSecondCourse['Title'])>24){echo '...';}?>
          </option>
          <?php
} while ($row_rsRegSecondCourse = mysql_fetch_assoc($rsRegSecondCourse));
  $rows = mysql_num_rows($rsRegSecondCourse);
  if($rows > 0) {
      mysql_data_seek($rsRegSecondCourse, 0);
    $row_rsRegSecondCourse = mysql_fetch_assoc($rsRegSecondCourse);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
  </tr>
  <tr>
    <td><input type="submit" name="RegisterBtn" id="RegisterBtn" value="Register Course">
    <input name="RegSecondCourse" type="hidden" id="RegSecondCourse" value="yes">
    </td>
  </tr>
</table>


</form>
<script type="text/javascript">
var spryCourse2 = new Spry.Widget.ValidationSelect("spryCourse2");
</script>
<?php }
mysql_free_result($rsRegSecondCourse);
?>