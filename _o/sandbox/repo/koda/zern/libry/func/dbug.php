<?php
function dbug($data, $printAs='', $continue='oYEAP'){
	if($printAs == 'oJSON'){jsonResp($data);}
	else {
		echo '<p><em>Debugging</em></p><hr>';
		if($printAs == 'oPRINT'){print_r($data);}
		elseif($printAs == 'oDUMP'){var_dump($data);}
		elseif($printAs == 'oEXPORT'){var_export($data);}
		elseif($data === true){echo "Bool: TRUE";}
		elseif($data === false){echo "Bool: FALSE";}
		elseif(is_int($data)){echo $data;}
		elseif(is_string($data) && $printAs == 'string'){echo $data;}
		elseif(is_array($data)){
			foreach ($data as $key => $value){
				if(is_array($value)){
					foreach ($value as $valueKey => $valueSub){
						echo ' <strong>'.$key."</strong>['".$valueKey."']".': '.$valueSub.'<br>';
					}
				}
				else {
					echo '<strong>'.$key.':</strong> '. $value.'<br>';
				}
			}
		}
		else {
			var_dump($data);
		}
	}
	if($continue == 'oNOPE'){exit;}
}
?>