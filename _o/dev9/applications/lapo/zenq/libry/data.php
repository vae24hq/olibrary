<?php
class oData {
	public static function oRead($input, $data){
		if($data == 'oGET' && isset($_GET)){$data = $_GET;}
		elseif($data == 'oPOST' && isset($_POST)){$data = $_POST;}

		if(is_array($data)){
			if(!empty($data[$input])){return $data[$input];}
			elseif(isset($data[$input])){return '';}
			// else {return '';}
		}
		return FALSE;
	}


	public static function activeUser($input){
		global $oActiveUser;
		return self::oRead($input, $oActiveUser);
	}

	public static function title(){
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
}
?>