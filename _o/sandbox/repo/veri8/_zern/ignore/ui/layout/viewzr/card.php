<?php
if(!empty($oRecord['data'])){
	$rowset = $oRecord['data'];
?>

<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">View Card</h6>
      </div>
      <div class="card-body">
        <!-- <div class="offset-md-4 col-md-4 offset-md-4" >
									<img alt="Picture" src="http://thispix.com/wp-content/uploads/2015/06/passport-005.jpg" width="150" height="150">
								</div> -->
        <table id="dataTable" width="100%" cellspacing="0" class="table table-borderedtable-sm table-hover compact branded dataTable cell-border ">
          <tbody>
            <tr>
              <th class="col-md-4">Hospital No:</th>
              <td class="col-md-8"><?php echo $rowset['cardno'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Full Name:</th>
              <td class="col-md-8"><?php echo $rowset['surname'].' '.$rowset['firstname'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Phone Number:</th>
              <td class="col-md-8"><?php echo $rowset['phone'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Date of Birth:</th>
              <td class="col-md-8"><?php echo $rowset['dob'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Sex:</th>
              <td class="col-md-8"><?php echo $rowset['sex'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Tribe:</th>
              <td class="col-md-8"><?php echo $rowset['tribe'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Religion:</th>
              <td class="col-md-8"><?php echo $rowset['religion'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Occupation:</th>
              <td class="col-md-8"><?php echo $rowset['occupation'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Email Address:</th>
              <td class="col-md-8"><?php echo $rowset['email'];?></td>
            </tr>
            <tr>
              <th class="col-md-4">Address:</th>
              <td class="col-md-8"><?php echo nl2br($rowset['address']);?></td>
            </tr>
          </tbody>
        </table>

        <!-- Place for buttons -->
        

      </div>
    </div>
  </div>
</div>
</div>
<?php }?>
