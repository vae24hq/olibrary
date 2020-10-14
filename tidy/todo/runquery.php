<?php
//RUN QUERY •
public function run($sql='', $return='iBool'){
	if(!empty($sql)){
		$query['syntax'] = $sql;
		$stmt = $this->dbo->prepare($sql);
		if($stmt === false){
			$query['executed'] = false;
			$query['message'] = $this->error($i='iMsg');
			$query['code'] = $this->error($i='iCode');
		}
		else {
			$exec = $stmt->execute();
			if($exec === true){
				$query['executed'] = true;
				if($return == 'iBool'){return true;}
				elseif($return == 'iAffected'){return $stmt->affected_rows;}
				else {


						// $o['record'] = $stmt->affected_rows;
						// $o['record'] = $stmt->num_rows;
				// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				// if($result != false && !empty($result)){
				// 	$o['recordset'] = $result;
				// }
				// else {
				// 	$o['recordset'] = false;
				// }
				}
			}
			else {
				$query['executed'] = false;
				$query['message'] = error($i='iMsg');
				$query['code'] = error($i='iCode');
			}
		}

		if(!empty($query) && is_array($query)){$o['query'] = $query;}

		echo oPrint::Neat($o);
	}
	return false;
}