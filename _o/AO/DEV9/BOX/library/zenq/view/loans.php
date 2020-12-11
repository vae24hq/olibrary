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
        					<a class="btn" href="#">
        						<i class="icon-settings"></i>  View All Loans</a>
        					</div>
        				</li>
        			</ol>
        			<div class="container-fluid">
        				<div class="animated fadeIn">
        					<div class="row">
        						<div class="col-sm-12">
        							<div class="card text-white bg-white">
        								<div class="card-body">
        								    <form name="loanSearchForm" id="loanSearchForm" method="POST" action="#URL">
        									<input class="form-control" name="search" id="search" type="text" placeholder="Search for...">
        									<input type="submit" value="Search" class="mt-3 btn btn-success" />
                                            </form>
        								</div>
        							</div>
        						</div>
        						<div class="col-sm-12">
        							<div class="card">
        								<div class="card-header">
        									<i class="fa fa-align-justify"></i> View all Loans</div>
        									<div class="card-body">
        										<table class="table table-responsive-sm table-striped">
        											<thead>
        												<tr>
        													<th>Members ID</th>
        													<th>Account Name</th>
        													<th>Amount</th>
        													<th>Interest</th>
        													<th>Duration</th>
        													<th>Date</th>
        												</tr>
        											</thead>
        											<tbody>
        												<tr>
        													<td>
        														<a href="member.php">
        															223231122
        														</a>
        													</td>
        													<td>Nosakhare A.E Zionnite</td>
        													<td>50,000.00 NGN</td>
        													<td>10%</td>
        													<td>4 Months</td>
        													<td>22/2/2020</td>
        												</tr>
        												<tr>
        													<td>
        														<a href="member.php">
        															0122018827
        														</a>
        													</td>
        													<td>Tony Osawere</td>
        													<td>50,000.00 NGN</td>
        													<td>10%</td>
        													<td>4 Months</td>
        													<td>22/2/2020</td>
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
        			</main>
