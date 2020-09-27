		<div class="container-fluid">

			<!-- Page Heading -->
			<h1 class="h3 mb-2 text-gray-800">Staff List</h1>
			<!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

			<!-- DataTales Example -->
			<div class="card shadow mb-4">
			<div class="card-header py-3">
				<P class="m-0 font-weight-bold text-primary"><a href="staff-new" class="odao-navspace">New Staff</a> | <a href="staff-list" class="odao-navspace">View Staff</a></P>
			</div>
			<div class="card-body">
				<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th>Name</th>
						<th>Type</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Status</th>

					</tr>
					</thead>
					<tbody>
<?php
$stafflist = staff::all();
if(!isArrayMulti($stafflist)){?>
					 <tr>
						<td><?php echo $stafflist['surname'].' '.$stafflist['firstname'];?></td>
						<td><?php echo $stafflist['type'];?></td>
						<td><?php echo $stafflist['email'];?></td>
						<td><?php echo $stafflist['phone'];?></td>
						<td><?php echo $stafflist['status'];?></td>
					</tr>
<?php } else {
	foreach ($stafflist as $staff){?>
					<tr>
						<td><?php echo $staff['surname'].' '.$staff['firstname'];?></td>
						<td><?php echo $staff['type'];?></td>
						<td><?php echo $staff['email'];?></td>
						<td><?php echo $staff['phone'];?></td>
						<td><?php echo $staff['status'];?></td>
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