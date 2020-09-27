<?php
class oData {
	public static function oRead($input, $data){
		if(is_array($data)){

			if(!empty($data[$input])){return $data[$input];}
			elseif(isset($data[$input])){return '';}
		}
		return FALSE;
	}

	public static function oActiveUser($input){
		global $oActiveUser;
		return self::oRead($input, $oActiveUser);
	}

	public static function oTitle(){
		global $oPage;
		if($oPage !== 'index'){
			$rez = $oPage;
		}
		else {
			global $oView;
			$rez = $oView;
		}
		$rez = str_replace('-', ' ', $rez);
		$rez = ucwords($rez);
		return $rez;
	}

	public static function oActiveNavClass($link='', $type='oView'){
		if($type == 'oView'){
			global $oView;
			if($link == $oView){echo ' active';}
			return;
		}
	}

	public static function oNotify($messages='', $state='oAuto'){
		$errors = array('error', 'danger');
		$warnings = array('invalid', 'warning');
		$successes = array('success', 'done');
		if($state == 'oAuto'){$state = oRoute::state();}
		if($state == 'default'){$type = 'primary';}
		elseif(in_array($state, $successes)){$type = 'success';}
		elseif(in_array($state, $errors)){$type = 'danger';}
		elseif(in_array($state, $warnings)){$type = 'warning';}
		if(!is_array($messages)){$message = $messages;}
		elseif(!empty($messages[$state])){$message = $messages[$state];}
		$o = '<div class="onotify text-'.$type.'">'.$message.'</div>';
		return $o;
	}

	public static function oQueryRedirect($query){
		$oResult = oSQL::run($query);
		if(!empty($oResult['errNo'])){
			oRoute::redirect(oRoute::self('oView').'&state=error');
		}
		else {
			oRoute::redirect(oRoute::self('oView').'&state=success');
		}
	}

	public static function oPackage($package=''){
		$packages = array(
			'silk' => array('amount' => '5000', 'roi' => '7000'),
			'acrylic' => array('amount' => '7000', 'roi' => '11000'),
			'cotton' => array('amount' => '8000', 'roi' => '13000'),
			'corduroy' => array('amount' => '9000', 'roi' => '15000'),
			'polypropylene' => array('amount' => '10000', 'roi' => '17000'),
		);
		if(array_key_exists($package, $packages)){
			return $packages[$package];
		}
	}

	public static function oRand(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		return $alpha.mt_rand(100, 999).date('sdm').mt_rand(10, 99);
	}

	public static function oActiveClient($input){
		global $oActiveClient;
		return self::oRead($input, $oActiveClient);
	}
}
?>