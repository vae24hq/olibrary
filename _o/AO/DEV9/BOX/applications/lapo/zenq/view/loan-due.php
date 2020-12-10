<main class="main">
	<!-- Breadcrumb-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Loans</li>
		<!-- Breadcrumb Menu-->
		<li class="breadcrumb-menu d-md-down-none">
			<div class="btn-group" role="group" aria-label="Button group">
				<a class="btn" href="#">
					<i class="icon-speech"></i>
				</a>
				<a class="btn" href="./">
					<i class="icon-graph"></i>  Dashboard</a>
					<a class="btn" href="./">
						<i class="icon-graph"></i>  Loans
					</a>
					<a class="btn" href="#">
						<i class="icon-settings"></i> Due Loan</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong>Due Loan
									    <small>Open loans that have due schedule dates between selected dates. You can use this page to see loans due today.</small>
									</strong>
								</div>
								<div class="col-sm-12 col-md-12 mt-1">
								    <div class="card">
								        <div class="card-body">
                                            <h3>Date Range</h3>
                                            <form name="loanDueForm" id="loanDueForm" method="POST" action="#URL">
								            <div class="row">
								                <div class="col-md-5">
                                                    <input class="form-control" name="loanStartDate" id="loanStartDate" type="date" placeholder="">
                                                </div>
								                <div class="col-md-2 text-center">
                                                    <h6>To</h6>
                                                </div>
								                <div class="col-md-5">
                                                    <input class="form-control" name="loanEndDate" id="loanEndDate" type="date" placeholder="">
                                                </div>
								            </div>

								            <div class="row">
                                                <div class="col-md-12">
                                                    <input id="include_loan_due" type="checkbox" value="yes">Include due loans with zero pending due amounts
                                                </div>
                                                <div class="col-md-12">
                                                    <input id="include_loan_generated" type="checkbox" value="yes">Include loans where system generated penalty is added between the above dates
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <input type="submit" value="Search!" class="btn btn-success" />
                                                        <input type="reset" value="Reset" class="btn btn-danger ml-2" />
                                                    </div>
                                                </div>
								            </div>
                                            </form>

								        </div>
								    </div>
								</div>

								<div class="card-body">

        						<div class="col-sm-12">
        						    <a href="#" class="btn btn-success mb-1">Export</a>
        							<div class="card">
        								<div class="card-header">
        									<i class="fa fa-align-justify"></i> View all Due Loan</div>
        									<div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <form name="loanSearchForm" id="loanSearchForm" method="POST" action="#URL">
                                                            <input class="form-control" name="search" id="search" type="text" placeholder="Search">
                                                        </form>
                                                    </div>
                                                </div>

        										<table class="table table-responsive-sm table-striped">
        											<thead>
        												<tr>
        													<th>Name</th>
        													<th>Loan</th>
        													<th>Principal</th>
        													<th>Due</th>
        													<th>Paid</th>
        													<th>PastDue</th>
        													<th>Amortization</th>
        													<th>PendingDue</th>
        													<th>NextDue</th>
        													<th>Last Payment</th>
        													<th>Status</th>
        												</tr>
        											</thead>
        											<tbody>
        												<tr>
        													<td>Tony Osawere</td>
        													<td>2,0000</td>
        													<td>5</td>
        													<td>22/2/2020</td>
        													<td>Yes</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>
        													<td>NaN</td>

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
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
