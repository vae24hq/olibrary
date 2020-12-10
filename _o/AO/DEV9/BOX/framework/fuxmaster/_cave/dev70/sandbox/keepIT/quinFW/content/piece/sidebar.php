<div class="heading"><?php echo quin::$name;?></div>
<?php
echo page_menu_group('about-us', 'About Us', '')."\n";
	echo page_secondary_menu('the-board', 'The Board')."\n";
	echo page_secondary_menu('governance')."\n";

echo page_menu_group('financial', 'Financial Information', '')."\n";
	echo page_secondary_menu('accounts', "Chairman's Statement")."\n";

echo page_menu('recruitment')."\n";
echo page_menu('contact-us', 'contact us')."\n";
?>

<div class="heading">Group Services</div>
<?php
echo page_menu('personal', 'Personal Deposit')."\n";
echo page_menu('commercial', 'Commercial Lending')."\n";
?>

<div class="heading">e-Banking</div>
<a href="#" class="secmenu" onclick="quinOpen('register.php')">Register</a>
<a href="#" class="secmenu" onclick="quinOpen('login.php')">Login</a>

<!-- <img src="asset/side-jhiam.gif" class="separate flex"> -->