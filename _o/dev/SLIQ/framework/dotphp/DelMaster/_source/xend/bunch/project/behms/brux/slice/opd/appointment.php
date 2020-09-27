
						<div class="col-lg-12 col-md-12 col-sm-12">
								<div class="card">
										<div class="header">
												<h2> New Appointment List <small>Description text here...</small> </h2>
												<ul class="header-dropdown">
														<li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
																<ul class="dropdown-menu float-right">
																		<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
																		<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
																		<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
																</ul>
														</li>
												</ul>
										</div>
										<div class="body">
												<div class="table-responsive">
														<table class="table table-striped">
																<thead>
																<tr>
																		<th>#</th>
																		<th>First Name</th>
																		<th>Last Name</th>
																		<th>Card No</th>
																		<th>Department</th>
																		<th>Diseases</th>
																</tr>
																</thead>
																<tbody>
						<?php
								$record = appointment::listNew();
								$id = 0;
									if(!isArrayMulti($record)){
										$id = $id+1;
										$filta['ruid'] = $record['patient'];
										$info = patient::info($filta);
						?>
																<tr>
																	<td><?php echo $id;?></td>
																	<td><?php echo $info['firstname'];?></td>
																	<td><?php echo $info['lastname'];?></td>
																	<td><?php echo $info['cardno'];?></td>
																	<td><?php echo strtoupper($record['odepartment']);?></td>
																	<td><span class="label label-danger">Fever</span></td>
																</tr>
					<?php } else {
						foreach ($record as $row){
										$id = $id+1;
										$filta['ruid'] = $row['patient'];
										$info = patient::info($filta);
							?>
																<tr>
																	<td><?php echo $id;?></td>
																	<td><?php echo $info['firstname'];?></td>
																	<td><?php echo $info['lastname'];?></td>
																	<td><?php echo $info['cardno'];?></td>
																	<td><?php echo strtoupper($row['odepartment']);?></td>
																	<td><span class="label label-danger">Fever</span></td>
																</tr>
					<?php } }?>

																</tbody>
														</table>
												</div>
										</div>
								</div>
						</div>
