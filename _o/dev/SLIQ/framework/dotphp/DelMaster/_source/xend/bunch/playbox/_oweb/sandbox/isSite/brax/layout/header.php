
<header id="header" class="group">
	<div class="header">
		<div class="group">
		<nav id="quickTopNav">
			<ul class="quickTopNav" role="navigation">
			<li><?php echo makeLink('quickTop', 'home');?></li>
			<li><?php echo makeLink('quickTop', 'contact us');?></li>
			<li><a href="<?php echo site('ib');?>register.php" target="_blank" title="regiser" class="quickTop" onclick="openIB('register.php');return false;">Register for Internet-Banking</a></li>
			</ul>
		</nav>
		</div>

		<div id="branding" class="group">
			<div id="logo">
				<a href="./" title="<?php echo site('name');?>" class="logo"><img src="asset/logo.png" class="logoImg"></a>
			</div>
			<div id="ib">
				<a href="<?php echo site('ib');?>register.php" title="register" class="btn regBtn">register</a>
				<a href="<?php echo site('ib');?>login.php" title="login" class="btn logBtn">login</a>
			</div>
		</div>

		<div class="group">
		<nav id="navMain">
			<ul class="navMain" role="navigation">
				<li><?php echo makeLink('navLink', 'current-account', 'Current Accounts');?></li>
				<li><?php echo makeLink('navLink', 'savings', 'Savings & ISAs');?></li>
				<li><?php echo makeLink('navLink', 'mortgages', 'Mortgages');?></li>
				<li><?php echo makeLink('navLink', 'loans', 'Loans');?></li>
				<li><?php echo makeLink('navLink', 'credit-card', 'Credit Card');?></li>
				<li><?php echo makeLink('navLink', 'insurance', 'Insurance');?></li>
				<li><?php echo makeLink('navLink', 'investment', 'Investments');?></li>
			</ul>
		</nav>
		</div>
	</div>
</header><!-- end page header -->

