
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
								<P class="m-0 font-weight-bold text-primary"><a href="patient-new" class="odao-navspace">Patient Card</a></P>
							</div>
	 						<div class="card-body">
							<div class="form-group" style="margin-left: 12em;">
								<img alt="Picture" src="/asset/faithmediplex.jpg" width="100" height="100"
									style="float: left; margin-right: 1em; margin-bottom: .5em;">

								<h1>FAITH MEDIPLEX HOSPITAL</h1>
								<address><i> 1, Giwa-Amu/Airport Road, P.O Box 4807, Benin City, Edo State, Nigeria.</i> </address>
								<br>
							</div>
							<h4 style="text-align:center;">HOSPITAL CARD</h4>
							<hr>
							<div class="row">
								<div class="col-md-8">
									<label>Full name:</label>
									<span class="col-md-8" style="display:inline-block; border-bottom:1px solid #c8c9d5;"><?php echo $iMedRow['surname'].' '.$iMedRow['firstname'].' '.$iMedRow['othername'];?></span>
								</div>

								<div class="col-md-4">
									<label>Sex:</label>
									<span class="col-md-8" style="display:inline-block; border-bottom:1px solid #c8c9d5;"><?php echo $iMedRow['sex'];?></span>
								</div>
							</div>

							<div class="row o-pad-top">
								<div class="col-md-8">
									<label>Hospital No:</label>
									<span class="col-md-8" style="display:inline-block; border-bottom:1px solid #c8c9d5;"><?php echo $iMedRow['hospitalno'];?></span>
								</div>

								<div class="col-md-4">
									<label>Birth Date:</label>
									<span class="col-md-8" style="display:inline-block; border-bottom:1px solid #c8c9d5;"><?php echo $iMedRow['birthdate'];?></span>
								</div>
							</div>
							<div class="o-bottom-button"></div>


							<table class="table table-sm table-bordered table-striped branded cell-border table-hover table-condensed" style="width:100%" width="100%">
								<thead class="thead-dark">
									<tr>
										<th class="col-md-3">DATE</th>
										<th class="col-md-8">HISTORY & TREATMENT</th>
										<th class="col-md-2 text-center">FEE</th>
									</tr>
								</thead>
								<tbody>
<?php if($iMedHist != 'NO_RECORD'){
	if(Utility::isArrayMulti($iMedHist)){
	foreach ($iMedHist as $iMedHistRow){
?>
									<tr>
										<td><?php echo $iMedHistRow['date'];?></td>
										<td><?php echo nl2br($iMedHistRow['description']);?></td>
										<td class="text-right"><?php echo Utility::currencyToSymbol('naira').number_format($iMedHistRow['fee']);?></td>
									</tr>
<?php
	}
}
else { ?>
									<tr>
										<td><?php echo $iMedHist['date'];?></td>
										<td><?php echo nl2br($iMedHist['description']);?></td>
										<td class="text-right"><?php echo Utility::currencyToSymbol('naira').number_format($iMedHist['fee']);?></td>
									</tr>
<?php }
}?>
								</tbody>
							</table>



											</form>
										</div>
							</div>

					</div>


		</div>

</div>
<?php } else {
Utility::redirect('/record/cards');
}?>
