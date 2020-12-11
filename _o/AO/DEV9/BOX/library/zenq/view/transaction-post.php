        <main class="main">
        	<!-- Breadcrumb-->
        	<ol class="breadcrumb">
        		<li class="breadcrumb-item">Home</li>
        		<li class="breadcrumb-item active">Transaction</li>
        		<!-- Breadcrumb Menu-->
        		<li class="breadcrumb-menu d-md-down-none">
        			<div class="btn-group" role="group" aria-label="Button group">
        				<a class="btn" href="#"><i class="icon-speech"></i></a>
        				<a class="btn" href="./"><i class="icon-graph"></i>  Dashboard</a>
        				<a class="btn" href="./"><i class="icon-graph"></i>  Transaction</a>
        				<a class="btn" href="#"><i class="icon-settings"></i> Post Transaction</a>
        			</div>
        		</li>
        	</ol>
        	<div class="container-fluid">
        		<div class="animated fadeIn">
        			<div class="row">
        				<div class="col-sm-10">
        					<div class="card">
        						<div class="card-header">
        							<strong>Post Transaction</strong>
        						</div>
        						<div class="card-body">
        							<form name="transactionForm" id="transactionForm"  class="oform" method="POST" action="go.php">
        								<div class="form-group row">
        									<label for="MemberID" class="col-md-2 col-form-label">Member ID</label>
        									<div class="col-md-10">
        										<input name="MemberID" id="MemberID" type="text" placeholder="Enter your MemberID" value="<?php echo $MemberID;?>" class="form-control" required>
        									</div>

        								</div>

        								<div class="form-group row">
        									<label for="company" class="col-md-2 col-form-label">Transaction Type</label>
        									<div class="col-md-10">
        										<select name="transactionType" name="transactionType" class="form-control">
        											<option>Select Type</option>
        											<option value="savings">Savings</option>
        											<option value="withdrawal">Withdrawal</option>
        										</select>
        									</div>
        								</div>
        								<div class="form-group row">
        									<label for="street" class="col-md-2 col-form-label">Amount</label>
        									<div class="col-md-10">
        										<input class="form-control" id="transactionAmount" name="transactionAmount" type="number" placeholder="Amount">
        									</div>
        								</div>
        								<div class="form-group row">
        									<label for="city" class="col-md-2 col-form-label">Date</label>
        									<div class="col-md-10">
        										<input class="form-control" id="transactionDate" name="transactionDate" type="date" placeholder="date">
        									</div>
        								</div>


        								<input type="submit" name="submit" class="btn btn-primary" value="Post Transaction">
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</main>
