<?php
function redirect($location='', $delay='none', $report = 'on'){
	if(!empty($location)){
		$duration = $delay; if($delay=='none'){$duration = 0;}
		if (!headers_sent($filename, $linenum)){
			if($duration !=0){header("Refresh:".$duration.";URL=".$location);}
			else{header('Location: '.$location); exit;}
		} else {
			$operation = '<meta http-equiv="refresh" content="'.$duration.'; url='.$location.'">';
			$content ='<p class="redirect">You are now being redirected. <br>Please wait or <a href="'.$location.'">click here</a>.</p>';
			echo $operation; echo "\n"; if($report=='on'){echo $content;}
			if($duration ==0 && $report == 'on'){exit;}
		}
	}
	else {
		return FALSE;
	}
}
?>