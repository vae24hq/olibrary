<?php 
	$action = 'view'; if(!empty($_GET['action'])){$action = $_GET['action'];}
	$trackBind = ''; if(!empty($_GET['id'])){$trackBind = $_GET['id'];}
	$trackRecord = tracking($trackBind, 'record');
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
				<div class="panel-heading"><?php echo ucfirst($action);?></div>
				<div class="panel-body">
				<?php include ('slice-'.strtolower($action).'.php');?>
				</div>
			</div>
		</div>
	</div>