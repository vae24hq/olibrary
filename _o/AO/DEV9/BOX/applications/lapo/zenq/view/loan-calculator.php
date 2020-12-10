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
						<i class="icon-settings"></i>  Loan Calculator</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-sm-10">
							<div class="card">
								<div class="card-header">
									<strong>Loan Calculator</strong>
								</div>
								<div class="card-body">
									<form name="loanForm" id="loanForm" method="POST" action="#URL">
										<div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Loan Product</label>
												<div class="col-md-10">
													<select class="form-control" id="loanProduct" name="loanProduct" type="text">
														<option>Choose Type</option>
														<option value="Bussiness Loan">Business Loan</option>
														<option value="Overseas Worker Loan">Overseas Worker Loan</option>
														<option value="Prisoner Loan">Prisoner Loan</option>
														<option value="Personal Loan">Personal Loan</option>
														<option value="Student Loan">Student Loan</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Borrower</label>
												<div class="col-md-10">
													<select class="form-control" id="loanBorrower" name="loanBorrower" type="text">
														<option>Select Borrower</option>
														<option value="Bussiness Loan"></option>
													</select>
												</div>
											</div>
											<!--breaker header-->
											<div class="row" style="background: #d2d6de;">
												<div class="col-sm-12 m-1 pt-1">
													<h6>Loan Terms (required fields):</h6>
												</div>
											</div>
											<h6 style="color:red;" class="mt-1">Principal:</h6>
											<div class="form-group row mt-2">
												<label for="amount" class="col-md-2 col-form-label">Disbursed By</label>
												<div class="col-md-10">
													<select class="form-control" id="loanDisbursedBy" name="loanDisbursedBy" type="text">
														<option value="Cash">Cash</option>
														<option value="Cheque">Cheque</option>
														<option value="Wire Transfer">Wire Transfer</option>
														<option value="Online Transfer">Online Transfer</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Principal Amount</label>
												<div class="col-md-10">
													<input class="form-control" id="loanPrincipalAmount" name="loanPrincipalAmount" type="text" placeholder="Principal Amount">
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Loan Release Date </label>
												<div class="col-md-10">
													<input class="form-control" id="loanReleaseDate" name="loanReleaseDate" type="date" placeholder="Number of Months">
												</div>
											</div>
											<hr />
											<h6 style="color:red;" class="mt-1">Interest:</h6>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Interest Method </label>
												<div class="col-md-10">
													<select class="form-control" id="loanInterestMethod" name="loanInterestMethod" type="text">
														<option value="Flat Rate">Flat Rate</option>
														<option value="Reducing Balance -Equal Installments">Reducing Balance -Equal Installments</option>
														<option value="Reducing Balance -Equal Principal">Reducing Balance -Equal Principal</option>
														<option value="Interest - Only">Interest - Only</option>
														<option value="Compund Interest">Compund Interest</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Interest Type </label>
												<div class="col-md-4">
													<input type="radio" name="loanInterestType" value="I want Interest to be percentage % based" />
													I want Interest to be percentage % based
												</div>
												<div class="col-md-4">
													<input type="radio" name="loanInterestType" value="I want Interest to be a fixed amount Per Cycle" />
													I want Interest to be a fixed amount Per Cycle
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Loan Interest % </label>
												<div class="col-md-4">
													<input type="text" id="loanInterestType_percent" class="form-control" placeholder="%" />
												</div>
												<div class="col-md-4">
													<select class="form-control" id="loanInterestPerType" name="loanInterestPerType" type="text">
														<option value="Per Day">Per Day</option>
														<option value="Per Week">Per Week</option>
														<option value="Per Month">Per Month</option>
														<option value="Per Year">Per Year</option>
													</select>
												</div>
											</div>
											<hr />

											<h6 style="color:red;" class="mt-1">Duration:</h6>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label"></label>
												<div class="col-md-4">
													<input type="number" class="form-control" placeholder="999" min="1" />
												</div>
												<div class="col-md-4">
													<select class="form-control" id="loanDuration" name="loanDuration" type="text">
														<option value="Days">Days</option>
														<option value="Weeks">Weeks</option>
														<option value="Months">Months</option>
														<option value="Years">Years</option>
													</select>
												</div>
											</div>

											<hr />
											<h6 style="color:red;" class="mt-1">Repayments:</h6>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Repayment Cycle </label>

												<div class="col-md-10">
													<select class="form-control" id="loanRepaymentCycle" name="loanRepaymentCycle" type="text">
														<option value="Daily">Daily</option>
														<option value="Weekly">Weekly</option>
														<option value="BiWeekly">BiWeekly</option>
														<option value="Monthly">Monthly</option>
														<option value="BiMonthly">BiMonthly</option>
														<option value="Quaterly">Quaterly</option>
														<option value="Every 4 months">Every 4 months</option>
														<option value="Semi-Annual">Semi-Annual</option>
														<option value="Yearly">Yearly</option>
														<option value="Lump-Sum">Lump-Sum</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Number of Repayments</label>
												<div class="col-md-10">
													<input type="number" name="loanRepaymentCounter" id="loanRepaymentCounter" class="form-control" placeholder="999" min="1" />
												</div>
											</div>
											<hr />
										</div>
										<!--breaker header-->
										<div class="row" style="background: #d2d6de;">
											<div class="col-sm-12 m-1 pt-1">
												<h6>Advance Settings: Show</h6>
											</div>
										</div>

										<div>
											<h6 style="color:red;" class="mt-1">These are optional fields:</h6>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Decimal Places</label>
												<div class="col-md-10">
													<select class="form-control" id="loanDecimalPlace" type="text">
														<option value="Round off to 2 Decimal Place">Round off to 2 Decimal Place</option>
														<option value="Round off to Integer">Round off to Integer</option>
														<option value="Round off to 1 Decimal Place">Round off to 1 Decimal Place</option>
														<option value="Round up to to 1 Decimal Place">Round up to to 1 Decimal Place</option>
														<option value="Round up to Nearest 10">Round up to Nearest 10</option>
														<option value="Round off to Nearest 100">Round off to Nearest 100</option>
													</select>
													<input type="checkbox" name="loan_roundup_checker" value="yes" />Round Up/Off Interest for all repayments in the loan schedule even if it exceeds total interest of loan.
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Interest Start Date</label>
												<div class="col-md-10">
													<input class="form-control" id="loanInterestStartDate" name="loanInterestStartDate" type="date" placeholder="Interest Start Date" />
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">First Repayment Date</label>
												<div class="col-md-10">
													<input class="form-control" id="loanRepaymentDate" name="loanRepaymentDate" type="date" placeholder="First Repayment Date" />
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">First Repayment Date</label>
												<div class="col-md-10">
													<input class="form-control" id="loanFirstRepaymentDate" name="loanFirstRepaymentDate" type="date" placeholder="First Repayment Date" />

													<input type="checkbox" name="loanCalculateFirstRepayment" value="yes" />Calculate first repayment on pro-rata basis <br />
													<input type="checkbox" name="loanAdjustFirstRepayment" value="yes" />Adjust Fees in first repayment on pro-rata basis <br />
													<input type="checkbox" name="loanDoNotAdjustFirstRepayment" value="yes" />Do not adjust remaining repayments (Flat-Rate and Interest-Only)
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">First Repayment Amount</label>
												<div class="col-md-10">
													<input class="form-control" value="loanFirstRepaymentAmount" id="loanFirstRepaymentAmount" type="text" placeholder="First Repayment Amount" />
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Last Repayment Amount</label>
												<div class="col-md-10">
													<input class="form-control" name="loanLastRepaymentAmount" id="loanLastRepaymentAmount" type="text" placeholder="Last Repayment Amount" />
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Override Maturity Date</label>
												<div class="col-md-10">
													<input class="form-control" value="loanOverrideMaturityDate" id="loanOverrideMaturityDate" type="date" placeholder="Override Maturity Date" />
												</div>
											</div>

											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Override Each Repayment Amount to</label>
												<div class="col-md-10">
													<input class="form-control" value="loanOverrideRepaymentAmountTo" id="loanOverrideRepaymentAmountTo" type="text" placeholder="Repayment Amount" />
												</div>
											</div>

											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Calculate Interest in Each Repayment on Pro-Rata Basis?</label>
												<div class="col-md-10">
													<input id="loan_cal_interest_ammount" name="loan_cal_interest_ammount" type="radio" value="yes" /> Yes
													<input id="loan_cal_interest_ammount" name="loan_cal_interest_ammount" type="radio" value="yes" /> No
												</div>
											</div>

											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">How should Interest be charged in Loan Schedule?</label>
												<div class="col-md-10">
													<select class="form-control" value="loanInterestCharge" id="loanInterestCharge" type="text">
														<option value="charge_interest_normally" >Include interest normally as per Interest Method</option>
														<option value="charge_interest_on_released_date" >Charge All Interest on the Released Date</option>
														<option value="charge_interest_on_first_repayment" >Charge All Interest on the First Repayment</option>
														<option value="charge_interest_on_last_repayment" >Charge All Interest on the Last Repayment</option>
														<option value="do_not_charge_interest_on_last_repayment" >Do Not Charge Interest on the Last Repayment</option>
													</select>
												</div>
											</div>
										</div>
										<hr />

										<input type="submit" name="submit" class="btn btn-danger" value="Calculator" />

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
