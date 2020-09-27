<?php
	$activeUser = new ActiveUser;
	if($activeUser->isGuest()){
		$name = 'Guest'; $salute = "Hi";
	}
	else {
		$name = $activeUser->Retrieve('Username');$salute = "Welcome";
		if(empty($name)){$name = 'Anonymous';}
	}
?>
<!--header section-->
<header id="pageHeader" class="group">
	<span class="greetings"><?php echo $salute;?> <span class="username"><?php echo $name;?>,</span> <?php echo greetings();?></span>
	<span class="date"><?php echo doDate('date');?></span>
</header>
<!--header section end-->
