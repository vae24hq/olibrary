<?php
$isRecord = getRecord('isRecord',$_GET['id'], 'admission');
if(!$isRecord){
  $url = 'create_admission-data&id='.$_SESSION['AdmissionBindID'];
  $msg = 'This student does not have an admission record<br>';
  $msg .= 'You may want to '.markupURL($url,'create a new record','create new record').' instead';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
}
else {
global $dbconnect;
  
$query_rsProgram = "SELECT BindID, Title FROM program ORDER BY Title ASC";
$rsProgram = mysql_query($query_rsProgram, $dbconnect) or die(mysql_error());
$row_rsProgram = mysql_fetch_assoc($rsProgram);
$totalRows_rsProgram = mysql_num_rows($rsProgram);

$query_rsDegree = "SELECT BindID, Title, Acronym FROM program_degree ORDER BY Acronym ASC";
$rsDegree = mysql_query($query_rsDegree, $dbconnect) or die(mysql_error());
$row_rsDegree = mysql_fetch_assoc($rsDegree);
$totalRows_rsDegree = mysql_num_rows($rsDegree);

$query_rsProgramType = "SELECT BindID, Title, Acronym FROM program_type ORDER BY Title ASC";
$rsProgramType = mysql_query($query_rsProgramType, $dbconnect) or die(mysql_error());
$row_rsProgramType = mysql_fetch_assoc($rsProgramType);
$totalRows_rsProgramType = mysql_num_rows($rsProgramType);

$query_rsDepartment = "SELECT BindID, Title, Acronym FROM department ORDER BY Title ASC";
$rsDepartment = mysql_query($query_rsDepartment, $dbconnect) or die(mysql_error());
$row_rsDepartment = mysql_fetch_assoc($rsDepartment);
$totalRows_rsDepartment = mysql_num_rows($rsDepartment);

$query_rsCurrentYear = "SELECT BindID, `Level`, `Year` FROM academic_level ORDER BY `Level` ASC";
$rsCurrentYear = mysql_query($query_rsCurrentYear, $dbconnect) or die(mysql_error());
$row_rsCurrentYear = mysql_fetch_assoc($rsCurrentYear);
$totalRows_rsCurrentYear = mysql_num_rows($rsCurrentYear);


  $BindID = $_GET['id'];
  $RecordSameCondtion = 'WHERE BindID = '."'".$BindID."'".' LIMIT 1';
  $RecordSame = Select('*','admission', $RecordSameCondtion);
  $RecordSameRow = $RecordSame['row'];

  if(empty($_POST['UpdateBtn'])){
    $msg = 'Please update the field below';
    $isNotify = isNotify($msg,'info');
    $showForm = TRUE;
  }
  else {
    #PREP FORM INPUT
    $Department = GetSQLValueString($_POST['Department'], "text");
    $Program = GetSQLValueString($_POST['Program'], "text");
    $ProgramDegree = GetSQLValueString($_POST['ProgramDegree'], "text");
    $ProgramType = GetSQLValueString($_POST['ProgramType'], "text");
    $CurrentYear = GetSQLValueString($_POST['CurrentYear'], "text");
    $Duration = GetSQLValueString($_POST['Duration'], "text");
    $DateAdmitted = GetSQLValueString($_POST['DateAdmitted'], "text");
    $Status = GetSQLValueString($_POST['Status'], "text");

    //UPDATE MAT NUMBER
    $updateSQL = "UPDATE `admission` SET Department = $Department, Program = $Program, ProgramDegree = $ProgramDegree,
    ProgramType = $ProgramType, CurrentYear = $CurrentYear, Duration = $Duration,
    DateAdmitted = $DateAdmitted, Status = $Status WHERE `BindID` = '$BindID'"; 
    $update = Query($updateSQL);    

    $msg = 'The record has been updated successfully';
    $isNotify = isNotify($msg,'success');
    $showForm = FALSE;
  }
}
?>
<form id="UpdateForm" name="UpdateForm" method="POST" action="">
 <?php echo $isNotify;?>

  <?php if(!empty($showForm)){?>
   <table border="0" cellspacing="0" cellpadding="0" class="vtView">
    <tr>
      <th scope="col"><label for="Department">Department:</label></th>
      <th scope="col"><label for="Program">Program:</label></th>
      <th scope="col"><label for="ProgramDegree">Degree:</label></th>
      <th scope="col"><label for="ProgramType">Program Type:</label></th>
    </tr>
    <tr>
      <td><span id="spryDepartment">
        <select name="Department" id="Department">
          <option value="" <?php if (!(strcmp("", $RecordSameRow['Department']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsDepartment['BindID']?>"<?php if (!(strcmp($row_rsDepartment['BindID'], $RecordSameRow['Department']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsDepartment['Title']?></option>
          <?php
} while ($row_rsDepartment = mysql_fetch_assoc($rsDepartment));
  $rows = mysql_num_rows($rsDepartment);
  if($rows > 0) {
      mysql_data_seek($rsDepartment, 0);
    $row_rsDepartment = mysql_fetch_assoc($rsDepartment);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
      <td><span id="spryProgram">
        <select name="Program" id="Program">
          <option value="" <?php if (!(strcmp("", $RecordSameRow['Program']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsProgram['BindID']?>"<?php if (!(strcmp($row_rsProgram['BindID'], $RecordSameRow['Program']))) {echo "selected=\"selected\"";} ?>><?php echo ucwords($row_rsProgram['Title']);?></option>
          <?php
} while ($row_rsProgram = mysql_fetch_assoc($rsProgram));
  $rows = mysql_num_rows($rsProgram);
  if($rows > 0) {
      mysql_data_seek($rsProgram, 0);
    $row_rsProgram = mysql_fetch_assoc($rsProgram);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
      <td><span id="spryProgramDegree">
        <select name="ProgramDegree" id="ProgramDegree">
          <option value="" <?php if (!(strcmp("", $RecordSameRow['ProgramDegree']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsDegree['BindID']?>"<?php if (!(strcmp($row_rsDegree['BindID'], $RecordSameRow['ProgramDegree']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsDegree['Acronym']?></option>
          <?php
} while ($row_rsDegree = mysql_fetch_assoc($rsDegree));
  $rows = mysql_num_rows($rsDegree);
  if($rows > 0) {
      mysql_data_seek($rsDegree, 0);
    $row_rsDegree = mysql_fetch_assoc($rsDegree);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
      <td><span id="spryProgramType">
        <select name="ProgramType" id="ProgramType">
          <option value="" <?php if (!(strcmp("", $RecordSameRow['ProgramType']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsProgramType['BindID']?>"<?php if (!(strcmp($row_rsProgramType['BindID'], $RecordSameRow['ProgramType']))) {echo "selected=\"selected\"";} ?>><?php echo ucwords($row_rsProgramType['Title']);?></option>
          <?php
} while ($row_rsProgramType = mysql_fetch_assoc($rsProgramType));
  $rows = mysql_num_rows($rsProgramType);
  if($rows > 0) {
      mysql_data_seek($rsProgramType, 0);
    $row_rsProgramType = mysql_fetch_assoc($rsProgramType);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
    </tr>
    <tr>
      <th><label for="CurrentYear">Current Level/Year:</label></th>
      <th><label for="Duration">Program Duration:</label></th>
      <th><label for="DateAdmitted">Date of Admission:</label></th>
      <th>&nbsp;</th>
    </tr>
    <tr>
      <td><span id="spryCurrentYear">
        <select name="CurrentYear" id="CurrentYear" class="inline">
          <option value="" <?php if (!(strcmp("", $RecordSameRow['CurrentYear']))) {echo "selected=\"selected\"";} ?>>Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsCurrentYear['BindID']?>"<?php if (!(strcmp($row_rsCurrentYear['BindID'], $RecordSameRow['CurrentYear']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsCurrentYear['Level'].' (Year '.$row_rsCurrentYear['Year'].')';?></option>
          <?php
} while ($row_rsCurrentYear = mysql_fetch_assoc($rsCurrentYear));
  $rows = mysql_num_rows($rsCurrentYear);
  if($rows > 0) {
      mysql_data_seek($rsCurrentYear, 0);
    $row_rsCurrentYear = mysql_fetch_assoc($rsCurrentYear);
  }
?>
        </select>
        <span class="selectRequiredMsg"></span></span></td>
      <td><span id="spryDuration">
        <input type="number" name="Duration" id="Duration" value="<?php if(!empty($RecordSameRow['Duration'])){echo $RecordSameRow['Duration'];}?>">
        <span class="textfieldRequiredMsg"></span></span></td>
      <td><span id="spryDateAdmitted">
        <input name="DateAdmitted" type="text" id="DateAdmitted" value="<?php if(!empty($RecordSameRow['DateAdmitted'])){echo $RecordSameRow['DateAdmitted'];}?>">
        <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><span id="spryAdmissionStatus">
        <input <?php if (!(strcmp($RecordSameRow['Status'],"admitted"))) {echo "checked=\"checked\"";} ?> name="Status" type="checkbox" id="Status" value="admitted">
        <label for="Status" class="inline"> <span class="checkboxRequiredMsg">I confirm that this student is admitted to the University.</span></label>
        </span></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    <tr>
      <th scope="col">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="col">&nbsp;</th>
      <td><input type="submit" name="UpdateBtn" id="UpdateBtn" value="Update">
        <input type="reset" name="ResetBtn" id="button" value="Reset"></td>
    </tr>
  </table>
  <script type="text/javascript">
var spryProgram = new Spry.Widget.ValidationSelect("spryProgram");
var spryProgramDegree = new Spry.Widget.ValidationSelect("spryProgramDegree");
var spryProgramType = new Spry.Widget.ValidationSelect("spryProgramType");
var spryDepartment = new Spry.Widget.ValidationSelect("spryDepartment");
var spryDateAdmitted = new Spry.Widget.ValidationTextField("spryDateAdmitted", "date", {format:"yyyy-mm-dd"});
var spryCurrentYear = new Spry.Widget.ValidationSelect("spryCurrentYear");
var spryDuration = new Spry.Widget.ValidationTextField("spryDuration");
var spryAdmissionStatus = new Spry.Widget.ValidationCheckbox("spryAdmissionStatus");
</script>
<?php
mysql_free_result($rsProgram);
mysql_free_result($rsDegree);
mysql_free_result($rsProgramType);
mysql_free_result($rsDepartment);
mysql_free_result($rsCurrentYear);
  } ?>
</form>
