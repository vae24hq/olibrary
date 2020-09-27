<?php
// Restrict Access To Page
$MM_restrictGoTo = "login.php?action=nologin";
if(!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))){
	$MM_qsChar = "?";
	$MM_referrer = $_SERVER['PHP_SELF'];
	if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
	if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
	$MM_referrer .= "?" . $QUERY_STRING;
	$MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
	header("Location: ". $MM_restrictGoTo); 
	exit;
}

// Logout Active User
if ((isset($_GET['doLogout'])) && ($_GET['doLogout']=="true")){
	$_SESSION['MM_Username'] = NULL;
	$_SESSION['MM_UserGroup'] = NULL;
	$_SESSION['PrevUrl'] = NULL;
	unset($_SESSION['MM_Username']);
	unset($_SESSION['MM_UserGroup']);
	unset($_SESSION['PrevUrl']);
	$logoutGoTo = "login.php?action=logout";
	if($logoutGoTo){
		header("Location: ".$logoutGoTo);
		exit;
	}
}


// Redirect 'InActive' & Multiple User (When User Session is On)

$totalLoggedOnUsers = clientActive('totalRows');
if($totalLoggedOnUsers != 1){
	global $logoutAction;
	if(!empty($logoutAction)){header("Location: ".$logoutGoTo); exit;}
	else {
		$logoutGoTo = "login.php?action=logout";
		header("Location: ".$logoutGoTo); exit;
	}
}
else {
	$officerInfo = clientManager('fetchRow');
	$userInfo = clientActive('fetchRow');
	$livePage = docInfo('name');
	if($userInfo['status'] != 'active' && $livePage != 'inactive'){
		$goTo = 'inactive.php';
		if($livePage == 'loading'){header("Refresh: 3; url=".$goTo); exit;}
		else {header("Location: ".$goTo); exit;}
	}
	elseif($livePage == 'loading'){
		$goTo = './';
		header("Refresh: 3; url=".$goTo);
	}
}
?>