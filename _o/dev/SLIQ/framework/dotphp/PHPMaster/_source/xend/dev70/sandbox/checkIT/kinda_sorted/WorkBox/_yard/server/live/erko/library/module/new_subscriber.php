<?php
$loader = new Loader;  $loader->action();
require('Connections/dbcon.php');
include("dw/getsqlvaluestring.php");
$editFormAction = './'; #$_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "CreateForm")) {
  $insertSQL = sprintf("INSERT INTO subscription (suid, buid, entryStamp, entryBy, ref, name, email, phone) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString(doRand('suid'), "text"),
					   GetSQLValueString(doRand('buid'), "text"),
					   GetSQLValueString(doTimeStamp('now'), "text"),
					   GetSQLValueString('admin', "text"),
					   GetSQLValueString(doRand('ref'), "text"),
					   GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['phone'], "text"));

  mysql_select_db($database_dbcon, $dbcon);
  $Result1 = mysql_query($insertSQL, $dbcon) or die(mysql_error());

  $insertGoTo = "./?link=new_subscriber-subscribed";
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<script src="assets/_spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="assets/_spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<div class="hrView">
 <?php if($loader->action() == 'subscribed') { ?><p class="success">You have successfully subscribed a user</p> <?php } 
  if($loader->action() == 'default') { ?>
  <div class="heading">Please complete the form below </div>
  <form action="<?php echo $editFormAction; ?>" method="POST" name="CreateForm" id="CreateForm">
    <span id="spryname">
    <label for="name">name:</label>
    <input type="text" name="name" id="name">
    <span class="textfieldRequiredMsg">!required</span></span><br>
    <span id="spryemail">
    <label for="email">email address:</label>
    <input type="text" name="email" id="email">
    <span class="textfieldRequiredMsg">!required</span><span class="textfieldInvalidFormatMsg">check email</span></span><br>
    <span id="spryphone">
    <label for="phone">phone number:</label>
    <input type="text" name="phone" id="phone">
</span>
<span class="buttons">
    <input name="createButton" type="submit" id="createButton" value="create">
    <input type="reset" name="clearButton" id="clearButton" value="clear">
    </span>
<input type="hidden" name="MM_insert" value="CreateForm">
  </form>
  <script type="text/javascript">
var spryname = new Spry.Widget.ValidationTextField("spryname", "none", {validateOn:["blur"]});
var spryemail = new Spry.Widget.ValidationTextField("spryemail", "email", {validateOn:["blur"]});
var spryphone = new Spry.Widget.ValidationTextField("spryphone", "none", {validateOn:["blur"], isRequired:false});
</script>
  <?php  }?>
</div>

