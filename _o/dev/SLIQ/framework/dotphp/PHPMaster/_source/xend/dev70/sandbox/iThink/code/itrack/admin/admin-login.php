<?php error_reporting(0); include 'o_login.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administrator Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/presentation.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
		<div class="panel-body text-center">
					<img src="../asset/logo.png" alt="Logo" title="Logo">
				</div>
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Administrator Login</div>
				<div class="panel-body">
					<?php echo loginMsg();?>
          		<form role="form" name="login" action="admin-login.php" method="post">
						<fieldset>
							<div class="form-group"><input class="form-control" placeholder="email@address.com" name="email" type="email" autofocus=""></div>
							<div class="form-group"><input class="form-control" placeholder="password" name="password" type="password" value=""></div>
							<div class="checkbox"><label><input name="remember" type="checkbox" value="Remember Me">Remember me on this device</label></div>
							<button type="submit" class="btn btn-primary">Login</button>
							<input name="gologin" type="hidden" value="admin">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</div>

<?php include 'js.php';?>

</body>
</html>