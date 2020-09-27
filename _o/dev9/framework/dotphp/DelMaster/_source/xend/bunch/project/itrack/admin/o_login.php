<?php
require_once 'setting.php';

// Handles login request & processing
function controller(){
	if(!empty($_POST['gologin'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		if($_POST['gologin'] == 'client'){$type = 'client';}
		if($_POST['gologin'] == 'admin'){$type = 'admin';}

		if(login($email, $password, $type)){
			$_SESSION['email'] = $email;
			$_SESSION['type'] = $type;
			header('Location: '.$type.'.php');
		}
		else {
			session::reset();
			header('Location: '.$type.'-login.php?process=failed');
		}
		exit();
	}
}


// Handles login notification
function loginMsg(){
	if(isset($_GET['process'])){
		$process = $_GET['process'];
		if($process == 'failed'){
			$msg = '<div class="msgbox bg-danger text-primary">Authentication failed, please try again</div>';
		} elseif($process == 'registered'){
			$msg = '<div class="msgbox bg-success text-primary">You have successfully registered, please login</div>';
		} elseif($process == 'logout'){
			session::reset(); $_SESSION['email'] = ''; $_SESSION['type'] = '';
			$msg = '<div class="msgbox bg-info text-primary">You have logged out successfully.</div>';
		} elseif($process == 'exist'){
			$msg = '<div class="msgbox bg-warning text-primary">Your account already exists, please login</div>';
		}
	} else {
		$msg = '<div class="msgbox text-primary">Please enter your login information</div>';
	}
	return $msg;
}

controller();
?>