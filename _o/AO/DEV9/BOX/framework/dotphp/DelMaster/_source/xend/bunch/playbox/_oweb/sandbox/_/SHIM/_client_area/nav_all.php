<?php
	do_session();
	$loc = getAppLoc();	
	$UserOn = new UserOn();
	$getUserAccess = $UserOn ->getUserOn("AccountAccess");
	$getUserAccountType = $UserOn ->getUserOn("AccountType");	
 ?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0" id="navi">
	<tr>
     <td align="left" valign="middle">
     	<ul>          
            <?php $restrictTo = array("restaurant","vipbar","bushbar", "reception"); if(!in_array($getUserAccess, $restrictTo)) { inc("../_expenditure/util_navi.php"); }?>
			
			<?php $restrictTo = array("vipbar","bushbar", "reception"); if(!in_array($getUserAccess, $restrictTo)) { inc("../_restaurant/util_navi.php"); }?>
            <?php $restrictTo = array("restaurant","bushbar", "reception"); if(!in_array($getUserAccess, $restrictTo)) { inc("../_vip_bar/util_navi.php"); }?>
            <?php $restrictTo = array("restaurant","vipbar","reception"); if(!in_array($getUserAccess, $restrictTo)) { inc("../_bush_bar/util_navi.php"); }?>
            
			
            <?php $restrictTo = array("restaurant","vipbar","bushbar"); if(!in_array($getUserAccess, $restrictTo)) { inc("../_reception/util_navi.php"); }?>
            
			<?php inc("../_application/util_navi.php"); ?>
           
            <?php inc("../_client_area/util_navi.php"); ?>
      	</ul>
     </td>
  </tr>
</table>