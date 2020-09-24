<?php
class oHTML {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}

	//-------------- Prevent duplication ---------------
	private function __clone(){return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}



	//-------------- Process HTTP Error ---------------
	public static function eHTTP($e='oGET', $uri='oGET'){
		if($e=='oGET'){
			if(!empty($_GET['e'])){$e = $_GET['e'];}
		}

		if($uri=='oGET'){
			if(!empty($_GET['uri'])){$uri = $_GET['uri'];}
			elseif(!empty(oURL::uri())){$uri = oURL::uri();}
		}


		#Set DEFAULT if empty
		if(empty($uri) || $uri=='oGET'){
			$uri = $_SERVER['REQUEST_URI'];
		}
		if(empty($e) || $e=='oGET'){$e = '404';}


		if($e==400){
			$uri = trim($uri, '400/');
			$title = 'Bogus Request';
			$heading = 'Bogus Document';
		}
		elseif($e==404){
			$uri = trim($uri, '404/');
			$title = 'Not Found';
			$heading = 'Unavailable Document';
		}
		elseif($e==403){
			$uri = trim($uri, '403/');
			$title = 'Forbidden';
			$heading = 'Access Not Allowed';
		}

		#Prepare OUTPUT
		$ehttp['e'] = $e;
		$ehttp['uri'] = $uri;
		$ehttp['title'] = $title;
		$ehttp['heading'] = $heading;

		#RETURN
		return $ehttp;
	}

	//-------------- Prepare Error HTTP View ---------------
	public static function eHTTPView($code='oGET', $uri='oGET'){
		$eHTTP = self::eHTTP($code, $uri);
		$html = "
		<!DOCTYPE html>
		<html>
		<head>
			<title>".$eHTTP['title']." - ".ucwords($eHTTP['uri'])."</title>
		</head>
		<body>
			<h1>".$eHTTP['heading']."</h1>
			<p>";
			if($eHTTP['e']==400){
				$html .="The requested resource";
				if(!empty($eHTTP['uri'])){$html .=' <strong>['.$eHTTP['uri'].']</strong>';}
				$html .=" does not exist on this server.";
			}
			elseif($eHTTP['e']==404){
				$html .="The requested resource";
				if(!empty($eHTTP['uri'])){$html .=' <strong>['.$eHTTP['uri'].']</strong>';}
				$html .=" was not found on this server.";
			} elseif($eHTTP['e']==403){
					$html .=" You don't have permission to access the requested resource";
					if(!empty($eHTTP['uri'])){$html .= ' <strong>['.$eHTTP['uri'].']</strong>'." on this server";}
				$html .= '</p>';
			}
			$html .= '
				<p>Please <a href="/">click here</a> to continue</p>
			</body>
			</html>';
			echo $html;
			exit;
	}

	public static function activeCSS($uri='', $class='active'){
		$string = '';
		global $zernURI;
		if(!empty($zernURI)){$linkCheck = $zernURI;}
		else {$linkCheck = oURL::uri();}

		if(!empty($linkCheck)){
			$link = oURL::uriData($linkCheck, 'oLINK');
			if($uri == $link){$string .= ' '.$class;}
		}

		return $string;
	}

	public static function isCodeSucess($code, $compare='E200'){
		if(!empty($code)){$code = substr_replace($code , '', -2);}
		if(oText::in($compare, $code)){return true;}
		return false;
	}

	//-------------- Prepare Notification ---------------
	public static function notify($data=''){
		$code = ''; $msg = '';
		if(isset($data['oCODE'])){$code = $data['oCODE'];}
		if(isset($data['oMSG'])){$msg = $data['oMSG'];}

		if(empty($msg)){return false;}

		$type = 'light'; $text = 'text-secondary';
		if(self::isCodeSucess($code, 'E100')){$type = 'light'; $text = 'text-primary';}
		if(self::isCodeSucess($code, 'E400')){$type = 'warning';}
		if(self::isCodeSucess($code, 'E401 | E404 | 405 | E600 | E601')){$type = 'danger'; $text = 'text-danger';}
		if(self::isCodeSucess($code, 'E200')){$type = 'success'; $text = 'text-success';}
		$notify = "<div class=\"alert alert-{$type} {$text}\" role=\"alert\">{$msg}</div>";
		return  $notify;
	}

	//-------------- Output message ---------------
	public static function Msg($msg='', $class='notice', $wrap='p'){
		if(is_null($msg) || empty($wrap)){return false;}
		$wrap = strtolower($wrap);
		if(empty($class)){$css = '';}
		else {$css = ' class="'.$class.'"';}
		$chore = '<'.$wrap.$css.'>'.$msg.'</'.$wrap.'>';
		echo $chore."\n";
		return;
	}
} // END HTML CLASS
?>