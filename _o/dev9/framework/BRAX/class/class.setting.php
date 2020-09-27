<?php
/* Quiqway™ - a rapid web development platform by iO™ (inspired cirqle)
 * © April 2015 | version 2.0
 * PHP | class::setting ~
 */

class Setting {

	public function Site($data='auto'){
		//set defaults
		$this->SiteName = 'Quiqway Demostration';
		$this->SiteBrand = 'Quiqway™ Demo';
		$this->SiteSlogan = 'demostrating quiqway!';
		$this->SiteTags = '';
		
		$this->SiteUI = '';
		$this->SiteUseDB = 'no'; #[ok|no]
		$this->SiteUseWWW = 'ok'; #[ok|no]
		$this->SitePath = '';
		$this->SiteDomain = $_SERVER['HTTP_HOST'];

		//make sure data is not empty or zero
		if(empty($data)){die('$data is empty');}

		//make sure $data is an array if its not empty
		if($data!='auto' && !is_array($data)){die('$data is not an array');}
		
		if(is_array($data)){
			$options = array('name', 'brand', 'slogan', 'tags', 'path', 'usewww','usedb', 'ui');
			foreach($data as $key => $value){
				//when if $key is in $options
				if(in_array($key, $options)){
					$task = stringSwap('usewww', 'UseWWW', $key);
					$task = stringSwap('usedb', 'UseDB', $key);
					$task = stringSwap('ui', 'UI', $key);
					$task = 'Site'.ucwords($task);

					//set class property to value				
					$this->$task = $value;
				}
			}
		}

		$isURL = 'http://';
			if(defined('ENVIRONMENT') && ENVIRONMENT == 'prod' && $this->SiteUseWWW=='ok'){$isURL .= 'www.';}
		$this->SitePathURL = $isURL.$this->SiteDomain;
		$this->SitePathDIR = $_SERVER['DOCUMENT_ROOT'];
		if(!empty($this->SitePath)){
			$this->SitePathURL .= FS.$this->SitePath;
			$this->SitePathDIR .= FS.$this->SitePath;
		}
	}

	public function DB($data='auto'){
		//set defaults
		$this->DBHost = 'localhost';
		$this->DBName = 'faswey';
		$this->DBUser = 'root';
		$this->DBPassword = '';
		$this->DBType = 'MySQLi';

		//make sure data is not empty or zero
		if(empty($data)){die('$data is empty');}

		//make sure $data is an array if its not empty
		if($data!='auto' && !is_array($data)){die('$data is not an array');}
		
		if(is_array($data)){
			$this->SiteUseDB = 'ok';
			$options = array('host', 'name', 'user', 'password', 'type');
			foreach($data as $key => $value){
				//when if $key is in $options
				if(in_array($key, $options)){
					$task = 'DB'.ucwords($key);

					//set class property to value				
					$this->$task = $value;
				}
			}
		}
	}
}
?>