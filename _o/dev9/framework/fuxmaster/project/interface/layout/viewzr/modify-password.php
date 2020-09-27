<div class="row">

	<div class="offset-md-3 col-md-6 offset-md-3">

		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Modify Password</h6>
			</div>
			<div class="card-body">
				<div class="text-center">
					<?php echo Notify::useDiv($oRecord['msg'], $oRecord['code']);?>

					<form name="oForm" id="oForm" class="user" method="post" action="modify-password">
						<div class="form-group">
							<input type="password" class="form-control" name="passwordcurrent" id="passwordcurrent" placeholder="Current Password" value="<?php echo Form::retainInput('passwordcurrent'); ?>">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" placeholder="New Password" value="<?php echo Form::retainInput('password'); ?>">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="passwordconfirm" id="passwordconfirm" placeholder="Confirm New Password" value="<?php echo Form::retainInput('passwordconfirm'); ?>">
						</div>
						<button type="submit" name="submitBTN" class="btn btn-primary o-bottom-button">Save</button>
						<button type="reset" name="submitBTN" class="btn btn-default o-bottom-button">Reset</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>