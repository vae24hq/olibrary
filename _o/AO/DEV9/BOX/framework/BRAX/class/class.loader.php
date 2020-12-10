<?php
/* Quiqway™ - a rapid web development platform by iO™ (inspired cirqle)
 * © April 2015 | version 2.0
 * PHP | class::loader ~
 */

#require_once(DIR_UTILITY.DS.'string.php');
#require_once(DIR_UTILITY.DS.'link.php');
#require_once(DIR_UTILITY.DS.'doc.php');

class Loader {
	public $Link;
	public $LinkType;

	function __construct(){
		$Location = getLink('both');
		if($Location && is_array($Location)){
			$this->Link = $Location['link'];
			$this->LinkType = $Location['type'];
		}
		return;
	}

	public function Module(){
		#PREPARE		
		$module = $this->Link;

		$stripAction = stringBefore('!', $module, 'yeah'); #check for action
		if($stripAction){$module = $stripAction;}

		$stripOperation = stringBefore('_', $module, 'yeah');
		if($stripOperation){$module = $stripOperation;}

		if($module=='_'){$module ='default';}
		else{$module = str_replace('_', '', $module);}		
		if($module=='-'){$module ='default';}
		if(strlen($module)<1){$module ='default';}
		$module = str_replace('!', '', $module);
		
		#RETURN RESULT
		return $module;
	}

	public function Operation(){
		#PREPARE
		if($this->Link=='default'){$operation = 'index';}
		else {
			$operation = $this->Link;
			
			$stripAction = stringBefore('!', $operation); #check for action
			if($stripAction){$operation = $stripAction;}

			$isModule = $this->Module();
			$operation = str_replace($isModule, '' , $operation);
			$operation = str_replace('_', '', $operation); #remove _
		}
		if($operation=='-'){$operation ='index';}
		if(strlen($operation)<1){$operation ='index';}

		#RETURN RESULT
		return $operation;
	}

	public function Action(){
		$action ='default';
		$hasAction = stringAfter('!', $this->Link, 'yeah');
		if($hasAction){$action = $hasAction;}
		if(strlen($action)<1){$action ='default';}
		
		#RETURN RESULT
		return $action;
	}

	public function Content($module='', $operation='', $action=''){
		if(empty($module)){$module = $this->Module();}
		if(empty($operation)){$operation = $this->Operation();}
		if(empty($action)){$action = $this->Action();}

		$operation = str_replace('-', '_', $operation); #point possible 'file-name' to 'file_name'
		$module = str_replace('-', '_', $module); #point possible 'module-name' to 'module_name'

		$content['module'] = $module;
		$content['operation'] = $operation;
		$content['action'] = $action;	
		return $content;
	}

	public function Prep($return='view'){
		$prep = $this->Content();
		if($prep['module']=='default'){$prep['module'] = 'index';}
		$model = DIR_MODEL.DS.$prep['module'];
		$organizer = DIR_ORGANIZER.DS.$prep['module'];
		$view = DIR_VIEW.DS.$prep['module'];
		if($prep['operation']!='index'){$view .= '-'.$prep['operation'];}

		$returns = array('view','organizer','model');
		if(!empty($return) && in_array($return, $returns)){
		return ${$return}.'.php';			
		}
	}

	public function View($view='prepIT', $return='load'){
		if($view=='prepIT'){$prep = $this->Prep('view');}
		else {$prep = DIR_VIEW.DS.$view.'.php';}

		if($return=='load'){
			if(isFound($prep)){include($prep);}
			else {
				if($view=='prepIT'){include(DIR_HTTP.DS.'404.php');}
				else {
					if(ENVIRONMENT =='dev'){echo ('view ['.$prep.'] not found');}
					else {echo ('view ['.$view.'] not found');}
				}
			}
			return;
		} 
		elseif($return=='path'){return $prep;}
	}

	public function Organizer($organizer='prepIT', $return='load'){
		if($organizer=='prepIT'){$prep = $this->Prep('organizer');}
		else {$prep = DIR_ORGANIZER.DS.$organizer.'.php';}

		if($return=='load'){
			if(isFound($prep)){include($prep);}
			else {
				if(ENVIRONMENT =='dev'){echo ('organizer ['.$prep.'] not found');}
				else {echo ('organizer ['.$organizer.'] not found');}
			}
			return;
		}
		elseif($return=='path'){return $prep;}
	}

