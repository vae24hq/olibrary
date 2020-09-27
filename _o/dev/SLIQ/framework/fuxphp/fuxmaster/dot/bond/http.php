<?php $eHTTP = Helper::eHTTP();?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $eHTTP['title'];?></title>
</head>
<body>
	<h1><?php echo $eHTTP['heading'];?></h1>
	<p>
		<?php if($eHTTP['e']==404){?>The requested resource <?php if(!empty($eHTTP['uri'])){echo '<strong>['.$eHTTP['uri'].']</strong>';}?> was not found on this server.<?php }
		elseif($eHTTP['e']==403){?>You don't have permission to access the requested resource <?php if(!empty($eHTTP['uri'])){echo '<strong>['.$eHTTP['uri'].']</strong>';}?> on this server<?php }?>
	</p>
	<p>Please <a href="/">click here</a> to continue</p>
</body>
</html>
<?php exit;?>
