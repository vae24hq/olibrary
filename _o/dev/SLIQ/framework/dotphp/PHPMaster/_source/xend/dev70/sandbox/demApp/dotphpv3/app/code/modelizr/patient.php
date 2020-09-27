 <?php
class patient {
	private static $instance;
	private static $status;

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


	public static function all(){
		$result = db::record('*', 'patient','type', 'patient');
		if(isset($result['HAS_ERROR'])){dbug($result);}
		elseif($result == 'NO_RECORD'){return FALSE;}
		else {return $result;}
	}

	public static function create($output='ruid'){
		$_POST['cardno'] = oRandomiz('cardno');
		$_POST['type'] = 'patient';
		if(db::create($_POST, 'patient')){
			if(!empty($output)){
				$result = db::record($output,'patient','cardno',$_POST['cardno']);
				if(isset($result[$output])){return $result[$output];}
			}
			return $_POST['cardno'];
		}
		return FALSE;
	}

	public static function info($filtaValue=''){
		$result = db::find('*','patient',$filtaValue);
		if(isset($result['HAS_ERROR'])){dbug($result);}
		elseif($result == 'NO_RECORD'){return FALSE;}
		else {return $result;}
	}

	public static function profile($record=''){
		if(isset($_REQUEST['ruid'])){
			$filta['ruid'] = $_REQUEST['ruid'];
			$info = self::info($filta);

			$filtar['patient'] = $_REQUEST['ruid'];
			$vital = db::find('*','appointment',$filtar);

			if(is_array($vital)){$info = array_merge($info, $vital);}


			if(isset($info[$record])){return $info[$record];}
		}
	}
}

?>