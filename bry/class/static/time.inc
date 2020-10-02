<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oTime ~ Date, Time & Period Utilities • DEPENDENCY»
 */
class oTime {
	//MICRO •
	public static function Micro(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}


} // EndOfClass - oTime