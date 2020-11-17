<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSession ~ PHP Session Handling • DEPENDENCY»
 */
class oSession {
	#CLOSE • Close session write
	public function close(){
		return session_write_close();
	}





	#START • PHP Session Status
	public function status(){
		$o = session_status();
		if($o == PHP_SESSION_DISABLED || $o == PHP_SESSION_NONE){
			return false;
		}
		elseif($o == PHP_SESSION_ACTIVE){
			return true;
		}
	}





	#ID • Get/Set SESSION ID
	public function id($id=''){
		if(empty($id)){
			#get session ID
			return session_id();
		}
		else {
			#Set Session ID  @NOTE: must call before session_start()
			$this->close();
			return session_id($id);
		}
		return false;
	}





	#NAME • Get/Set SESSION ID
	public function name($name=''){
		if(empty($name)){
			#get session name
			return session_name();
		}
		else {
			#set session name @NOTE: must call before session_start()
			$this->close();
			return session_name($name);
		}
		return false;
	}





	#START • Start/Resume PHP Session
	public function start($id=''){
		if(headers_sent() === false){
			if(!empty($id)){
				#change session id
				$this->id($id);
			}
			if($this->status() === false){
				return session_start();
			}
		}
		return false;
	}





	#ROLLBACK •  rollback to last active session information
	public function rollback(){
		if($this->status() === true){
			return session_reset();
		}
		return false;
	}





	#ABORT • maintain session yet discard session changes on current page
	public function abort(){
		if($this->status() === true){
			return session_abort();
		}
		return false;
	}





	#IS • Get/Set SESSION VALUE - $_SESSION['value']
	public function is($i='', $v='', $id=''){
		if(!empty($i)){
			if(!empty($id)){$this->start($id);}
			if(!empty($v)){$_SESSION[$i] = $v; return true;} #set session value
			elseif(isset($_SESSION[$i])){return $_SESSION[$i];}
			return false;
		}
		else {
			#@TODO ~ trigger HALT error
		}
	}





	#IS • Get SESSION VALUE - $_SESSION['value']
	public function get($i='', $id=''){
		if(!empty($id)){
			return $this->is($i, '', $id);
		}
		return $this->is($i);
	}





	#EXPONGE • unset entire session variable or a particular variable in session's
	public function exponge($i=''){
		if($this->status() === true){
			if(!empty($i)){
				if(!empty($this->get($i))){
					unset($_SESSION[$i]);
					return true;
				}
			}
			else {
				session_unset();
				return true;
			}
		}
		return false;
	}





	#DESTROY • destroys all data associated with the current session
	public function destroy(){
		if($this->status() === true){
			return session_destroy();
		}
		return false;
	}





	#TERMINATE • Terminate php session
	public function terminate(){
		if($this->status() === true){
			$_SESSION = array();
			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
				setcookie(
					session_id(),
					'',
					time() - 42000,
					$params["path"],
					$params["domain"],
					$params["secure"],
					$params["httponly"]
				);
			}
			session_unset();
			session_destroy();
			return true;
		}
		return false;
	}





	#FRESH • Terminate & start fresh php session
	public static function fresh($current_id='', $new_id=''){
		if(!empty($current_id)){
			$this->start($current_id);
			$this->terminate();
			if(!empty($new_id)){
				return $this->start($new_id);
			}
			return $this->start($current_id);
		}
		elseif(!empty($new_id)){
			$this->start();
			$this->terminate();
			return $this->start($new_id);
		}
		else {
			$this->start();
			$this->terminate();
			return $this->start();
		}
	}




} // EndOfClass - oSession