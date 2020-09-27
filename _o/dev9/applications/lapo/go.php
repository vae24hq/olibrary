<?php
require 'zenq/init.php';
$oRefPage = oRoute::ref();
$oPage = oRoute::page();

$app = new App();

$MID = ''; $MemberID = '';
if(oMethod::isGet('MID')){
	$MID = oData::oRead('MID', 'oGET');
} elseif(oMethod::isPost('MID')){
	$MID = oData::oRead('MID', 'oPOST');
}

if(!empty($MID)){
	$Member = $app->member($MID, 'BIND', 'MemberID');
	if(!empty($Member['MemberID'])){$MemberID = $Member['MemberID'];}
}

if($oRefPage == 'login' && $oPage == 'go'){$app->login();}
elseif($oRefPage == 'member-new' && $oPage == 'go'){$app->member_new();}
elseif($oPage == 'members'){$members = $app->members();}
elseif($oPage == 'loan-view'){
	$loanViewInterests = $app->loan_view('interest');
	$loanViewPrincipals = $app->loan_view('principal');
}
// elseif($oPage == 'member'){$member = $app->member($_GET['ID']);}
elseif($oRefPage == 'transaction-post' && $oPage == 'go'){$app->transaction_post();}
elseif($oRefPage == 'loan-prepare' && $oPage == 'go'){$app->loan_prepare();}
elseif($oRefPage == 'loan-payment' && $oPage == 'go'){$app->loan_payment();}
?>