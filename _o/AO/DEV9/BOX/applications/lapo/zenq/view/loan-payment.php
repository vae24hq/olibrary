        <main class="main">
        	<!-- Breadcrumb-->
        	<ol class="breadcrumb">
        		<li class="breadcrumb-item">Home</li>
        		<li class="breadcrumb-item active">Loans</li>
        		<!-- Breadcrumb Menu-->
        		<li class="breadcrumb-menu d-md-down-none">
        			<div class="btn-group" role="group" aria-label="Button group">
        				<a class="btn" href="#"><i class="icon-speech"></i></a>
        				<a class="btn" href="./"><i class="icon-graph"></i>  Dashboard</a>
        				<a class="btn" href="./"><i class="icon-graph"></i>  Transaction</a>
        				<a class="btn" href="#"><i class="icon-settings"></i>Loan Transaction</a>
        			</div>
        		</li>
        	</ol>
        	<div class="container-fluid">
        		<div class="animated fadeIn">
        			<div class="row">
        				<div class="col-sm-10">
        					<div class="card">
        						<div class="card-header">
        							<strong>Loan Transaction</strong>
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


        								<input type="submit" name="submit" class="btn btn-primary" value="Pay Loan">
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</main>
