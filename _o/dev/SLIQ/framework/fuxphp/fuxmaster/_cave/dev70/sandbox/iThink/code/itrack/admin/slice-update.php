<?php
require_once ('setting.php');

	if(isset($_POST['update'])){
		$track_id = $_POST['track_id'];
		$shipment_date = $_POST['shipment_date'];
		$delivery_date = $_POST['delivery_date'];
		$location = $_POST['location'];
		$weight = stringSwap($_POST['weight'], "'", "\'");
		$shipper_name = stringSwap($_POST['shipper_name'], "'", "\'");
		$receiver_name = stringSwap($_POST['receiver_name'], "'", "\'");
		$shipper_address = stringSwap($_POST['shipper_address'], "'", "\'");
		$receiver_address = stringSwap($_POST['receiver_address'], "'", "\'");
		$origin = stringSwap($_POST['origin'], "'", "\'");
		$destination = stringSwap($_POST['destination'], "'", "\'");
		$service_type = stringSwap($_POST['service_type'], "'", "\'");
		$reference = stringSwap($_POST['reference'], "'", "\'");
		$step_image = stringSwap($_POST['step_image'], "'", "\'");
		$sc1_content = stringSwap($_POST['sc1_content'], "'", "\'");
		$sc2_content = stringSwap($_POST['sc2_content'], "'", "\'");
		$sc3_content = stringSwap($_POST['sc3_content'], "'", "\'");
		$sc4_content = stringSwap($_POST['sc4_content'], "'", "\'");
		$sc5_content = stringSwap($_POST['sc5_content'], "'", "\'");
		$sc6_content = stringSwap($_POST['sc6_content'], "'", "\'");
		$sc7_content = stringSwap($_POST['sc7_content'], "'", "\'");
		$sc1_qty = $_POST['sc1_qty'];
		$sc2_qty = $_POST['sc2_qty'];
		$sc3_qty = $_POST['sc3_qty'];
		$sc4_qty = $_POST['sc4_qty'];
		$sc5_qty = $_POST['sc5_qty'];
		$sc6_qty = $_POST['sc6_qty'];
		$sc7_qty = $_POST['sc7_qty'];
		$message = stringSwap($_POST['message'], "'", "\'");
		$bind = $trackRecord['bind'];


		//update
		$query = "UPDATE `record` ";
		$query .="SET `track_id` = '$track_id', `shipment_date` = '$shipment_date', `delivery_date` = '$delivery_date', `location` = '$location', `weight` = '$weight', `shipper_name` = '$shipper_name', `receiver_name` = '$receiver_name', `shipper_address` = '$shipper_address', `receiver_address` = '$receiver_address', `origin` = '$origin', `destination` = '$destination', `service_type` = '$service_type', `reference` = '$reference', `step_image` = '$step_image', `sc1_content` = '$sc1_content', `sc2_content` = '$sc2_content', `sc3_content` = '$sc3_content', `sc4_content` = '$sc4_content', `sc5_content` = '$sc5_content', `sc6_content` = '$sc6_content', `sc7_content` = '$sc7_content', `sc1_qty` = '$sc1_qty', `sc2_qty` = '$sc2_qty', `sc3_qty` = '$sc3_qty', `sc4_qty` = '$sc4_qty', `sc5_qty` = '$sc5_qty', `sc6_qty` = '$sc6_qty', `sc7_qty` = '$sc7_qty', `message` = '$message'";
		$query .= " WHERE `bind` = '$bind'";

		$result = queryDB($query, 'boolean');
		if($result === FALSE){$location = 'admin.php?link=failed&action=update';}
		else {$location = 'admin.php?link=success&action=update';}
		echo '<meta http-equiv="refresh" content="0; url='.$location.'">';
		exit();
	}
