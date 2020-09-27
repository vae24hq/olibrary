<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | class::loader
 * Dependency » util:url
 */
class Loader {
	public $document; //is only set by $this->view() as such can only be have value after $this->view() has been called

	private function location($return='url'){
		if($return=='url'){return getURL('url');}
	}

	public function module(){		
		if($this->location('url')=='default'){$module = 'pype';}
		else {
			$module = $this->location('url');
			$isModuleOpp = strBefore($module, '!'); #check for action
			if($isModuleOpp){$module = $isModuleOpp;}
			$isModule = strBefore($module, '_');
			if($isModule){$module = $isModule;}
		}		
		if($module=='_'){$module ='pype';}
		else{$module = str_replace('_', '', $module);}
		return $module;
	}

	public function action(){
		$action ='default';
		$isAction = strAfter($this->location('url'), '!','yes');
		if($isAction){$action = $isAction;}
		if(strlen($action)<1){$action ='default';}
		return $action;
	}

	protected function operation(){
		$operation = $this->location('url');			
		$operation = str_replace($this->module(), '', $operation); #remove module			
		$operation = str_replace($this->action(), '', $operation); #remove action
		$operation = str_replace('!', '', $operation);			
		$operation = str_replace('_', '', $operation); #remove '_';		
		if(strlen($operation)<1){$operation ='default';}
		return $operation;
	}

	private function content($module='', $operation='', $action=''){
		if(empty($module)){$module = $this->module();}
		if(empty($operation)){$operation = $this->operation();}
		if(empty($action)){$action = $this->action();}
		if($operation=='default'){$operation='index';}
		$operation = str_replace('-', '_', $operation); #point possible 'file-name' to 'file_name'
		$module = str_replace('-', '_', $module); #point possible 'module-name' to 'module_name'
		$content = BUILD.DS.$module.DS.$operation;		
		return $content;
	}

	public function view($ext=''){ 
		if(empty($ext)){
			$this->document = $this->content().'.'.EXTENSION;
		}
		else {$this->document = $this->content().'.'.$ext;}

		if($this->isContentFound()){include($this->document);}
		else {include(NOT_FOUND);}
	}

	private function isContentFound(){
		if(file_exists($this->document)){return TRUE;}
		else {return FALSE;}
	}

	protected function title(){
		$title = '';
		if($this->module()!='pype'){$title .= $this->get('module').' :: ';}
		if($this->action()!='default'){$title .= $this->get('action').' » ';}
		if($this->operation()!='default'){$title .= $this->get('operation').' - ';}
		return ucwords($title);
	}

	public function get($valueOf){
		$task = '';
		if($valueOf=='content'){$task = $this->content();}
		if($valueOf=='module'){
			$task = ucwords(str_replace('_', ' ', $this->module()));
			$task = ucwords(str_replace('-', ' ', $task));
			$task = strStrip($task);
		}
		if($valueOf=='operation'){
			$task = ucwords(str_replace('_', ' ', $this->operation()));
			$task = ucwords(str_replace('-', ' ', $task));
			$task = strStrip($task);
		}
		if($valueOf=='action'){
			$task = ucwords(str_replace('_', ' ', $this->action()));
			$task = ucwords(str_replace('-', ' ', $task));
			$task = strStrip($task);
		}
		if($valueOf=='title'){$task = $this->title();}
		return $task;
	}	
}
?>