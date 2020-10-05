<?php
class HarvestPad {
	public $dbo;
	public $project;

	function __construct($config){
		if(!empty($config['project'])){$this->project = $config['project'];}
		$db = new oDatabase($config['database']);
		$this->dbo = $db->connect();
	}


}