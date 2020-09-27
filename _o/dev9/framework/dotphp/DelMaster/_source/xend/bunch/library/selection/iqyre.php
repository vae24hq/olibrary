<?php
/* iQYRE™ - a micro web application development framework by iCYZa™ © 2015
 * Program -> iQYRE.php
 */

class iQYRE {
	private static $Instance;
	public static $Path;
	public static $Name;
	public static $Brand;
	public static $Slogan;
	public static $UseDB = 'nope';
	public static $DB;
	public static $DBUser;
	public static $DBPassword;
	public static $DBServer;
	public static $DBExtension;

	public static function Instanciate(){
		if(is_null(self::$Instance)){self::$Instance = new self();}
		return self::$Instance;
	}

	public static function Setting($data=''){
		#ERROR CHECK
		if(!empty($data) && !is_array($data)){return IsError('C-QS/01|01A');}
		
		#SET DEFAULT
		self::$Path = 'iqyre';
		self::$Name = 'iQYRE Framework';
		self::$Brand = 'iQYRE™';
		self::$Slogan = 'a micro framework for quick development!';

		//database default
		self::$DB = 'iwdb';
		self::$DBUser = 'root';
		self::$DBPassword = '';
		self::$DBServer = 'localhost';
		self::$DBExtension = 'MySQLi';

		#PREPARE
		if(!empty($data)){
			foreach ($data as $label => $value){
				$valid_labels = array('Name', 'Brand', 'Slogan', 'Path', 'UseDB');
				$valid_db_labels = array('DB', 'DBUser', 'DBPassword', 'DBServer', 'DBExtension');
				//validate $label, set value
				if(in_array($label, $valid_labels)){self::$$label = $value;}
				if(in_array($label, $valid_db_labels)){
					self::$$label = $value;
					if(self::$UseDB=='nope'){self::$UseDB = 'yeah';}
				}
			}
		}
	}

	public static function Site(){
		if(!empty(self::$Site)){$task = self::$Site;}
		else {$task = strtolower($_SERVER['HTTP_HOST']);}
		return strtolower($task);	
	}

	public static function DomainName(){
		$task = StringSwap('www.', '', self::Site(), 'first');
		$task = StringSwap('https://', '', $task, 'first');
		$task = StringSwap('http://', '', $task, 'first');
		$task = StringSwap('/', '', $task, 'last');
		return strtolower($task);
	}

	public static function DomainURL(){
		$task = self::DomainName();
		//search for protocols in string
		$protocol ='';
		if(InString('https', self::Site())){$protocol .='https://';}
		elseif(InString('http', self::Site())){$protocol .='http://';}
		else {
			if(isset($_SERVER['HTTPS'])){$protocol .='https://';} else {$protocol .='http://';}
		}
		if(InString('www.', self::Site())){$protocol .='www.';}

		#RETURN
		return strtolower($protocol.$task);	
	}

	public static function SiteURL(){
		$task = self::DomainURL();
		if(!empty(self::$Path)){$task .= FS.self::$Path;}
		return $task;
	}

	public static function RemoteDIR(){
		$task = StringSwap(DS, '', $_SERVER['DOCUMENT_ROOT'], 'last');
		if(!empty(self::$Path)){$task .= DS.self::$Path;}
		return strtolower($task);
	}

	public static function Date(){
		$device = Device::IsA(); $date = DoDate();
		if($device=='tablet'){$date = DoDate('dateD3');}
		if($device=='phone'){$date = DoDate('dateD1');}
		return $date;
	}

	public static function Page($page=''){
		if(empty($page)){
			if(empty($_GET['page'])){$page = 'index';}
			else {$page = $_GET['page'];}
		}
		return $page;
	}

	public static function Title($title=''){
		if(empty($title)){
			$title = self::$Name;
			if(self::Page() != 'index'){
				$title .= ' | '.mb_convert_case(self::Page(), MB_CASE_TITLE, "UTF-8");
			}
			$title .= ' - '.self::$Slogan;
		}		
		return StringSwap('Ch-', '', $title);
	}

	public static function H1($h1=''){
		if(empty($h1)){
			$h1 = '';
			if(self::Page() != 'index'){
				$h1 .= mb_convert_case(StringSwap('-',' ', self::Page()), MB_CASE_TITLE, "UTF-8");
				$h1 .= ' :: ';
			}
			$h1 .= self::$Name;
			$h1 .= ' - '.self::$Slogan;
		}
		return $h1;
	}

	public static function Breadcrumb($crumb=''){
		if(empty($crumb)){
			$crumb = '<a href="./" title="'.self::$Name.'" class="topbrand">'.self::$Brand.'</a>';
			if(self::Page() != 'index' && !InString('ch-', self::Page())){$crumb .= ' » '.ucwords(StringSwap('-',' ', self::Page()));}
		}
		return $crumb;
	}
}
?>