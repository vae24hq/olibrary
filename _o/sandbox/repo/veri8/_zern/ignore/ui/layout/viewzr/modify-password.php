
<div class="container-fluid">

	<!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $fuxApp->title();?></h1> -->
	<div class="row">
		<div class="offset-md-3 col-md-6 offset-md-3">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Modify Password</h6>
				</div>
				<div class="card-body o-pad-side-20">
					<div class="text-center"> <?php echo oHelper::notify($oRecord);?>
						<form id="oForm" class="user" name="oForm" action="modify-password" method="POST">
							<div class="form-group">
								<input id="password" class="form-control" type="password" name="password" placeholder="Your current password" value="" tabindex="1">
							</div>
							<div class="form-group">
								<input id="newpassword" class="form-control" type="password" name="newpassword" placeholder="Your new password" value="" tabindex="2">
							</div>
							<div class="form-group">
								<input id="confirmpassword" class="form-control" type="password" name="confirmpassword" placeholder="Confirm your new password" value="" tabindex="3">
							</div>
							<button id="submitBTN" class="btn btn-primary o-bottom-button" type="submit" name="submitBTN" tabindex="4">Update</button>
							<button id="submitBTN" class="btn btn-default o-bottom-button" type="reset" name="submitBTN" tabindex="5">Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
