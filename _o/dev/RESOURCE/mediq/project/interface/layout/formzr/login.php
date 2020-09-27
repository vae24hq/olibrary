
<form id="oForm" name="oForm" class="form-signin" method="POST" action="<?php echo $zernApp->linkTo('oLINK');?>">
			<div class="account-logo"><a href="<?php echo $zernApp->linkTo('index');?>"><img src="<?php echo $zernApp->linkTo(ICON.'icon.png');?>" alt=""></a></div>
			<?php echo oHTML::notify($auth);?>

			<div class="form-group row">
				<label for="userid" class="col-md-3 col-form-label">UserID</label>
				<div class="col-md-9">
					<input id="userid" name="userid" class="form-control" type="text" placeholder="email@address.com" value="<?php echo oInput::retain('userid');?>" autofocus tabindex="1">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-md-3 col-form-label">Password</label>
				<div class="col-md-9">
					<input id="password" name="password" class="form-control" type="password" placeholder="password" tabindex="2">
					<a href="javascript:void(0);" onclick="togglePassword('password');" id="showpassword" class="showpassword"><i class="fa fa-eye"></i></a>
				</div>
			</div>
			<div class="form-group row text-center">
				<div class="col-md-9 offset-md-3">
					<button id="submitBTN" name="submitBTN" class="btn btn-primary btn-block" type="submit" tabindex="3">Login</button>
				</div>
			</div>
		</form>
