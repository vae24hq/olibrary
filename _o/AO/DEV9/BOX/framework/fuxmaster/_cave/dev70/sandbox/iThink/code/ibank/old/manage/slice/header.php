
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="setting.php">iNetB</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<?php if(admin('status') != 'inactive'){?>
					<li<?php echo cssActive('client.php');?>><a href="client.php">Clients</a></li>
					<li<?php echo cssActive('billing.php');?>><a href="billing.php">Billing</a></li>
					<li<?php echo cssActive('inquiry.php');?>><a href="inquiry.php">Inquiry</a></li>
					<?php if(admin('type') == 'webadmin'){?>
					<li<?php echo cssActive('firm.php');?>><a href="firm.php">Firm</a></li>
					<li<?php echo cssActive('manager.php');?>><a href="manager.php">Managers</a></li>
					<?php }?>
					<?php if(admin('type') == 'webadmin' || admin('type') == 'supamang'){?>
					<li<?php echo cssActive('code.php');?>><a href="code.php">Code</a></li>
					<?php }?>
				<?php }?>
					<li<?php echo cssActive('setting.php');?>><a href="setting.php">Setting</a></li>
					<li><a href="<?php echo firm('webmail');?>" target="_blank">Webmail</a></li>
					<li><a href="<?php echo $logoutAction;?>">Logout</a></li>
				</ul>

				<div class="info">
					<span class="label">CLIENT:</span> <?php echo totalClient();?>
					<span class="label">TRANSFER:</span> <?php echo totalTransfer();?>
				</div>
			</div>
		</div>
	</nav>

<?php if(admin('status') == 'inactive'){?>
	<div class="container">
	<div class="page" style="margin: 140px auto; text-align: center">
		<p>
			<span class="text-danger">Your account has been deactivated!</span><br><br>
			<span class="bg-primary" style="padding: 3px 5px; line-height: 2.2;">CONTACT INFORMATION</span><br>
			<strong><?php echo webAdmin('name');?></strong><br>
			<strong class="text-primary"><?php echo webAdmin('email');?></strong><br>
			<strong class="text-primary"><?php echo webAdmin('phone');?></strong> <small>(WhatsApp)</small>
		</p>
	</div>
	</div>
<?php include('slice/footer.php'); include('../in_foot.php');?>
</body>
</html>
<?php die();}?>