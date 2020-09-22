<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSession ~ PHP Session Handling • DEPENDENCY»
 */
class oSession {
	public $Name;

	//METHOD • Describe method
	public function __construct(){}


	//METHOD • Describe method
	public function close(){
		return session_write_close();
	}


	//ID • Get/Set SESSION ID
	public function id($i='iGET'){
		if(empty($i)){} #@TODO ~ handle error
		else {
			if($i == 'iGET'){
				$o = session_id();
			}
			else {
				# Set Session ID  @NOTE: must call before session_start()
				$this->close();
				$o = session_id($i);
			}
			return $o;
		}
	}


	//NAME • Get/Set SESSION ID
	public function name($i='iGET'){
		if(empty($i)){} #@TODO ~ handle error
		else {
			if($i == 'iGET'){
				$o = session_name();
			}
			else {
				# Set Session ID  @NOTE: must call before session_start()
				$this->close();
				$o = session_name($i);
			}
			return $o;
		}
	}


	//START • Start PHP Session
	public function start($i=''){
		if(empty($i)){} #@TODO ~ handle error
		{
			if($i == 'iGET'){
				if(headers_sent() === false && !isset($_SESSION)){
					session_start();
					if(empty($_SESSION['INIT_SESSION_ID'])){
						$_SESSION['INIT_SESSION_ID'] = $this->id($i);
					}
				}
			}
			else {
				$this->id($i);
				return session_start();
			}
		}
	}


	//IS • Get/Set SESSION VALUE - $_SESSION['value']
	public static function Is($i='', $v='', $id=''){
		if(!empty($id)){$this->start($id);}
		if(!empty($i)){
			if(!empty($v)){$_SESSION[$i] = $v;}
			elseif(isset($_SESSION[$i])){
				return $_SESSION[$i];
			}
		}
	}


} // EndOfClass - oSession