
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Search Patient</h6>
				</div>
				<div class="card-body">

					<!-- Begin Search Form -->
					<div class="row">
						<div class="offset-md-3 col-md-6 offset-md-3">
							<form name="oForm" id="oForm" class="o-pad-topbottom" method="post" action="cards">
								<div class="input-group">
									<input id="search" type="text" class="form-control bg-light small o-input-field" name="search" placeholder="Search for a Patient" aria-label="Search" aria-describedby="basic-addon" value="<?php echo oInput::retain('search', 'request');?>" tabindex="2">
									<div class="input-group-append">
										<button id="submitBTN" class="btn btn-primary" type="submit" name="submitBTN" tabindex="3"><i class="fas fa-search fa-sm"></i></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- 	End Search Form -->

					<!-- Begin Search Result -->
					<div class="row">
						<div class="col-md-12 o-pad-topbottom">
							<?php include oSLICE.'datatable.cards.php';?>
						</div>
					</div>
					<!-- End Search Result -->

				</div>
			</div>
		</div>
	</div>
</div>

