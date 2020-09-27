<?php
if(URL::route() != 'api'){
	Session::restart();
	URL::redirect('login');
}
else {
	global $fuxApp;
	$resp['action'] = 'success';
	$resp['code'] = 'E200A1';
	$resp['msg'] = 'Everything is awesome';
	$resp['data'] = array('project' => $fuxApp->project, 'version' => $fuxApp->ver, 'api' => 'alive');
	Helper::jsonResp($resp);
}
?>