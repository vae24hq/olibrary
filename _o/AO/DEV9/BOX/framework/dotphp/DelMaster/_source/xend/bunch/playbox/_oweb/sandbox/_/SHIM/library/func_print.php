<?php
	function print_msg($msg = '', $msg_warning = 'off') {
		if ($msg_warning == 'off') {
			$result = $msg;
		}
		else {
			if ($msg == '') {
				$result = "No message recieved for display!";
			}
			else { 
				$result = $msg;	
			}		
		}
		echo $result;
		return;
	}
?>