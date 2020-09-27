<?php
require_once ('setting.php');

	if(isset($_POST['create'])){
		$info['track_id'] = $_POST['track_id'];
		$info['shipment_date'] = $_POST['shipment_date'];
		$info['delivery_date'] = $_POST['delivery_date'];
		$info['weight'] = $_POST['weight'];
		$info['shipper_name'] = $_POST['shipper_name'];
		$info['receiver_name'] = $_POST['receiver_name'];
		$info['shipper_address'] = $_POST['shipper_address'];
		$info['receiver_address'] = $_POST['receiver_address'];
		$info['origin'] = $_POST['origin'];
		$info['location'] = $_POST['location'];
		$info['destination'] = $_POST['destination'];
		$info['service_type'] = $_POST['service_type'];
		$info['reference'] = $_POST['reference'];
		$info['step_image'] = $_POST['step_image'];
		$info['sc1_content'] = $_POST['sc1_content'];
		$info['sc2_content'] = $_POST['sc2_content'];
		$info['sc3_content'] = $_POST['sc3_content'];
		$info['sc4_content'] = $_POST['sc4_content'];
		$info['sc5_content'] = $_POST['sc5_content'];
		$info['sc6_content'] = $_POST['sc6_content'];
		$info['sc7_content'] = $_POST['sc7_content'];
		$info['sc1_qty'] = $_POST['sc1_qty'];
		$info['sc2_qty'] = $_POST['sc2_qty'];
		$info['sc3_qty'] = $_POST['sc3_qty'];
		$info['sc4_qty'] = $_POST['sc4_qty'];
		$info['sc5_qty'] = $_POST['sc5_qty'];
		$info['sc6_qty'] = $_POST['sc6_qty'];
		$info['sc7_qty'] = $_POST['sc7_qty'];
		$info['message'] = $_POST['message'];

		if(!empty($_FILES['userfile'])){
			$userFileUp = $_FILES['userfile'];
			if($userFileUp['size'] > 0){
				$uploaddir = '../upload/' . $info['track_id'] . '.jpg';
				$uploadfile = move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir);
				if (!$uploadfile){
					header('Location: admin.php?link=failed&action=upload');
					exit();
				}
				else {
					$info['file'] = $info['track_id'] . '.jpg';
				}
			}
		}
		if(trackingCreate($info)){header('Location: admin.php?link=success&action=create');}
		else {header('Location: admin.php?link=failed&action=create');}
		exit();
	}
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>
		<li class="active">New Tracking</li>
	</ol>
</div><!--/.row-->
<p class="spacer">&nbsp;</p>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">New Tracking Information</div>
        		<form role="form" action="add-tracking.php" name="new" method="post" enctype="multipart/form-data">
				<div class="panel-body">

					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>Tracking ID</label>
								<input type="text" name="track_id" id="track_id" class="form-control input-lg" placeholder="tracking no" tabindex="1" value="<?php echo mt_rand(10,99).date('is').mt_rand(10,99).date('H');?>">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Shipment Date</label>
								<input type="text" name="shipment_date" id="shipment_date" class="form-control input-lg" placeholder="YYYY-MM-DD HH:MM:SS" tabindex="2" value="<?php echo date('Y-m-d H:i:s');?>">
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label>Delivery Date</label>
								<input type="text" name="delivery_date" id="delivery_date" class="form-control input-lg" placeholder="YYYY-MM-DD HH:MM:SS" tabindex="3" value="<?php $delivery = strtotime('+3 days, 14 mins, 21 seconds'); echo date('Y-m-d H:i:s', $delivery);?>">
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Weight</label>
								<input type="text" name="weight" id="weight" class="form-control input-lg" tabindex="4" required>
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label>Location</label>
								<input type="text" name="location" id="location" class="form-control input-lg" tabindex="4" required>
							</div>
						</div>

					</div>


					<div class="row space-top">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Shipper Name</label>
								<input type="text" name="shipper_name" id="shipper_name" class="form-control input-lg" tabindex="5">
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<label>Receiver Name</label>
								<input type="text" name="receiver_name" id="receiver_name" class="form-control input-lg" tabindex="6">
							</div>
						</div>
					</div>


						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Shipper Address</label>
									<textarea class="form-control" rows="5" name="shipper_address" id="shipper_address" tabindex="7"></textarea>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Receiver Address</label>
									<textarea class="form-control" rows="5" name="receiver_address" id="receiver_address" tabindex="8"></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Origin</label>
									<input type="text" name="origin" id="origin" class="form-control input-lg" placeholder="United States" tabindex="9">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6">
								<div class="form-group">
									<label>Destination</label>
									<input type="text" name="destination" id="destination" class="form-control input-lg" placeholder="Canada" tabindex="10">
								</div>
							</div>
						</div>



						<div class="row space-top">
							<div class="col-md-4">
								<div class="form-group">
									<label>Service Type</label>
									<input type="text" name="service_type" id="service_type" class="form-control input-lg" tabindex="11">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Reference</label>
									<input type="text" name="reference" id="reference" class="form-control input-lg" tabindex="12">
								</div>
							</div>

							<div class="col-md-4">
								<label>Step/Stage</label>
								<select class="form-control" name="step_image" id="step_image" tabindex="12">
									<option value="1">01 Processing</option>
									<option value="2">02 In-transit</option>
									<option value="3">03 On-Hold</option>
									<option value="4">04 Pick Up</option>
									<option value="5">05 Delivered</option>
								</select>
							</div>
						</div>


						<div class="row space-top">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 1</label>
									<input type="text" name="sc1_content" id="sc1_content" class="form-control input-lg" tabindex="13">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc1_qty" id="sc1_qty" class="form-control input-lg" tabindex="14">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 2</label>
									<input type="text" name="sc2_content" id="sc2_content" class="form-control input-lg" tabindex="15">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc2_qty" id="sc2_qty" class="form-control input-lg" tabindex="16">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 3</label>
									<input type="text" name="sc3_content" id="sc3_content" class="form-control input-lg" tabindex="17">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc3_qty" id="sc3_qty" class="form-control input-lg" tabindex="18">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 4</label>
									<input type="text" name="sc4_content" id="sc4_content" class="form-control input-lg" tabindex="19">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc4_qty" id="sc4_qty" class="form-control input-lg" tabindex="20">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 5</label>
									<input type="text" name="sc5_content" id="sc5_content" class="form-control input-lg" tabindex="21">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc5_qty" id="sc5_qty" class="form-control input-lg" tabindex="22">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 6</label>
									<input type="text" name="sc6_content" id="sc6_content" class="form-control input-lg" tabindex="23">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc6_qty" id="sc6_qty" class="form-control input-lg" tabindex="24">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label>Content Description 7</label>
									<input type="text" name="sc7_content" id="sc7_content" class="form-control input-lg" tabindex="25">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Quantity</label>
									<input type="text" name="sc7_qty" id="sc7_qty" class="form-control input-lg" tabindex="26">
								</div>
							</div>
						</div>


						<div class="row space-top">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<label>Statement on Parcel</label>
									<textarea class="form-control" rows="7" name="message" id="message" tabindex="27">Your parcel is in transit</textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>File</label>
									<input name="userfile" type="file" id="userfile" tabindex="28">
								</div>
							</div>
						</div>

						<button type="submit" class="btn btn-primary" tabindex="29">Create</button>
						<button type="reset" class="btn btn-default" tabindex="30">Reset</button>
						<input name="create" type="hidden" value="go">

				</div>
        	</form>
			</div>
		</div>
	</div><!--/.row-->
