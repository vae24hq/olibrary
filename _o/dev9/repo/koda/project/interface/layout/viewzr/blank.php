
								<div class="row">
										<div class="col-sm-12">
												<h4 class="page-title"><?php echo $zernApp->title('oVIEW');?></h4>
										</div>
										<div class="col-sm-12">
<?php if(!file_exists(oRGANIZ.$zernLink.'.php')){?>
											<span class="text-danger"><small>*Organizer [<?php echo $zernLink;?>]</small></span><br>
<?php }?>
											<span class="text-danger"><small>*View [<?php echo $zernApp->view();?>]</small></span>
										</div>
								</div>
