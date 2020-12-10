<?php
//-------------- Set database configuration ---------------
function oDevDB($data='oDBAuto'){
	if($data == 'oDBAuto'){
		global $oCIDB;
		if(oIsEmpty($oCIDB)){
			$data = array();
			$data['host'] = 'localhost';
			$data["database"] = 'devdb';
			$data["user"] = 'root';
			$data["password"] = '';
		}
		elseif(!is_array($oCIDB)){return false;}
		else {
			$data = $oCIDB;
			if(empty($data['host'])){$data['host'] = 'localhost';}
			if(empty($data["database"])){$data["database"] = 'devdb';}
			if(empty($data["user"])){$data["user"] = 'root';}
			if(empty($data["password"])){$data["password"] = '';}
		}
	}
	elseif(empty($data) || !is_array($data)){return false;}
	return $data;
}

//-------------- Set database configuration ---------------
function oRandomize($type ='random'){
	if($type == 'bind'){
		$alphaCAP = range('A', 'Z');
		shuffle($alphaCAP);
		return $alphaCAP[2].$alphaCAP[5].mt_rand(100,999).date('dmYHis').mt_rand(10,9999);
	}
	if($type == 'suid'){
		return mt_rand(100000000, 999999999);
	}
	if($type == 'puid'){
		$alpha = range('a', 'z'); $alphaCAP = range('A', 'Z'); $number = range(0, 9);
		$list = array_merge($alpha, $alphaCAP, $number);
		shuffle($list);
		$randNo = mt_rand(12,36);
		$value = '';
		for ($i=0; $i < $randNo; $i++){ 
			$value .= $list[$i];
		}
		return $value.mt_rand(10,999);
	}
	if($type == 'password'){
		$alpha = range('a', 'z'); $alphaCAP = range('A', 'Z'); $number = range('0', '9'); $symbol = range('#', '@');
		shuffle($alpha); shuffle($alphaCAP); shuffle($number); shuffle($symbol);
		return $alpha[2].$alphaCAP[4].$alphaCAP[7].$symbol[3].$alpha[9].date('d').$alpha[13].$alphaCAP[20].$number[5].$number[7].$symbol[1];
	}
	if($type == 'random'){return mt_rand();}
}
?>