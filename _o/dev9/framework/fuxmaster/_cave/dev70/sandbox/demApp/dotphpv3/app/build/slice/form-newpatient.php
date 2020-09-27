<form name="NewPatient" id="NewPatient" action="patient-add" method="post">
	<div class="row">
		<div class="col-md-12">
			<h2>Patient Information</h2>
			<hr>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="hospitalno" class="odao-label">Hospital No:</label>
				<input type="text" class="form-control" id="hospitalno" name="hospitalno">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="opdno" class="odao-label">OPD No:</label>
				<input type="text" class="form-control" id="opdno" name="opdno">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group odao-spaceup">
				<label for="surname" class="odao-label">Surname:</label>
				<input type="text" class="form-control" id="surname" name="surname" required>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group odao-spaceup">
				<label for="firstname odao-spaceup" class="odao-label">First Name:</label>
				<input type="text" class="form-control" id="firstname" name="firstname" required>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group odao-spaceup">
				<label for="firstname" class="odao-label">Other Name:</label>
				<input type="text" class="form-control" id="othername" name="othername">
			</div>
		</div>


		<div class="col-md-4 odao-spaceup">
			<div class="form-group">
				<label for="birthday" class="odao-label">Date of Birth:</label>
				<input type="date" class="form-control" id="birthday" name="birthday">
			</div>
		</div>
			<div class="col-md-4">
			<div class="form-group odao-spaceup">
				<label for="phone" class="odao-label">Phone Number:</label>
				<input type="text" class="form-control" id="phone" name="phone">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group odao-spaceup">
				<label for="email" class="odao-label">Email Address:</label>
				<input type="text" class="form-control" id="email" name="email">
			</div>
		</div>

				<div class="col-md-3 odao-spaceup">
			<div class="form-group">
				<span for="sex" class="odao-label">Gender:</span>
				<div class="radio odao-radio-div">
					<label><input type="radio" name="sex" id="sex" value="female"><span class="odao-label odao-radio-label">Female</span></label>
					<label style="margin-left:40px;"><input type="radio" name="sex" id="sex" value="male"><span class="odao-label odao-radio-label">Male</span></label>
				</div>
			</div>
		</div>
		<div class="col-md-3 odao-spaceup">
			<div class="form-group">
				<label for="occupation" class="odao-label">Occupation:</label>
				<input type="text" class="form-control" id="occupation" name="occupation">
			</div>
		</div>
			<div class="col-md-3">
			<div class="form-group odao-spaceup">
				<label for="tribe" class="odao-label">Tribe:</label>
				<input type="text" class="form-control" id="tribe" name="tribe">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group odao-spaceup">
				<label for="religion" class="odao-label">Religion:</label>
				<input type="text" class="form-control" id="religion" name="religion">
			</div>
		</div>


		<div class="col-md-12">
			<div class="form-group odao-spaceup">
				<label for="address" class="odao-label">Address:</label>
        <textarea class="form-control" rows="5" placeholder="Enter ..." id="address" name="address"></textarea>
			</div>
		</div>
	




									




		
		<div class="col-md-6">
			<div class="form-group odao-bottom-button">
				<button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="3">Create Record</button>
				<button type="reset" id="clearBTN" name="clearBTN" class="btn btn-danger odao-button" tabindex="3">Clear Entry</button>
			</div>
		</div>
</div>
</form>