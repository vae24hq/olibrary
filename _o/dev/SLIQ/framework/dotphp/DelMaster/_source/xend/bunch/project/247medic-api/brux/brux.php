 <?php
/* BRUX™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by ODAO™ OSAWERE [@iamodao - www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © September 2018 | version 1.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | class•BRUX ~ brux utilities
 */

if(!isset($_SESSION)){session_start();}
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


	//-------------- DATABASE CONNECTION ---------------
	public static function database(){
		$data = dbconfig();
		if(!isset($data['database'])){$data['database'] = 'medic247_db';}
		if(!isset($data['username'])){$data['username'] = 'medic247_db';}
		if(!isset($data['password'])){$data['password'] = '57@]mQC)F}R*';}
		if(!isset($data['server'])){$data['server'] = 'localhost';}
		$dsn = 'mysql:dbname='.$data['database'].';host='.$data['server'];
		try {
			$connection = new PDO($dsn, $data['username'], $data['password']);
		} catch (PDOException $e){
			die('Connection Failed: '.$e->getMessage());
		}
		return $connection;
	}


	//-------------- FIND record from 'TABLE' (information) ---------------
	public static function find($column='*', $table='', $condition=''){
		if(!empty($column) && !empty($table)){
			$sql = "SELECT ".$column.' FROM `'.$table.'`';

			#condition to be UPDATED
			if(!empty($condition)){
			$sql .= ' WHERE ';
			foreach ($condition as $cond_key => $cond_value){
				if(!empty($condition[$cond_key])){
					$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
				}
			}

			$sql = rtrim($sql, ' AND');
			}

			$db = self::database();
			$statement = $db->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			if(count($result) == 1 && is_array($result)){return $result[0];}
			elseif(is_array($result) && !empty($result)){return $result;}
		}
		return FALSE;
	}


	//-------------- GET record from 'TABLE' (information) ---------------
	public static function record($info='id', $table='', $filter='', $value=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "SELECT ".$info.' FROM `'.$table.'` WHERE `'.$filter."` = '".$value."'";
			$db = self::database();
			$statement = $db->prepare($sql);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			if(count($result) == 1 && is_array($result)){return $result[0];}
			elseif(is_array($result) && !empty($result)){return $result;}
		}
		return FALSE;
	}

	//-------------- DELETE record from 'TABLE' ---------------
	public static function remove($info='id', $table='', $filter='', $value=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "DELETE FROM `".$table.'` WHERE `'.$filter."` = '".$value."'";
			$db = self::database();
			$affected_row = $db->exec($sql);
			if($affected_row < 1){return FALSE;}
		}
		return TRUE;
	}

	//-------------- UPDATE record from 'TABLE' ---------------
	public static function update($data='', $table='', $condition=''){
		if(!empty($data) || !empty($table) || !empty($condition)){
			$sql = "UPDATE `".$table."` SET `updated` = 'yeah'";

			#data to be UPDATED
			foreach ($data as $update_key => $update_value){
				if(!empty($data[$update_key])){
					$sql .= ", `".$update_key."` = '".$data[$update_key]."'";
				}
			}

			$sql .= " WHERE ";

			#condition to be UPDATED
			foreach ($condition as $cond_key => $cond_value){
				if(!empty($condition[$cond_key])){
					$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
				}
			}

			$sql = rtrim($sql, ' AND');

			$db = self::database();
			$affected_row = $db->exec($sql);
			if($affected_row < 1){return FALSE;}
		}
		return TRUE;
	}







/*****UTILITY METHOD*****/



	//-------------- RANDOMIZ ---------------
	public static function randomiz($value='puid'){
		if($value == 'puid'){$randomiz = mt_rand(10000000, 99999999);}
		if($value == 'suid'){$randomiz = mt_rand();}
		if($value == 'bind'){$randomiz = mt_rand().time();}
		return $randomiz;
	}

	public static function insertRUID($table=''){
		$string = 'INSERT INTO `'.$table.'` SET `puid` = '.self::randomiz('puid').', `suid` = '.self::randomiz('suid').', `bind` = '.self::randomiz('bind');
		return $string;
	}


