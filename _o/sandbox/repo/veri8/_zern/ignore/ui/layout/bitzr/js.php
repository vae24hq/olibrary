
<!-- Bootstrap core JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<!-- Core plugin JavaScript-->
<script src="js/easing.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/fux.js"></script>

<?php if($fuxURI != 'login' && $fuxURI != 'logout' && $fuxURI != 'index'){?>

	<!-- Page level plugins -->
	<script src="js/dataTable.js"></script>
	<script src="js/dataTableBS.js"></script>

	<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
	  $('#dataTable').DataTable();
	});
	</script>

	<script src="js/chart.js"></script>
	<!-- Page level custom scripts -->
	<script src="js/demo/chart-area-demo.js"></script>
	<script src="js/demo/chart-pie-demo.js"></script>

<?php } ?>

</body>
</html>