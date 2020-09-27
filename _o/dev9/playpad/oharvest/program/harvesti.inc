<?php
class HarvestApp {
	public $dbo;

	function __construct($data){

		//create PDO Database Connection Object
		$config_db = $data['config']['database'];
		$database = new oDatabase($config_db);
		$this->dbo = $database->connect();

	}

	function SQL($query){
		$stmt = $this->dbo->prepare($query);
		$exec = $stmt->execute();
		if($exec === true){
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result != false && !empty($result)){
				return $result;
			}
		}
		return false;
	}


	function Login($user_id, $password){
		$query = "SELECT `euid` FROM `user` WHERE `username` = '{$user_id}' AND `password` = '{$password}';";
		$user = $this->SQL($query);
		if(!empty($user)){
			return $user;
		// 	return $user = $user[0];
		// 	#if(!empty($user['euid'])){
		// 		#$
		// }

		}
		return false;
	}


	function AllUsers(){
		return $this->SQL("CALL UsersAll()");
	}

}