/*****USER OBJECT METHOD*****/

	



	//-------------- Contact Registration ---------------
	public static function contactCreate($data='', $username=''){
		if(empty($data)){return FALSE;}

		$db = self::database();

		#Create [CONTACT]
		$contact_columns = array('name', 'phone', 'email', 'address', 'relationship');
		$contact_sql = self::insertRUID('contact');
		foreach ($contact_columns as $contact_key){
			if(!empty($data[$contact_key])){
				$contact_sql .= ", `".$contact_key."` = '".$data[$contact_key]."'";
			}
		}

		#Get [USER's - bind]
		$record = self::record('bind', 'user', 'username', $username);
		$contact_sql .= ", `user` = '".$record['bind']."'";

		$contact_affected_row = $db->exec($contact_sql);
		if($contact_affected_row < 1){return FALSE;}
		return TRUE;
	}


	//-------------- Contact Report ---------------
	public static function reportCreate($data=''){
		if(empty($data)){return FALSE;}

		$db = self::database();

		#Create [CONTACT]
		$contact_columns = array('incident', 'location', 'user');
		$contact_sql = self::insertRUID('incident');
		foreach ($contact_columns as $contact_key){
			if(!empty($data[$contact_key])){
				$contact_sql .= ", `".$contact_key."` = '".$data[$contact_key]."'";
			}
		}

		$contact_affected_row = $db->exec($contact_sql);
		if($contact_affected_row < 1){return FALSE;}
		return TRUE;
	}







/*****ITEM OBJECT METHOD*****/

	//-------------- Item Registration ---------------
	public static function registryCreate($data='', $username=''){
		if(empty($data)){return FALSE;}

		$db = self::database();

		#CHECKS
		$imeiFound = self::record('auid', 'registry', 'imei', $data['imei']);
		if($imeiFound !== FALSE){return 'imei_exist';}

		#Create [REGISTRY]
		$registry_columns = array('title', 'description', 'serial', 'imei', 'type', 'color', 'media');
		$registry_sql = self::insertRUID('registry');
		foreach ($registry_columns as $registry_key){
			if(!empty($data[$registry_key])){
				$registry_sql .= ", `".$registry_key."` = '".$data[$registry_key]."'";
			}
		}

		#Get [USER's - bind]
		$record = self::record('bind', 'user', 'username', $username);
		$registry_sql .= ", `user` = '".$record['bind']."'";

		$registry_affected_row = $db->exec($registry_sql);
		if($registry_affected_row < 1){return FALSE;}
		return TRUE;
	}










/*****DEPARTMENT OBJECT METHOD*****/

	//-------------- Department Record ---------------
	public static function departmentCreate($data=''){
		if(empty($data)){return FALSE;}

		$db = self::database();

		#Create [CONTACT]
		$dept_columns = array('title', 'address', 'state', 'area', 'phone', 'email', 'website');
		$dept_sql = self::insertRUID('department');
		foreach ($dept_columns as $dept_key){
			if(!empty($data[$dept_key])){
				$dept_sql .= ", `".$dept_key."` = '".$data[$dept_key]."'";
			}
		}

		$dept_affected_row = $db->exec($dept_sql);
		if($dept_affected_row < 1){return FALSE;}
		return TRUE;
	}










/*****INCIDENT OBJECT METHOD*****/

	//-------------- Department Record ---------------
	public static function incidentCreate($data='', $username =''){
		if(empty($data)){return FALSE;}

		$db = self::database();

		#Create [INCIDENT]
		$incident_columns = array('incident', 'location', 'description');
		$incident_sql = self::insertRUID('incident');
		foreach ($incident_columns as $incident_key){
			if(!empty($data[$incident_key])){
				$incident_sql .= ", `".$incident_key."` = '".$data[$incident_key]."'";
			}
		}

		#Get [USER's - bind]
		$record = self::record('bind', 'user', 'username', $username);
		$incident_sql .= ", `user` = '".$record['bind']."'";

		$incident_affected_row = $db->exec($incident_sql);
		if($incident_affected_row < 1){return FALSE;}
		return TRUE;
	}










/*****MESSAGE OBJECT METHOD*****/

	//-------------- Message Record ---------------
	public static function messageCreate($data='', $username =''){
		if(empty($data)){return FALSE;}

		$db = self::database();

		#Create [MESSAGE]
		$message_columns = array('receiver', 'incident', 'message');
		$message_sql = self::insertRUID('message');
		foreach ($message_columns as $message_key){
			if(!empty($data[$message_key])){
				$message_sql .= ", `".$message_key."` = '".$data[$message_key]."'";
			}
		}

		#Get [USER's - bind]
		$record = self::record('bind', 'user', 'username', $username);
		$message_sql .= ", `sender` = '".$record['bind']."'";

		$message_affected_row = $db->exec($message_sql);
		if($message_affected_row < 1){return FALSE;}
		return TRUE;
	}

}//END OF CLASS - BRUX


/** HOW TO INCLUDE THIS DOCUMENT
$bruxDocRoot = $_SERVER['DOCUMENT_ROOT'];
require ($bruxDocRoot.'/brux/index.php'); **/
?>