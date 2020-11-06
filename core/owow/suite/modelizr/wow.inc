
<?php
class WOWCa {
	public function __construct($config){
		$this->project = $config['project'];

		#initiate database
		$this->db = new oDatabase($config['database']);
		$this->dbo = $this->db->dbo();

	}

	public function signup($input){
		$input = oSQL::prep($input); #remove empty input
		$input = oSQL::guid($input);

		$input['activity'] = 'signup';
		$input['step'] = 1;

		$sql = oSQL::insert('userao', $input, 'iParam');
		$stmt = $this->dbo->prepare($sql);
		$execute = $stmt->execute($input);
		if($execute === false){
			$PDOError = $stmt->errorInfo();
			return $PDOError[2];
		}

		#SUCCESSFUL at this point (return SUID as BIND)
		return array('bind' => $input['suid'], 'activity' => $input['activity'], 'step' => $input['step']); #return $execute;
	}
}