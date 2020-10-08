<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
* Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
* ============================================================================================
* oBrowser ~ Browser Utility • DEPENDENCY»
*/
class oBrowser {

	//METHOD •
	public static function Is(){
		return strtolower($_SERVER['HTTP_USER_AGENT']);
	}

} // EndOfClass - oBrowser