								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Sign In!</h1>
									<?php echo Notify::useDiv($oRecord['msg'], $oRecord['code']);?>
								</div>
								<form name="oForm" id="oForm" action="" method="POST" class="user">
									<div class="form-group"><input type="text" class="form-control o-input-field" name="userid" id="userid" placeholder="UserID" value="<?php echo Form::retainInput('userid');?>" autofocus></div>
									<div class="form-group"><input type="password" class="form-control o-input-field" name="password" id="password" placeholder="Password"></div>
									<div class="form-group"><button type="submit" class="btn btn-primary btn-block o-bottom-button">Login</button></div>
								</form>