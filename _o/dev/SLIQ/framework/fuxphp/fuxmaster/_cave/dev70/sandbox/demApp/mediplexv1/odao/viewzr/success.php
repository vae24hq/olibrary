<?php
$op = 'default';
$opTitle = 'Operation Successful';
$opMsg = 'Your previous operation was successful';

if(!(empty($_GET['op']))){$op = $_GET['op'];}
	if($op == 'staff-added'){
		$opTitle = 'Staff Added';
		$opMsg = 'The staff account has been created successfully <br><a href="staff-list">View Staff List</a>';
	}
	if($op == 'patient-added'){
		$opTitle = 'Patient Added';
		$opMsg = 'The patient record has been created successfully <br><a href="patient-list">View Patient List</a>';
	}
?>
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800"><?php echo $opTitle;?></h1>
					<div class="alert alert-success" role="alert">
						<p><?php echo $opMsg;?></p>
					</div>

				</div>