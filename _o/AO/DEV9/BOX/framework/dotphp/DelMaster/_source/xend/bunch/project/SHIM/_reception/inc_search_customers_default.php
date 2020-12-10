<?php $loc = getAppLoc(); ?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>

<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../script/spry/SpryValidationRadio.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../script/spry/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<form id="PeriodForm" name="PeriodForm" method="post" action="">
 		
	   <?php //PROCESS PERIOD FORM
		if(isset($_POST['doSearch'])) {
			$keyword = $_POST['DataEntry'];
			$keywordis = $_POST['infotype'];
			if($keywordis == 'name') {
				$resultGoTo = "?url=customers_reception&loc=$loc&filter=result&name=$keyword";
			}
			elseif($keywordis == 'email') {
				$resultGoTo = "?url=customers_reception&loc=$loc&filter=result&email=$keyword";
			}
			elseif($keywordis == 'phone') {
				$resultGoTo = "?url=customers_reception&loc=$loc&filter=result&phone=$keyword";
			}			
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
              <td colspan="2" align="left" valign="middle" scope="row">Please enter a particular information  to search customers with similar data</td>
            </tr>
            <tr>
              <td height="14" colspan="2" class="spacer" scope="row">&nbsp;</td>
            </tr>
            <tr>
              <th align="right" valign="middle" scope="row"><label for="Title">Keyword:</label></th>
              <td height="26" align="left" valign="middle" style="min-width:440px;"><span id="spryDataEntry">
                <input name="DataEntry" type="text" id="DataEntry" size="50" />
              <span class="textfieldRequiredMsg">[Required]</span></span></td>
            </tr>
            <tr>
              <th align="right" valign="middle" scope="row"><label> Search with:</label></th>
              <td height="26" align="left" valign="middle"><span id="spryinfotype">
                <label>
                  <input name="infotype" type="radio" id="infotype[0]" value="name" checked="checked" />
                Name</label>
                
                <label>
                  <input type="radio" name="infotype" value="email" id="infotype[1]" />
                  Email Address</label>
                            <label>
                  <input type="radio" name="infotype" value="phone" id="infotype[2]" />
                  Phone Number</label>
                
              <span class="radioRequiredMsg">Please make a selection.</span></span></td>
            </tr>
            <tr>
              <td colspan="2" class="spacer" height="8"> <input name="doSearch" type="hidden" id="doSearch" value="go" /></td>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryDataEntry", "none", {validateOn:["blur", "change"]});
var spryradio1 = new Spry.Widget.ValidationRadio("spryinfotype");
</script>