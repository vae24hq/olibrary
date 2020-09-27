
	<!-- Logout Modal-->
<?php addFile('modal-patient-new','slice');?>

	<!-- Link JS-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/easing.js"></script>
<?php if(getActiveLink() != 'login'){?>
	<script src="js/layout.js"></script>
<?php }?>

<?php if(getActiveLink() == 'patient-list'){?>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
	<script src="js/datatables-demo.js"></script>
	
<?php }?>
