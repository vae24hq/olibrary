<?php
global $dbconnect;
$BindID = $_GET['id'];
global $rsOfLevel;
global $row_rsOfLevel;
global $totalRows_rsOfLevel;

global $rsOfSemester;
global $row_rsOfSemester;
global $totalRows_rsOfSemester;

global $rsOfDepartment;
global $row_rsOfDepartment;
global $totalRows_rsOfDepartment;

global $rsOfGroup;
global $row_rsOfGroup;
global $totalRows_rsOfGroup;

if(!getRecord('isRecord',$BindID,'course')){
  $msg = 'This course record does not exist';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
} 
else {
  //LOAD RECORD TO BE UPDATED
  $query_rsSameRecord = "SELECT * FROM course WHERE `BindID` = '$BindID'";
  $rsSameRecord = mysql_query($query_rsSameRecord, $dbconnect) or die(mysql_error());
  $row_rsSameRecord = mysql_fetch_assoc($rsSameRecord);
  $totalRows_rsSameRecord = mysql_num_rows($rsSameRecord);

  if(!empty($_POST['UpdateBtn'])){
    $Title = GetSQLValueString($_POST['Title'], "text");
    $Acronym = GetSQLValueString($_POST['Acronym'], "text");
    $Code = GetSQLValueString($_POST['Code'], "text");
    $Unit = GetSQLValueString($_POST['Unit'], "text");
    $Level = GetSQLValueString($_POST['Level'], "text");
    $Semester = GetSQLValueString($_POST['Semester'], "text");
    $Department = GetSQLValueString($_POST['Department'], "text");
    $Group = GetSQLValueString($_POST['Group'], "text");

   	$AcronymAndCode = GetSQLValueString($_POST['Acronym'].$_POST['Code'], "text");
    
    //CHECK TO MAKE SURE RECORD DOES NOT ALREADY EXIST
    $query_rsRecordExist = "SELECT * FROM `course` WHERE CONCAT (Acronym, Code) = $AcronymAndCode OR Title = $Title";
    $rsRecordExist = mysql_query($query_rsRecordExist, $dbconnect) or die(mysql_error());
    $row_rsRecordExist = mysql_fetch_assoc($rsRecordExist);
    $totalRows_rsRecordExist = mysql_num_rows($rsRecordExist);  
    if($totalRows_rsRecordExist > 0 && $row_rsRecordExist['TUID'] != $row_rsSameRecord['TUID']){

        $msg = 'A record with the same title or course code already exist!';
        $isNotify = isNotify($msg,'error');
        $showForm = TRUE;
      }
    else { //UPDATE THE RECORD
      $updateSQL = "UPDATE `course` SET Title = $Title, Acronym = $Acronym, Code = $Code,
        Unit = $Unit, Level = $Level, Semester = $Semester, Department = $Department,
        `Group` = $Group WHERE `BindID` = '$BindID'";
      $update = mysql_query($updateSQL, $dbconnect) or die(mysql_error());
      
      $msg = 'The record has been updated successfully';
      $isNotify = isNotify($msg,'success');
      $showForm = FALSE;
    } 
  }
  else {
    $msg = 'Please update the form with valid details';
    $isNotify = isNotify($msg,'info');
    $showForm = TRUE;
  }
}
?>

