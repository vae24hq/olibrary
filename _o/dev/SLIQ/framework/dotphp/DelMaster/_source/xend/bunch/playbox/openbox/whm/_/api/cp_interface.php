<?php

class cPInterface {
    
	public function setAuthorization($username, $password);

	public function setHost($host);

	public function setAuthType($auth_type);

	public function setHeader($name, $value = '');

	public function getUsername();

	public function getAuthType();

	public function getPassword();

	public function getHost();

   public function cpanel($module, $function, $username, $params = array());

}
?>