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

global $rsOfProgram;
global $row_rsOfProgram;
global $totalRows_rsOfProgram;

global $rsOfProgramType;
global $row_rsOfProgramType;
global $totalRows_rsOfProgramType;

global $rsOfProgramDegree;
global $row_rsOfProgramDegree;
global $totalRows_rsOfProgramDegree;

if(empty($_POST['CreateBtn'])){
  $msg = 'Please complete the field with valid entries';
  $isNotify = isNotify($msg,'info');
  $showForm = TRUE;
}
else {
  #PREP FORM INPUT
  $MinUnit = GetSQLValueString($_POST['MinUnit'], "text");
  $MaxUnit = GetSQLValueString($_POST['MaxUnit'], "text");
  $Level = GetSQLValueString($_POST['Level'], "text");
  $Semester = GetSQLValueString($_POST['Semester'], "text");
  $Program = GetSQLValueString($_POST['Program'], "text");
  $ProgramDegree = GetSQLValueString($_POST['ProgramDegree'], "text");
  $ProgramType = GetSQLValueString($_POST['ProgramType'], "text");

  $insertSQL = "INSERT INTO `academic_credit` (MinUnit, MaxUnit, Level, Semester, Program, ProgramDegree, ProgramType, ";
  $insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
  $insertSQL .=" VALUES ($MinUnit, $MaxUnit, $Level, $Semester, $Program, $ProgramDegree, $ProgramType, ";
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
      <th align="right" valign="middle" scope="row"><label for="MinUnit">Minimum Unit:</label></th>
      <td><span id="spryMinUnit">
        
        <input type="text" name="MinUnit" id="MinUnit">
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="MaxUnit">Maximum Unit:</label></th>
      <td><span id="spryMaxUnit">
        
        <input type="text" name="MaxUnit" id="MaxUnit">
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Level">Level:</label></th>
      <td><span id="spryLevel">
 
  
  <select name="Level" id="Level" class="inline">
    <option value="">Select</option>
    <?php
do {  
?>
    <option value="<?php echo $row_rsOfLevel['BindID']?>"><?php echo $row_rsOfLevel['Level'].' (Year '.$row_rsOfLevel['Year'].')';?></option>
    <?php
} while ($row_rsOfLevel = mysql_fetch_assoc($rsOfLevel));
  $rows = mysql_num_rows($rsOfLevel);
  if($rows > 0) {
      mysql_data_seek($rsOfLevel, 0);
    $row_rsOfLevel = mysql_fetch_assoc($rsOfLevel);
  }
?>
  </select>
  <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Semester">Semester:</label></th>
      <td><span id="sprySemester">
        <select name="Semester" id="Semester">
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsOfSemester['BindID']?>"><?php echo ucwords($row_rsOfSemester['Title']);?></option>
          <?php
} while ($row_rsOfSemester = mysql_fetch_assoc($rsOfSemester));
  $rows = mysql_num_rows($rsOfSemester);
  if($rows > 0) {
      mysql_data_seek($rsOfSemester, 0);
    $row_rsOfSemester = mysql_fetch_assoc($rsOfSemester);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="Program">Program:</label></th>
      <td><span id="spryProgram">
        <select name="Program" id="Program">
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsOfProgram['BindID']?>"><?php echo ucwords($row_rsOfProgram['Title']);?></option>
          <?php
} while ($row_rsOfProgram = mysql_fetch_assoc($rsOfProgram));
  $rows = mysql_num_rows($rsOfProgram);
  if($rows > 0) {
      mysql_data_seek($rsOfProgram, 0);
    $row_rsOfProgram = mysql_fetch_assoc($rsOfProgram);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="ProgramType">Program Type:</label></th>
      <td><span id="spryProgramType">
        <select name="ProgramType" id="ProgramType">
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsOfProgramType['BindID']?>"><?php echo ucwords($row_rsOfProgramType['Title']);?></option>
          <?php
} while ($row_rsOfProgramType = mysql_fetch_assoc($rsOfProgramType));
  $rows = mysql_num_rows($rsOfProgramType);
  if($rows > 0) {
      mysql_data_seek($rsOfProgramType, 0);
    $row_rsOfProgramType = mysql_fetch_assoc($rsOfProgramType);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row"><label for="ProgramDegree">Degree:</label></th>
      <td><span id="spryProgramDegree">
        <select name="ProgramDegree" id="ProgramDegree">
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsOfProgramDegree['BindID']?>"><?php echo $row_rsOfProgramDegree['Acronym']?></option>
          <?php
} while ($row_rsOfProgramDegree = mysql_fetch_assoc($rsOfProgramDegree));
  $rows = mysql_num_rows($rsOfProgramDegree);
  if($rows > 0) {
      mysql_data_seek($rsOfProgramDegree, 0);
    $row_rsOfProgramDegree = mysql_fetch_assoc($rsOfProgramDegree);
  }
?>
        </select><span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th align="right" valign="middle" scope="row">&nbsp;</th>
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
    </tr>
  </table>
<script type="text/javascript">
var spryMinUnit = new Spry.Widget.ValidationTextField("spryMinUnit");
var spryMaxUnit = new Spry.Widget.ValidationTextField("spryMaxUnit");
var spryLevel = new Spry.Widget.ValidationSelect("spryLevel");
var sprySemester = new Spry.Widget.ValidationSelect("sprySemester");
var spryProgram = new Spry.Widget.ValidationSelect("spryProgram");
var spryProgramType = new Spry.Widget.ValidationSelect("spryProgramType");
var spryProgramDegree = new Spry.Widget.ValidationSelect("spryProgramDegree");
</script>
<?php
mysql_free_result($rsOfProgram);
mysql_free_result($rsOfProgramDegree);
mysql_free_result($rsOfProgramType);
mysql_free_result($rsOfSemester);
mysql_free_result($rsOfLevel);
 } ?>
</form>

