<?php
/* facil™ ver 0.1 (beta) - a cliqcore™ [iamSiEMO™] framework ~ {simplicity works!}
 * PHP :: class » Session - return session information
 * Dependency » isError [class]
 * Author(s) » Crieg A. Siemo - www.iamsiemo.com // crieg@siemo.com.ng
 * SiEMo™ Inc - www.siemo.com.ng ~ cliqcore™ - www.cliqcore.com [CLiQ4Net]
 * July 2014 © facil™
 */
 
 class Session {
 	private function start(){
 		return session_start();
 	}
	
	private function stop(){
		return session_destroy();
	}
	
	public function status($return='status'){
		#peforming test to determine session's state
		if(!isset($_SESSION)) {
			$status['status'] = 'dead';
			$status['code'] = '404';
			$status['msg'] = 'session is offline';
		} else {
			$status['status'] = 'alive';
			$status['code'] = 'ok';
			$status['msg'] = 'session is online';
		}
		
		#processing output [validating method's input]
		$returns = array('code','status','msg');
		$return = strtolower($return);
		if(in_array($return, $returns)) {
			return  $status[$return];
		} else {
			//trigger & log error []
			echo '#RIVA: ['.$return.']';  //Rogue Input as Value for Arguement on Session's Status Method | developer error
			return;
		}
	}
	
	public function run(){
		//checking current session state before calling the start method
		if($this->status('code')=='404'){
			return $this->start();
		}
	}
	
	protected function restart(){
		//restarting session
		$this->run();
		$this->stop();
		$this->start();
	}
 }

#instantiate session class
	$facil_session = new Session;
	//demo $session->run();
?>