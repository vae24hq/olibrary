<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Register on WOWCatholic.com</title>
	<link rel="apple-touch-icon" sizes="180x180" href="/asset/wow/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/asset/wow/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/asset/wow/favicon-16x16.png">
	<link rel="shortcut icon" type="image/x-icon" href="/asset/wow/favicon.ico">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="/asset/wow/ao.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
	<div id="header" class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col">
					<a href="https://www.wowcatholic.com/" title="WOWCatholic"><img src="/asset/wow/logo-white.png" alt="WOWCatholic.com" id="logo"></a>
				</div>
				<div class="float-right">
					<a href="https://www.wowcatholic.com/" class="btn btn-sm login">Login</a>
				</div>
			</div>
		</div>
	</div>
	<form name="registration" id="registration" action="" method="post">
		<div id="maincontent" class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-6">

					<div class="form-group row">
						<div class="col-sm-3 col-form-label label"> </div>
						<div class="col-sm-9"><?php if(!empty($isError)){?><div class="alert alert-danger" role="alert"><span><?php echo $isError;?></span></div><?php }?></div>
					</div>

					<div class="form-group row">
						<label for="username" class="col-sm-3 col-form-label label">Username</label>
						<div class="col-sm-9">
							<input name="username" type="text" class="form-control form-control-md" id="username" placeholder="iamodao">
							<!-- <small id="usernameHelp" class="form-text text-muted hint">Please enter a unique username</small> -->
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label label">Email Address</label>
						<div class="col-sm-9">
							<input name="email" type="email" class="form-control" id="email" placeholder="odao@woca.ng">
						</div>
					</div>
					<div class="form-group row">
						<label for="phone" class="col-sm-3 col-form-label label">Phone Number</label>
						<div class="col-sm-9">
							<input name="phone" type="text" class="form-control" id="phone" placeholder="2349026636728">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-3 col-form-label label">Password</label>
						<div class="col-sm-9">
							<input name="password" type="password" class="form-control" id="password" placeholder="password">
						</div>
					</div>
					<div class="form-group row">
						<label for="religion" class="col-sm-3 col-form-label label">Religion</label>
						<div class="col-sm-9">
							<select name="religion" class="form-control" id="religion">
								<option placeholder=""selected>I am</option>
								<option placeholder="Catholic" >Catholic</option>
								<option placeholder="Pentecostal">Pentecostal</option>
								<option placeholder="Muslim">Muslim</option>
								<option placeholder="Others">Others</option>
							</select>
						</div>
					</div>
					<div class="form-group row omargin-top">
						<label for="religion" class="col-sm-3 col-form-label label"></label>
						<div class="col-sm-9">
							<input type="submit" placeholder="Continue" class="btn btn-primary">
						</div>
					</div>
					<div class="row">
						<div class="col">
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="/asset/wow/ao.js" type="text/javascript"></script>
</body>
</html>