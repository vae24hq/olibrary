<?php
$routa['organizr'] = oRoute::path('organizr').'app'.DS.$routa['model'].'.inc';
$routa['viewzr'] = oRoute::path('viewzr').'app.'.$routa['model'].'.inc';
oFile::Inc(oRoute::path('utilizr').'api.inc');


#INDEX ~ redirect to registration
if($routa['model'] == 'index'){
	oRedirect::oExit('register');
}



#REGISTER
if($routa['model'] == 'register'){
	oFile::exist($routa['utilizr']);
	require $routa['utilizr'];
	oFile::exist($routa['organizr']);
	require $routa['organizr'];
}




	#PROFILE
if($routa['model'] == 'profile'){
	oFile::exist($routa['utilizr']);
	require $routa['utilizr'];
	oFile::exist($routa['organizr']);
	require $routa['organizr'];
}