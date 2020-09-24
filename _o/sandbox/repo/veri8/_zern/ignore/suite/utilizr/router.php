<?php
$fuxRoute = oURL::route();
$fuxURI = oURL::uri();
require 'app.php';
// global $fuxAuth;
// $auth_data = array('puid', 'email', 'phone', 'username', 'privilege', 'type', 'surname', 'firstname', 'sex');

// $fuxRoute = oURL::route();
// echo $fuxURI = oURL::uri();



// if($fuxRoute != 'api'){

// }

// if($fuxURI != 'login' && $fuxURI != 'logout'){
// 	if(!isset($_SESSION['user_puid'])){header('Location: login');}
// 	$fuxAuth->isAuth('puid');
// 	$fuxAuth->timeout();

// 	$userActive = $fuxAuth->userActive();


// 	include oMODEL.'hmo.php';
// 	include oMODEL.'card.php';

// } elseif(!isset($_POST)){
// 	oSession::restart();
// }

// if($fuxURI == 'index'){oURL::redirect('dashboard');}




?>