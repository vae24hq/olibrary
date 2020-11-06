<?php
$routa['organizr'] = oRoute::path('organizr').'ao'.DS.$routa['model'].'.inc';

#INDEX ~
if($routa['model'] == 'index'){
}



#REGISTER
if($routa['model'] == 'register'){
	oFile::exist($routa['organizr']);
	require $routa['organizr'];
}