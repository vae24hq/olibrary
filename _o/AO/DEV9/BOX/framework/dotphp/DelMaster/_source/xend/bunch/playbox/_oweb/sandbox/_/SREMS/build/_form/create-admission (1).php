<?php 
$isRecord = getRecord('isRecord',$_GET['id'], 'admission');
if($isRecord){
  $url = 'update_admission-data&id='.$_SESSION['AdmissionBindID'];
  $msg = 'This person already has an admission record<br>';
  $msg .= 'You may want to '.markupURL($url,'update','update admisison').' record instead';
  $isNotify = isNotify($msg,'error');
  $showForm = FALSE;
}
else {
  if(empty($_POST['CreateBtn'])){
    $msg = 'Please complete the field with valid entries';
    $isNotify = isNotify($msg,'info');
    $showForm = TRUE;


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
    $BindID = $_GET['id'];
    
    $puid = randomize('puid');
    $suid = randomize('suid');
    $tuid = randomize('tuid');
    $time = randomize('time');

    $insertSQL = "INSERT INTO `admission` (Department, Program, ProgramDegree, ProgramType, CurrentYear, Duration, DateAdmitted, Status, ";
        $insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
      $insertSQL .=" VALUES ($Department, $Program, $ProgramDegree, $ProgramType, $CurrentYear, $Duration, $DateAdmitted, 'active', ";
        $insertSQL .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";

    $insert = Query($insertSQL);

    $msg = 'The record has been created successfully';
    $isNotify = isNotify($msg,'success');
    $showForm = FALSE;
  }
}
?>
<form id="CreateForm" name="CreateForm" method="POST" action="">
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
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsDepartment['BindID']?>"><?php echo ucwords($row_rsDepartment['Title']);?></option>
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
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsProgram['BindID']?>"><?php echo ucwords($row_rsProgram['Title']);?></option>
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
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsDegree['BindID']?>"><?php echo $row_rsDegree['Acronym']?></option>
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
          <option value="">Select</option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsProgramType['BindID']?>"><?php echo ucwords($row_rsProgramType['Title']);?></option>
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
      <td> <span id="spryCurrentYear">
 
  
  <select name="CurrentYear" id="CurrentYear" class="inline">
    <option value="">Select</option>
    <?php
do {  
?>
    <option value="<?php echo $row_rsCurrentYear['BindID']?>"><?php echo $row_rsCurrentYear['Level'].' (Year '.$row_rsCurrentYear['Year'].')';?></option>
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
  <input type="number" name="Duration" id="Duration">
  <span class="textfieldRequiredMsg"></span></span></td>
      <td>  <span id="spryDateAdmitted">
  
  <input name="DateAdmitted" type="text" id="DateAdmitted" value="<?php echo date('Y-m-d');?>" class="normal">
  <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><span id="spryAdmissionStatus">
  <input name="Status" type="checkbox" id="Status" value="admitted">
  <label for="Status" class="inline">
  <span class="checkboxRequiredMsg">Please confirm that this student is admitted to the University.</span></label></span>
</td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" class="hrView">
    
    <tr>
      <th scope="col">&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="col">&nbsp;</th>
      <td><input type="submit" name="CreateBtn" id="CreateBtn" value="Create"></td>
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