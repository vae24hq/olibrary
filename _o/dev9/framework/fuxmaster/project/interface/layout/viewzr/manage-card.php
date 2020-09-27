<div class="row">
	<div class="col-md-12">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Manage Patient</h6>
		</div>
		<div class="card-body">

			<!-- Begin Search Form -->
			<div class="row">
				<div class="offset-md-3 col-md-6 offset-md-3">
				<form name="oForm" id="oForm" class="o-pad-topbottom" method="post" action="manage-card">
					<div class="input-group">
						<!-- <a href="#"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-refresh fa-sm text-white-50"></i>Refresh</a> -->
						<input type="text" class="form-control bg-light small o-input-field" placeholder="Search for a Patient" aria-label="Search" aria-describedby="basic-addon" name="search">
						<div class="input-group-append">
							<button type="submit" name="submitBTN" class="btn btn-primary"><i class="fas fa-search fa-sm"></i></button>
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
<!--
							<div class="card shadow mb-4">

								<div class="card-header py-3">

								</div>
								<div class="card-body"  id="showTB">
									<div class="table-responsive">
											<table id="dataTable" class="table table-sm table-bordered table-striped branded dataTable cell-border compact order-column" width="100%" role="grid" aria-describedby="dataTable_info" cellspacing="0" data-toggle="table" data-url="ajaxdiv/tonyjson"
											 data-pagination="true" data-page-size="20"
											 data-minimum-count-columns="2" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, ALL]">

													<thead class="thead-dark">
														<tr>
															<th data-field="fullname" data-sortable="true">Name</th>
															<th data-field="recordHospitalNo" data-sortable="true">Hospital No</th>
															<th data-field="recordSex" data-sortable="true">Sex</th>
															<th data-field="mangVisit" data-sortable="true">Appointment</th>
															<th data-field="mangBio" data-sortable="true">Bio Data</th>

														</tr>
													</thead>
											</table>
										</div>

								</div>


							</div>

						</div>


					</div>





				</div> -->
