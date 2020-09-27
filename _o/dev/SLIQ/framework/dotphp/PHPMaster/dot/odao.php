<?php
/**
 *
 */
class ODAO {
	var $name;
	var $brand;
	var $domain;
	var $email;
	var $phone;
	var $url;

	var $db_name;
	var $db_user;
	var $db_password;
	var $db_host;
	var $db_driver;
	var $db;

	// var $view;

	public function __construct($config=''){
		if(!empty($config) && is_array($config)){
			foreach ($config as $label => $value){
				$label = $value;
				if(is_array($label) && array_key_exists('db', $config)){
					$dbconfig = $label;
					foreach ($dbconfig as $dbkey => $dbvalue){
						$dbitem = 'db_'.$dbkey;
						$this->$dbitem = $dbvalue;
					}
				}
				else {
					$this->$label = $value;
				}
			}

			#initialize default
			if(!empty($this->db_name)){
				$this->db = $this->connect();
			}

			$this->route = $this->route();
			$this->uri = $this->uri();
			$this->view = $this->layout('view');
		}
	}

	//========== DATABASE METHOD ==========//
	public function connect(){
		if(!empty($this->db_driver) && $this->db_driver == 'MySQLPDO'){
			$dsn = 'mysql:dbname='.$this->db_name.';host='.$this->db_host;
			try {
				$this->db = new PDO($dsn, $this->db_user, $this->db_password);
			} catch (PDOException $e){
				die('connection failed: '.$e->getMessage());
			}
		return $this->db;
		}
	}

	//-------------- RUN SQL QUERY ---------------
	public function runSQL($sql, $return=''){
		$db = $this->db;
		$statement = $db->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		$error = $statement->errorInfo();

		if(!isset($error[2]) || empty($error[2])){
			if($return == 'count'){return count($result);}
			if(count($result) == 0 || empty($result)){$result = 'NO_RECORD';}
			elseif(is_array($result) && count($result) == 1){$result = $result[0];}
			return $result;
		}
		else {
			$error['QUERY_ERROR'] = 'yeah';
			$error['QUERY'] = $sql;
			return $error;
		}
	}

	public function findSQL($column='*', $table='', $condition=''){
		if(!empty($column) && !empty($table)){
			$sql = "SELECT ".$column.' FROM `'.$table.'`';

			#condition to be UPDATED
			if(!empty($condition)){
				$sql .= ' WHERE ';
				if(is_array($condition)){
					foreach ($condition as $cond_key => $cond_value){
						if(!empty($condition[$cond_key])){
							$sql .= " `".$cond_key."` = '".$condition[$cond_key]."' AND";
						}
					}

					$sql = rtrim($sql, ' AND');
				}
				else {$sql .= ' '.$condition;}
			}

			return $this->runSQL($sql);
		}
		return FALSE;
	}

	public function recordSQL($info='id', $table='', $filter='', $value='', $limit=''){
		if(!empty($info) && !empty($table) && !empty($filter) && !empty($value)){
			$sql = "SELECT ".$info.' FROM `'.$table.'` WHERE `'.$filter."` = '".$value."'";
			if(!empty($limit)){$sql .= ' LIMIT '.$limit;}
			return $this->runSQL($sql);
		}
		return FALSE;
	}

	public function insertGID($table){
		$puid = Utility::randomiz('puid');
		$ruid = Utility::randomiz('ruid');
		$string = "INSERT INTO `".$table."` SET `ruid` = '".$ruid."'";
		$string .= ", `puid` = '".$puid."'";

		$return['sql'] = $string;
		$return['puid'] = $puid;
		$return['ruid'] = $ruid;
		return $return;
	}

	public function createSQL($data='', $table='', $return='boolean'){
		$insertGID = $this->insertGID($table);
		$sql = $insertGID['sql'];
		foreach($data as $key => $value){
			if(!empty($value)){
				$sql .= ", `".$key."` = '".$value."'";
			}
		}
		$db = $this->db;
		$statement = $db->prepare($sql);
		if($statement->execute() === FALSE){return FALSE;}
		elseif($return == 'puid'){return $insertGID['puid'];}
		elseif($return == 'ruid'){return $insertGID['ruid'];}
		else {return TRUE;}
	}

	public function updateSQL($data, $table, $condition){
		if(!empty($data) || !empty($table) || !empty($condition)){
			$sql = "UPDATE `".$table."` SET `revised` = 'Y'";

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

			$db = $this->db;
			$affected_row = $db->exec($sql);
			if($affected_row < 1){return FALSE;}
		}
		return TRUE;
	}

