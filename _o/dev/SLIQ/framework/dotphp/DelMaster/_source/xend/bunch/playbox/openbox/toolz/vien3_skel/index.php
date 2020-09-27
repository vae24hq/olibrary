<?php require_once ('vien3/caix.php');?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome to <?php echo caix::name().'™';?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo caix::name();?> - <?php echo caix::site();?>">
		<meta name="keywords" content="<?php echo caix::name();?>, <?php echo caix::domain();?>, Vien3™ Hosting, Vien3™ Domains, Premium web hosting provided by Vien3™ Hosting">
		<!--[if lte IE 8]><script src="vien3/html5shiv.js"></script><![endif]-->
		<link rel="icon" href="vien3/.favicon.ico">
		<link rel="stylesheet" href="vien3/caix.css">
		<script src="vien3/sorttable.js"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="vien3/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="vien3/ie9.css" /><![endif]-->
	</head>

	<body class="loading">
	<h1 class="hide"><?php echo caix::site();?> - Hosting by Vien3.com</h1>

		<div id="wrapper">
			<div id="bg"></div>
				<div id="overlay"></div>
				<div id="main">
					<!-- The header -->
					<header id="header">
					<h2 class="heading"><?php echo caix::name();?>™</h2>
					<div>
						<p class="paragraph">
							<?php echo caix::name();?> has launched.<br>
							Welcome to <?php echo caix::site();?><br>
							As we review our design, we encourage you to visit again<br>
							Thank you for dropping by.
						</p>
						<p class="paragraph">
						<span class="emailaddress"><a href="mailto:info@<?php echo caix::domain();?>">info@<?php echo caix::domain();?></a></span>
						</p>
					</div>
					</header>
				</div>

		</div>


		

		<!-- The footer -->
		<footer id="footer" class="group">
			<!-- The summary -->
			<div class="summary">
				<p>Premium web hosting for <?php echo caix::domain();?> is provided by Vien3™ Hosting.</p>
			</div>
			<p class="copyright">&copy; <?php echo caix::domain().' '.date("Y");?></p>
			<p class="hosting">Hosting: <a href="http://www.vien3.com/?ref=<?php echo caix::domain();?>" title="Vien3™ Hosting" target="_blank">Vien3™</a></p>
		</footer>

		<!--[if lte IE 8]><script src="vien3/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function(){document.body.className = '';}
			window.ontouchmove = function(){return false;}
			window.onorientationchange = function(){document.body.scrollTop = 0;}
		</script>
	</body>

</html>