<?php $loc = getAppLoc(); $getAct = ''; if(isset($_GET['act']) && $_GET['act'] !='') { $getAct = "&act=".$_GET['act'];} ?>
 
<link rel="stylesheet" type="text/css" href="../../script/css/screen.css"/>

 
 <ul>
<li><a href="?url=items_vip-bar&loc=<?php echo $loc.$getAct; ?>"><img src="../media/icon/info.png" width="16" />all</a></li>
<li><a href="?url=items_vip-bar&loc=<?php echo $loc.$getAct; ?>&show=service"><img src="../media/icon/info.png" width="16" />service</a></li>
<li><a href="?url=items_vip-bar&loc=<?php echo $loc.$getAct; ?>&show=drinks"><img src="../media/icon/info.png" width="16" />drinks</a></li>
<li><a href="?url=items_vip-bar&loc=<?php echo $loc.$getAct; ?>&show=bear"><img src="../media/icon/info.png" width="16" />bear</a></li>
<li><a href="?url=items_vip-bar&loc=<?php echo $loc.$getAct; ?>&show=wine"><img src="../media/icon/info.png" width="16" />wine</a></li>
</ul> 

