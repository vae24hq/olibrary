<?php
require oUTIL.'auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include oBIT.'head.php';?>

<body>
<div class="main-wrapper">
<?php
include oSLICE.'header.php';
include oSLICE.'sidebar.php';
?>

					<div class="page-wrapper">
            <div class="content">
<?php
if(!empty($zernLink)){
	$viewzr = oVIEW.$zernApp->view();
	if(file_exists($viewzr)){
		require $viewzr;
	}
	else {
		include oVIEW.'blank.php';
	}
}
?>

            </div>


<?php include oSLICE.'notibox.php';?>

        </div>

</div>
	<div class="sidebar-overlay" data-reff=""></div>

<?php include oBIT.'js.php';?>
</body>
</html>
