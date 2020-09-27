<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php if(route()!=='login'){?><script src="js/adminlte.min.js"></script><?php }?>
<?php if(route()=='login'){?>
<script src="plugin/iCheck/icheck.min.js"></script>
<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
	});
</script>
<?php }?>