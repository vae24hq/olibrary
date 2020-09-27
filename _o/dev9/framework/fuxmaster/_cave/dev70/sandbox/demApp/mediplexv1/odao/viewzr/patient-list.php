		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800">Patient List</h1>
			<!-- DataTales Example -->
			<div class="card shadow mb-4">
			<div class="card-header py-3">
				<P class="m-0 font-weight-bold text-primary"><a href="patient-new" class="odao-navspace">New Patient</a> | <a href="patient-list" class="odao-navspace">View Patient</a></P>
			</div>
			<div class="card-body">
				<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th class="col-md-4">Name</th>
						<th class="col-md-2">Hospital No</th>
						<th>Email</th>
						<th>Phone</th>
						<th class="col-md-2">Manage</th>

					</tr>
					</thead>
					<tbody>
<?php

if(!isArrayMulti($patientlist)){?>
					 <tr>
						<td><?php echo $patientlist['surname'].' '.$patientlist['firstname'];?></td>
						<td><?php echo $patientlist['hospitalno'];?></td>
						<td><?php echo $patientlist['email'];?></td>
						<td><?php echo $patientlist['phone'];?></td>
						<td>
							<a href="patient-edit?patient=<?php echo $patientlist['bind'];?>" class="btn btn-primary btn-sm active odao-actbtn" role="button" aria-pressed="true" title="Modify"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
							<a href="patient?patient=<?php echo $patientlist['bind'];?>" class="btn btn-success btn-sm active odao-actbtn" role="button" aria-pressed="true" title="Details"><i class="fa fa-address-card" aria-hidden="true"></i></a>
							<a href="patient-delete?patient=<?php echo $patientlist['bind'];?>" class="btn btn-danger btn-sm active odao-actbtn" role="button" aria-pressed="true" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
<?php } else {
	foreach ($patientlist as $patient){?>
					<tr>
						<td><?php echo $patient['surname'].' '.$patient['firstname'];?></td>
						<td><?php echo $patient['hospitalno'];?></td>
						<td><?php echo $patient['email'];?></td>
						<td><?php echo $patient['phone'];?></td>
						<td>
							<a href="patient-edit?patient=<?php echo $patient['bind'];?>" class="btn btn-primary btn-sm active odao-actbtn" role="button" aria-pressed="true" title="Modify"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
							<a href="patient?patient=<?php echo $patient['bind'];?>" class="btn btn-success btn-sm active odao-actbtn" role="button" aria-pressed="true" title="Details"><i class="fa fa-address-card" aria-hidden="true"></i></a>
							<a href="patient-delete?patient=<?php echo $patient['bind'];?>" class="btn btn-danger btn-sm active odao-actbtn" role="button" aria-pressed="true" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr>
<?php }
}
?>
					</tbody>
				</table>
				</div>
			</div>
			</div>

		</div>