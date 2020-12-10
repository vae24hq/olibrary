<?php
/* Cigna™ - a micro web framework by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo [www.iamsiemo.com] ~ crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | class:loader - handles interface loading
 * Dependency »
 */
 class Loader {
 	private function location(){
 		if(isset($_GET['link']) && !empty($_GET['link'])){$location = $_GET['link'];}
		else {$location = 'cigna-default';}
		$location = strtolower($location);
		return $location;
 	}
	
	public function module(){
		$location = $this->location();
		#if(!$module = strstr($location, '-', true)){
		if(!$module = str_before($location, "-")) {
			$action = $this->action();
			if($action=='default'){
				$module = $location;
			}
			else {
				$module = 'cigna';
			}			
		}
		return $module;
	}
	
	public function action(){
		$location = $this->location();
		if(!$action = strstr($location, '-')){
			$action = '-default';
		}
		$action = str_replace('-', '', $action);
		if(empty($action)){$action = 'default';}
		return $action;
	}
	
	private function content($module='',$action=''){
		if(empty($module)){$module = $this->module();}
		$module = 'library/module/'.$module.'.php';
		if(file_exists($module)){
			include($module);
		}
		else {include('library/page/404.php');}
	}
	
	protected function title(){
		$title = '';
		if($this->module()!='cigna'){$title = $this->get('module').' | ';}
		if($this->action()!='default'){$title .= $this->get('action').' - ';}
		return ucwords($title);
	}
	
	public function get($valueOf){
		$task = '';
		if($valueOf=='page'){$task =  $this->content();}
		if($valueOf=='module'){$task =  ucwords(str_replace('_', ' ', $this->module()));}
		if($valueOf=='action'){$task =  ucwords(str_replace('_', ' ', $this->action()));}
		if($valueOf=='title'){$task = $this->title();}
		return $task;
	}
 }
 
function str_before($subject, $needle) {
    $p = strpos($subject, $needle);
    return substr($subject, 0, $p);
}
?>