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
				<a class="btn" href="#"><i class="icon-settings"></i> New Member</a>
			</div>
		</li>
	</ol>

	<div class="container-fluid">
		<div class="animated fadeIn">
			<div class="row">
				<div class="col-sm-10">
					<div class="card">
						<div class="card-header">
							<strong>Add New Member</strong>
						</div>
						<div class="card-body">
							<form name="oForm" id="oForm" method="POST" action="go.php">
								<div class="form-group row">
									<label for="MemberID" class="col-md-2 col-form-label">Member ID</label>
									<div class="col-md-10">
										<input class="form-control" id="MemberID" name="MemberID" type="text" placeholder="Member ID" value="<?php echo mt_rand(100,999);?>" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="FirstName" class="col-md-2 col-form-label">First Name</label>
									<div class="col-md-10">
										<input class="form-control" id="FirstName" name="FirstName"type="text" placeholder="Enter your First Name">
									</div>
								</div>

								<div class="form-group row">
									<label for="LastName" class="col-md-2 col-form-label">Last Name</label>
									<div class="col-md-10">
										<input class="form-control" id="LastName" name="LastName"type="text" placeholder="Enter your Last Name">
									</div>
								</div>

								<div class="form-group row">
									<label for="Email" class="col-md-2 col-form-label">Email Address</label>
									<div class="col-md-10">
										<input class="form-control" id="Email" name="Email" type="email" placeholder="Enter your Email address">
									</div>
								</div>

								<div class="form-group row">
									<label for="Phone" class="col-md-2 col-form-label">Phone Number</label>
									<div class="col-md-10">
										<input class="form-control" id="Phone" name="Phone" type="text" placeholder="Enter your Phone number">
									</div>
								</div>

								<div class="form-group row">
									<label for="Gender" class="col-md-2 col-form-label">Gender</label>
									<div class="col-md-10">
										<select id="Gender" name="Gender" class="form-control">
											<option>Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="DoB" class="col-md-2 col-form-label">Date Of Birth</label>
									<div class="col-md-10">
										<input class="form-control" id="DoB" name="DoB" type="date" placeholder="Date of Birth">
									</div>
								</div>

								<input type="submit" name="submit" class="btn btn-primary" value="Create">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>