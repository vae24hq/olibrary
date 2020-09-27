<?php
$puid = randomize('puid');
$suid = randomize('suid');
$tuid = randomize('tuid');
$BindID = randomize('bind');
$time = randomize('time');

global $dbconnect;

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

if(empty($_POST['CreateBtn'])){
	$msg = 'Please complete the form with valid details';
	$isNotify = isNotify($msg,'info');
    $showForm = TRUE;
}
else {
	$Title = GetSQLValueString($_POST['Title'], "text");
	$Acronym = GetSQLValueString($_POST['Acronym'], "text");
	$Code = GetSQLValueString($_POST['Code'], "text");
	$Unit = GetSQLValueString($_POST['Unit'], "text");
	$Level = GetSQLValueString($_POST['Level'], "text");
	$Semester = GetSQLValueString($_POST['Semester'], "text");
	$Department = GetSQLValueString($_POST['Department'], "text");
	$Group = GetSQLValueString($_POST['Group'], "text");

	//CHECK TO MAKE SURE RECORD DOES NOT ALREADY EXIST
	$query_rsCheckRecord = "SELECT * FROM `course` WHERE Title = $Title";
	$rsCheckRecord = mysql_query($query_rsCheckRecord, $dbconnect) or die(mysql_error());
	$row_rsCheckRecord = mysql_fetch_assoc($rsCheckRecord);
	$totalRows_rsCheckRecord = mysql_num_rows($rsCheckRecord);	
	if($totalRows_rsCheckRecord > 0){
      $msg = 'A course with this title already exist!';
      $isNotify = isNotify($msg,'error');
      $showForm = TRUE;
    }
	else { //INSERT THE RECORD
		$insertSQL = "INSERT INTO `course` (Title, Acronym, Code, Unit, Level, Semester, Department, `Group`,";
		$insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
		$insertSQL .=" VALUES ($Title, $Acronym, $Code, $Unit, $Level, $Semester, $Department, $Group,";
		$insertSQL .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";
		$insert = mysql_query($insertSQL, $dbconnect) or die(mysql_error());
		
		$msg = 'The record has been added successfully';
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
      <th align="right" valign="middle" scope="row"><label for="Title">Title:</label></th>
      <td><span id="spryTitle">
        <input type="text" name="Title" id="Title">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Acronym">Acronym:</label></th>
      <td><span id="spryAcronym">
        <input type="text" name="Acronym" id="Acronym">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Code">Code:</label></th>
      <td><span id="spryCode">
        <input type="text" name="Code" id="Code">
        <span class="textfieldRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Unit">Unit:</label></th>
      <td><span id="spryUnit">
        <input type="number" name="Unit" id="Unit">
        <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">number only</span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Level">Level:</label></th>
      <td><span id="spryLevel">
        <select name="Level" id="Level" class="inline">
          <option value="">Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsOfLevel['BindID']?>"><?php echo $row_rsOfLevel['Level'].' (Year '.$row_rsOfLevel['Year'].')';?></option>
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
          <option value="">Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsOfSemester['BindID']?>"><?php echo $row_rsOfSemester['Title'];?></option>
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
          <option value="">Select</option>
           <?php do {?>
          <option value="<?php echo $row_rsOfDepartment['BindID']?>"><?php echo $row_rsOfDepartment['Title'];?></option>
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
          <option value="">Select</option>
          <?php do {?>
          <option value="<?php echo $row_rsOfGroup['BindID']?>"><?php echo ucwords($row_rsOfGroup['Title']);?></option>
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
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
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
 
