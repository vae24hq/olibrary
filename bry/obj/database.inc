<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oDatabase ~ database utility class • DEPENDENCY»
 */
class oDatabase {

	public function __construct($config=''){
		if(!empty($config)){
			$this->init($config);
		}

	}
} # EndOfClass - oDatabase