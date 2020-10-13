<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oData ~ Summary of Class • DEPENDENCY»
 */
class oData {
	private static $Instance;


	//CONSTRUCT • Prevents multiple instantiation
	private function __construct(){return;}


	//CLONE • Prevent duplicate
	private function __clone(){return;}


	//INSTANTIATE • Return fresh instance
	public static function Instantiate(){
		if(is_null(self::$Instance)){
			self::$Instance = new self();
		}
		return self::$Instance;
	}


	//GUID • Auto populate queryset with puid|euid|suid
	public static function GUID($queryset=''){
		$data = array();
		if(empty($queryset)){$queryset = array();}
		if(!array_key_exists('puid', $queryset)){$data['puid'] = oRandom::Create('iPuid');}
		if(!array_key_exists('euid', $queryset)){$data['euid'] = oRandom::Create('iEuid');}
		if(!array_key_exists('suid', $queryset)){$data['suid'] = oRandom::Create('iSuid');}
		return array_merge($data, $queryset);
	}


} // EndOfClass - oData