
				<div class="container-fluid">

					<!-- Content Row -->
					<div class="row">

						<div class="col-md-12">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Update treatment history
									</h6>
								</div>
								<div class="card-body">
									<form name="PatientHistory" id="PatientHistory" method="post">
										<?php #echo Notify::useDiv($iMedApp['msg'], $iMedApp['code']);?>

									<div class="form-row">
									<div class="col-md-12">
									<table id="dataTable" class="table table-sm table-hover cell-border compact order-column" width="100%" role="grid">

										<tr>
											<th class="col-md-4">CARD</th>
											<td class="col-md-8"><input type="number" class="form-control" id="page" name="page" required tabindex="1"></td>
										</tr>
										<tr>
											<th class="col-md-4">DATE</th>
											<td class="col-md-8"><input type="date" class="form-control" id="date" name="date" tabindex="2"></td>
										</tr>
										<tr>
											<th class="col-md-4">HISTORY & TREATMENT</th>
											<td class="col-md-8"><textarea class="form-control" id="description" name="description" rows="2" tabindex="3" required></textarea></td>
										</tr>
										<tr>
											<th class="col-md-4">FEE</th>
											<td class="col-md-8"><input type="number" class="form-control" id="fee" name="fee" tabindex="4"></td>
										</tr>

									<tbody>
										<tr>
											<td></td>
											<td><button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="5">Save</button></td>
										</tr>
										</tbody>
									</table>
									</div>
									</div>

									</form>


								</div>
							</div>
						</div>
					</div>
