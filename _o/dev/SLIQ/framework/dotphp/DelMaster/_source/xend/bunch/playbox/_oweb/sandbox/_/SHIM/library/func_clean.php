<?php
	//remove extra white space
	function clean_value($value, $type = 'clean', $character = '') {		
		if($type == 'clean') {
			$task = preg_replace('/\s\s+/', ' ', $value);
			$task = trim($task);
		}
		elseif($type == 'clean_space') {
			$task = preg_replace('/\s\s+/', ' ', $value);
		}
		elseif($type = 'clean_edge'){
			if($character == '') {
				$task = trim($task);
			} else {
				$task = trim("$task","$character");
			}
		}
		return $task;
	}
	
	

	
	
	
?>