	public function removeSQL($table='', $filter='', $value=''){
		if(!empty($table) && !empty($filter) && !empty($value)){
			$sql = "DELETE FROM `".$table.'` WHERE `'.$filter."` = '".$value."'";
			$db = $this->db;
			$affected_row = $db->exec($sql);
			if($affected_row < 1){return FALSE;}
		}
		return TRUE;
	}


	//========== ROUTING METHOD ==========//
	public function route($route=''){
		if(empty($route) && isset($_GET['route'])){$route = $_GET['route'];}
		if(empty($route)){$route = 'site';}
		return strtolower($route);
	}

	public function uri($uri=''){
		if(empty($uri) && isset($_GET['uri'])){$uri = $_GET['uri'];}
		if(empty($uri)){$uri = 'index';}
		$uri = rtrim($uri, '/');
		$uri = str_replace("/", ".", $uri);
		return strtolower($uri);
	}

	//========== LAYOUT METHOD ==========//
	public function layout($type='view', $name=''){
		if(!empty($name)){$this->{$type} = $name;}
		else {$this->{$type} = $this->uri();}
		return $this->{$type};
	}

	//========== LOAD METHOD ==========//
	public static function load($name='', $type='view'){
	}



	//========== UTILITY METHOD ==========//
	public static function redirect($location){
		return Utility::redirect($location, 0, 'nope');
	}


















//========== [BEGIN] AUTHENTICATION OPPERATION ==========//
	//-------------- logout user  ---------------
	public function logout($uri='login'){
		#@Todo ~ collect user and record logout information
		Utility::sessionStart();
		if(isset($_SESSION['user_puid'])){
			Utility::sessionDelete('user_puid');
		}
		Utility::sessionRestart();
		if(!empty($uri)){
			Utility::redirect($uri);
		}
	}

	//-------------- login  ---------------
	public function login($userid, $password){
		$SQL = "SELECT `puid`, `type`, `password` FROM `user` WHERE '".$userid."' IN (`username`,`email`,`phone`) LIMIT 1";
		$result = $this->runSQL($SQL);
		if(!isset($result['QUERY_ERROR'])){
			if(is_array($result)){
				#verify password
				if(Utility::passwordValid($password, $result['password'])){
					$result['isLogin'] = 'yeap';
				}
				else {
					return 'PASSWORD_INCORRECT';
				}

			}
			return $result;
		}
		else {
			#Todo ~ log error resulting from QUERY [on production, die on development]
		}
		return FALSE;
	}

	//-------------- chane password  ---------------
	public function cpassw($puid, $password, $newpassword){
		$SQL = "SELECT `puid`, `password` FROM `user` WHERE `puid` = '".$puid."' LIMIT 1";
		$result = $this->runSQL($SQL);
		if(!isset($result['QUERY_ERROR'])){
			if(is_array($result)){

				#verify password
				if(!Utility::passwordValid($password, $result['password'])){
					return 'PASSWORD_INCORRECT';
				}
				else {
					#update new password
					$data = array(); $cond = array();
					$newpassword = Utility::password($newpassword);
					$data['password'] = $newpassword;
					$cond['puid'] = $puid;
					if(!$this->updateSQL($data, 'user', $cond)){
						return 'PASSWORD_CHANGE_FAILED';
					}
				}
			}
			return $result;
		}
		else {
			#Todo ~ log error resulting from QUERY [on production, die on development]
		}
		return FALSE;
	}
//========== [END] AUTHENTICATION OPPERATION ==========//

	//-------------- user information  ---------------
	public function user($ruid, $column='*'){
		$condition['puid'] = $ruid;
		$user = $this->findSQL($column, 'user', $condition);
		if(!isset($user['QUERY_ERROR'])){
			return $user;
		}
		#Todo ~ log error resulting from QUERY [on production, die on development]
		return FALSE;
	}

	public function auth(){
		#require login
		Utility::sessionStart();
		if(empty($_SESSION['user_puid'])){
			Utility::redirect('login');
		}
		else {
			#validate active user & return information
			$user = $this->user($_SESSION['user_puid']);
			if($user === FALSE){
				#Todo ~ log when IMPROBABLE CASE Occurs
				Utility::redirect('index');
			}
			elseif($user == 'NO_RECORD'){
				#logout, clear session & return to login
				$this->logout('login');
			}
			return $user;
		}
	}
}
?>