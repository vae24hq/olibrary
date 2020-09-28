<form name="oForm" id="oForm" action="update-card?card=<?php echo $rowset['puid'];?>" method="POST">
  <div class="form-row">
    <div class="col-md-6 offset-md-6">
      <div class="form-group">
        <label for="cardno" class="odao-label">Hospital No:</label>
        <input type="text" class="form-control" id="cardno" name="cardno" placeholder="Hospital No" value="<?php if(!empty($rowset['cardno'])){echo $rowset['cardno'];} else {echo oInput::retain('cardno');}?>" tabindex="1" disabled>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="surname" class="odao-label">Surname:</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" value="<?php if(!empty($rowset['surname'])){echo $rowset['surname'];} else {echo oInput::retain('surname');}?>" tabindex="2" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="firstname" class="odao-label">First Name:</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" value="<?php if(!empty($rowset['firstname'])){echo $rowset['firstname'];} else {echo oInput::retain('firstname');}?>" tabindex="3" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="occupation" class="odao-label">Occupation:</label>
        <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation" value="<?php if(!empty($rowset['occupation'])){echo $rowset['occupation'];} else {echo oInput::retain('occupation');}?>" tabindex="4">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="phone" class="odao-label">Phone Number:</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" value="<?php if(!empty($rowset['phone'])){echo $rowset['phone'];} else {echo oInput::retain('phone');}?>" tabindex="5" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="tribe" class="odao-label">Tribe:</label>
        <input type="text" class="form-control" id="tribe" name="tribe" placeholder="Tribe" value="<?php if(!empty($rowset['tribe'])){echo $rowset['tribe'];} else {echo oInput::retain('tribe');}?>" tabindex="6">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="religion" class="odao-label">Religion:</label>
        <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" value="<?php if(!empty($rowset['religion'])){echo $rowset['religion'];} else {echo oInput::retain('religion');}?>" tabindex="7">
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="birthday" class="odao-label">Date of Birth:</label>
        <input type="date" class="form-control" id="dob" name="dob" value="<?php if(!empty($rowset['dob'])){echo $rowset['dob'];} else {echo oInput::retain('dob');}?>" tabindex="8" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="sex" class="odao-label">Sex</label>
        <select id="sex" name="sex" class="form-control" tabindex="9">
          <option hidden selected disabled>Sex</option>
          <?php if(empty($rowset['sex'])){?>
          <option value="F" <?php if(oText::same('F', oInput::retain('sex'))){echo ' selected';}?>>Female</option>
          <option value="M" <?php if(oText::same('M', oInput::retain('sex'))){echo ' selected';}?>>Male</option>
          <?php } else {?>
          <option value="F" <?php if(oText::same('F', $rowset['sex'])){echo ' selected';}?>>Female</option>
          <option value="M" <?php if(oText::same('M', $rowset['sex'])){echo ' selected';}?>>Male</option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="hmo" class="odao-label">HMO</label>
        <select id="hmo" name="hmo" class="form-control" placeholder="HMO" tabindex="10">
          <option hidden selected disabled>Select HMO</option>
          <?php if(empty($rowset['hmo'])){?>
          <option value="nohmo" <?php if(oText::same('nohmo', oInput::retain('hmo'))){echo ' selected';}?>>Not Applicable</option>
          <?php
																$optionHMO = HMO::all();
																if($optionHMO != 'NO_RECORD'){
																	if(oHelper::isArrayMulti($optionHMO)){
																		foreach ($optionHMO as $key => $value){
																			$optionHMO = $value; ?>
          <option value="<?php echo $optionHMO['puid'];?>" <?php if(oText::same($optionHMO['puid'], oInput::retain('hmo'))){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
          <?php	} // close for each
																	} // close multi-dimensional array
															else {?>
          <option value="<?php echo $optionHMO['puid'];?>" <?php if(oText::same($optionHMO['puid'], oInput::retain('hmo'))){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
          <?php	} // close NOT multi-dimensional array
															 } // close No HMO records
															?>
          <?php }

														// Patient has HMO selected

													else {?>
          <option value="nohmo" <?php if(oText::same('nohmo', $rowset['hmo'])){echo ' selected';}?>>Not Applicable</option>
          <?php
																$optionHMO = HMO::all();
																if($optionHMO != 'NO_RECORD'){
																	if(oHelper::isArrayMulti($optionHMO)){
																		foreach ($optionHMO as $key => $value){
																			$optionHMO = $value; ?>
          <option value="<?php echo $optionHMO['puid'];?>" <?php if(oText::same($optionHMO['puid'], $rowset['hmo'])){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
          <?php	} // close for each
																	} // close multi-dimensional array
															else {?>
          <option value="<?php echo $optionHMO['puid'];?>" <?php if(oText::same($optionHMO['puid'], $rowset['hmo'])){echo ' selected';}?>><?php echo $optionHMO['name'];?></option>
          <?php	} // close NOT multi-dimensional array
															 } // close No HMO records
														}	?>
        </select>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="address" class="odao-label">Address:</label>
        <textarea class="form-control" id="address" name="address" tabindex="11" placeholder="Address" rows=5><?php if(!empty(oInput::retain('address'))){echo oInput::retain('address');} else{echo $rowset['address'];}?></textarea>
      </div>
    </div>
  </div>
  <div class="form-row">
  <div class="col-md-10">
    <div class="form-group odao-bottom-button">
      <button type="submit" name="submitBTN" class="btn btn-primary o-bottom-button" tabindex="12">Save</button>
      <button type="reset" name="submitBTN" class="btn btn-default o-bottom-button" tabindex="13">Reset</button>
    </div>
  </div>
  <!-- <div class="offset-col-md-2">
    <div class="form-group odao-bottom-button">
      <button type="submit" name="submitBTN" class="btn btn-danger o-bottom-button" data-dismiss="modal" tabindex="12">Close</button>
    </div>
  </div> -->
</form>