?>


        		<form role="form" action="" name="update" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>Tracking ID</label>
								<input type="text" name="track_id" id="track_id" class="form-control input-lg" placeholder="tracking no" tabindex="1" value="<?php echo $trackRecord['track_id'];?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Shipment Date</label>
								<input type="text" name="shipment_date" id="shipment_date" class="form-control input-lg" placeholder="YYYY-MM-DD HH:MM:SS" tabindex="2" value="<?php echo $trackRecord['shipment_date'];?>">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Delivery Date</label>
								<input type="text" name="delivery_date" id="delivery_date" class="form-control input-lg" placeholder="YYYY-MM-DD HH:MM:SS" tabindex="3" value="<?php echo $trackRecord['delivery_date'];?>">
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Weight</label>
								<input type="text" name="weight" id="weight" class="form-control input-lg" tabindex="4" required value="<?php echo $trackRecord['weight'];?>">
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Location</label>
								<input type="text" name="location" id="location" class="form-control input-lg" tabindex="4" required value="<?php echo $trackRecord['location'];?>">
							</div>
						</div>

					</div>


					<div class="row space-top">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Shipper Name</label>
								<input type="text" name="shipper_name" id="shipper_name" class="form-control input-lg" tabindex="5" value="<?php echo $trackRecord['shipper_name'];?>">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Receiver Name</label>
								<input type="text" name="receiver_name" id="receiver_name" class="form-control input-lg" tabindex="6" value="<?php echo $trackRecord['receiver_name'];?>">
							</div>
						</div>
					</div>


						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Shipper Address</label>
									<textarea class="form-control" rows="5" name="shipper_address" id="shipper_address" tabindex="7"><?php echo $trackRecord['shipper_address'];?></textarea>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Receiver Address</label>
									<textarea class="form-control" rows="5" name="receiver_address" id="receiver_address" tabindex="8"><?php echo $trackRecord['receiver_address'];?></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Origin</label>
									<input type="text" name="origin" id="origin" class="form-control input-lg" value="<?php echo $trackRecord['origin'];?>" tabindex="9">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Destination</label>
									<input type="text" name="destination" id="destination" class="form-control input-lg" value="<?php echo $trackRecord['destination'];?>" tabindex="10">
								</div>
							</div>
						</div>



						<div class="row space-top">
							<div class="col-md-4">
								<div class="form-group">
									<label>Service Type</label>
									<input type="text" name="service_type" id="service_type" class="form-control input-lg" tabindex="11" value="<?php echo $trackRecord['service_type'];?>">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Reference</label>
									<input type="text" name="reference" id="reference" class="form-control input-lg" tabindex="12" value="<?php echo $trackRecord['reference'];?>">
								</div>
							</div>

							<div class="col-md-4">
								<label>Step/Stage</label>
								<select class="form-control" name="step_image" id="step_image" tabindex="12">
									<option value="1" <?php if($trackRecord['step_image'] == 1){echo 'selected';}?>>01 Processing</option>
									<option value="2" <?php if($trackRecord['step_image'] == 2){echo 'selected';}?>>02 In-transit</option>
									<option value="3" <?php if($trackRecord['step_image'] == 3){echo 'selected';}?>>03 On-Hold</option>
									<option value="4" <?php if($trackRecord['step_image'] == 4){echo 'selected';}?>>04 Pick Up</option>
									<option value="5" <?php if($trackRecord['step_image'] == 5){echo 'selected';}?>>05 Delivered</option>
								</select>
							</div>
						</div>

						<div class="row space-top">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 1</label>
									<input type="text" name="sc1_content" id="sc1_content" class="form-control input-lg" tabindex="13" value="<?php echo $trackRecord['sc1_content'];?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc1_qty" id="sc1_qty" class="form-control input-lg" tabindex="14" value="<?php echo $trackRecord['sc1_qty'];?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 2</label>
									<input type="text" name="sc2_content" id="sc2_content" class="form-control input-lg" tabindex="15" value="<?php echo $trackRecord['sc2_content'];?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc2_qty" id="sc2_qty" class="form-control input-lg" tabindex="16" value="<?php echo $trackRecord['sc2_qty'];?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 3</label>
									<input type="text" name="sc3_content" id="sc3_content" class="form-control input-lg" tabindex="17" value="<?php echo $trackRecord['sc3_content'];?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc3_qty" id="sc3_qty" class="form-control input-lg" tabindex="18" value="<?php echo $trackRecord['sc3_qty'];?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 4</label>
									<input type="text" name="sc4_content" id="sc4_content" class="form-control input-lg" tabindex="19" value="<?php echo $trackRecord['sc4_content'];?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc4_qty" id="sc4_qty" class="form-control input-lg" tabindex="20" value="<?php echo $trackRecord['sc4_qty'];?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 5</label>
									<input type="text" name="sc5_content" id="sc5_content" class="form-control input-lg" tabindex="21" value="<?php echo $trackRecord['sc5_content'];?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc5_qty" id="sc5_qty" class="form-control input-lg" tabindex="22" value="<?php echo $trackRecord['sc5_qty'];?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 6</label>
									<input type="text" name="sc6_content" id="sc6_content" class="form-control input-lg" tabindex="23" value="<?php echo $trackRecord['sc6_content'];?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc6_qty" id="sc6_qty" class="form-control input-lg" tabindex="24" value="<?php echo $trackRecord['sc6_qty'];?>">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 7</label>
									<input type="text" name="sc7_content" id="sc7_content" class="form-control input-lg" tabindex="25" value="<?php echo $trackRecord['sc7_content'];?>">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc7_qty" id="sc7_qty" class="form-control input-lg" tabindex="26" value="<?php echo $trackRecord['sc7_qty'];?>">
								</div>
							</div>
						</div>


						<div class="row space-top">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<label>Statement on Parcel</label>
									<textarea class="form-control" rows="7" name="message" id="message" tabindex="27"><?php echo $trackRecord['message'];?></textarea>
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-primary" tabindex="28">Save</button>
						<button type="reset" class="btn btn-default" tabindex="29">Reset</button>
						<input name="update" type="hidden" value="go">

        	</form>

