<?php
$routa['organizr'] = oRoute::path('organizr').'app'.DS.$routa['model'].'.inc';
$routa['viewzr'] = oRoute::path('viewzr').'app.'.$routa['model'].'.inc';

#INDEX ~ redirect to registration
if($routa['model'] == 'index'){
	oRedirect::oExit('register');
}



#REGISTER
if($routa['model'] == 'register'){
	oFile::exist($routa['organizr']);
	require $routa['organizr'];
}