<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oSQL ~ SQL Utility • DEPENDENCY»
 */
class oSQL {
	public $dbo;

	//CONSTRUCT • Initiate DB Connection
	public function __construct($config='', $driver='iPDO'){
		$db = new oDatabase($config, $driver);
		$this->dbo = $db->connection();
		return;
	}


} // EndOfClass - oSQL