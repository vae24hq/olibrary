<form name="oForm" id="oForm" action="new-case?card=<?php echo $rowset['puid'];?>" method="POST">

	<div class="form-row">
    <div class="col-md-4 text-right">
      <div class="form-group">
        <label for="name" class="odao-label">Hospital No:</label>
      </div>
    </div>
    <div class="col-md-7">
      <div class="form-group">
        <span class="o-value-block"><?php echo oHelper::dataInfo('cardno', $rowset);?></span>   
	    </div>
	  </div>
	</div>

		<div class="form-row">
    <div class="col-md-4 text-right">
      <div class="form-group">
        <label for="name" class="odao-label">Full Name:</label>
      </div>
    </div>
    <div class="col-md-7">
      <div class="form-group">
        <span class="o-value-block"><?php echo oHelper::dataInfo('surname', $rowset).' '.oHelper::dataInfo('firstname', $rowset).' '.oHelper::dataInfo('othername', $rowset);?></span>   
	    </div>
	  </div>
	</div>


  <div class="form-row">
    <div class="col-md-12">
      <div class="form-group">
        <label for="note" class="odao-label">Note:</label>
        <textarea class="form-control" id="note" name="note" tabindex="11" placeholder="Additional Notes" rows=5><?php echo oInput::retain('note');?></textarea>
      </div>
    </div>
  </div>
  <div class="form-row">
  <div class="col-md-10">
    <div class="form-group odao-bottom-button">
      <button type="submit" name="submitBTN" class="btn btn-primary o-bottom-button" tabindex="12">Open Case</button>
      <button type="reset" name="submitBTN" class="btn btn-default o-bottom-button" tabindex="13">Reset</button>
    </div>
  </div>
  <!-- <div class="offset-col-md-2">
    <div class="form-group odao-bottom-button">
      <button type="submit" name="submitBTN" class="btn btn-danger o-bottom-button" data-dismiss="modal" tabindex="12">Close</button>
    </div>
  </div> -->
</form>
