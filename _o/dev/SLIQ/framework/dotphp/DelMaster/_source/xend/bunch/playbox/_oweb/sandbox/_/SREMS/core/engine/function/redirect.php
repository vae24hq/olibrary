<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | function::redirect
 * Dependency »
 */
function redirect($location='', $delay='none', $report = 'on'){
	if(!empty($location)){
		$duration = $delay; if($delay=='none'){$duration = 0;}
		if (!headers_sent($filename, $linenum)){		
			if($duration !=0){header("Refresh:".$duration.";URL=".$location);}
			else{header('Location: '.$location); exit;}			
		} else {
			$operation = '<meta http-equiv="refresh" content="'.$duration.'; url='.$location.'">';
			$content ='<span style="font-size:0.7em; margin:5px 5px; display:block;">You are now being redirected. Please wait or <a href="'.$location.'">continue here</a>.</span>';
			echo $operation; echo "\n"; if($report=='on'){echo $content;}
			if($duration ==0 && $report == 'on'){exit;}
		}
	}
}
?>