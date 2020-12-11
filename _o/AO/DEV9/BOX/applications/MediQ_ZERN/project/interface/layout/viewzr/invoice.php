
								<div class="row">
									<div class="col-md-4">
										<h4 class="page-title">Manage <?php echo $zernApp->title('oVIEW');?></h4>
									</div>

									<div class="col-md-4 text-sm-right">
										<div class="zern-searchbox">
											<div class="input-group input-group-sm">
												<input type="text" class="form-control" placeholder="Search">
												<span class="input-group-append"><button class="btn" type="button"><i class="fas fa-search"></i></button></span>
											</div>
										</div>
									</div>

									<div class="col-md-4 text-lg-right">
										<a href="<?php echo $zernApp->linkTo('invoice/create');?>" class="btn btn-primary zern-btn"><i class="fa fa-plus"></i> Create</a>
										<a href="<?php echo $zernApp->linkTo('invoice/create/new-card');?>" class="btn btn-primary zern-btn"><i class="far fa-address-card zern-fa-right"></i> New Card</a>
									</div>
                </div>
