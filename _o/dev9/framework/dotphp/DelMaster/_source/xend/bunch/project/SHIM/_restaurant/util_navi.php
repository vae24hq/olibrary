<?php
	do_session();
	$loc = getAppLoc();	
	$UserOn = new UserOn();
	$getUserAccess = $UserOn ->getUserOn("AccountAccess");
	$getUserAccountType = $UserOn ->getUserOn("AccountType");	
 ?>
<li class="subMenu">RESTAURANT</li>
<div class="navi-box">


<?php if($getUserAccess == 'restaurant' || $getUserAccess == 'dev') {
		$orderstate = 'new'; $icontag = 'basket_green.png'; if(isset($_SESSION['InvoiceNo'])){ $orderstate = 'add to'; $icontag = 'tag_green.png';}
		?>
<li>
	<a href="?url=food-menu_restaurant&act=pos&loc=<?php echo $loc; ?>">
	<img src="../media/icon/<?php echo $icontag;?>" width="24" /><?php echo $orderstate;?> order</a>
</li>
<li><a href="?url=invoice_restaurant&loc=<?php echo $loc; ?>"><img src="../media/icon/edit.png" width="24" />pending invoice</a></li>
<?php } ?>


<?php if($getUserAccess == 'restaurant' || $getUserAccess == 'management' || $getUserAccess == 'dev') {?>
<li><a href="?url=food-menu_restaurant&loc=<?php echo $loc; ?>"><img src="../media/icon/view.png" width="24" />view menu</a></li>
<?php } ?>

<?php if($getUserAccess == 'management' || $getUserAccess == 'dev') {?>
<li><a href="?url=new-menu_restaurant&loc=<?php echo $loc; ?>"><img src="../media/icon/add.png" width="24" />create menu</a></li>
<li class="last"><a href="?url=food-menu_restaurant&act=manage&loc=<?php echo $loc; ?>"><img src="../media/icon/manage.png" width="24" />manage menu</a></li>
<?php } ?>

<?php if($getUserAccess == 'management' || $getUserAccess == 'account' || $getUserAccess == 'restaurant' || $getUserAccess == 'dev') {?>
<li>
<a href="?url=sales-report_restaurant&loc=<?php echo $loc; ?>&period=<?php echo unix_time();?>"><img src="../media/icon/sales.png" width="24" />sales report</a>
</li>

<li>
<a href="?url=income-summary_restaurant&loc=<?php echo $loc; ?>&period=today"><img src="../media/icon/piggybank.png" width="24" />income summary</a>
</li>
<?php } ?>



</div>
<br/>
<span class="activeMenuSpace">&nbsp;</span>

