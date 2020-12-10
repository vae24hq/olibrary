<?php
$isRecord = getRecord('isRecord',$_GET['exam'], 'exam');
if(!$isRecord){
  $msg = 'Exam not found';
  $isNotify = isNotify($msg,'error');
  $showStartExam = FALSE;
}
elseif(empty($_POST['StartExam'])){
	$msg = 'Please click the start button to begin your exam';
	$isNotify = isNotify($msg,'info');
	$showStartExam = TRUE;

	$queryrsExam = "SELECT * FROM `exam_course` WHERE  `BindID` = '".$_GET['exam']."'";
	$rsExam = Query($queryrsExam);
	$rsExamRow = mysql_fetch_assoc($rsExam);
	$totalrsExamRow = mysql_num_rows($rsExam);
}
else {
  writeExam();
  $isNotify = FALSE;
}
?>
<form id="StartExamForm" name="StartExamForm" method="POST" action="">
 <?php if($isNotify) {echo $isNotify;}?>

  <?php if(!empty($showStartExam)){?>
  <table border="0" cellspacing="0" cellpadding="0" class="viewTabHr">
    <tr class="cellTitle">
      <th scope="col">Exam Information</th>
    </tr>
     <tr>
      <td style="text-transform:uppercase; border-right:none;">
      	<p>&nbsp;</p>
      	<p>You are about to begin your exam [<b><?php echo $rsExamRow['Title'];?></b>]</p>
      	<p>Duration: [<b><?php echo $rsExamRow['Duration'].' mins';?></b>]</p>
      	<p>Course: [<b><?php echo getRecord('Acronym',$_GET['id'], 'course').getRecord('Code',$_GET['id'], 'course');?></b>]</p>
      	<p>&nbsp;</p>
      	<input type="submit" name="StartExam" id="StartExam" value="Start Exam">
      	<input type="hidden" name="duration" id="duration" value="<?php echo $rsExamRow['Duration'];?>">
      	<p>&nbsp;</p>
      </td>
    </tr>
  <?php } ?>
  </table>
  </form>