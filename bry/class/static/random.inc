<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oRandom ~ Randomization • DEPENDENCY»
 */
class oRandom {
	//PREPARE • randomize a string or an array
	public static function prepare($input, $length){
		$rez = '';
		if(!is_array($input)){
			$input = str_shuffle($input);
			$inputLength = strlen($input);
			if(is_numeric($length) && ($length <= $inputLength)){
				$rez = substr($input, 0, $length);
			}
			elseif($length == 'iAuto' || $length == 'iAll'){
				$rez = $input;
			}
		}
		else {
			shuffle($input);
			$inputLength = count($input);
			if(is_numeric($length) && ($length <= $inputLength)){
				for($i=0; $i < $length; $i++){
					$rez .= $input[$i];
				}
			}
			elseif($length == 'iAuto' || $length == 'iAll'){
				foreach ($input as $key => $value){
					$rez .= $input[$key];
				}
			}
		}

		if(!empty($rez)){return trim($rez);}
		return false;
	}





	//CREATE • generate & return values
	public static function create($res='iRand', $length = 'iAuto', $input=''){
		#randomize
		if($res == 'iRandomiz'){
			$i = array_merge(range('A', 'Z'), range(0, 9), range('a', 'z'));
			shuffle($i);
			$inlength = count($i);
			$max = $inlength - 2;
			$min = mt_rand(1,9);
			if($min > $max-1){$min = 1;}
			$loop = mt_rand($min, $max);
			$rez = '';
			for ($c=0; $c < $loop; $c++){
				$rez .= $i[$c];
			}
		}


		#Simple Randomization
		elseif($res == 'iRand'){
			$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97, 122));
			return $alpha.mt_rand(100, 999).date('sdm').mt_rand(10, 99);
		}


		#Account Number
		elseif ($res == 'iAccountNo') {
			$rez = mt_rand(1000000000, 9999999999);
		}

		#file name
		elseif($res == 'iFile'){
			$i = array_merge(range('A', 'Z'), range('a', 'z'));
			shuffle($i);
			$input = '';
			$loop = mt_rand(3, 20);
			for ($c=0; $c < $loop; $c++){
				$input .= $i[$c];
			}
			$rez = $i[1].$i[2].mt_rand(10, 99999).$input;
		}

		#special character
		elseif($res == 'iChar'){
			$char = '(=@#$[%{&*?)}';
			$rez = self::prepare($char, $length);
		}

		#numbers
		elseif($res == 'iNum'){
			$rez = self::prepare('1234567890', $length);
		}

		#alphabet in lowercase
		elseif($res == 'iAlpha'){
			$alpha = range('a', 'z');
			$rez = self::prepare($alpha, $length);
		}

		#alphabet in caps
		elseif($res == 'iAlphaCap'){
			$alpha = range('A', 'Z');
			$rez = self::prepare($alpha, $length);
		}

		#prepare
		elseif($res == 'iPrepare' && !empty($input)){
			$rez = self::prepare($input, $length);
		}

		else {
			$alphaL = range('a', 'z');
			$alphaU = range('A', 'Z');
			$number = '0123456789';
			$time = time();
			$rand = mt_rand();
			$char = '(=@#$[%{&*?)}';

			if($res == 'iUsername'){
				if($length == 'iAuto' || $length == 'iAll'){
					$rez = self::prepare($alphaL, 6).self::prepare($number, 4);
				} else {
					$rez = self::prepare($alphaL, $length);
				}
			}
			elseif($res == 'iTen'){
				$rez = self::prepare($number, 8).self::prepare($alphaU, 2);
			}
			elseif($res == 'iPuid' || $res == 'iEuid' || $res == 'iSuid'){
				$alphaL = implode($alphaL);
				$alphaU = implode($alphaU);
				$o = $alphaL.$number.$alphaU.$time;
				$o = str_shuffle($o);
				if($res == 'iPuid'){$rez = self::prepare($o, 20);}
				if($res == 'iEuid'){$rez = self::prepare($o, 40);}
				if($res == 'iSuid'){
					$rez = self::prepare($o, 30).self::prepare($number, 10).$time.self::prepare($o, 20);
				}
			}

			#@TODO ~ create several other predefined randomization
		}


		if(!empty($rez)){return $rez;}
		return false;
	}





	//DIGIT • generate & return numbers
	public static function digit($length=2){
		return self::prepare('1234567890', $length);
	}
} // EndOfClass - oRandom