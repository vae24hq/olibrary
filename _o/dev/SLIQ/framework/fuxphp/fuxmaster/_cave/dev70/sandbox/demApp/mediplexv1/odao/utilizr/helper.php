<?php
// Debugging
function dbug($data, $printAs=''){
	if($printAs == 'json'){return jsonResp($data);}
	else {
		if(is_array($data)){
			if(count($data) !== count($data, COUNT_RECURSIVE)){print_r($data);}
			else {
				foreach ($data as $key => $value){
					echo '<strong>'.$key.':</strong> '. $value.'<br>';
				}
			}
		}
		else {
			var_dump($data);
		}
	}
	die();
}

// JSON Output
function jsonResp($data){
	if(!empty($data)){
		header('Content-Type: application/json');
		echo json_encode($data);
		exit;
	}
}

// Redirect URL
function oRedirect($location=''){
	if(!empty($location)){header('Location: '.$location);}
	exit;
}

function oRandomiz($value='ruid'){
	if($value == 'puid'){$randomiz = mt_rand(10000000, 99999999);}
	if($value == 'suid'){$randomiz = mt_rand();}
	if($value == 'bind'){$randomiz = mt_rand().time();}
	if($value == 'username'){
		$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
		shuffle($alpha);
		$randomiz = $alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].time().$alpha[10].$alpha[19].$alpha[39].$alpha[7].$alpha[61];
	}
	if($value == 'short'){
		$alpha = array_merge(range('a', 'z'),range('A', 'Z'));
		shuffle($alpha);
		$randomiz = rand(10000,99999).$alpha[5].$alpha[21];
	}

	if($value == 'ruid'){
		$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
		shuffle($alpha);
		$randomiz = $alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].mt_rand().$alpha[10].$alpha[19].$alpha[39].$alpha[7].$alpha[61].time().$alpha[29].$alpha[17].$alpha[31];
	}

	if($value == 'cardno'){
		$randomiz = date('Ymd').mt_rand(10,99);
	}
	return $randomiz;
}

//-------------- Return document information ---------------
function fileInfo($file='o_self', $return='details'){
	#prepare & return result
	if($file == 'o_self'){$file = $_SERVER['PHP_SELF'];}
	$info = pathinfo($file);

	$dirname = $info['dirname'];
	$filename = $info['filename'];
	$extension = '.'.$info['extension'];
	$basename = $filename.$extension;

	if($return == 'dirname'){$result = $dirname;}
	if($return == 'basename'){$result = $basename;}
	if($return == 'filename'){$result = $filename;}
	if($return == 'extension'){$result = $extension;}

	if(!empty($result)){return $result;}
	else {return $info;}
}

function isArrayMulti($data){
	if(is_array($data)){
		$result = array_filter($data,'is_array');
		if(count($result)>0) return TRUE;
	}
	return FALSE;
}
?>