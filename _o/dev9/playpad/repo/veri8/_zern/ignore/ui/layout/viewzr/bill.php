<?php
if(!empty($oRecord['data'])){
	$rowset = $oRecord['data'];
	$rowPatient = $oPatient['data'];
?>

<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Manage Bills</h6>
      </div>
      <div class="card-body">
      	

   <div class="form-row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="name" class="odao-label">Hospital No:</label>
        <span class="o-value-inline"><?php echo oHelper::dataInfo('cardno', $rowPatient);?></span>   
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="name" class="odao-label">Full Name:</label>
        <span class="o-value-inline"><?php echo oHelper::dataInfo('surname', $rowPatient).' '.oHelper::dataInfo('firstname', $rowPatient).' '.oHelper::dataInfo('othername', $rowPatient);?></span> 
	    </div>
	  </div>
	</div>

<div class="col-lg-12"> <?php echo oHelper::notify($oRecord);?> </div>




      	<?php if(!empty($oRecord['data']) && $oRecord['code'] != 'E200A1' && $oRecord['code'] != 'E400A1' && $oRecord['code'] != 'E400A2'){
      		include oSLICE.'datatable.bill.php';
      	}?>      
      </div>
    </div>
  </div>
</div>
</div>
<?php }?>