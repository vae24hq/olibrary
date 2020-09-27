<?php
function route(){
	$route = 'index';
	if(!empty($_GET['route'])){$route = $_GET['route'];}
	return $route;
}

function prepFile($type, $name){
	#assign default value
	$file = ''; $location = '';

	#auto prepare
	if(empty($type) || $type == 'o_auto'){

		#Handle for GO Request
		if(isset($_GET['go'])){$type = 'organizr'; $file = 'go';}
		elseif(isset($_GET['api'])){
			$type = 'api';
			if(!empty($_GET['api'])){$file = $_GET['api'];} else {$file = 'index';}
		}
		else {
			$type = 'route'; $file = route();
		}

	}

	#set directory to file path
	if($type == 'organizr'){$location .= ORGANIZR;}
	if($type == 'api'){$location .= API;}
	if($type == 'route'){$location .= VIEW;}
	if($type == 'slice'){$location .= BIT;}

	#set file path to it's path
	if(!empty($file)){$location .= $file.'.php';}

	#return
	$prep = '';
	$prep['type'] = $type;
	$prep['name'] = $name;
	$prep['file'] = $file;
	if(!empty($location)){$prep['location'] = $location;}
	if(!empty($prep)){return $prep;}
}

function loadFile($type='o_auto', $name='o_auto'){

	$prep = prepFile($type, $name);

	var_dump($prep);



	#Handle GO
	// if(isset($_GET['go'])){$type = 'organizr';
	// }
	// 	if(!empty($_GET['go'])){
	// 		$load = ORGANIZR.'go.php';
	// 	}



	// elseif($type == 'route'){
	// 	$route = route();
	// 	$load = VIEW.$route.'.php';
	// }
	// elseif($type == 'slice'){
	// 	$load = BIT.$file.'.php';
	// }

	// if(isset($load)){
	// 	if(file_exists($load)){include($load);}
	// 	else {echo 'Missing: '.$load;}
	// } else {echo 'ELOAD404: an error occurred';}
}
?>