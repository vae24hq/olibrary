<?php if($iMedApp['code'] != 'E401F1' && $iMedApp['code'] != 'E405F1'){
	$iMedRow = ''; 	$iMedHist = '';
	if(!empty($iMedApp['data'])){$iMedRow = $iMedApp['data'];}
	if(!empty($iMedApp['history'])){$iMedHist = $iMedApp['history'];}
	?>
				<div class="container-fluid">

					<!-- Content Row -->
					<div class="row">

						<div class="col-md-12">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Add treatment history
									<?php if($iMedApp['code'] != 'E405F1'){?> for [Hospital No: <?php $hospitalno = record::isCard($_GET['card'], 'hospitalno'); echo $hospitalno['hospitalno'];?>]<?php }?></h6>
								</div>
								<div class="card-body">
									<form name="PatientHistory" id="PatientHistory" method="post">
										<?php echo Notify::useDiv($iMedApp['msg'], $iMedApp['code']);?>

								<?php if($iMedApp['code'] != 'E405F1'){?>
									<div class="form-row">
									<div class="col-md-12">
									<table id="dataTable" class="table table-sm table-hover cell-border compact order-column" width="100%" role="grid">
									<!-- <thead class="thead-dark"> -->
										<tr>
											<th class="col-md-4">CARD</th>
											<td class="col-md-8"><input type="number" class="form-control" id="page" name="page" required tabindex="1"></td>
										</tr>
										<tr>
											<th class="col-md-4">DATE</th>
											<td class="col-md-8"><input type="date" class="form-control" id="date" name="date" tabindex="2"></td>
										</tr>
										<tr>
											<th class="col-md-4">HISTORY & TREATMENT</th>
											<td class="col-md-8"><textarea class="form-control" id="description" name="description" rows="2" tabindex="3" required></textarea></td>
										</tr>
										<tr>
											<th class="col-md-4">FEE</th>
											<td class="col-md-8"><input type="number" class="form-control" id="fee" name="fee" tabindex="4"></td>
										</tr>
									<!-- </thead> -->
									<tbody>
										<tr>
											<td></td>
											<td><button type="submit" id="submitBTN" name="submitBTN" class="btn btn-primary odao-button" tabindex="5">Save</button></td>
										</tr>
										</tbody>
									</table>
									</div>
									</div>

									<?php }?>
									</form>


								</div>
							</div>
						</div>
					</div>









<?php if($iMedHist != 'NO_RECORD'){?>
						<div class="row">
						<div class="col-md-12">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Treatment History</h6>
								</div>
								<div class="card-body">
								<table class="table table-sm table-bordered table-striped branded cell-border table-hover table-condensed" style="width:100%" width="100%">
								<thead class="thead-dark">
									<tr>
										<th>CARD</th>
										<th>DATE</th>
										<th>HISTORY & TREATMENT</th>
										<th class="text-center">FEE</th>
									</tr>
								</thead>
								<tbody>
<?php
	if(Utility::isArrayMulti($iMedHist)){
	foreach ($iMedHist as $iMedHistRow){
?>
									<tr>
										<td><?php echo $iMedHistRow['page'];?></td>
										<td><?php echo $iMedHistRow['date'];?></td>
										<td><?php echo nl2br($iMedHistRow['description']);?></td>
										<td class="text-right"><?php echo Utility::currencyToSymbol('naira').number_format($iMedHistRow['fee']);?></td>
									</tr>
<?php
	}
}
else { ?>
									<tr>
										<td><?php echo $iMedHist['page'];?></td>
										<td><?php echo $iMedHist['date'];?></td>
										<td><?php echo nl2br($iMedHist['description']);?></td>
										<td class="text-right"><?php echo Utility::currencyToSymbol('naira').number_format($iMedHist['fee']);?></td>
									</tr>
<?php }?>
								</tbody>
							</table>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php } // NO HISTORY?>
<?php }
//NO CARD
else {
	Utility::redirect('/record/cards');
}?>