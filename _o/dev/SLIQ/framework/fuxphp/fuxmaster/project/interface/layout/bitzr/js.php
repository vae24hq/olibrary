<?php if ($uri != 'login') { ?>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/easing.js"></script>
	<script src="js/main.js"></script>
	<script src="js/dataTable.js"></script>
	<script src="js/dataTableBS.js"></script>

	<script type="text/javascript">
		// Call the dataTables jQuery plugin
		$(document).ready(function(){
			$('#dataTable').DataTable();

		}); //close document ready



	// Begin ModalPOP
	function modalPOP(URL){
		var URL = 'modal/' + URL;
		$('.modal-body').load(URL,function(){
			$('#bigModal').modal({show:true});
		});
		return false;
	}

	</script>



	<!-- <script src="js/bstable.js"></script> -->
	<!-- <script src="js/mdtimepicker.js"></script> -->


	<script type="text/javascript">
		function showInMain(URL, Title, Group) {
			var URL = 'ajax/' + URL;
			var divID = '#main';
			$(divID).load(URL);
			document.title = Title + ' - <?php echo $fuxApp->project; ?>';
			if (typeof Group !== 'undefined') {
				$('#pageTitle').text(Group);
			} else {
				$('#pageTitle').text(Title);
			}
			return false;
		}

		function showInDiv(divID, URL, Title, Group) {
			var URL = 'ajaxdiv/' + URL;
			var divID = '#'+ divID;
			$(divID).load(URL);
			document.title = Title + ' - <?php echo $fuxApp->project; ?>';
			if (typeof Group !== 'undefined') {
				$('#pageTitle').text(Group);
			} else {
				$('#pageTitle').text(Title);
			}
			return false;
		}

		function sendFormData(formID, URL, resultID) {
			var formID = '#' + formID;
			var resultID = '#' + resultID;
			var URL = 'ajax/' + URL;
			$(formID).on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: $(this).attr('method'),
					// url: $(this).attr('action'),
					url: URL,
					data: $(this).serialize(),
					success: function(data) {
						if (data != '') {
							$(formID).hide();
							$(resultID).html(data);

						} else {
							$(formID).show();
							$(resultID).html(data);
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						$(resultID).text(xhr.status);
					}
				});
			});
		}
	</script>
<?php } ?>
</body>

</html>