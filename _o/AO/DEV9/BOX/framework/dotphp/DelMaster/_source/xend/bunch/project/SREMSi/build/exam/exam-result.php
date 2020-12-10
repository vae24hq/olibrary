<?php
global $dbconnect;
$YearNow =date("Y");
$querySub = "SELECT `Course` FROM `course_reg` WHERE `SessionYear` = '".$YearNow."'";
$querySub .= " AND `Status` <> 'pending' AND `Student` = '".$_SESSION['UserBindID']."'";

$queryrsActiveExam = "SELECT * FROM `exam_course` WHERE  `Status` = 'activated'";
$queryrsActiveExam .= " AND `Course` IN ($querySub)";

$rsActiveExam = Query($queryrsActiveExam);
$rsActiveExamRow = mysql_fetch_assoc($rsActiveExam);
$totalrsActiveExamRow = mysql_num_rows($rsActiveExam);

if($totalrsActiveExamRow ==0){
	$msg = 'No record found!';
	echo isNotify($msg,'error');
}
else { ?>
<?php
function getExamResult_CourseReg($record='*',$student,$course){
	$queryFilter = "WHERE `Student` = '".$student."' AND `Course` = '".$course."'";
	$chore = Select($record, 'course_reg',$queryFilter);
	return $chore;
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="viewTabHr">
  <tr class="tabTitle">
    <th width="12">S/N</th>
    <th align="left">Exam</th>
    <th align="left" width="60">Course</th>
    <th align="left" width="60">Semester</th>
    <th align="left" width="70">Status</th>
    <th align="left" width="40">Score</th>
    <th align="left" width="40">Credit</th>
    <th align="left" width="40">GP</th>
    <th align="left" width="40">Letter</th>
    <th class="manage" scope="col" width="80">Action</th>
  </tr>
  <?php $sn = 0; $totalCredit = 0; $totalGP = 0;
     do {?>
  <tr class="tabContent">
    <td><?php echo $sn = $sn+1; ?></td>
    <td><?php echo $rsActiveExamRow['Title'];?></td>
    <td>
    <?php $prepCourse = getExamResult_CourseReg('Course',$_SESSION['UserBindID'],$rsActiveExamRow['Course']);
    	echo getRecord('Acronym',$prepCourse,'course').getRecord('Code',$prepCourse,'course');?>
    </td>
    <td>
    <?php $prepSemester = getExamResult_CourseReg('Semester',$_SESSION['UserBindID'],$rsActiveExamRow['Course']);
    echo getRecord('Title',$prepSemester,'semester');?></td>
    <td><?php echo $stats = getExamResult_CourseReg('Status',$_SESSION['UserBindID'],$rsActiveExamRow['Course']);?></td>
    <td><?php 
      $score = getExamResult_CourseReg('Score',$_SESSION['UserBindID'],$rsActiveExamRow['Course']);
      if($stats =='done') {echo $score;}
    ?></td>
    <td><?php echo $credit = getRecord('Unit',$prepCourse,'course'); $totalCredit = $totalCredit + $credit?></td>
    <td>
      <?php 
        
        $GP = isGP($score,$credit); $totalGP = $totalGP + $GP;
        if($stats =='done') {echo $GP;}
      ?></td>
    <td><?php if($stats =='done') {echo isGP($score,$credit,'letter');}?></td>
    <td><?php if($stats != 'done'){echo markupURL("exam_writing&id={$rsActiveExamRow['Course']}&exam={$rsActiveExamRow['BindID']}",'take exam','take exam');}?></td>
  </tr>
  <?php } while ($rsActiveExamRow = mysql_fetch_assoc($rsActiveExam)); ?>
</table>

<p>&nbsp;</p>
<table border="0" cellspacing="0" cellpadding="0" class="viewTabHr" align="right" style="width:400px;text-align:center !important;">
  <tr class="tabTitle">
    <th width="100">GPA</th>
    <th width="100">CGPA</th>
  </tr>
  <tr>
    <td><?php $GPA = GPA($totalGP,$totalCredit); echo round($GPA, 2);?></td>
    <td><?php $CGPA = CGPA($GPA); echo round($CGPA, 2);?></td>
  </tr>
<?php }?>
