
<?php
$uris = array(
	'dashboard',
	'record.new-card',
	'record.update-card',
	'record.card',
	'record.cards',
	'record.history',
	'record.add-history',
	'record.update-history',
	'record.delete-history',
	'setting.change-password'
);
$uri = $odao->uri();
$iMedSection = $uri;
$iMedPage = Utility::swapText($uri, '-', ' ');
			#$chore .= mb_convert_case($bit.' ', MB_CASE_TITLE, "UTF-8");

#index
if($uri=='index'){
	Utility::sessionRestart();
	Utility::redirect('/login');
}
elseif($uri=='logout'){
	$odao->logout('login');
}
elseif($uri=='login'){
	include oRGANIZ.'login.php';
	$oLogin = oLogin();
	$oLogin['msg'] = uError('login', $oLogin['code']);
	$iMedLogin = Utility::response($oLogin);
	include oVIEW.'login.php';
}
elseif(in_array($uri, $uris)){
	include oUTIL.'auth.php';
	include oMODEL.'user.php';
	user::active();

	if(Utility::inText($uri, 'record')){$iMedSection = 'records';}
	if(Utility::inText($uri, 'setting')){$iMedSection = 'settings';}

	#change password
	if($uri=='setting.change-password'){
		include oRGANIZ.'cpassw.php';
		if(!empty($_SESSION['user_puid'])){
			$puid = $_SESSION['user_puid'];
		} else {
			Utility::redirect('/login');
		}
		$oCPassW = oCPassW($puid);
		$oCPassW['msg'] = uError('cpassw', $oCPassW['code']);
		$iMedCPassW = Utility::response($oCPassW);
	}
	else {
		$iMedApp = array('msg'=>'', 'code'=>'');
		$recordURIs = array(
			'record.cards', 'record.card', 'record.new-card', 'record.update-card', 
			'record.history', 'record.add-history', 'record.update-history', 'record.delete-history', 
			'dashboard');
		if(in_array($uri, $recordURIs)){
			include oMODEL.'record.php';
			include oRGANIZ.'record.php';

			#DELETE CARD HISTORY
			if($uri=='record.delete-history'){
				if(record::deleteCardHistory($_GET['history'])){
					Utility::redirect('/record/history?card='.$_GET['card']);
				}
			}

			$iMedApp = oRecord();
			$iMedApp['msg'] = uError($uri, $iMedApp['code']);
		}

	}

	include oDESIGN.'mediq.php';


// 	# handle patient related modules
// 	$patienturis = array('patient','patient-new', 'history-new', 'patient-card', 'patient-list');
// 	if(in_array($uri, $patienturis)){
// 		include oMODEL.'patient.php';
// 		include oRGANIZ.'patient.php';
// 	}


// 		include oMODEL.'user.php';
}
// // elseif($uri != 'json.php'){
// else {
// 	$link = 'http/?uri='.$uri;
// 	$odao->redirect($link);
// }

?>