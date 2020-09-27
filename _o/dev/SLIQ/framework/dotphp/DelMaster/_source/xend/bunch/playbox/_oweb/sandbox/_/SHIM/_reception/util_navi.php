<?php
	do_session();
	$loc = getAppLoc();	
	$UserOn = new UserOn();
	$getUserAccess = $UserOn ->getUserOn("AccountAccess");
	$getUserAccountType = $UserOn ->getUserOn("AccountType");	
 ?>
<li class="subMenu">CUSTOMER</li>
<div class="navi-box">
<?php if($getUserAccess == 'reception' || $getUserAccess == 'dev') {?>
<li><a href="?url=new-customer_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/add.png" width="24" />new customer</a></li>

<!--<li><a href="?url=new-customer_reception&loc=<?php echo $loc; ?>&corporate"><img src="../media/icon/add.png" width="24" />new biz client</a></li> -->

<li><a href="?url=customers_reception&loc=<?php echo $loc; ?>&act=search"><img src="../media/icon/search.png" width="24" />search customer</a></li>
<li><a href="?url=customers_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/view.png" width="24" />view customers</a></li>

<!--<li><a href="?url=corporations_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/view.png" width="24" />corporations</a></li>
 -->
<?php } ?>

<li class="subMenu">ACCOMODATION</li>
<?php if($getUserAccess == 'reception' || $getUserAccess == 'account' || $getUserAccess == 'management' || $getUserAccess == 'dev') {?>

<!--<li><a href="?url=accommodation_reception&loc=<?php echo $loc; ?>&act=view"><img src="../media/icon/view.png" width="24" />all booking</a></li> -->
<li><a href="?url=accommodation_reception&period=<?php echo unix_time(); ?>&loc=<?php echo $loc; ?>&act=view"><img src="../media/icon/calendar.png" width="24" />today's booking</a></li>
<li><a href="?url=accommodation_reception&loc=<?php echo $loc; ?>&searchby=date&act=search"><img src="../media/icon/search.png" width="24" />search by date</a></li>
<?php } ?>

<?php if($getUserAccess == 'reception' || $getUserAccess == 'dev') {?>
<li><a href="?url=accommodation_reception&loc=<?php echo $loc; ?>&act=search"><img src="../media/icon/tag_blue.png" width="24" />check out</a></li>
<?php } ?>




<li class="subMenu">SUITES</li>
<?php if($getUserAccess == 'reception' || $getUserAccess == 'account' || $getUserAccess == 'management' || $getUserAccess == 'dev') {?>
<li><a href="?url=suites_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/view.png" width="24" />suites</a></li>
<li><a href="?url=room-search_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/search.png" width="24" />search room</a></li>
<li><a href="?url=rooms_reception&loc=<?php echo $loc; ?>&state=booked"><img src="../media/icon/view.png" width="24" />booked rooms</a></li>
<li><a href="?url=rooms_reception&loc=<?php echo $loc; ?>&state=open"><img src="../media/icon/view.png" width="24" />avaliable rooms</a></li>
<li><a href="?url=rooms_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/view.png" width="24" />all rooms</a></li>
<?php } ?>

<?php if($getUserAccess == 'management' || $getUserAccess == 'dev') {?>
<li class="subMenu">manage SUITES</li>
<li><a href="?url=create-suite_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/add.png" width="24" />create suite</a></li>
<li class="last"><a href="?url=suites_reception&act=manage&loc=<?php echo $loc; ?>"><img src="../media/icon/manage.png" width="24" />manage suites</a></li>
<li><a href="?url=suites_reception&act=room&loc=<?php echo $loc; ?>"><img src="../media/icon/manage.png" width="24" />manage room</a></li>
<?php } ?>

</div>
<br />
<span class="activeMenuSpace">&nbsp;</span>



<?php if($getUserAccess == 'reception' || $getUserAccess == 'dev') {?>
<li class="subMenu">POINT OF SALES</li>
<div class="navi-box">
<li><a href="?url=car-hire_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/pos.png" width="24" />car hire</a></li>
<li><a href="?url=gymnasium_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/pos.png" width="24" />gymnasium</a></li>
<li><a href="?url=confrence-hall_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/pos.png" width="24" />confrence hall</a></li>
<li><a href="?url=swimming-pool_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/pos.png" width="24" />swimming pool</a></li>
</div>

<span class="activeMenuSpace">&nbsp;</span>
<?php }?>


<?php if($getUserAccess == 'management' || $getUserAccess == 'account' || $getUserAccess == 'dev') {?>
<li class="subMenu">INCOME REPORT</li>
<div class="navi-box">
<li><a href="?url=accommodation-report_reception&act=view&period=<?php echo unix_time(); ?>&loc=<?php echo $loc; ?>"><img src="../media/icon/report.png" width="24" />accommodation</a></li>
<li><a href="?url=car-hire-report_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/report.png" width="24" />car hire</a></li>
<li><a href="?url=gymnasium-report_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/report.png" width="24" />gymnasium</a></li>
<li><a href="?url=confrence-hall-report_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/report.png" width="24" />confrence hall</a></li>
<li><a href="?url=swimming-pool-report_reception&loc=<?php echo $loc; ?>"><img src="../media/icon/report.png" width="24" />swimming pool</a></li>
</div>
<br/>
<span class="activeMenuSpace">&nbsp;</span>
<?php } ?>