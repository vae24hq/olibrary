<?php
	do_session();
	$loc = getAppLoc();	
	$UserOn = new UserOn();
	$getUserAccess = $UserOn ->getUserOn("AccountAccess");
	$getUserAccountType = $UserOn ->getUserOn("AccountType");	
 ?>
<?php if($getUserAccess == 'management' || $getUserAccess == 'account' || $getUserAccess == 'dev') {?>
<li class="subMenu">SUMMARY</li>
<div class="navi-box">
<li>
<a href="?url=report_summary&loc=<?php echo $loc; ?>&period=<?php echo unix_time();?>"><img src="../media/icon/sales.png" width="24" />summary</a>
</li>
<li>
<a href="?url=search_summary&loc=<?php echo $loc; ?>"><img src="../media/icon/search.png" width="24" />seach by date</a>
</li>
<?php } ?>



</div>
<br/>
<span class="activeMenuSpace">&nbsp;</span>