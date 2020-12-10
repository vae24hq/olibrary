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


	//-------------- DATABASE CONNECTION ---------------
	public static function database(){
		$data = dbRecord();
		if(!isset($data['database'])){$data['database'] = 'labtest_api';}
		if(!isset($data['username'])){$data['username'] = 'labtest_api';}
		if(!isset($data['password'])){$data['password'] = '9cDXGu4#c5MM';}
		if(!isset($data['server'])){$data['server'] = 'localhost';}
		$dsn = 'mysql:dbname='.$data['database'].';host='.$data['server'];
		try {
			$connection = new PDO($dsn, $data['username'], $data['password']);
		} catch (PDOException $e){
			die('Connection failed: '.$e->getMessage());
		}
		return $connection;
	}


	//-------------- RUN SQL QUERY ---------------
	public static function runSQL($sql){
		$db = self::database();
		$statement = $db->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		if(count($result) == 0 || empty($result)){$result = 'NO_RECORD';}
		elseif(is_array($result) && count($result) == 1){$result = $result[0];}
		return $result;
	}

	//-------------- EXECUTE SQL QUERY ---------------
	public static function execSQL($sql){
		$db = self::database();
		$result = $db->exec($sql);
		if(count($result) < 1){return FALSE;}
		return $result;
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

			return self::runSQL($sql);
		}
		return FALSE;
	}


	//-------------- GET record from 'TABLE' (information) ---------------
	public static function record($info='id', $table='', $filter='', $value=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "SELECT ".$info.' FROM `'.$table.'` WHERE `'.$filter."` = '".$value."'";
			return self::runSQL($sql);
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


	/****************************
	 * BEGIN UTILITY METHOD *
	 ****************************/

	//-------------- RANDOMIZ ---------------
	public static function randomiz($value='puid'){
		if($value == 'puid'){$randomiz = mt_rand(10000000, 99999999);}
		if($value == 'suid'){$randomiz = mt_rand();}
		if($value == 'bind'){$randomiz = mt_rand().time();}
		if($value == 'username'){
			$alpha = array_merge(range('A', 'Z'),range('a', 'z'), range(0,9));
			shuffle($alpha);
			$randomiz = $alpha[2].$alpha[30].$alpha[14].$alpha[45].$alpha[50].time().$alpha[10].$alpha[19].$alpha[39].$alpha[7].$alpha[61];
		}
		if($value == 'short'){
			$alpha = array_merge(range('a', 'z'),range('A', 'Z'));
			shuffle($alpha);
			$randomiz = rand(10000,99999).$alpha[5].$alpha[21];
		}
		return $randomiz;
	}

	public static function insertRUID($table=''){
		$string = 'INSERT INTO `'.$table.'` SET `puid` = '.self::randomiz('puid').', `suid` = '.self::randomiz('suid').', `bind` = '.self::randomiz('bind');
		return $string;
	}
	/****************************
	 * END UTILITY METHOD *
	****************************/
}
?>