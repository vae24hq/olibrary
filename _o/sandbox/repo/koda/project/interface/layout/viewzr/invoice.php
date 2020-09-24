
								<div class="row">
									<div class="col-md-4">
										<h4 class="page-title">Manage <?php echo $zernApp->title('oVIEW');?></h4>
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
										<a href="<?php echo $zernApp->linkTo('fee-setup/create');?>" class="btn btn-primary zern-btn"><i class="fa fa-plus"></i> Create</a>
										<a href="<?php echo $zernApp->linkTo('invoice/create/new-card');?>" class="btn btn-primary zern-btn"><i class="fa fa-address-card zern-fa-right"></i> New Card</a>
									</div>
								</div>
