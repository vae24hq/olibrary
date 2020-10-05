<?php
class HarvestPad {
	public $SQL;
	public $project;

	function __construct($config){
		if(!empty($config['project'])){$this->project = $config['project'];}
		$this->SQL = new oSQL($config['database']);
	}






	public function ParishList(){
		$sql = 'SELECT `suid` AS `ID`, CONCAT(`name`, " - ",`suburb`, ", ",`city`) AS `Title` FROM `parisho` WHERE `status` = 2;';
		return $this->SQL->Handler($sql, false);
	}

}