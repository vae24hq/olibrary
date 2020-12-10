<?php
global $fuxAuth;
$authData = array('puid', 'email', 'phone', 'username', 'privilege', 'type', 'surname', 'firstname', 'sex');
$authUser = $fuxAuth->isAuth($authData);

require oUTIL . 'error.php';
require oMODEL . 'user.php';
include oMODEL . 'card.php';
include oMODEL . 'hmo.php';


include oRGANIZ . 'card.php';


include oRGANIZ . 'password.php';


$uri = URL::uri();
$ony = $_SERVER['REQUEST_URI'];

if($uri == 'modify-password'){
	$oRecord = modifyActivePW('post');
	if(!empty($oRecord['data'])){
		URL::redirect('login?act=refresh', 4);
	}
	$oRecord['msg'] = isErrorMsg($oRecord['code']);
	$oRecord = Helper::prepResp($oRecord);
}

if($uri == 'new-card'){
	$oRecord = cardNew('post');
	if(!empty($oRecord['data'])){}
	$oRecord['msg'] = isErrorMsg($oRecord['code']);
	$oRecord = Helper::prepResp($oRecord);
}

if($uri == 'manage-card'){
	if(empty($_POST['search'])){
		$oRecord = cardList500();
		if(!empty($oRecord['data'])){}
		$oRecord['msg'] = isErrorMsg($oRecord['code']);
		$oRecord = Helper::prepResp($oRecord);
	}
	else {
		$oRecord = cardListSearch($_POST['search']);
		if(!empty($oRecord['data'])){}
		$oRecord['msg'] = isErrorMsg($oRecord['code']);
		$oRecord = Helper::prepResp($oRecord);
	}
}

if($uri == 'view-card'){
	$oRecord = cardView($_GET['card']);
	if(!empty($oRecord['data'])){}
	$oRecord['msg'] = isErrorMsg($oRecord['code']);
	$oRecord = Helper::prepResp($oRecord);
}

if($uri == 'update-card'){
	if(!empty($_POST)){
		$oRecord = cardUpdate($_GET['card'], 'post');
		if(!empty($oRecord['data'])){
			URL::redirect('update-card?card='.$_GET['card'].'&act=updated');
		}
	} else {
		$oRecord = cardView($_GET['card']);
		if(!empty($oRecord['data'])){}
		$oRecord['msg'] = isErrorMsg($oRecord['code']);
		$oRecord = Helper::prepResp($oRecord);
	}
// Helper::dbug($oRecord);
}
?>