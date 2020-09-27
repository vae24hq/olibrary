<?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © September 2018 | version 1.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | class•BRUX ~ brux utilities
 */

class brux {
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


	//-------------- SITE ---------------
	public static function site($info=''){
		$site['ferawaURL'] = 'https://www.ferawa.com/';
		$site['host'] = $_SERVER['HTTP_HOST'];
		$site['URLNow'] = $_SERVER['REQUEST_URI'];
		$site['sub_domain'] = array_shift((explode(".",$site['host'])));
		$site['couple_domain'] = $site['sub_domain'].'.ferawa.com';
		if(!empty($site[$info])){return $site[$info];}
	}

	//-------------- Theme Directory ---------------
	public function themePath($theme=''){
		$path = 'wp-content/themes/';
		$path .= $theme.'/';
		return $path;
	}

	//-------------- Get Theme Information ---------------
	public function getTheme($title='brux_all'){
		if($title == 'brux_all'){$sql = "SELECT * FROM `wp_posts` WHERE `post_type` = 'theme_list' AND post_status = 'publish'";}
		else {$sql = "SELECT * FROM `wp_posts` WHERE `post_type` = 'theme_list' AND post_status = 'publish' AND `post_title` = '".$title."'";}
		$db = self::db();
		$statement = $db->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($result) == 1 && is_array($result)){return $result[0];}
		elseif(is_array($result) && !empty($result)){return $result;}
		
		return FALSE;
	}



	//-------------- FERAWA Theme Directory ---------------
	public function ferawaThemePath($theme=''){
		return brux::site('ferawaURL').brux::themePath($theme);
	}


	//-------------- DB CONNECTION ---------------
	public static function db($data=''){
		if(empty($data['username'])){$data['username'] = 'ferawaco_wp0709';}
		if(empty($data['password'])){$data['password'] = 'd+*),oD}dV*q';}
		if(empty($data['database'])){$data['database'] = 'ferawaco_wp0709';}
		if(empty($data['server'])){$data['server'] = 'localhost';}
		$dsn = 'mysql:dbname='.$data['database'].';host='.$data['server'];
		try {
			$connect = new PDO($dsn, $data['username'], $data['password']);
		} catch (PDOException $e){
			die('DB Connection Failed: '.$e->getMessage());
		}
		return $connect;
	}

	//-------------- GET record from 'TABLE' (information) ---------------
	public static function record($info='id', $table='', $filter='', $value=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "SELECT ".$info.' FROM `'.$table.'` WHERE `'.$filter."` = '".$value."'";
			$db = self::db();
			$statement = $db->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			if(count($result) == 1 && is_array($result)){return $result[0];}
			elseif(is_array($result) && !empty($result)){return $result;}
		}
		return FALSE;
	}

	//-------------- wp_blogs  ---------------
	public function blogRecord($blogdomain='', $column = '*'){
		$sql = "SELECT ".$column." FROM `wp_blogs` WHERE domain = '".$blogdomain."' LIMIT 1";
		$db = self::db();
		$statement = $db->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($result) == 1 && is_array($result)){return $result[0];}
		elseif(is_array($result) && !empty($result)){return $result;}
		return FALSE;
	}

	//-------------- CURRENT SELECTED THEME  ---------------
	public function selectedTheme($blogdomain=''){

		#Blog ID
		$blogID = self::blogRecord($blogdomain, 'blog_id');
		$blogID = $blogID['blog_id'];

		#Blog Table Option
		$blogOptionTable = 'wp_'.$blogID.'_options';

		$sql = "SELECT `option_value` FROM ".$blogOptionTable." WHERE option_name = 'current_theme'";
		$db = self::db();
		$statement = $db->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($result) == 1 && is_array($result)){
			$result = $result[0];
			return $result['option_value'];
		}
		// elseif(is_array($result) && !empty($result)){return $result;}
		return FALSE;
	}

	//-------------- Post PAYMENT ---------------
	public static function insertPayment($data=''){
		if(empty($data)){return FALSE;}

		if(empty($data['gateway'])){$data['gateway'] = 'paystack';}
		if(empty($data['method'])){$data['method'] = 'card';}

		if(empty($data['status'])){$data['status'] = 'success';}
		if(empty($data['transaction'])){$data['transaction'] = mt_rand();}

		if(empty($data['user_id'])){$data['user_id'] = '';}
		if(empty($data['username'])){$data['username'] = '';}
		if(empty($data['domain'])){$data['domain'] = '';}

		if(empty($data['name'])){$data['name'] = 'anonymous';}
		if(empty($data['email'])){$data['email'] = '';}
		if(empty($data['phone'])){$data['phone'] = '';}
		if(empty($data['amount'])){$data['amount'] = '';}
		if(empty($data['type'])){$data['type'] = 'donation';}
		if(empty($data['message'])){$data['type'] = '';}
		if(empty($data['confirmed'])){$data['confirmed'] = 1;}

		$sql = 'INSERT INTO `brux_payment` SET `buid` = '.time().mt_rand(); 
			$sql .=", `gateway` = '".$data['gateway']."', `method` = '".$data['method']."', `status` = '".$data['status']."', `transaction` = '".$data['transaction']."'";
			$sql .=", `name` = '".$data['name']."', `email` = '".$data['email']."', `phone` = '".$data['phone']."'";
			$sql .=", `amount` = '".$data['amount']."', `type` = '".$data['type']."', `confirmed` = '".$data['confirmed']."'";
			$sql .=", `user_id` = '".$data['user_id']."', `username` = '".$data['username']."', `domain` = '".$data['domain']."', `message` = '".$data['message']."'";
			$sql .=", `entry` = '".date("Y-m-d H:i:s")."'";

		$db = self::db();
		$affected_row = $db->exec($sql);
		if($affected_row < 1){return FALSE;}
		return TRUE;
	}

	//-------------- Post PAYMENT ---------------
	public static function stageCSS($username='', $stage=''){
	}










	//-------------- Show STORY PHOTO ---------------
	function storyPhotoShow($username='', $gender='his'){
		if(!empty($username)){
			$filename = $username.'_'.$gender.'_story';
				#$bruxDocRoot = $_SERVER['DOCUMENT_ROOT'];
			$file = '/brux/upload/story/'.$filename.'.jpg';
			return $file;
		}
	}

}//END OF CLASS - BRUX
?>