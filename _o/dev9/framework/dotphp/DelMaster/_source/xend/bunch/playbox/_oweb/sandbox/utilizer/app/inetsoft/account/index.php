<?php 
require_once('../core.php'); require_once('isauthorized.php'); $clientStatus = client('status');?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>iNetSoft - <?php echo firm('bname');?></title>
  <link rel="stylesheet" type="text/css" href="../source/inetsoft.css">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
<?php if ($clientStatus == 'active'){
include ('slice_header.php');
include ('slice_navigation.php');?>

<div class="frame resiframe" id="scrollbar">
  <iframe name="content" id="content" src="home.php"></iframe>
</div>
<?php } if ($clientStatus != 'active'){?>
  <meta http-equiv="Refresh" content="2; URL=inactive.php">
<?php include('slice_footer.php');}?>
</body>
</html>

