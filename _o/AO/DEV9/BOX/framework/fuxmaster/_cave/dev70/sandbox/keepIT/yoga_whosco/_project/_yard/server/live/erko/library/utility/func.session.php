<?php
/* Cigna™ - a micro web framework by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | func:session - manages session
 * Dependency »
 */
	function startSession(){return session_start();}	
	function stopSession(){return session_destroy();}
	function runSession() {if(statusSession('code')=='404'){return startSession();}}
	function restartSession(){runSession(); stopSession(); startSession(); }
	function statusSession($return='status'){
		if(!isset($_SESSION)) {
			$status['status'] = 'dead'; $status['code'] = '404';  $status['msg'] = 'session is offline';
		} else {
			$status['status'] = 'alive';  $status['code'] = 'ok';  $status['msg'] = 'session is online';
		}
		return $status[$return];
	}
?>