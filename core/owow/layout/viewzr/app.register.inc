<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Register on WOWCatholic.com</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="/asset/wow/ao.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
	<div class="container-fluid" id="page-header">
		<div class="row">
			HEADER
		</div>
	</div>



	<?php if(!empty($isError)){echo oPrint::neat(array('error' => $isError));}?>
	<form name="registration" id="registration" action="" method="post">
		<div class="container-lg">

			<div class="row">
				<div class="col">
					<input name="username" type="text" id="input" placeholder="username">
				</div>
			</div>

			<div class="row">
				<div class="col">
					<input name="email" type="email" id="input" placeholder="email">
				</div>
			</div>

			<div class="row">
				<div class="col">
					<input name="phone" type="text" id="input" placeholder="phone">
				</div>
			</div>

			<div class="row">
				<div class="col">
					<input name="password" type="password" id="input" placeholder="password">
				</div>
			</div>

			<div class="row">
				<div class="col">
					<select name="religion" id="religion">
						<option value="">I am...</option>
						<option value="catholic">Catholic</option>
						<option value="pentecostal">Pentecostal</option>
						<option value="others">Others</option>
					</select>
				</div>
			</div>


			<div class="row">
				<div class="col">
					<input type="submit" value="Continue">
				</div>
			</div>



		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="/asset/wow/ao.js" type="text/javascript"></script>
</body>
</html>