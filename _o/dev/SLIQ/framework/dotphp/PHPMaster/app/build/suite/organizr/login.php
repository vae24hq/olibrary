<?php
	function oLogin(){
		if(!$_POST){
			Utility::sessionRestart();
			$mark['code'] = 'E100A1';
		}
		else {
			include oUTIL.'login.php';
			$mark = uLogin('post');
			if(!empty($mark['data'])){
				Utility::redirect('/dashboard');
			}
		}

		return $mark;
	}
?>