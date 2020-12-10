
<?php
$puid = randomize('puid');
$suid = randomize('suid');
$tuid = randomize('tuid');
$BindID = randomize('bind');
$time = randomize('time');

global $dbconnect;

global $rsOfCourse;
global $row_rsOfCourse;
global $totalRows_rsOfCourse;

if(empty($_POST['CreateBtn'])){
  $msg = 'Please complete the field with valid entries';
  $isNotify = isNotify($msg,'info');
  $showForm = TRUE;
}
else {
  #PREP FORM INPUT
  $Title = GetSQLValueString($_POST['Title'], "text");
  $Course = GetSQLValueString($_POST['Course'], "text");
  $Duration = GetSQLValueString($_POST['Duration'], "text");
  $TotalMark = GetSQLValueString($_POST['TotalMark'], "text");

  $insertSQL = "INSERT INTO `exam_course` (Title, Course, Duration, TotalMark, ";
  $insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
  $insertSQL .=" VALUES ($Title, $Course, $Duration, $TotalMark, ";
  $insertSQL .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";

  $insert = Query($insertSQL);

  $msg = 'The record has been created successfully';
  $isNotify = isNotify($msg,'success');
  $showForm = FALSE;
    
}
?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
 <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Title">Title:</label></th>
      <td><span id="spryTitle">
        
        <input type="text" name="Title" id="Title">
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Course">Course:</label></th>
      <td><span id="spryCourse">
        <select name="Course" id="Course">
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsOfCourse['BindID']?>"><?php echo ucwords($row_rsOfCourse['Title']);?></option>
          <?php
} while ($row_rsOfCourse = mysql_fetch_assoc($rsOfCourse));
  $rows = mysql_num_rows($rsOfCourse);
  if($rows > 0) {
      mysql_data_seek($rsOfCourse, 0);
    $row_rsOfCourse = mysql_fetch_assoc($rsOfCourse);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Duration">Duration:(in mins)</label></th>
      <td><span id="spryDuration">
      
      <input type="text" name="Duration" id="Duration">
      <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">Numbers only</span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="TotalMark">Exam Mark:</label></th>
      <td><span id="spryTotalMark">
        
        <input type="text" name="TotalMark" id="TotalMark">
      <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
    </tr>
  </table>
  <script type="text/javascript">
  var spryTitle = new Spry.Widget.ValidationTextField("spryTitle");
  var spryCourse = new Spry.Widget.ValidationSelect("spryCourse");
  var spryDuration = new Spry.Widget.ValidationTextField("spryDuration", "integer");
  var spryTotalMark = new Spry.Widget.ValidationTextField("spryTotalMark");
  </script>
  <?php
mysql_free_result($rsOfCourse);
 } ?>
</form>

