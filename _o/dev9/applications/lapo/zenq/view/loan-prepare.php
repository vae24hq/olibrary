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
						<i class="icon-settings"></i>  Loan Prepare Form</a>
					</div>
				</li>
			</ol>
			<div class="container-fluid">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-sm-10">
							<div class="card">
								<div class="card-header">
									<strong>Loan Prepare Form</strong>
								</div>
								<div class="card-body">
									<form name="loanPrepareForm" id="loanPrepareForm" method="POST" action="go.php">
										<div>
											<div class="form-group row">
												<label for="MemberID" class="col-md-2 col-form-label">Borrower (MemberID)</label>
												<div class="col-md-10">
													<input name="MemberID" id="MemberID" type="text" placeholder="Enter your MemberID" value="<?php echo $MemberID;?>" class="form-control" required>
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Loan Product</label>
												<div class="col-md-10">
													<select class="form-control" id="Type" name="Type">
														<option>Choose Type</option>
														<option value="bussiness">Business Loan</option>
														<option value="personal">Personal Loan</option>
														<option value="student">Student Loan</option>
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
													<select class="form-control" id="DisbursedAs" name="DisbursedAs">
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
													<input class="form-control" id="Principal" name="Principal" type="number" placeholder="Principal Amount" value="200000">
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Loan Release Date </label>
												<div class="col-md-10">
													<input class="form-control" id="ReleaseDate" name="ReleaseDate" type="date" placeholder="Date Released" required>
												</div>
											</div>
											<hr />
											<h6 style="color:red;" class="mt-1">Interest:</h6>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Interest Method </label>
												<div class="col-md-10">
													<select class="form-control" id="InterestMethod" name="InterestMethod" type="text">
														<option value="Flat Rate">Flat Rate</option>
														<option value="Reducing Balance -Equal Installments">Reducing Balance -Equal Installments</option>
														<option value="Reducing Balance -Equal Principal">Reducing Balance -Equal Principal</option>
														<option value="Interest - Only" selected>Interest - Only</option>
														<option value="Compund Interest">Compund Interest</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Interest Type </label>
												<div class="col-md-4">
													<input type="radio" name="InterestType" value="I want Interest to be percentage % based" checked>
													I want Interest to be percentage % based
												</div>
												<div class="col-md-4">
													<input type="radio" name="InterestType" value="I want Interest to be a fixed amount Per Cycle">
													I want Interest to be a fixed amount Per Cycle
												</div>
											</div>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Loan Interest % </label>
												<div class="col-md-4">
													<input type="number" id="InterestRate" name="InterestRate" class="form-control" placeholder="%" value="10">
												</div>
												<div class="col-md-4">
													<select class="form-control" id="loanInterestPerType" name="loanInterestPerType" type="text">
														<option value="Per Day">Per Day</option>
														<option value="Per Week">Per Week</option>
														<option value="Per Month">Per Month</option>
														<option value="Per Year" selected>Per Year</option>
													</select>
												</div>
											</div>
											<hr />
											<h6 style="color:red;" class="mt-1">Duration:</h6>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label"></label>
												<div class="col-md-4">
													<input type="number" class="form-control" id="Duration" name="Duration" placeholder="300" min="1" value="10">
												</div>
												<div class="col-md-4">
													<select class="form-control" id="DurationUnit" name="DurationUnit">
														<option value="Days">Days</option>
														<option value="Weeks">Weeks</option>
														<option value="Months" selected>Months</option>
														<option value="Years">Years</option>
													</select>
												</div>
											</div>
											<hr />
											<h6 style="color:red;" class="mt-1">Repayments:</h6>
											<div class="form-group row">
												<label for="interest" class="col-md-2 col-form-label">Repayment Cycle </label>
												<div class="col-md-10">
													<select class="form-control" id="RepaymentCycle" name="RepaymentCycle">
														<option value="Daily">Daily</option>
														<option value="Weekly">Weekly</option>
														<option value="BiWeekly">BiWeekly</option>
														<option value="Monthly" selected>Monthly</option>
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
													<input type="number" name="RepaymentCount" id="RepaymentCount" class="form-control" placeholder="700" min="1" value="10">
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
										<!--breaker header-->
										<div class="row" style="background: #d2d6de;">
											<div class="col-sm-12 m-1 pt-1">
												<h6>Automated Payment: Show</h6>
											</div>
										</div>
										<div>
											<div class="col-sm-12 col-md-12 mt-1">
												<div class="card">
													<div class="card-body">
														<blockquote class="card-bodyquote">
															<p>If you select Yes below, the system will automatically add due payments on the schedule dates for this loan. This is useful if you expect to receive payments on time for this loan. For example, you may have a direct deposit or payroll system which automatically deducts payment from the borrower on the scheduled dates. This will save you time from having to manually add payments on Loandisk on the scheduled dates.</p>
															<p>You can also do a bulk update of all loans with automated payment settings by visiting Admin(top menu) → Loans → Bulk Update Loans with Automated Payments.</p>
														</blockquote>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Add Automatic Payments</label>
												<div class="col-md-10">
													<input id="loan_add_automated" type="radio" name="loan_add_automated" value="No">No
													<input id="loan_add_automated" type="radio" name="loan_add_automated" value="No">Yes<br>
													<small>If you select Yes above, the system will automatically add the due payments on every repayment cycle based on the scheduled dates.</small>
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Time to Post Between</label>
												<div class="col-md-10">
													<select class="form-control" name="loan_payment_posting_period" id="loan_payment_posting_period">
														<option value="0" selected>
															<option value="1">12.01am - 04.00am</option>
															<option value="2">04.01am - 08.00am</option>
															<option value="3">08.01am - 12.00pm</option>
															<option value="4">12.01pm - 04.00pm</option>
															<option value="5">04.01pm - 08.00pm</option>
															<option value="6">08.01pm - 11.59pm</option>
														</select>
													</div>
												</div>
											</div>
											<hr />
											<div class="row" style="background: #d2d6de;">
												<div class="col-sm-12 m-1 pt-1">
													<h6>Loan Fees:</h6>
												</div>
											</div>
											<p>There are no fees in your account. To add fees, please <a href="#">click here.</a></p>
											<hr />
											<div class="row" style="background: #d2d6de;">
												<div class="col-sm-12 m-1 pt-1">
													<h6>Extend Loan After Maturity Until Fully Paid:</h6>
												</div>
											</div>
											<div class="col-sm-12 col-md-12 mt-1">
												<div class="card">
													<div class="card-body">
														<blockquote class="card-bodyquote">
															<p>If you select Yes below, the system will automatically add interest after the maturity date if the loan is not fully paid.
																Please note that if you have setup automated penalties, the After Maturity Date Penalty will not be applicable since the loan will never expire. Only the Late Repayment Penalty will be applied.
																Also, you will not be able to add any payments that are used to adjust the schedule or with manual composition.
															</p>
														</blockquote>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Extend Loan After Maturity</label>
												<div class="col-md-10">
													<input id="loan_extend_load" type="radio" name="loan_extend_load" value="No">No
													<input id="loan_extend_load" type="radio" name="loan_extend_load" value="Yes">Yes
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Interest Option Type</label>
												<div class="col-md-10">
													<input id="loan_interest_option_type" type="radio" name="loan_interest_option_type" value="No">I want Interest to be percentage % based
													<input id="loan_interest_option_type" type="radio" name="loan_interest_option_type" value="Yes">I want Interest to be a fixed amount
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Calculate Interest on</label>
												<div class="col-md-10">
													<select class="form-control" name="loanCalculateInterestOn" id="loanCalculateInterestOn">
														<option value="0" selected></option>
														<option value="1">Overdue Principal Amount</option>
														<option value="2">Overdue (Principal + Interest) Amount</option>
														<option value="3">Overdue (Principal + Interest + Fees) Amount</option>
														<option value="4">Overdue (Principal + Interest + Fees + Penalty) Amount</option>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Loan Interest Rate After Maturity %</label>
												<div class="col-md-10">
													<input class="form-control" id="loanInterestRateAfterMaturity" name="loanInterestRateAfterMaturity" type="text" placeholder="Numbers Or Decimal Only" />
												</div>
											</div>
											<div class="form-group row">
												<label for="amount" class="col-md-2 col-form-label">Recurring Period After Maturity</label>
												<div class="col-md-4">
													<input class="form-control" id="loanRecurringPeriodAfterMaturity" name="loanRecurringPeriodAfterMaturity" type="number" placeholder="Numbers Or Decimal Only" />
												</div>
												<div class="col-md-4">
													<select class="form-control" name="loanRecurringPeriodAfterMaturityType" id="loanRecurringPeriodAfterMaturityType" type="text">
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
												<label for="amount" class="col-md-2 col-form-label">Include Fees After Maturity</label>
												<div class="col-md-10">
													<input id="loan_include_fee" type="radio" name="loan_include_fee" value="No">No
													<input id="loan_include_fee" type="radio" name="loan_include_fee" value="Yes">Yes <br />
													<small>Only Loan Fees that are selected as Charge Same Fee on All Repayments (fixed) or Charge Fee Each Repayment on the Due ... Amount will be added.</small>
												</div>
											</div>
											<hr />
											<div class="row" style="background: #d2d6de;">
												<div class="col-sm-12 m-1 pt-1">
													<h6>Loan Status:</h6>
												</div>
											</div>
											<div class="form-group row mt-2">
												<label for="amount" class="col-md-2 col-form-label">Loan Status</label>
												<div class="col-md-10">
													<select class="form-control" name="loan_status_id" id="loan_status_id">
														<option value="8">Processing</option>
														<option value="1" selected>Open</option>
														<option value="3">Defaulted</option>
														<option value="19">----Credit Counseling</option>
														<option value="20">----Collection Agency</option>
														<option value="13">----Sequestrate</option>
														<option value="12">----Debt Review</option>
														<option value="7">----Fraud</option>
														<option value="11">----Investigation</option>
														<option value="15">----Legal</option>
														<option value="14">----Write-Off</option>
														<option value="9">Denied</option>
														<option value="17">Not Taken Up</option>
													</select>
												</div>
											</div>
											<hr />
											<div class="row" style="background: #d2d6de;">
												<div class="col-sm-12 m-1 pt-1">
													<h6>Other (optional):</h6>
												</div>
											</div>
											<div class="form-group row mt-2">
												<label for="amount" class="col-md-2 col-form-label">Select Generator</label>
												<div class="col-md-10">
													<select class="form-control" name="generator" id="generator">
														<option value="">Select</option>
														<option value=""></option>
													</select>
												</div>
											</div>
											<div class="form-group row mt-2">
												<label for="amount" class="col-md-2 col-form-label">Description</label>
												<div class="col-md-10">
													<textarea class="form-control" id="description" name="description"></textarea>
												</div>
											</div>
											<input type="submit" name="submit" class="btn btn-primary" value="Prepare Loan">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>