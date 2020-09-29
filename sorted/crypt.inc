<?php

class oCrypt {

	protected $method = 'aes-128-ctr'; // default cipher method if none supplied
	private $key;

	protected function iv_bytes(){
		return openssl_cipher_iv_length($this->method);
	}

	public function __construct($key = false, $method = false){
		if(!$key){
			$key = php_uname(); // default encryption key if none supplied
		}
		if(ctype_print($key)) {
			// convert ASCII keys to binary format
			$this->key = openssl_digest($key, 'SHA256', TRUE);
		} else {
			$this->key = $key;
		}
		if($method) {
			if(in_array(strtolower($method), openssl_get_cipher_methods())) {
				$this->method = $method;
			} else {
				die(__METHOD__ . ": unrecognized cipher method: {$method}");
			}
		}
	}

	// encrypt string
	public function encrypt($data){
		$iv = openssl_random_pseudo_bytes($this->iv_bytes());
		return bin2hex($iv) . openssl_encrypt($data, $this->method, $this->key, 0, $iv);
	}

	// decrypt encrypted string
	public function decrypt($data){
		$iv_strlen = 2  * $this->iv_bytes();
		if(preg_match("/^(.{" . $iv_strlen . "})(.+)$/", $data, $regs)) {
			list(, $iv, $crypted_string) = $regs;
			if(ctype_xdigit($iv) && strlen($iv) % 2 == 0) {
				return openssl_decrypt($crypted_string, $this->method, $this->key, 0, hex2bin($iv));
			}
		}
		return false; // failed to decrypt
	}
}



//Return encrypted or decrypted data
function do_crypt($data ='', $pattern = 'flexi'){
	#prepare & return task
	if(!empty($data)){
		if ($pattern == 'crypt'){
			$chore = hash("md5", $data);
			$chore = sha1($chore);
			$chore = md5($chore);
		}
		elseif($pattern == 'strict'){$chore = md5($data);}
		elseif ($pattern == 'reverse'){$chore = base64_decode($data);}
		else {$chore = base64_encode($data);}
	}
	else {return FALSE;}

	return $chore;
}


function do_crypt($value = '', $pattern = 'flexi') { //do encryption
	if($value != '') {
		if ($pattern == 'flexi') {
			$crypt_value = base64_encode($value);
		}
		elseif ($pattern == 'reverse') {
			$crypt_value = base64_decode($value);
		}
		elseif($pattern == 'strict') {
			$crypt_value = md5($value);
		}
		elseif ($pattern == 'crypt') {
			$value = hash("md5", "$value");
			$value = sha1($value);
			$crypt_value = md5($value);

		}
	}
	else {
		print_msg('Could not perform CRYPT operation');
		return;
	}
	return $crypt_value;
}


//-------------- Process error ---------------
function isError($code, $source='', $return='oMSG'){
	global $oErrorConfig;
	if(!empty($oErrorConfig) && !empty($oErrorConfig[$source]) && is_array($oErrorConfig[$source])){
		$error = $oErrorConfig[$source];
		if($return == 'oMSG' && array_key_exists($code, $error)){return $error[$code];}
	}
	return '';
}

//-------------- Prepare isError response ---------------
function response($resp='', $source=''){
	$output['oSTATUS'] = ''; $output['oCODE'] = ''; $output['oMSG'] =''; $output['oDATA'] = '';
	if(!empty($resp['oSTATUS'])){$output['oSTATUS'] = $resp['oSTATUS'];}
	if(!empty($resp['oCODE'])){
		$output['oCODE'] = $resp['oCODE'];
		$resp['oMSG'] = isError($output['oCODE'], $source);
	}
	if(!empty($resp['oMSG'])){$output['oMSG'] = $resp['oMSG'];}
	if(!empty($resp['oDATA'])){$output['oDATA'] = $resp['oDATA'];}
	return $output;
}

//-------------- Debugging ---------------



?>