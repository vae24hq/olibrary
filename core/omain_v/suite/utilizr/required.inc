<?php
function IsRequired($input, $fields){
	if(is_array($fields)){
		foreach ($fields as $value) {
			if(is_array($input)){
					#@TODO ~ change to empty string check
				if(empty($input[$value])){
					return $value.' is required';
				}
			}
		}
	}
}
?>