<?php
include oBIT.'head.php';
$eHTTP = oHelper::eHTTP(400);
?>

	<div class="o-http-page">
	<div class="container-fluid">

		<!-- 404 Error Text -->
		<div class="text-center">
			<div class="error mx-auto" data-text="404"><?php echo $eHTTP['e'];?></div>
			<p class="lead text-gray-800 mb-5"><?php echo $eHTTP['heading'];?></p>
			<p class="text-gray-500 mb-0"><?php if($eHTTP['e']==400){?>The requested resource <?php if(!empty($eHTTP['uri'])){echo '<strong>['.$eHTTP['uri'].']</strong>';}?> is not allowed on this server.<?php } elseif($eHTTP['e']==404){?>The requested resource <?php if(!empty($eHTTP['uri'])){echo '<strong>['.$eHTTP['uri'].']</strong>';}?> was not found on this server.<?php }
		elseif($eHTTP['e']==403){?>You don't have permission to access the requested resource <?php if(!empty($eHTTP['uri'])){echo '<strong>['.$eHTTP['uri'].']</strong>';}?> on this server<?php }?></p>
			<p><a href="./dashboard">&larr; Back to Dashboard</a></p>
		</div>

	</div>
	</div>

<?php require oBIT.'js.php';?>
