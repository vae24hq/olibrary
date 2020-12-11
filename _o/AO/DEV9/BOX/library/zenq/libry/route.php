<?php
class oRoute {

	public static function getPageName($link){
		if(!empty($link)){
			$rez = $link;
			$rez = parse_url($rez, PHP_URL_PATH);
			$rez = basename($rez);
		}
		$rez = strtolower(str_replace('.php', '', $rez));
		return $rez;
	}

	public static function ref(){
		if(!empty($_SERVER['HTTP_REFERER'])){
			$rez = self::getPageName($_SERVER['HTTP_REFERER']);
		}
		if(empty($rez)){$rez = 'index';}
		return $rez;
	}

	public static function page(){
		if(!empty($_SERVER['PHP_SELF'])){
			return self::getPageName($_SERVER['PHP_SELF']);
		}
	}

	public static function view($page='oGETView'){
		if($page == 'oGETView' && !empty($_GET['view'])){$view = $_GET['view'];}
		elseif($page != 'oGETView' && !empty($page)){$view = $page;}
		if(!empty($view)){$view = strtolower($view);} else {$view = 'index';}
		return $view;
	}

	public static function uri(){
		if(!empty($_SERVER['REQUEST_URI'])){
			return $_SERVER['REQUEST_URI'];
		}
	}

	//Instant redirect
	public static function redirect($to, $sec='0'){
		if(!headers_sent($filename, $linenum)){
			if(!empty($sec)){
				header('Refresh:$sec;url=$to');
			}
			else {
				header('Location: '.$to);
				exit();
			}
		}
		else {
			//Manual Click or Meta Redirect (Headers already sent in $filename on line $linenum)
			echo '<meta http-equiv="refresh" content="'.$sec.'; URL='.$to.'">';
			return;
		}

	}

	public static function self($type='oView', $link='oGET'){
		if($type == 'oView'){
			if($link == 'oGET'){
				$rez = self::view();
			}
			$rez = './?view='.$rez;
		}
		elseif($type == 'oPage'){
			if($link == 'oGET'){
				$rez = self::page();
			}
		}
		return strtolower($rez);
	}

	public static function state($state='oGET'){
		if(!empty($state) && $state != 'oGET'){$rez = $state;}
		elseif($state == 'oGET' && !empty($_GET['state'])){$rez = $_GET['state'];}
		else {$rez = 'default';}
		return strtolower($rez);
	}

	public static function isState($comparism='', $state='oGET'){
		$state = self::state($state);
		$comparism = strtolower($comparism);
		if($comparism === $state){return TRUE;}
		return FALSE;
	}
}
?>