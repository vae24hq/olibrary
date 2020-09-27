<?php
/**
global $fuxAuth;
echo 'Username: '.$fuxAuth->crypt('admin');
echo '<br>Password: '.$fuxAuth->password('admin10#');
echo '<br>Puid: '. Helper::randomiz('puid');
echo '<br>Ruid: '. Helper::randomiz('ruid');
die();*/

// if($fuxAuth::isCrypt($authUser['type'], 'admin')){echo 'YEAH';}
// if($fuxAuth->restrict('admin', 'admin', 'nope')){echo 'RESTRICTED';} else {echo 'NOT RESTRICTED';}
