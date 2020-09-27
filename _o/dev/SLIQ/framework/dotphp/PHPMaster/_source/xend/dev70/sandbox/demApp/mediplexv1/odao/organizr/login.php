<?php
function oLogin(){
	$userid = ''; $password ='';
	$response = array();
	$response['msg'] = '<div class="alert alert-light" role="alert">Please enter your login information</div>';

	if(!empty($_POST['userid'])){$userid = $_POST['userid'];}
	if(!empty($_POST['password'])){$password = $_POST['password'];}


	if(!empty($_POST)){
		#REQUIRED
		if(empty($userid)){$response['msg'] = '<div class="alert alert-warning" role="alert">Your username is required</div>';}
		elseif(empty($password)){$response['msg'] = '<div class="alert alert-warning" role="alert">Your password is required</div>';}

		#PROCESS
		else {
			$login = auth::login($userid, $password);
			if($login === FALSE){$response['msg'] = '<div class="alert alert-danger" role="alert">An error occurred with your authentication</div>';}
			elseif($login == 'NO_RECORD'){
				session::start(); session::delete('userbind'); session::restart();
				$response['msg'] = '<div class="alert alert-danger" role="alert">You have entered an invalid information</div>';
			}
			elseif(is_array($login)){
				if(isset($login['o_isLogin']) && $login['o_isLogin']=='o_yeap'){
					session::start();
					if(!empty($login['bind'])){$_SESSION['userbind'] = $login['bind'];}
					oRedirect('dashboard');
				}
			}
			#Todo ~ return error when IMPROBABLE CASE Occurs
		}
	}

	return $response;
}
?>