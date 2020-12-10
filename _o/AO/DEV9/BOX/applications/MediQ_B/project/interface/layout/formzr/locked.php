
				<form id="oForm" name="oForm" class="form-signin" method="POST" action="<?php echo $zernApp->linkTo('oLINK');?>">
					<div class="lock-user">
						<img class="rounded-circle" src="<?php echo ICON;?>user.png">
						<h6><?php echo $activeUser->obtain($names);?></h6>
					</div>

					<?php echo oHTML::notify($auth);?>

					<div class="form-group row">
						<label for="password" class="col-md-3 col-form-label">Password</label>
						<div class="col-md-9">
							<input id="password" name="password" class="form-control" type="password" placeholder="password" tabindex="2" value="System20#">
							<a href="javascript:void(0);" onclick="togglePassword('password');" id="showpassword" class="showpassword"><i class="fas fa-eye"></i></a>
						</div>
					</div>
					<div class="form-group row text-center">
						<div class="col-md-9 offset-md-3">
							<button id="submitBTN" name="submitBTN" class="btn btn-primary btn-block" type="submit" tabindex="3">Login</button>
						</div>
					</div>
					<div class="form-group row text-center">
						<div class="col-md-9 offset-md-3">
							<a href="<?php echo $zernApp->linkTo('login');?>">Login as a different user</a>
						</div>
					</div>
				</form>
