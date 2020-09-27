<?php
$e = '404';
if(!empty($_GET['e'])){$e = $_GET['e'];}
$uri = $_SERVER['REQUEST_URI'];
if(!empty($_GET['uri'])){$uri = $_GET['uri'];}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php if($e==404){echo 'Not Found';} elseif($e==403){echo 'Forbidden';}?></title>
</head>
<body>
<h1><?php if($e==404){echo 'Not Found';} elseif($e==403){echo 'Forbidden';}?></h1>
<p>
<?php if($e==404 || $e==4042){?>The requested URL <strong>[<?php echo $uri;?>]</strong> was not found on this server.
<?php } elseif($e==403){?>You don't have permission to access <strong>[<?php echo $uri;?>]</strong> on this server<?php }?></p>
<p>Please <a href="/">click here</a></p>

</body>
</html>