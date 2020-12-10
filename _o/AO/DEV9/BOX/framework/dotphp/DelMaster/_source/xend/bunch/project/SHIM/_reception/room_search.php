<?php $loc = getAppLoc(); ?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>

<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<form id="PeriodForm" name="PeriodForm" method="post" action="">
 		
	   <?php //PROCESS PERIOD FORM
		if(isset($_POST['doPeriod'])) {
			$roomNo = $_POST['DateEntry'];
			$resultGoTo = "?url=rooms_reception&loc=$loc&roomno=$roomNo";
			header(sprintf("Location: %s", $resultGoTo));
		} 
		?>
        <table  border="0" cellspacing="0" cellpadding="0" class="moduleboxHolder">
        <tr>
          <td align="center" valign="middle">
          
          <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
            <tr>
              <td colspan="2" align="left" valign="middle" scope="row">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2" align="left" valign="middle" scope="row">Please enter the room number below</td>
            </tr>
            <tr>
              <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
            </tr>
            <tr>
              <th align="right" valign="middle" scope="row"><label for="Title">Room title:</label></th>
              <td style="min-width:440px;" align="left" valign="middle"><span id="spryDateEntry">
                <input name="DateEntry" type="text" id="DateEntry" size="30" />
              <span class="textfieldRequiredMsg">[Required]</span></span></td>
            </tr>
            <tr>
              <td colspan="2" class="spacer" height="8"> <input name="doPeriod" type="hidden" id="doPeriod" value="go" /></td>
            </tr>
            <tr>
              <th align="right" valign="middle" scope="row">&nbsp;</th>
              <td class="buttonCell"><input type="submit" name="SaveBtn" id="SaveBtn" value="Search" tabindex="9">
              <input type="reset" name="ResetBtn" id="ResetBtn" value="Reset" tabindex="10"></td>
            </tr>
          </table></td>
</tr>
        
      </table>
    </form>
  
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryDateEntry", "none", {validateOn:["blur", "change"]});
</script>