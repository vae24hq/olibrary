<?php $loc = getAppLoc(); ?>
 
<link rel="stylesheet" type="text/css" href="../../script/css/screen.css"/>

 
 <ul>
<li><a href="?url=sales-report_vip-bar&loc=<?php echo $loc; ?>"><img src="../media/icon/info.png" width="16" />show all</a></li>
<li><a href="?url=sales-report_vip-bar&loc=<?php echo $loc; ?>&period=<?php echo unix_time();?>"><img src="../media/icon/calendar.png" width="16" />today's record</a></li>
<li><a href="?url=sales-report_vip-bar&loc=<?php echo $loc; ?>&search=date"><img src="../media/icon/search.png" width="16" />search by date</a></li>
</ul> 