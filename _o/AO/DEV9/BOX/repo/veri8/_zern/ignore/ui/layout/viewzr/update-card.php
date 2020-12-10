<?php
if(!empty($oRecord['data'])){
	$rowset = $oRecord['data'];
?>

<div class="container-fluid">
<div class="row">
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Update Card</h6>
      </div>
      <div class="card-body">
      	<div class="col-lg-12"> <?php echo oHelper::notify($oRecord);?> </div>

      	<?php if($oRecord['code'] != 'E200A1' && $oRecord['code'] != 'E400A1' && empty($_GET['act'])){include oSLICE.'update.card.php';}?>      
        

      </div>
    </div>
  </div>
</div>
</div>
<?php }?>