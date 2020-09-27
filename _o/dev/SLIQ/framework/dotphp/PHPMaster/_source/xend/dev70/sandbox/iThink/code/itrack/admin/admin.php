<?php include 'o_authenticate.php';?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>TrackIT :: Administrator</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/presentation.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">

<!--Icons-->
<link href="css/font-awesome.min.css" rel="stylesheet">
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->


</head>

<body>

		
<?php 
	include 'nav.php';
	include 'sidebar.php';
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<?php include(content());?>
	</div><!--/.main area-->	


<?php include 'js.php';?>

</body>
</html>