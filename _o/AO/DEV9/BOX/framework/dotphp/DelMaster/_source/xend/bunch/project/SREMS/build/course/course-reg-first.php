<?php
global $dbconnect;
$SemesterBindID = '4061417262796bbD216672416172190B560378564BeEBEa';
$YearNow =date("Y");
$queryRegCourseFS = "SELECT * FROM `course_reg` WHERE `SessionYear` = '".$YearNow."'";
$queryRegCourseFS .= " AND `Semester` = '".$SemesterBindID."' AND `Student` = '".$_SESSION['UserBindID']."'";
$queryRegCourseFS .= " ORDER BY `Course` ASC";
$RegCourseFS = Query($queryRegCourseFS);
$RegCourseFSRow = mysql_fetch_assoc($RegCourseFS);
$totalRegCourseFSRow = mysql_num_rows($RegCourseFS);

if($totalRegCourseFSRow ==0){
  $msg = 'No record found!';
  echo isNotify($msg,'error');
}
?>

<?php
$FCRegUnit = 0;
if($totalRegCourseFSRow !=0){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="viewTabHr">
  <tr class="tabTitle">
    <th width="12">S/N</th>
    <th align="left">Course</th>
    <th align="left" width="80">Status</th>
    <th align="left" width="50">Credit</th>
  </tr>
  <?php $sn = 0;  do {?>
  <tr class="tabContent">
    <td><?php echo $sn = $sn+1; ?></td>
    <td><?php echo getRecord('Acronym',$RegCourseFSRow['Course'],'course').getRecord('Code',$RegCourseFSRow['Course'],'course');?>
    <?php if($RegCourseFSRow['Status'] =='pending'){echo markupURL("course_registration!remove&id=$RegCourseFSRow[TUID]",'[remove]','drop course');}?>
    </td>
    <td align="left"><?php echo $RegCourseFSRow['Status'];?></td>
    <td align="left"><?php echo getRecord('Unit',$RegCourseFSRow['Course'],'course'); $FCRegUnit = getRecord('Unit',$RegCourseFSRow['Course'],'course') + $FCRegUnit; ?></td>
  </tr>
  <?php } while ($RegCourseFSRow = mysql_fetch_assoc($RegCourseFS)); ?>
  <tr class="tabContent">
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3" align="right">Total</th>
    <td><b><?php echo $FCRegUnit;?></b></td>
  </tr>
</table>
<?php }?>
