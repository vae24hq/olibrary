<?php
function oRedirect($location='', $delay=0, $report = 'on'){
	if(!oEmpty($location)){
		if(!headers_sent($filename, $linenum)){
			if($delay !=0){
				header("Refresh:".$delay.";URL=".$location);
			}
			else{
				header('Location: '.$location);
				exit;
			}
		}
		else {
			$operation = '<meta http-equiv="refresh" content="'.$delay.'; url='.$location.'">';
			$content ='<p class="redirect">You are now being redirected. <br>Please wait or <a href="'.$location.'">click here</a>.</p>';
			echo $operation."\n";
			if($report=='on'){echo $content;}
			if($delay == 0 && $report == 'on'){exit;}
		}
	}
	else {
		return FALSE;
	}
}
?>