<form id="CreateRecord" name="CreateRecord" method="POST" action="">
  <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
  <table border="0" cellspacing="0" cellpadding="0"  class="hrView">
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Title">Title:</label></th>
      <td><span id="spryTitle">
        <input type="text" name="Title" id="Title" value="<?php if(!empty($row_rsSameRecord['Title'])){echo $row_rsSameRecord['Title'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Acronym">Acronym:</label></th>
      <td><span id="spryAcronym">
        <input type="text" name="Acronym" id="Acronym" value="<?php if(!empty($row_rsSameRecord['Acronym'])){echo $row_rsSameRecord['Acronym'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Code">Code:</label></th>
      <td><span id="spryCode">
        <input type="text" name="Code" id="Code" value="<?php if(!empty($row_rsSameRecord['Code'])){echo $row_rsSameRecord['Code'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Unit">Unit:</label></th>
      <td><span id="spryUnit">
        <input type="number" name="Unit" id="Unit" value="<?php if(!empty($row_rsSameRecord['Unit'])){echo $row_rsSameRecord['Unit'];}?>">
        <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">number only</span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Level">Level:</label></th>
      <td><span id="spryLevel">
        <select name="Level" id="Level" class="inline">
          <option value="" <?php if (!(strcmp("", $row_rsSameRecord['Level']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsOfLevel['BindID']?>"<?php if (!(strcmp($row_rsOfLevel['BindID'], $row_rsSameRecord['Level']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsOfLevel['Level'].' (Year '.$row_rsOfLevel['Year'].')';?></option>
			<?php } while ($row_rsOfLevel = mysql_fetch_assoc($rsOfLevel));
				$rows = mysql_num_rows($rsOfLevel);
				if($rows > 0) {
				mysql_data_seek($rsOfLevel, 0);
				$row_rsOfLevel = mysql_fetch_assoc($rsOfLevel);
            }?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Semester">Semester:</label></th>
      <td><span id="sprySemester">
        <select name="Semester" id="Semester" class="inline">
          <option value="" <?php if (!(strcmp("", $row_rsSameRecord['Semester']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsOfSemester['BindID']?>"<?php if (!(strcmp($row_rsOfSemester['BindID'], $row_rsSameRecord['Semester']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsOfSemester['Title'];?></option>
			<?php } while ($row_rsOfSemester = mysql_fetch_assoc($rsOfSemester));
				$rows = mysql_num_rows($rsOfSemester);
				if($rows > 0){
				mysql_data_seek($rsOfSemester, 0);
				$row_rsOfSemester = mysql_fetch_assoc($rsOfSemester);
            }?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Department">Department:</label></th>
      <td><span id="spryDepartment">
        <select name="Department" id="Department">
          <option value="" <?php if (!(strcmp("", $row_rsSameRecord['Department']))) {echo "selected=\"selected\"";} ?>>Select</option>
           <?php do {?>
          <option value="<?php echo $row_rsOfDepartment['BindID']?>"<?php if (!(strcmp($row_rsOfDepartment['BindID'], $row_rsSameRecord['Department']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsOfDepartment['Title'];?></option>
			<?php } while ($row_rsOfDepartment = mysql_fetch_assoc($rsOfDepartment));
				$rows = mysql_num_rows($rsOfDepartment);
				if($rows > 0){
				mysql_data_seek($rsOfDepartment, 0);
				$row_rsOfDepartment = mysql_fetch_assoc($rsOfDepartment);
            }?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Group">Group:</label></th>
      <td><span id="spryGroup">
        <select name="Group" id="Group">
          <option value="" <?php if (!(strcmp("", $row_rsSameRecord['Group']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsOfGroup['BindID']?>"<?php if (!(strcmp($row_rsOfGroup['BindID'], $row_rsSameRecord['Group']))) {echo "selected=\"selected\"";} ?>><?php echo ucwords($row_rsOfGroup['Title']);?></option>
			<?php } while ($row_rsOfGroup = mysql_fetch_assoc($rsOfGroup));
            	$rows = mysql_num_rows($rsOfGroup);
            	if($rows > 0) {
           		mysql_data_seek($rsOfGroup, 0);
            	$row_rsOfGroup = mysql_fetch_assoc($rsOfGroup);
            }?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td><input type="submit" name="UpdateBtn" id="UpdateBtn" value="Update">
        <input type="reset" name="ResetBtn" id="button" value="Reset"></td>
    </tr>
  </table>
<script type="text/javascript">
var spryTitle = new Spry.Widget.ValidationTextField("spryTitle");
var spryAcronym = new Spry.Widget.ValidationTextField("spryAcronym");
var spryCode = new Spry.Widget.ValidationTextField("spryCode");
var spryUnit = new Spry.Widget.ValidationTextField("spryUnit", "integer");
var spryLevel = new Spry.Widget.ValidationSelect("spryLevel");
var sprySemester = new Spry.Widget.ValidationSelect("sprySemester");
var spryDepartment = new Spry.Widget.ValidationSelect("spryDepartment");
var spryGroup = new Spry.Widget.ValidationSelect("spryGroup");
</script> 
  <?php } ?>
</form>