	public function Model($model='prepIT', $return='load'){
		if($model=='prepIT'){$prep = $this->Prep('model');}
		else {$prep = DIR_MODEL.DS.$model.'.php';}

		if($return=='load'){
			if(isFound($prep)){include($prep);}
			else {
				if(ENVIRONMENT =='dev'){echo ('model ['.$prep.'] not found');}
				else {echo ('model ['.$model.'] not found');}
			}
			return;
		}
		elseif($return=='path'){return $prep;}
	}

	public function Page(){
		#PREPARE
		$chore = '';

		$getModule = strtolower($this->Module());
		if($getModule=='default'){$chore .= 'index';}
		else {$chore .= $getModule;}

		$getOperation = strtolower($this->Operation());
		if(!empty($getOperation) && $getOperation!='index'){
			if(!empty($chore)){$chore .= '_';}
			$chore .= $getOperation;
		}

		$getAction = strtolower($this->Action());
		if(!empty($getAction) && $getAction!='default'){
			if(!empty($chore)){$chore .= '_';}
			$chore .= $getAction;
		}

		#RETURN RESULT
		return $chore = DIR_PAGE.DS.$chore.'.php';
	}

	public function ShowApp($as=''){
		$chore = '';

		#PREPARE
		if(getLink('type')=='page' || $as=='page'){$chore = $this->Page();}
		elseif(getLink('type')=='link' || $as=='link'){$chore = $this->Organizer();}
		elseif(getLink('type')=='launch' || $as=='launch'){$chore = DIR_SWITCH.DS.$this->Link.'.php';}
		else {$chore = $this->View();}

		#RETURN RESULT
		if(!empty($chore)){
			if(isFound($chore)){include($chore);}
			else {echo ('File ['.$chore.'] not found');}
		} else {return FALSE;}
	}

	public function Title(){
		$title = '';
		if($this->Module()!='default'){
			if(getLink('type')=='link'){$title .= str_replace('-', ' ', $this->Module()).' :: ';}
			elseif(getLink('type')=='page'){$title .= str_replace('-', ' ', $this->Module()).' // ';}
			else{$title .= str_replace('-', ' ', $this->Module()).' || ';}
		}
		if($this->Action()!='default'){
			$titleAction = str_replace('-', ' ', $this->Action());
			$titleAction = str_replace('_', ' ', $titleAction);
			$title .= $titleAction.' » ';
		}
		if($this->operation()!='index'){
			$title .= str_replace('-', ' ', $this->Operation()).' - ';
		}

		//make the following words uppercase
		$words = array('sms', 'faq');
		$title = arrayInStringCap($words, $title);
		$title = ucwords($title);

		//prep title
		$prep = '';
		global $Setting;		
		if(!empty($title)){$prep .= $title;}
		if(!empty($Setting->SiteBrand)){$prep .= ucwords($Setting->SiteBrand);}
		if(!empty($Setting->SiteSlogan) && empty($title)){$prep .= ' - '.ucfirst($Setting->SiteSlogan);}
		elseif(getLink('type')=='page' && !empty($Setting->SiteSlogan) && !empty($title)){$prep .= ' ~ '.$Setting->SiteSlogan;}
		if(empty($prep)){$prep ='Quiqway™ Platform!';}
		return $prep;
	}

	public function Breadcrum($return='nolink'){
		$prep = ''; $module = $this->Module();
		global $Setting; global $DeviceIsA;
		if(!empty($Setting->SiteBrand)){
			if(!empty($Setting->SitePathURL) && $return=='link'){
				$prep .= '<a href="'.$Setting->SitePathURL.'" title="'.ucwords($Setting->SiteBrand).'" class="brand">';
			}
			if($DeviceIsA=='phone'){$prep .= 'Whosco Ventures Ltd';}
			else{$prep .= ucwords($Setting->SiteName);}
			if(!empty($Setting->SitePathURL) && $return=='link'){$prep .= '</a>';}
		}
		if($module!='default' && $module!='page'){
			$prep .= ' :: '.ucwords(str_replace('-', ' ',$module));
		}
		if($this->operation()!='index'){
			$prep .= ' » '.ucwords(str_replace('-', ' ',$this->Operation()));
		}
		if($this->Action()!='default'){
			$titleAction = str_replace('-', ' ', $this->Action());
			$titleAction = str_replace('_', ' ', $titleAction);
			$prep .= ' | '.ucwords($titleAction);
		}
		$prep = stringSwap(' and', ' &', $prep);
		$prep = stringSwap(' And', ' &', $prep);
		
		#RETURN RESULT
		return $prep;
	}
}

$Loader = new Loader;
?>