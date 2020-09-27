<?php
	function callAPI(){
		$response['data'] = array('ping' => 'a simple ping request', 'version' => '0.0.1');
		return $response;
	}
?>