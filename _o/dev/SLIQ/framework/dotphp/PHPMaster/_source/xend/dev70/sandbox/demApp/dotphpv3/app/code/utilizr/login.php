<?php
function dologin(){
	$userid = ''; $password ='';
	$response = array();
	$response['status'] = 'pending';
	$response['msg'] = '<p class="odao-notify">Please enter your login information</p>';

	if(!empty($_POST['userid'])){$userid = $_POST['userid'];}
	if(!empty($_POST['password'])){$password = $_POST['password'];}


	if(!empty($_POST)){
		#REQUIRED
		if(empty($userid)){$response['msg'] = '<p class="odao-notify alert alert-warning">Your username is required</p>';}
		elseif(empty($password)){$response['msg'] = '<p class="odao-notify alert alert-warning">Your password is required</p>';}

		#PROCESS
		else {
			addFile('login','modelizr');
			$login = ologin($userid, $password);
			if($login === FALSE){$response['msg'] = '<p class="odao-notify alert alert-danger">You have entered an invalid information</p>';}
			elseif(!empty($login['bind'])){
				session::start();
				$_SESSION['userbind'] = $login['bind'];
				// $response['msg'] = 'Authentication successful';
				// $response['status'] = 'success';
				header('Location: dashboard'); exit;
			}
		}
	}

	return $response;
}
?>