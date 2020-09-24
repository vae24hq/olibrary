

<div class="col-md-8">
<form id="oForm" name="oForm" class="form-signin" method="POST" action="<?php echo $zernApp->linkTo('oLINK');?>">

<?php echo oHTML::notify($pw);?>

<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label for="password">Current password</label>
			<input id="password" name="password" class="form-control" type="password" placeholder="" tabindex="1">
			<a href="javascript:void(0);" onclick="togglePassword('password');" id="showpassword" class="showpassword"><i class="fa fa-eye"></i></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>New password</label>
			<input id="newpassword" name="newpassword" class="form-control" type="password" placeholder="" tabindex="2">
			<a href="javascript:void(0);" onclick="togglePassword('newpassword');" id="shownewpassword" class="showpassword"><i class="fa fa-eye"></i></a>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>Confirm password</label>
			<input id="confirmpassword" name="confirmpassword" class="form-control" type="password" placeholder="" tabindex="3">
			<a href="javascript:void(0);" onclick="togglePassword('confirmpassword');" id="showconfirmpassword" class="showpassword"><i class="fa fa-eye"></i></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 text-center m-t-20">
		<button id="submitBTN" name="submitBTN" class="btn btn-primary zern-btn" type="submit" tabindex="4">Update</button>
		<button id="clearBTN" name="clearBTN" class="btn btn-light zern-btn" type="reset" tabindex="5">Reset</button>
	</div>
</div>
</form>
</div>
