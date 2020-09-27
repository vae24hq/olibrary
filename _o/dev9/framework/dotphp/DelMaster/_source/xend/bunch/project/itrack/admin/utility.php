<?php

//-------------- Prints message in choice format ---------------
function printMsg($msg, $format='export'){
	if($format == 'dump'){var_dump($msg);}
	elseif($format == 'export'){echo '<tt><pre>'.var_export($msg, TRUE).'</pre></tt>';}
	else {echo $msg;}
	return;
}


//-------------- Performs actual empty check ('0' is not empty) ~ Returns boolean ---------------
function isEmpty($input){
	if(!isset($input)){return TRUE;}
	else {
		if(is_array($input)){
			if(empty($input)){return TRUE;}
		} else {
			$input = trim($input);
			$length = strlen($input);
			if($length < 1){return TRUE;}
		}
	}
	return FALSE;
}

//-------------- Checks if an array is multi-dimensional ~ Returns boolean ---------------
function isMultiDi($array) {
	return (count($array) != count($array, 1));
}


/* ===========================================================================
 *  Begin STRING functions, important to the framework
 * =========================================================================== */

//-------------- Trim edges (space|character|sting) from string ---------------
function trimEdge($string, $trim=''){
 	$string = trim($string);
 	if(!isEmpty($trim)){$string = trim($string, $trim);}
 	return $string;
}

//-------------- Check for needle in string - Returns boolean ---------------
function inString($string, $needle){
	if(strpos($string, $needle) !== false){return TRUE;}
	return FALSE;
}


//-------------- Substitute the space in a string with a character|string and vice-versa ---------------
function spaceSwap($string, $value, $inverse='nope'){
	if($inverse == 'sure'){return str_replace($value, ' ', $string);}
	return preg_replace('/\s+/', $value, $string);
}

//-------------- Substitute a character|string in a string with a character|string and vice-versa ---------------
function stringSwap($string, $search, $substitute , $occurence='all'){
	#check if $search is found and return result, else return full string
	$isfound = inString($string, $search);	
	if(!$isfound){return $string;}
	else {
		if($occurence == 'all'){return str_replace($search, $substitute, $string);}
		else {
			if($occurence == 'first'){$pos = strpos($string, $search);}
			if($occurence == 'last'){$pos = strrpos($string, $search);}			
			if($pos !== false){return substr_replace($string, $substitute, $pos, strlen($search));} 
			else {return $string;}
		}
	}
}

//-------------- Return value before character(s) {if found} in string or false ---------------
function stringBefore($string, $search, $strip='sure'){
	$pos = strpos($string, $search);
	if($pos && $pos != 0){$result = substr($string, 0, $pos);}
	if($strip != 'sure'){$result = $result.$search;}
 	if(isset($result)){return $result;}
 	return FALSE;
}

//-------------- Return value after character(s) {if found} in string or false ---------------
function stringAfter($string, $search, $strip='sure'){
	$result = strstr($string, $search);
	if($result){
		if($strip == 'sure'){
			$result = str_replace($search, '', $result);
		}	
	}
 	return $result;
}





/* ===========================================================================
 *  Begin FILE functions, important to the framework
 * =========================================================================== */

//-------------- Return file information of existing file {file.ext | ./file.etx | dir/file.ext | ./dir/file.ext} ---------------
function fileInfo($request='name', $file='self'){
	#error check
	$data = array('name', 'file', 'extension', 'directory', 'all');
	if(isEmpty($request) || isEmpty($file) || (!in_array($request, $data))){
		$msg = 'Invalid Arguments on '.__FUNCTION__.'()';
 		return printMsg($msg);
	}

	#prepare file
	if($file == 'self'){$file = $_SERVER['SCRIPT_NAME'];}

	
	#return result
	$fileInfo  = pathinfo($file);

	if($request == 'name'){return $fileInfo['filename'];}
	elseif($request == 'file'){return $fileInfo['basename'];}	
	elseif($request == 'extension'){return $fileInfo['extension'];}
	elseif($request == 'directory'){return $fileInfo['dirname'];}
	else {return $fileInfo;}
	
	return FALSE;
}





//************ BEGIN SESSION CLASS ************//
class session {
	public static $status;
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){self::$status = 'offline'; return;}

	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}


	// Start PHP session {if session is not active}
	public static function start(){
		if(self::$status != 'alive'){
			session_start();
			self::$status = 'alive';
		}
	}
	
	// Check PHP session's status - Returns TRUE for active session
	public static function isActive(){
		if(self::$status == 'alive'){return TRUE;}
		return FALSE;
	}

	// Stop PHP session {if session is active}
	public static function stop(){
		if(self::isActive()){self::$status = 'dead'; session_destroy();}
	}

	// Destroy PHP session totally (session variables and cookies)
	public static function kill(){
		if(self::isActive()){
			$_SESSION = array();
			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
			  	$params["path"], $params["domain"],
			  	$params["secure"], $params["httponly"]
			  );
			}
			self::$status = 'dead';
			session_unset();
			session_destroy();
		}
	}

	// Destroy and Start PHP session
	public static function reset(){
		self::kill();
		self::start();
	}

}

