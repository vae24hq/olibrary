                  <main class="main">
                  	<!-- Breadcrumb-->
                  	<ol class="breadcrumb">
                  		<li class="breadcrumb-item">Home</li>
                  		<li class="breadcrumb-item active">Dashboard</li>
                  		<!-- Breadcrumb Menu-->
                  		<li class="breadcrumb-menu d-md-down-none">
                  			<div class="btn-group" role="group" aria-label="Button group">
                  				<a class="btn" href="#"><i class="icon-speech"></i></a>
                  				<a class="btn" href="./"><i class="icon-graph"></i> Dashboard</a>
                  				<a class="btn" href="#"><i class="icon-settings"></i> Viewing All Member</a>
                  			</div>
                  		</li>
                  	</ol>
                  	<div class="container-fluid">
                  		<div class="animated fadeIn">
                  			<div class="row">
                  				<div class="col-sm-12">
                  					<div class="card text-white bg-white">
                  						<div class="card-body">
                  							<input class="form-control" id="company" type="text" placeholder="Search for...">
                  							<input type="submit" value="Search" class="mt-3 btn btn-success">
                  						</div>
                  					</div>
                  				</div>
                  				<div class="col-sm-12">
                  					<div class="card">
                  						<div class="card-header">
                  							<i class="fa fa-align-justify"></i> Showing all Member</div>
                  							<div class="card-body">
                  								<div class="table-responsive">
                  									<table class="table table-sm table-bordered table-hover otable" id="dataTable" width="100%" cellspacing="0">
                  										<thead>
                  											<tr>
                  												<th>ID</th>
                  												<th>Name</th>
                  												<th>Email Address</th>
                  												<th>Phone Number</th>
                  												<th>Gender</th>
                  												<th>Savings</th>
                  												<th>Loans</th>
                  												<th colspan="4">MANAGE</th>
                  											</tr>
                  										</thead>
                  										<tbody>
                  											<?php $sn = 0; foreach ($members as $member){$sn++;?>
                  												<tr>
                  													<td align="center" style="width: 7%"><?php echo $member['MemberID'];?></td>
                  													<td style="width: 20%"><?php echo $member['LastName'].' '.$member['FirstName'];?></td>
                  													<td style="width: 20%"><?php echo $member['Email'];?></td>
                  													<td style="width: 10%"><?php echo $member['Phone'];?></td>
                  													<td style="width: 5%"><?php echo $member['Gender'];?></td>
                  													<td align="right"><?php echo '₦'.number_format($member['Savings']);?></td>
                  													<td align="right"><?php echo '₦'.number_format($member['Loans']);?></td>
                  													<td align="center" style="width: 8%">
                  														<a href="./transaction-post.php?MID=<?php echo $member['BIND'];?>" class="btn-sm btn-warning" title="Post Transaction">Transaction</a>
                  													</td>
                  													<td align="center" style="width: 8%">
                  														<a href="./loan-prepare.php?MID=<?php echo $member['BIND'];?>" class="btn-sm btn-primary" title="Prepare Loan">New Loan</a>
                  													</td>
                  													<td align="center" style="width: 8%">
                  														<a href="./loan-payment.php?MID=<?php echo $member['BIND'];?>" class="btn-sm btn-success" title="Prepare Loan">Pay Loan</a>
                  													</td>
                  													<td align="center" style="width: 8%">
                  														<a href="./loan-view.php?MID=<?php echo $member['BIND'];?>" class="btn-sm btn-danger" title="View Loan Payments">View Loan</a>
                  													</td>

                  														<!-- <div class="dropdown">
                  															<a class="btn btn-sm btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  																Action
                  															</a>
                  															<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  																<a class="dropdown-item" href="#">View Savings</a>
                  																<a class="dropdown-item" href="#">View Loans</a>
                  																<a class="dropdown-item" href="#">View Loans Interest</a>
                  																<a class="dropdown-item" href="#">View Dividends</a>
                  																<a class="dropdown-item" href="#">View Profile</a>
                  															</div>
                  														</div> -->
                  													</td>
                  												</tr>
                  											<?php }?>
                  										</tbody>
                  									</table>
                  								</div>
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