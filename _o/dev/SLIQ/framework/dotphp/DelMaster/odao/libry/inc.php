<?php
function oInc($file, $reportAs='strict', $incAs='req'){
	if(file_exists($file))
	{
		if($incAs=='req'){include $file;}
		elseif($incAs=='reqOne'){require_once $file;}
		elseif($incAs=='inc'){require $file;}
		elseif($incAs=='incOne'){include_once $file;}
	}
	else{
		#Todo ~ check machine/environment settings [to prepare message/log]
		$report = 'Failed to load ['.$file.']';
		if($reportAs=='strict'){die($report);}
	}
}
?>