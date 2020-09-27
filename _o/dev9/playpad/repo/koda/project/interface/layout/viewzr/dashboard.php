
								<div class="row">
										<div class="col-sm-12">
												<h4 class="page-title"><?php echo $zernApp->title('oVIEW');?></h4>
										</div>
								</div>


								<div class="row">
										<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
												<div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<h3>98</h3>
								<span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
												</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
												<div class="dash-widget">
														<span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
														<div class="dash-widget-info text-right">
																<h3>1072</h3>
																<span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
														</div>
												</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
												<div class="dash-widget">
														<span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
														<div class="dash-widget-info text-right">
																<h3>72</h3>
																<span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
														</div>
												</div>
										</div>
										<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
												<div class="dash-widget">
														<span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
														<div class="dash-widget-info text-right">
																<h3>618</h3>
																<span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
														</div>
												</div>
										</div>
								</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
								<div class="chart-title">
									<h4>Patient Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>
								<canvas id="linegraph" style="display: block; width: 752px; height: 376px;" width="752" height="376" class="chartjs-render-monitor"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
								<div class="chart-title">
									<h4>Patients In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>
								<canvas id="bargraph" style="display: block; width: 752px; height: 376px;" width="752" height="376" class="chartjs-render-monitor"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										<thead class="d-none">
											<tr>
												<th>Patient Name</th>
												<th>Doctor Name</th>
												<th>Timing</th>
												<th class="text-right">Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
												</td>
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. Cristina Groves</p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p>7.00 PM</p>
												</td>
												<td class="text-right">
													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
												</td>
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. Cristina Groves</p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p>7.00 PM</p>
												</td>
												<td class="text-right">
													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
												</td>
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. Cristina Groves</p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p>7.00 PM</p>
												</td>
												<td class="text-right">
													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
												</td>
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. Cristina Groves</p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p>7.00 PM</p>
												</td>
												<td class="text-right">
													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
												</td>
											</tr>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
												</td>
												<td>
													<h5 class="time-title p-0">Appointment With</h5>
													<p>Dr. Cristina Groves</p>
												</td>
												<td>
													<h5 class="time-title p-0">Timing</h5>
													<p>7.00 PM</p>
												</td>
												<td class="text-right">
													<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
										<div class="col-12 col-md-6 col-lg-4 col-xl-4">
												<div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Doctors</h4>
							</div>
														<div class="card-body">
																<ul class="contact-list">
																		<li>
																				<div class="contact-cont">
																						<div class="float-left user-img m-r-10">
																								<a href="profile.html" title="John Doe"><img src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
																						</div>
																						<div class="contact-info">
																								<span class="contact-name text-ellipsis">John Doe</span>
																								<span class="contact-date">MBBS, MD</span>
																						</div>
																				</div>
																		</li>
																		<li>
																				<div class="contact-cont">
																						<div class="float-left user-img m-r-10">
																								<a href="profile.html" title="Richard Miles"><img src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
																						</div>
																						<div class="contact-info">
																								<span class="contact-name text-ellipsis">Richard Miles</span>
																								<span class="contact-date">MD</span>
																						</div>
																				</div>
																		</li>
																		<li>
																				<div class="contact-cont">
																						<div class="float-left user-img m-r-10">
																								<a href="profile.html" title="John Doe"><img src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
																						</div>
																						<div class="contact-info">
																								<span class="contact-name text-ellipsis">John Doe</span>
																								<span class="contact-date">BMBS</span>
																						</div>
																				</div>
																		</li>
																		<li>
																				<div class="contact-cont">
																						<div class="float-left user-img m-r-10">
																								<a href="profile.html" title="Richard Miles"><img src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
																						</div>
																						<div class="contact-info">
																								<span class="contact-name text-ellipsis">Richard Miles</span>
																								<span class="contact-date">MS, MD</span>
																						</div>
																				</div>
																		</li>
																		<li>
																				<div class="contact-cont">
																						<div class="float-left user-img m-r-10">
																								<a href="profile.html" title="John Doe"><img src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
																						</div>
																						<div class="contact-info">
																								<span class="contact-name text-ellipsis">John Doe</span>
																								<span class="contact-date">MBBS</span>
																						</div>
																				</div>
																		</li>
																		<li>
																				<div class="contact-cont">
																						<div class="float-left user-img m-r-10">
																								<a href="profile.html" title="Richard Miles"><img src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
																						</div>
																						<div class="contact-info">
																								<span class="contact-name text-ellipsis">Richard Miles</span>
																								<span class="contact-date">MBBS, MD</span>
																						</div>
																				</div>
																		</li>
																</ul>
														</div>
														<div class="card-footer text-center bg-white">
																<a href="doctors.html" class="text-muted">View all Doctors</a>
														</div>
												</div>
										</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
											<tr>
												<td>
													<img class="rounded-circle" src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" width="28" height="28">
													<h2>John Doe</h2>
												</td>
												<td>Johndoe21@gmail.com</td>
												<td>+1-202-555-0125</td>
												<td><button class="btn btn-primary btn-primary-one float-right">Fever</button></td>
											</tr>
											<tr>
												<td>
													<img class="rounded-circle" src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" width="28" height="28">
													<h2>Richard</h2>
												</td>
												<td>Richard123@yahoo.com</td>
												<td>202-555-0127</td>
												<td><button class="btn btn-primary btn-primary-two float-right">Cancer</button></td>
											</tr>
											<tr>
												<td>
													<img class="rounded-circle" src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" width="28" height="28">
													<h2>Villiam</h2>
												</td>
												<td>Richard123@yahoo.com</td>
												<td>+1-202-555-0106</td>
												<td><button class="btn btn-primary btn-primary-three float-right">Eye</button></td>
											</tr>
											<tr>
												<td>
													<img class="rounded-circle" src="<?php echo $zernApp->linkTo(ICON.'nouser.jpg');?>" alt="" width="28" height="28">
													<h2>Martin</h2>
												</td>
												<td>Richard123@yahoo.com</td>
												<td>776-2323 89562015</td>
												<td><button class="btn btn-primary btn-primary-four float-right">Fever</button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 col-xl-4">
						<div class="hospital-barchart">
							<h4 class="card-title d-inline-block">Hospital Management</h4>
						</div>
						<div class="bar-chart">
							<div class="legend">
								<div class="item">
									<h4>Level1</h4>
								</div>

								<div class="item">
									<h4>Level2</h4>
								</div>
								<div class="item text-right">
									<h4>Level3</h4>
								</div>
								<div class="item text-right">
									<h4>Level4</h4>
								</div>
							</div>
							<div class="chart clearfix">
								<div class="item">
									<div class="bar">
										<span class="percent">16%</span>
										<div class="item-progress" data-percent="16" style="width: 82.8267px;">
											<span class="title">OPD Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">71%</span>
										<div class="item-progress" data-percent="71" style="width: 367.544px;">
											<span class="title">New Patient</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">82%</span>
										<div class="item-progress" data-percent="82" style="width: 424.487px;">
											<span class="title">Laboratory Test</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">67%</span>
										<div class="item-progress" data-percent="67" style="width: 346.837px;">
											<span class="title">Treatment</span>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="bar">
										<span class="percent">30%</span>
										<div class="item-progress" data-percent="30" style="width: 155.3px;">
											<span class="title">Discharge</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					 </div>
				</div>
