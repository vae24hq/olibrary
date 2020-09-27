<?php 
	$action = 'view'; if(!empty($_GET['action'])){$action = $_GET['action'];}
	$trackBind = ''; if(!empty($_GET['id'])){$trackBind = $_GET['id'];}
	$trackRecord = tracking($trackBind, 'record');

	if($action == 'delete'){
		$file = '../upload/'.$trackRecord['file'];
		if(strlen($trackRecord['file']) != 0 && file_exists($file)){unlink($file);}
		if(!trackingDelete($trackBind)){
			$localtion = '?link=failed&action=delete&id='.$_GET['id'];
			echo '<meta http-equiv="refresh" content="0; url='.$location.'">';
		}
	}
?>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="./"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>
		<li class="active"><?php echo ucfirst($action);?> Record</li>
	</ol>
</div><!--/.row-->
<p class="spacer">&nbsp;</p>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading"><?php echo ucfirst($action);?> Successful</div>
				<div class="panel-body">
       			<p class="text-success">Your previous action <?php if(!empty($action)){echo 'to '.strtolower($action);}?> was successfully completed!</p>
      		</div>
			</div>
		</div>
	</div>