session::start();
//************ END SESSION CLASS ************//





//************ BEGIN DATABASE OPERATION ************//
//Handle database connection
class db {
	private static $instance;

	//-------------- Prevent multiple instances ---------------
	private function __construct(){return;}


	//-------------- Returns a single instance ---------------
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	//-------------- Returns connection ---------------
	public static function connect(){
		global $dbconfig;
		$data = $dbconfig;
		$dsn = 'mysql:dbname='.$data["database"].';host='.$data["host"]; #Data Source Name
		try {$connection = new PDO($dsn, $data["user"], $data["password"]);}
		catch (PDOException $e){die('Connection failed: ' . $e->getMessage());}
		return $connection;
	}
}

$db = db::connect();

//Handle database insert statement
function insertDB($data, $table){
	$bind = mt_rand(100,999).date('dmYHis').mt_rand(1000,9999);
	$column = 'bind, '; $param = ':bind, '; $datalist[':bind'] = $bind;
	foreach($data as $key => $value){
		$column .= $key.', ';
		$param .= ':'.$key.', ';
		$datalist[':'.$key] = $value;
	}
	$column = trimEdge($column, ',');
	$param = trimEdge($param, ',');
	
	global $db;
	$query = 'INSERT INTO '.$table.'('.$column.') VALUES('.$param.')';
	$statement = $db->prepare("$query");
	$execute = $statement->execute($datalist);
	if($execute){
		$result = $statement->rowCount();
		if($result == 1){return TRUE;}
		return FALSE;
	}
	else {return $statement->errorInfo()[2];}
}

//Handle database update statement
function updateDB($data, $table, $condition){
	$column = ''; $param = '';
	foreach($data as $key => $value){
		#$column .= $key.', ';
		$param .= '`'.$key.'` = :'.$key.', ';
		#$datalist[':'.$key] = $value;
	}
	#$column = trimEdge($column, ',');
	$param = trimEdge($param, ',');
	
	global $db;
	echo $query = 'UPDATE `'.$table.'` SET '.$param.$condition;
	#$statement = $db->prepare("$query");
	#$execute = $statement->execute($datalist);
	#if($execute){
	#	$result = $statement->rowCount();
	#	if($result == 1){return TRUE;}
	#	return FALSE;
	#}
	#else {return $statement->errorInfo()[2];}
}


//Handle database select statement
function selectDB($field, $table, $data, $return='boolean'){
	$param = ''; $datalist = array();
	foreach($data as $key => $value){
		$param .= $key.' = :'.$key.' AND ';
		$datalist[':'.$key] = $value;
	}
	$param = trimEdge($param, ' AND');

	global $db;
	$query = 'SELECT '.$field.' FROM '.$table.' WHERE '.$param;
	$statement = $db->prepare("$query");
	$execute = $statement->execute($datalist);
	if($execute){
		$result = $statement->rowCount();
		if($result != 0){
			if($return == 'boolean'){return TRUE;}
			elseif($result == 1){return $statement->fetch();}
			elseif($result > 1){return $statement->fetchAll();}
		}
		return FALSE;
	}
	else {return $statement->errorInfo()[2];}	
}


//Handle database query
function queryDB($query, $return='boolean'){
	global $db;
	$statement = $db->prepare($query);
	$execute = $statement->execute();

	if($execute){
		$result = $statement->rowCount();
		if($result != 0){
			if($return == 'boolean'){return TRUE;}
			else {return $statement->fetchAll(PDO::FETCH_ASSOC);}
		}
		return FALSE;
	}
	else {return $statement->errorInfo()[2];}
}

//************ END DATABASE OPERATION ************//




//************ BEGIN GENERAL UTITLITIES ************//

//Add active class to link
function activeCSS($check=''){
	$link = 'dashboard';
	if(!empty($_GET['link'])){$link = $_GET['link'];}
	if($check == $link){echo ' class="active"';}
	return;
}

//Handle URL Request and Load Content
function content(){
	$content = 'dashboard';

	if(!empty($_GET['link'])){$content = $_GET['link'];}

	$file = strtolower($content).'.php';

	if(is_file($file)){return $file;}
	else {return 'lost.php';}
}
//************ END GENERAL UTITLITIES ************//
?>