<main class="main">
	<!-- Breadcrumb-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Dashboard</li>
		<!-- Breadcrumb Menu-->
		<li class="breadcrumb-menu d-md-down-none">
			<div class="btn-group" role="group" aria-label="Button group">
				<a class="btn" href="#">
					<i class="icon-speech"></i>
				</a>
				<a class="btn" href="./">
					<i class="icon-graph"></i>  Dashboard</a>
					<a class="btn" href="#">
						<i class="icon-settings"></i>  Report</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-4">
											<div class="row">
												<div class="col-md-2">
													<img src="assets/users/pp.jpg" class="img-circle" style="width:150px; height: 50px;" />
												</div>
												<div class="col-md-10">
													<h4>Full Name</h4>
													<h6>Group Name</h6>
													<h6>Gender,Years</h6>
												</div>
												<div class="col-md-12">
													<a href="#" class="btn btn-success">View All Loans</a>
													<a href="#" class="btn btn-primary">View All Savings</a>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="row">
												<div class="col-md-10">
													<h4>Address Details</h4>
													<h6>Address</h6>
													<h6>City</h6>
													<h6>Province</h6>
													<h6>Zip Code</h6>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="row">
												<div class="col-md-10">
													<h4>Contact Details</h4>
													<h6>Landline</h6>
													<h6>Email</h6>
													<h6>Phone Number</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="card text-white bg-white">
								<div class="card-body">
									<div class="form-group row ml-2">
										<input class="col-md-6 form-control" id="" type="text" placeholder="Search for...">
										<div class="col-md-2">
											<input type="submit" value="Search" class="btn btn-success form-control" />
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<table class="table table-responsive-sm table-striped">
										<thead>
											<tr>
												<th>Name</th>
												<th>Released</th>
												<th>Maturity</th>
												<th>Repayment</th>
												<th>Principal</th>
												<th>Fees</th>
												<th>Penality</th>
												<th>Due</th>
												<th>Paid</th>
												<th>Balance</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Stephen Osawaru </td>
												<td>10/03/2020 </td>
												<td>10/03/2020 </td>
												<td>Monthly</td>
												<td>2,000<br />@20% per Year</td>
												<td>300</td>
												<td>0</td>
												<td>2,500</td>
												<td>2,300</td>
												<td>400</td>
												<td><span class="badge badge-success">Open</span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-4">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active show" data-toggle="tab" href="#repayment" role="tab" aria-controls="home" aria-selected="true">Repayment</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#loan_term" role="tab" aria-controls="profile" aria-selected="false">Loan Terms</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#loan_schedule" role="tab" aria-controls="messages" aria-selected="false">Loan Schedule</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#loan_collateral" role="tab" aria-controls="messages" aria-selected="false">Loan Collateral</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#loan_files" role="tab" aria-controls="messages" aria-selected="false">Loan Files</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#loan_comments" role="tab" aria-controls="messages" aria-selected="false">Loan Comments</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active show" id="repayment" role="tabpanel">
									<!---Fill it up-->
									<div class="col-sm-12">
										<a href="member-transaction.php" class="btn btn-primary mb-4">Add Repayment</a>
										<div class="card">
											<h6>Search Found 5 Results</h6>
											<div class="card-body">
												<table class="table table-responsive-sm table-striped">
													<thead>
														<tr>
															<th>Name</th>
															<th>Loan</th>
															<th>Method</th>
															<th>Collected By</th>
															<th>Collection Date</th>
															<th>Paid Amount</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Stephen Osawaru </td>
															<td>a1000001 </td>
															<td>cash</td>
															<td>Jake Copeland</td>
															<td>01/2/2020</td>
															<td>540</td>
															<td><a href="#">Edit</a> || <a href="#">Delete</a></td>
														</tr>
														<tr>
															<td>Stephen Osawaru </td>
															<td>a1000001 </td>
															<td>cash</td>
															<td>Jake Copeland</td>
															<td>01/2/2020</td>
															<td>540</td>
															<td><a href="#">Edit</a> || <a href="#">Delete</a></td>
														</tr>
													</tbody>
												</table>
												<ul class="pagination">
													<li class="page-item">
														<a class="page-link" href="#">Prev</a>
													</li>
													<li class="page-item active">
														<a class="page-link" href="#">1</a>
													</li>
													<li class="page-item">
														<a class="page-link" href="#">2</a>
													</li>
													<li class="page-item">
														<a class="page-link" href="#">3</a>
													</li>
													<li class="page-item">
														<a class="page-link" href="#">4</a>
													</li>
													<li class="page-item">
														<a class="page-link" href="#">Next</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="loan_term" role="tabpanel">
									<!---Fill it up-->
									<h3>Loan Terms</h3>
								</div>
								<div class="tab-pane" id="loan_schedule" role="tabpanel">
									<!---Fill it up-->
									<h3>Loan Schedule</h3>
								</div>
								<div class="tab-pane" id="loan_collateral" role="tabpanel">
									<!---Fill it up-->
									<h3>Loan Collateral</h3>
								</div>
								<div class="tab-pane" id="loan_files" role="tabpanel">
									<!---Fill it up-->
									<h3>Loan Files</h3>
								</div>
								<div class="tab-pane" id="loan_comments" role="tabpanel">
									<!---Fill it up-->
									<h3>Loan Comments</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
