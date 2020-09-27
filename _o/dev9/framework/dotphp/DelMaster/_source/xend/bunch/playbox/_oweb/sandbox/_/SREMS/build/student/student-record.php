<?php
  $PersonBindID = $_SESSION['StudentPersonBindID'];
  $PersonCondtion = 'WHERE BindID = '."'".$PersonBindID."'".' LIMIT 1';
  $Person = Select('*','person', $PersonCondtion);
  $PersonRow = $Person['row'];

  $StudentPersonBindID = $PersonRow['BindID'];
  $StudentCondtion = 'WHERE `Person` = '."'".$StudentPersonBindID."'".' LIMIT 1';
  $Student = Select('*','student', $StudentCondtion);
  $StudentRow = $Student['row'];

  $UserStudentBindID = $StudentRow['User'];
  $UserCondtion = 'WHERE `BindID` = '."'".$UserStudentBindID."'".' LIMIT 1';
  $User = Select('*','user', $UserCondtion);
  $UserRow = $User['row'];

  $AdmissionBindID = $_SESSION['AdmissionBindID'];
  $AdmissionCondtion = 'WHERE BindID = '."'".$AdmissionBindID."'".' LIMIT 1';
  $Admission = Select('*','admission', $AdmissionCondtion);
  $AdmissionRow = $Admission['row'];

  global $dbconnect;
  $CourseRegBindID = $StudentRow['User'];
  $CourseRegQuery = 'SELECT * FROM `course_reg` WHERE `Student` = '."'".$CourseRegBindID."' AND `Status` <> 'pending'";
  $CourseReg = mysql_query($CourseRegQuery, $dbconnect) or die(mysql_error());
  $CourseRegRow = mysql_fetch_assoc($CourseReg);
  $CourseRegTotalRow = mysql_num_rows($CourseReg);
?>
  <style type="text/css">
  .label {margin: 0 10px; text-align:right; width:200px; display: block;}
</style>
<aside id="activeUser">
  <img class="profile" src="./storage/passport/<?php echo $PersonRow['Passport'];?>">
  <div class="record group">
    <p><span class="label">Mat Number:</span><?php echo $StudentRow['MatNo'];?></p>

    <p><span class="label">Name:</span><?php echo $PersonRow['FirstName'].' '.$PersonRow['OtherName'].' '.$PersonRow['LastName']. ' <i>['.$UserRow['Username'].']</i>';?></p>
    <p><span class="label">Date of Birth:</span><?php echo $PersonRow['BirthDate'];?></p>
    <p><span class="label">Sex:</span><?php echo $PersonRow['Sex'];?></p>
    <p><span class="label">Email:</span><?php echo $PersonRow['EmailAddress'];?></p>
    <p><span class="label">Phone:</span><?php echo $PersonRow['PhoneNumber'];?></p>
    <p><span class="label">State:</span><?php echo $PersonRow['OriginState'];?></p>
    <p><span class="label">L.G.A:</span><?php echo $PersonRow['OriginLGA'];?></p>
    <p><span class="label">Nationality:</span><?php echo $PersonRow['OriginCountry'];?></p>

    
    <p><span class="label">Date Admitted:</span><?php echo $AdmissionRow['DateAdmitted'];?></p>
    <p><span class="label">Program Duration:</span><?php echo $AdmissionRow['Duration']. 'years';?></p>
    <p><span class="label">Current Level:</span><?php echo getRecord('Level',$AdmissionRow['CurrentYear'],'level');?></p>
    <p><span class="label">Department:</span><?php echo getRecord('Title',$AdmissionRow['Department'],'department');?></p>
    <p><span class="label">Program:</span><?php echo getRecord('Title',$AdmissionRow['Program'],'program');?></p>
    <p><span class="label">Program Type:</span><?php echo getRecord('Title',$AdmissionRow['ProgramType'],'program_type');?></p>
    <p><span class="label">Degree:</span><?php echo getRecord('Acronym',$AdmissionRow['ProgramDegree'],'degree');?></p>

    <hr>
    <p><b>COURSES/EXAM/RESULT</b></p>
    <p>
    <?php do {
      $task = '['.getRecord('Acronym',$CourseRegRow['Course'],'course').getRecord('Code',$CourseRegRow['Course'],'course');
      if(!empty($CourseRegRow['Score'])){$task .= ' - <span style="color:purple; font-size:0.9em; font-weight:bold;">'.$CourseRegRow['Score'].' marks </span>';}
      $task .= '] ';
      echo ' '.$task;
    } while ($CourseRegRow = mysql_fetch_assoc($CourseReg)); ?></span></p>    
  </div>
</aside>