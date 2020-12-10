<div id="topbar" class="group">
	<p class="breadcrumb"><?php echo showBreadcrumb();?></p>
	<p class="date"><?php echo showDate();?></p>
</div>

<header id="header" class="group">
<div class="branding">
	<span><a href="./" title="<?php global $qs_name; echo $qs_name;?>" class="logo"><img src="source/asset/logo.png"></a></span>
	<span class="slogan"><?php global $qs_slogan; echo $qs_slogan;?></span>
</div>

<div class="aside">
	<span>e-Banking»
	<a href="ifund/log.php" target="_blank" title="login" class="login" onclick="openBrowser('ifund/log.php');return false;">Login</a>
	<a href="ifund/reg.php" target="_blank" title="sign up" class="signup" onclick="openBrowser('ifund/reg.php');return false;">Sign Up</a>
	</span>
</div>
</header>
