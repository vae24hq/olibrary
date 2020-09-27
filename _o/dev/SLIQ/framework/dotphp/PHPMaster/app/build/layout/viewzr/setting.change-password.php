<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-6">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Change Password</h1>
									<?php echo Notify::useDiv($iMedCPassW['msg'], $iMedCPassW['code']);?>
								</div>

<?php if(!Utility::codeIsSuccess($iMedCPassW['code'])){?>
								<form name="oForm" id="oForm" action="" method="POST" class="user">
									<div class="form-group">
									<input type="password" class="form-control" name="currentpassword" id="currentpassword" placeholder="Current Password">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New password">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm new password">
									</div>
									<button type="submit" class="btn btn-primary o-bottom-button">Save Password</button>
								</form>
<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>