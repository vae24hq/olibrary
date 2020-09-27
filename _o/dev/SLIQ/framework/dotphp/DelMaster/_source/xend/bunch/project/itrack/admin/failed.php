<?php 
	$action = ''; if(!empty($_GET['action'])){$action = $_GET['action'];}
	$trackBind = ''; if(!empty($_GET['id'])){$trackBind = $_GET['id'];}
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
				<div class="panel-heading"><?php echo ucfirst($action);?> Failed</div>
				<div class="panel-body">
       			<p class="text-danger">Your previous action <?php if(!empty($action)){echo 'to '.strtolower($action);}?> was not completed!</p>
      		</div>
			</div>
		</div>
	</div>