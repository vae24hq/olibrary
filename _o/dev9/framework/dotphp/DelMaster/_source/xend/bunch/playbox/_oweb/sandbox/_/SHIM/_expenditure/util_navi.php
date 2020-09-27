<?php
	do_session();
	$loc = getAppLoc();	
	$UserOn = new UserOn();
	$getUserAccess = $UserOn ->getUserOn("AccountAccess");
	$getUserAccountType = $UserOn ->getUserOn("AccountType");	
 ?>

<li class="subMenu">EXPENDITURE</li>
<div class="navi-box">

<?php if($getUserAccess == 'account' || $getUserAccess == 'dev') {
		$orderstate = 'new'; $icontag = 'basket_green.png'; if(isset($_SESSION['InvoiceNo'])){ $orderstate = 'add to'; $icontag = 'tag_green.png';}
		?>
<li><a href="./?url=post-expense_expenditure&loc=<?php echo $loc; ?>"><img src="../media/icon/edit.png" width="24" />post new</a></li>
<?php } ?>

<?php if($getUserAccess == 'management' || $getUserAccess == 'account' || $getUserAccess == 'dev') {?>
<li><a href="./?url=view-expense_expenditure&loc=<?php echo $loc; ?>&sorting=Period&order=DESC"><img src="../media/icon/view.png" width="24" />view report</a></li>
<?php }?>
</div>
<br/>
<span class="activeMenuSpace">&nbsp;</span>