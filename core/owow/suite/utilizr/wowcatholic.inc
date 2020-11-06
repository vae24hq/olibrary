<?php
class WOWCatholic {
	public function __construct($config){
		#initiate db & dbo
		$this->db = new oDatabase($config['database']);
		$this->dbo = $this->db->dbo();

	}

	public function signup($input){
		$input = oSQL::prep($input); #remove empty input
		$input = oSQL::guid($input);
		$sql = oSQL::insert('userao', $input, 'iParam');
		$stmt = $this->dbo->prepare($sql);
		$execute = $stmt->execute($input);
		if($execute === false){
			$PDOError = $stmt->errorInfo();
			return $PDOError[2];
		}

		#SUCCESSFUL at this point (return SUID as BIND)
		return array('bind' => $input['suid'], 'step' => 1, 'activity' => 'signup'); #return $execute;
	}
}