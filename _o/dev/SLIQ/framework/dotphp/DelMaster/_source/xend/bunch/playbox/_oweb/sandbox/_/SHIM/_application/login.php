<?php 
do_session();
$loc = getAppLoc();
$loader = new loader();
?>

<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/> 
<script src="../script/spry/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../script/spry/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<form action="?url=login_&loc=<?php echo $loc; ?>" method="post" name="LoginForm" id="LoginForm">        
   
  <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="100">&nbsp;</td>
    </tr>
  </table>
  <table border="0" align="center" cellpadding="0" cellspacing="0" width="460" class="modulebox">
       <tr>
         <td align="left" valign="middle" class="header">
		 <?php print_msg($loader->get_location()); ?>&nbsp;
         </td>
       </tr>
       <tr>
         <td height="140" align="center" valign="top" class="contentarea">
         <table width="98%" border="0" cellpadding="0" cellspacing="0">
          
           <tr>
             <td align="left" valign="middle" class="infobox">             
            <?php
	   			$loginMsg = login_msg();
				if($loginMsg['msg_type'] == 'error'){?>     
        			<div class="infoError">
                <?php }
				elseif($loginMsg['msg_type'] == 'info') { ?>
            		<div class="infoSuccess">
           	   <?php } else { ?>
	  		   <div id="notice">
              	<?php } ?>
                	<?php print_msg($loginMsg['msg']); ?>
                </div>
             </td>
           </tr>
          
         </table>
         
         <table border="0" align="center" cellpadding="0" cellspacing="0" class="inputTab">
           <tr>
             <th align="right" valign="middle"><label for="UserID">User ID:</label></th>
             <td align="left" valign="middle">
             <span id="spryUserID">
             <input name="UserID" type="text" id="UserID" tabindex="1" autocomplete="off" />
               <span class="textfieldRequiredMsg">Required!</span></span></td>
</tr>
           <tr>
             <th align="right" valign="middle"><label for="Password">Password:</label></th>
             <td align="left" valign="middle"><span id="spryPassword">
               <input type="password" name="Password" id="Password" tabindex="2" autocomplete="off" />
               <span class="textfieldRequiredMsg">Required!</span></span></td>
</tr>
           <tr>
             <td colspan="2" class="spacer" height="8"><input name="run_process" type="hidden" id="run_process" value="go" /></td>
             </tr>
           <tr>
             <th align="right" valign="middle">&nbsp;</th>
             <td align="left" valign="middle">
             <input type="submit" name="LoginBtn" id="LoginBtn" value="Login" tabindex="3" />
             <input type="reset" name="ClearBtn" id="button" value="Clear" tabindex="4" />
               </td>
           </tr>
         </table>
         </td>
    </tr>
  </table>
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="inputTabVert">
  <tr>    </tr>
  <tr>    </tr>
  </table>
</form>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("spryPassword", "none", {validateOn:["blur", "change"]});
var sprytextfield1 = new Spry.Widget.ValidationTextField("spryUserID", "none", {validateOn:["blur", "change"]});
</script>
