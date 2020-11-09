<?php
$bit = oRoute::path('bitzr');
$slice = oRoute::path('slicezr');
$view = oRoute::path('viewzr');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php oFile::Inc($bit.'head.inc');?>
</head>
<body data-spy="scroll" data-offset="110">
	<?php
	#oFile::Inc($slice.'color.inc';
	oFile::Inc($slice.'loader.inc');
	oFile::Inc($slice.'header.inc');
	oFile::Inc($slice.'banner.inc');
	oFile::Inc($view.'rate.inc');
	oFile::Inc($view.'about.inc');
	oFile::Inc($view.'why.inc');
	oFile::Inc($slice.'live.inc');
	oFile::Inc($slice.'counter.inc');
	oFile::Inc($slice.'steps.inc');
	#oFile::Inc($slice.'video.inc');
	oFile::Inc($view.'team.inc');
	#oFile::Inc($view.'blog.inc';
	oFile::Inc($slice.'partner.inc');
	oFile::Inc($view.'contact.inc');
	?>

	<footer>
		<div class="top_footer">
			<?php
			oFile::Inc($slice.'footer.inc');
			oFile::Inc($slice.'copyright.inc');
			?>
		</footer>
		<!-- <a href="#" class="scrollup" style="display: none;"><i class="fa fa-angle-up"></i></a> -->
		<?php oFile::Inc($bit.'js.inc');?>
	</body>
	</html>