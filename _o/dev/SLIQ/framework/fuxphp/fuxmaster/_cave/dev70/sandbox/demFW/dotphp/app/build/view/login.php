<?php addFile('login','utilizr'); $dologin = dologin();?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php addFile('head','slice');?>
</head>
<body class="bg-dark">
	<div class="container odao-login-card">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">Staff Login</div>
			<div class="card-body">
				<form id="loginForm" name="loginForm" action="login" method="post">
					<div class="form-group">
						<?php echo $dologin['msg'];?>
					</div>
					<div class="form-group">
						<div class="form-label-group">
							<input type="text" id="userid" name="userid" class="form-control" placeholder="Username" required autofocus tabindex="1">
							<label for="userid">Username</label>
						</div>
					</div>
					<div class="form-group">
						<div class="form-label-group">
							<input type="password" id="password" name="password" class="form-control" placeholder="Password" required tabindex="2">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="form-group">
						<div class="checkbox" style="margin-top:20px;">
							<label><input type="checkbox" value="rememberme"><span class="odao-checkbox-label">Remember Me</span></label>
						</div>
					</div>
					<div class="form-group odao-bottom-button">
						<input type="submit" id="loginBTN" name="loginBTN" class="btn btn-primary btn-block btn-lg odao-button" value="Login" tabindex="3">
					</div>
				</form>
				<div class="text-center odao-bottom-button">
					<span class="d-block"><a href="lost-password">Lost Password?</a></span>
				</div>
			</div>
		</div>
	</div>

<?php addFile('js-bottom','slice');?>
</body>
</html>