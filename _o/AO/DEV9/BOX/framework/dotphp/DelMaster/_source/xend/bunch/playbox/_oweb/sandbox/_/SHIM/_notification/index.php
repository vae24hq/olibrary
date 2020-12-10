<?php
	if(isset($_GET['success'])) { $textclass = "infoSuccess"; }
	elseif(isset($_GET['failed'])) { $textclass = "infoError"; }
	else { $textclass = ""; }
	
	
	$notification = '';
	if(isset($_GET['act']) && $_GET['act'] != '') {
		
		//EXPENDITURE
		if($_GET['act'] == 'expense-posted') {
			$notification = "You have successfully posted your <strong>EXPENDITURE</strong>!";
		}
		
		
		
		
		//RESTURANT
		elseif($_GET['act'] == 'restaurant-menu-added') {
			$notification = "You have successfully added a <strong>NEW MENU</strong> to the <strong>restaurant</strong>!";
		}
		elseif($_GET['act'] == 'restaurant-menu-updated') {
			$notification = "Your <strong>restaurant MENU</strong> has successfully been updated!";
		}
		elseif($_GET['act'] == 'restaurant-menu-deleted') {
			$notification = "Item has been successfully removed from the <strong>restaurant MENU</strong>!";
		}
		elseif($_GET['act'] == 'restaurant-reciept-prepared') {
			$notification = "You have successfully prepared the reciept for <strong>restaurant sales</strong>!";
		}
		
		//VIP BAR
		elseif($_GET['act'] == 'vipbar-item-added') {
			$notification = "You have successfully added a <strong>NEW ITEM</strong> to the <strong>vip bar</strong>!";
		}
		elseif($_GET['act'] == 'vipbar-item-updated') {
			$notification = "Your <strong>vip bar MENU</strong> has successfully been updated!";
		}
		elseif($_GET['act'] == 'vipbar-item-deleted') {
			$notification = "Item has been successfully removed from the <strong>vip bar MENU</strong>!";
		}
		elseif($_GET['act'] == 'vipbar-reciept-prepared') {
			$notification = "You have successfully prepared the reciept for <strong>vip bar sales</strong>!";
		}
		
		//BUSH BAR
		elseif($_GET['act'] == 'bushbar-item-added') {
			$notification = "You have successfully added a <strong>NEW ITEM</strong> to the <strong>bush bar</strong>!";
		}
		elseif($_GET['act'] == 'bushbar-item-updated') {
			$notification = "Your <strong>bush bar MENU</strong> has successfully been updated!";
		}
		elseif($_GET['act'] == 'bushbar-item-deleted') {
			$notification = "Item has been successfully removed from the <strong>bush bar MENU</strong>!";
		}
		elseif($_GET['act'] == 'bushbar-reciept-prepared') {
			$notification = "You have successfully prepared the reciept for <strong>bush bar sales</strong>!";
		}
		
		//RECEPTION
		elseif($_GET['act'] == 'reception-carhire-invoice') {
			$notification = "You have successfully posted a <strong>CAR HIRE SERVICE</strong> invoice!";
		}
		elseif($_GET['act'] == 'reception-hall-invoice') {
			$notification = "You have successfully posted a booking for the <strong>CONFRENCE HALL</strong>!";
		}
		elseif($_GET['act'] == 'reception-gymn-invoice') {
			$notification = "You have successfully posted a booking for the <strong>GYMNASIUM</strong>!";
		}
		elseif($_GET['act'] == 'reception-swimmingpool-invoice') {
			$notification = "You have successfully posted a <strong>SWIMMING POOL</strong> invoice!";
		}
		
		elseif($_GET['act'] == 'reception-suite-added') {
			$notification = "You have successfully added a <strong>NEW SUITE</strong>!";
		}
		elseif($_GET['act'] == 'reception-suite-updated') {
			$notification = "You have successfully updated the <strong>SUITE</strong>!";
		}
		
		elseif($_GET['act'] == 'reception-new-customer') {
			$notification = "You have successfully added a <strong>NEW CUSTOMER</strong>!";
		}
		elseif($_GET['act'] == 'reception-corporation-added') {
			$notification = "You have successfully added a <strong>NEW CORPORATION</strong>!";
		}
		elseif($_GET['act'] == 'reception-checked-in') {
			$notification = "You have successfully checked in the customer!";
		} 
		 
	}
 ?>
<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="viewTabHr">
  <tr>
    <td height="24" colspan="7" align="left" valign="middle" class="tabTitle" scope="col"><strong>NOTIFICATION</strong></td>
  </tr>

  <tr class="tabContent <?php echo $textclass; ?>">
    <td height="50" colspan="6" align="left" valign="middle" style="text-transform:none; padding-left:20px;">
    <?php echo $notification; ?>
    </td>
  </tr>
  <tr class="tabContent">
    <td height="22" colspan="6" align="center" valign="middle">&nbsp;</td>
  </tr>

</table>
