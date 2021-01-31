<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oLang ~ Language Utility • DEPENDENCY» <session>
 */
class oLang {

	//SET • Set Language
	public function set($i){
		if(!empty($i)){
			$_SESSION['oLang'] = $i;
		}
		else {
			if(!empty($_GET['olang'])){
				$_SESSION['oLang'] = $_GET['olang'];
			}
			elseif(!empty($_POST['olang'])){
				$_SESSION['oLang'] = $_POST['olang'];
			}

			if(empty($_SESSION['oLang'])){
				$_SESSION['oLang'] = 'en';
			}
		}
		return strtolower($_SESSION['oLang']);
	}


	//GET • Get Language
	public function get(){
		if(!empty($_SESSION['oLang'])){
			return $_SESSION['oLang'];
		}
		return $this->set();
	}


	//IS • Get/Set Language
	public function is($i=''){
		if(empty($i)){
			return $this->get();
		}
		return $this->set($i);
	}


} // EndOfClass - oLang