
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



	public function update($input){
		$input = oSQL::prep($input);
		if(isset($input['id'])){
			$id = $input['id'];
			unset($input['id']);

			$where['suid'] = $id;

			$sql = oSQL::update('userao', $input, $where, 'iParam');
			$stmt = $this->dbo->prepare($sql);
			$execute = $stmt->execute(array_merge($input, $where));
			if($execute === false){
				$PDOError = $stmt->errorInfo();
				return $PDOError[2];
			}
			elseif($execute === true){
				$count = $stmt->rowCount();
			}

			#UPDATE IS SUCCESSFUL
			return array('bind' => $id, 'activity' => $input['activity'], 'step' => $input['step']); #return $execute;
		}

		#FAILED - because user id is required
		return array('report' => 'failed - no user id input');
	}
}