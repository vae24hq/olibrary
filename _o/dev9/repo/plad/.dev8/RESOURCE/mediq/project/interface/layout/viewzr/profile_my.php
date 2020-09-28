

								<div class="row">
									<div class="col-sm-7 col-6">
										<h4 class="page-title"><?php echo $zernApp->title('oVIEW');?></h4>
									</div>

									<div class="col-sm-5 col-6 text-right m-b-30">
										<a href="<?php echo $zernApp->linkTo('profile/update');?>" class="btn btn-primary zern-btn"><i class="fas fa-user-edit zern-fa-right"></i> Update <span class="d-none d-md-inline">Profile</span></a>
									</div>

                </div>


								<div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <img class="avatar" src="<?php echo $zernApp->linkTo(oIMG::DP());?>" alt="">
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h4 class="user-name m-t-0 mb-0"><?php $names = array('surname', 'firstname', 'othername'); printInfo($activeUser->obtain($names), '-');?></h4>
                                                <small class="text-muted"><?php printInfo($activeUser->obtain('type'), '-');?></small>
                                                <div class="staff-id">Employee ID : <?php printInfo($activeUser->obtain('id'), '-');?></div>
                                                <!-- <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><?php printInfo($activeUser->obtain('phone'), '-');?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><?php printInfo($activeUser->obtain('email'), '-');?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birth Date:</span>
                                                    <span class="text"><?php printInfo($activeUser->obtain('dob'), '-');?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?php printInfo($activeUser->obtain('address'), '-');?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text"><?php printInfo($activeUser->obtain('sex'),'-');?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>