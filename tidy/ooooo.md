	// //SQL • Perform SQL Query & Prepare Result
	// public function SQL($q='', $v='iFetchAll', $debug=false){
	// 	if(empty($this->connected)){return $this->oExit('disconnected');}

	// 	// $statement = self::$connection->prepare($query);
	// 	// if($statement->execute()){
	// 	// 	if($boolean === 'yeah'){return true;}
	// 	// 	return $statement;
	// 	// }
	// 	// else {
	// 	// 	return self::report($statement);
	// 	// }
	// 	// $o = $this->dbo()->query($q);
	// 	$o = $this->dbo()->prepare($q);
	// 	// if($o !== false){
	// 	// 	$exec = $o->execute();
	// 	// }
	// 	// echo oPrint::Neat($o);
	// 	return $this->handler($o, $q, $v, $debug);
	// }




	if(!empty($resp)){$resp = $this->respSQL($stmt, $status, $v, $debug, $resp);}
		else {$resp = $this->respSQL($stmt, $status, $v, $debug);}
		return $resp;