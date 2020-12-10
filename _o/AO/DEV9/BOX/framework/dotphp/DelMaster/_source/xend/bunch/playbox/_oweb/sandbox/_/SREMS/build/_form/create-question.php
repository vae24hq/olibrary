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
	$msg = 'Please complete the form with valid details';
	$isNotify = isNotify($msg,'info');
    $showForm = TRUE;
}
else {
	$Question = GetSQLValueString($_POST['Question'], "text");
	$OptionA = GetSQLValueString($_POST['OptionA'], "text");
	$OptionB = GetSQLValueString($_POST['OptionB'], "text");
	$OptionC = GetSQLValueString($_POST['OptionC'], "text");
	$OptionD = GetSQLValueString($_POST['OptionD'], "text");
	$Answer = GetSQLValueString($_POST['Answer'], "text");
	$Mark = GetSQLValueString($_POST['Mark'], "text");
	$Course = GetSQLValueString($_POST['Course'], "text");

	//CHECK TO MAKE SURE RECORD DOES NOT ALREADY EXIST
	$query_rsCheckRecord = "SELECT * FROM `exam_question` WHERE Question = $Question";
	$rsCheckRecord = mysql_query($query_rsCheckRecord, $dbconnect) or die(mysql_error());
	$row_rsCheckRecord = mysql_fetch_assoc($rsCheckRecord);
	$totalRows_rsCheckRecord = mysql_num_rows($rsCheckRecord);	
	if($totalRows_rsCheckRecord > 0){
      $msg = 'This question has a already been posted!';
      $isNotify = isNotify($msg,'error');
      $showForm = TRUE;
    }
	else { //INSERT THE RECORD
		$insertSQL = "INSERT INTO `exam_question` (Question, OptionA, OptionB, OptionC, OptionD, Answer, Mark, Course,";
		$insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
		$insertSQL .=" VALUES ($Question, $OptionA, $OptionB, $OptionC, $OptionD, $Answer, $Mark, $Course,";
		$insertSQL .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";
		$insert = mysql_query($insertSQL, $dbconnect) or die(mysql_error());
		
		$msg = 'The question has been added successfully';
		$isNotify = isNotify($msg,'success');
   		$showForm = FALSE;
	}
}
?>

<form id="CreateForm" name="CreateForm" method="POST" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  	<table border="0" cellspacing="0" cellpadding="0"  class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Question">Question:</label></th>
      <td><span id="spryQuestion">
        <input type="text" name="Question" id="Question">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="OptionA">Option A:</label></th>
      <td><span id="spryOptionA">
        <input type="text" name="OptionA" id="OptionA">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="OptionB">Option B:</label></th>
      <td><span id="spryOptionB">
        <input type="text" name="OptionB" id="OptionB">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    
    <tr>
      <th align="right" valign="middle" scope="row"><label for="OptionC">Option C:</label></th>
      <td><span id="spryOptionC">
        <input type="text" name="OptionC" id="OptionC">
        <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">number only</span></span></td>
    </tr>
    
    <tr>
      <th align="right" valign="middle" scope="row"><label for="OptionD">Option D:</label></th>
      <td><span id="spryOptionD">
        <input type="text" name="OptionD" id="OptionD">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Answer">Answer:</label></th>
      <td><span id="spryAnswer">
        <select name="Answer" id="Answer" class="inline">
          <option value="">Select</option>
          <option value="OptionA">Option A</option>
          <option value="OptionB">Option B</option>
          <option value="OptionC">Option C</option>
          <option value="OptionD">Option D</option>
         
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Mark">Mark:</label></th>
      <td><span id="spryMark">
      <input type="number" name="Mark" id="Mark">
      <span class="textfieldInvalidFormatMsg">numbers only</span><span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Course">Course:</label></th>
      <td><span id="spryCourse">
        <select name="Course" id="Course">
          <option value="">Select</option>
           <?php do {?>
          <option value="<?php echo $row_rsOfCourse['BindID']?>"><?php echo $row_rsOfCourse['Title'];?></option>
			<?php } while ($row_rsOfCourse = mysql_fetch_assoc($rsOfCourse));
				$rows = mysql_num_rows($rsOfCourse);
				if($rows > 0){
				mysql_data_seek($rsOfCourse, 0);
				$row_rsOfCourse = mysql_fetch_assoc($rsOfCourse);
            }?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
    </tr>
  </table>  
<script type="text/javascript">
var spryQuestion = new Spry.Widget.ValidationTextField("spryQuestion");
var spryOptionA = new Spry.Widget.ValidationTextField("spryOptionA");
var spryOptionB = new Spry.Widget.ValidationTextField("spryOptionB");
var spryOptionC = new Spry.Widget.ValidationTextField("spryOptionC");
var spryOptionD = new Spry.Widget.ValidationTextField("spryOptionD");
var spryAnswer = new Spry.Widget.ValidationSelect("spryAnswer");
var spryMark = new Spry.Widget.ValidationTextField("spryMark", "integer");
var spryCourse = new Spry.Widget.ValidationSelect("spryCourse");
</script>
<?php } ?>
</form>
