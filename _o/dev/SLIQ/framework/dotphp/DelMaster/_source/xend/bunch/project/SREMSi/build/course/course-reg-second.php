<?php
$Semester2BindID = '6171417262839BbC412261937584529E116783799DDceDA';
$queryRegCourseSS = "SELECT * FROM `course_reg` WHERE `SessionYear` = '".$YearNow."'";
$queryRegCourseSS .= " AND `Semester` = '".$Semester2BindID."' AND `Student` = '".$_SESSION['UserBindID']."'";
$queryRegCourseSS .= " ORDER BY `Course` ASC";
$RegCourseSS = Query($queryRegCourseSS);
$RegCourseSSRow = mysql_fetch_assoc($RegCourseSS);
$totalRegCourseSSRow = mysql_num_rows($RegCourseSS);

if($totalRegCourseSSRow ==0){
    $msg = 'No record found!';
    echo isNotify($msg,'error');
}
?>

<?php
$FCReg2Unit = 0;
if($totalRegCourseSSRow !=0){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="viewTabHr">
  <tr class="tabTitle">
    <th width="12">S/N</th>
    <th align="left">Course</th>
    <th align="left" width="80">Status</th>
    <th align="left" width="50">Credit</th>
  </tr>
  <?php $sn = 0; do { ?>
  <tr class="tabContent">
    <td><?php echo $sn = $sn+1; ?></td>
    <td><?php echo getRecord('Acronym',$RegCourseSSRow['Course'],'course').getRecord('Code',$RegCourseSSRow['Course'],'course'); ?>
    <?php
     if($RegCourseSSRow['Status'] =='pending'){echo markupURL("course_registration!remove&id=$RegCourseSSRow[TUID]",'[remove]','drop course');}?>
    </td>
    <td align="left"><?php echo $RegCourseSSRow['Status'];?></td>
    <td align="left"><?php echo getRecord('Unit',$RegCourseSSRow['Course'],'course'); $FCReg2Unit = getRecord('Unit',$RegCourseSSRow['Course'],'course') + $FCReg2Unit; ?></td>
  </tr>
  <?php } while ($RegCourseSSRow = mysql_fetch_assoc($RegCourseSS)); ?>
  <tr class="tabContent">
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3" align="right">Total</th>
    <td><b><?php echo $FCReg2Unit;?></b></td>
  </tr>
</table>
<?php }?>
