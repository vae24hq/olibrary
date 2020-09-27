<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oRoute ~ Routing utility • DEPENDENCY»
 */
class oRoute {

	//URI • handling URI
	public function uri($i='oGET'){
		if($i == 'oGET'){
			if(!empty($_GET['olink'])){$o = $_GET['olink'];}
			else {$o = 'index';}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}


	//URI • handling API
	public function api($i='oGET'){
		if($this->uri() == 'api'){
			if(!empty($_GET['oapi'])){$o = $_GET['oapi'];}
			else {$o = 'ping';}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}


	//KEY • handling request KEY
	public function key($i='oGET'){
		if($i == 'oGET'){
			if(!empty($_GET['okey'])){$o = $_GET['okey'];}
		}
		if(!empty($o)){return strtolower($o);}
		return false;
	}


	//GET • return information
	public function get(){
		$o['uri'] = $this->uri('oGET');
		$o['api'] = $this->api('oGET');
		return $o;
	}


} // EndOfClass - oRoute