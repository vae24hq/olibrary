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
                  				<a class="btn" href="#"><i class="icon-settings"></i> Viewing Loans</a>
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
                  				<div class="col-md-12">
                  					<div class="card">
                  						<div class="card-header">
                  							<i class="fa fa-align-justify"></i> Showing all Loan Payments</div>
                  							<div class="card-body">
                  								<div class="row">

                  									<div class="table-responsive col-md-12">
                  										<table class="col-md-12 table table-sm table-bordered table-hover otable" id="dataTable" width="100%" cellspacing="0">
                  											<thead>
                  												<tr>
                  													<th>Date</th>
                  													<th>Interest</th>
                  													<th>Duration</th>
                  													<th>Principal</th>
                  													<th>Repayment</th>
                  													<th>Payments</th>
                  													<th>Credit</th>
                  													<th>Balance</th>
                  													<th colspan="3">Monthly <small>[INTEREST | PRINCIPAL | TOTAL]</small></th>
                  												</tr>
                  											</thead>
                  											<tbody>
                  												<?php
                  												$loanView = App::lastloan($_GET['MID'], 'Member');
                  												if(!empty($loanView)){?>
                  													<tr>
                  														<td ><?php echo $loanView['ReleaseDate'];?></td>
                  														<td ><?php echo $loanView['InterestRate'];?>%</td>
                  														<td ><?php echo $loanView['Duration'];?> Months</td>
                  														<td align="right"><?php echo '₦'.number_format($loanView['Principal']);?></td>
                  														<td align="right"><?php echo '₦'.number_format($loanView['TotalPayment']);?></td>
                  														<td align="right"><?php echo '₦'.number_format(App::totalLoanPayment() + $loanView['Credit']);?></td>
                  														<td align="right"><?php echo '₦'.number_format($loanView['Credit']);?></td>
                  														<td align="right"><?php echo '₦'.number_format($loanView['TotalPayment'] - (App::totalLoanPayment() + $loanView['Credit']));?></td>
                  														<td align="right"><?php echo '₦'.number_format($loanView['InterestPer']);?></td>
                  														<td align="right"><?php echo '₦'.number_format($loanView['PrincipalPer']);?></td>
                  														<td align="right"><?php echo '₦'.number_format($loanView['TotalPer']);?></td>
                  													</tr>
                  												<?php }?>
                  											</tbody>
                  										</table>
                  									</div>



                  									<div class="table-responsive col-md-6">
                  										<?php if(!empty($loanViewInterests)){?>
                  											<table class="col-md-12 table table-sm table-bordered table-hover otable" id="dataTable" width="100%" cellspacing="0">
                  												<thead>
                  													<tr>
                  														<th>S/N</th>
                  														<th>Date</th>
                  														<th>Transaction ID</th>
                  														<th>Loan ID</th>
                  														<th>Amount</th>
                  														<th>Type</th>
                  														<th>Status</th>
                  													</tr>
                  												</thead>
                  												<tbody>
                  													<?php 
                  													$sn = 0; foreach ($loanViewInterests as $loanViewInterest){$sn++;?>
                  														<tr>
                  															<td align="center" style="width: 5%"><?php echo $sn;?></td>
                  															<td style="width: 15%"><?php echo $loanViewInterest['TransDate'];?></td>
                  															<td style="width: 20%"><?php echo $loanViewInterest['TransID'];?></td>
                  															<td style="width: 20%"><?php echo $loanViewInterest['LoanID'];?></td>
                  															<td style="width: 20%" align="right"><?php echo '₦'.number_format($loanViewInterest['Amount']);?></td>
                  															<td align="center" style="width: 10%" class="text-primary">INTEREST</td>
                  															<td align="center" style="width: 10%" class="text-success">PAID</td>
                  														</tr>
                  													<?php } ?>
                  												</tbody>
                  											</table>
                  										<?php } ?>
                  									</div>


                  									<div class="table-responsive col-md-6">

                  										<?php if(!empty($loanViewPrincipals)){?>
                  											<table class="col-md-12 table table-sm table-bordered table-hover otable" id="dataTable" width="100%" cellspacing="0">
                  												<thead>
                  													<tr>
                  														<th>S/N</th>
                  														<th>Date</th>
                  														<th>Transaction ID</th>
                  														<th>Loan ID</th>
                  														<th>Amount</th>
                  														<th>Type</th>
                  														<th>Status</th>
                  													</tr>
                  												</thead>
                  												<tbody>
                  													<?php $sn = 0; foreach ($loanViewPrincipals as $loanViewPrincipal){$sn++;?>
                  														<tr>
                  															<td align="center" style="width: 5%"><?php echo $sn;?></td>
                  															<td style="width: 15%"><?php echo $loanViewPrincipal['TransDate'];?></td>
                  															<td style="width: 20%"><?php echo $loanViewPrincipal['TransID'];?></td>
                  															<td style="width: 20%"><?php echo $loanViewPrincipal['LoanID'];?></td>
                  															<td style="width: 20%" align="right"><?php echo '₦'.number_format($loanViewPrincipal['Amount']);?></td>
                  															<td align="center" style="width: 10%" class="text-primary">PRINCIPAL</td>
                  															<td align="center" style="width: 10%" class="text-success">PAID</td>
                  														</tr>
                  													<?php }?>
                  												</tbody>
                  											</table>
                  										<?php } ?>
                  									</div>

                  								</div>
                  							</div>
                  						</div>
                  					</div>
                  				</div>
                  			</div>
                  		</div>
                  	</main>