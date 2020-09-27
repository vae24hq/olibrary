<?php require oSLICE.'head.php';?>
<body class="bg-gradient-primary">
<div class="container">
	<div class="row justify-content-center o-login-page">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Sign In!</h1>
									<?php echo Notify::useDiv($iMedLogin['msg'], $iMedLogin['code']);?>
								</div>
								<form name="LoginForm" id="LoginForm" action="" method="POST" class="user">
									<div class="form-group"><input type="text" class="form-control" name="userid" id="userid" placeholder="UserID" value="<?php echo Utility::retainInput('userid');?>" autofocus required></div>
									<div class="form-group"><input type="password" class="form-control" name="password" id="password" placeholder="Password" required></div>
									<div class="form-group"><button type="submit" class="btn btn-primary btn-block o-bottom-button">Login</button></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require oSLICE.'js.php';?>