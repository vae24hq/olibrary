
							<div class="row zern-margin20-bottom">
								<div class="col-md-4">
									<h4 class="page-title"><?php echo $zernApp->title('oVIEW');?></h4>
								</div>

								<div class="col-md-4 text-sm-right">
								<form id="oForm" name="oForm" method="POST" action="<?php echo $zernApp->linkTo('oLINK');?>">
									<div class="zern-searchbox">
										<div class="input-group input-group-sm">
											<input id="keyword" name="keyword" class="form-control" type="text" placeholder="Search" tabindex="2">
											<span class="input-group-append"><button class="btn" type="button" tabindex="3"><i class="fa fa-search"></i></button></span>
										</div>
									</div>
								</form>
								</div>

								<div class="col-md-4 text-lg-right">
									<a href="<?php echo $zernApp->linkTo('setup/fee/create');?>" class="btn btn-primary zern-btn"><i class="fa fa-plus"></i> Create</a>
								</div>
							</div>

<?php

if(!$feesData->hasRecord()){
	echo htmlNoRecord('fee list');
} else {
include oSLICE.'setup.fees.php';
}
?>