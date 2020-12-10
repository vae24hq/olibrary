<?php loadFile('slice', 'head');?>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="/"><b>Medi</b>Plex</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<div class="login-box-msg">Please enter your access information</div>

			<form action="go/login" method="post">
				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="UserID" name="userid">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox"> <span style="padding-left: 10px;">Remember Me</span>
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<div style="padding: 10px 0; text-align: center;"><a href="#">I lost my password</a></div>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<?php loadFile('slice', 'js');?>

</body>
</html>