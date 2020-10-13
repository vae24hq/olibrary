<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oPDO ~ MySQLi Utility • DEPENDENCY»
 */
class oPDO {
	public $dbo;

	//CONSTRUCT • Initiate DB Connection
	public function __construct($config=''){
		$database = new oDatabase($config, 'iPDO');
		$this->dbo = $database->connection();
		return;
	}

} // EndOfClass - oPDO