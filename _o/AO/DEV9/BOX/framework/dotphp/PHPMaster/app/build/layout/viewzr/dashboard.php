
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
					</div>

					<!-- Content Row -->
					<div class="row">

						<!-- Earnings (Today) Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Card Entered</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo record::countCard(user::active('puid'));?></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Earnings (Monthly) Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-success shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Today's Card Entered</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo record::countCard(user::active('puid'), 'page', 'today');?></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Earnings (Annual) Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-info shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Patients Registered</div>
											<div class="row no-gutters align-items-center">
												<div class="col-auto">
													<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo record::countCard(user::active('puid'), 'patient');?></div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>

						<!-- Grand Total Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-warning shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Earnings</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">
											<?php
												$total =  record::countCard(user::active('puid'));
												$totalAmt = 250 * $total;
												$totalAmt = number_format($totalAmt);
												echo Utility::currencyToSymbol('naira').$totalAmt;
											?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					 <div class="row">

						<!-- Area Chart -->


						<!-- Pie Chart -->

					</div>


				</div>
