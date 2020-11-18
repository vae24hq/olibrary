<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oUtil ~ Helper Utilities • DEPENDENCY»
 */
class oUtil {
	#CURRENCY DB • Currency database
	public static function currencyDB(){
		$o = array(
			'NGN' => array('iSign' => '₦', 'iCountry' => 'Nigeria', 'iCurrency' => 'Naira'),
			'USD' => array('iSign' => '$', 'iCountry' => 'United States', 'iCurrency' => 'Dollar'),
			'GBP' => array('iSign' => '£', 'iCountry' => 'United Kingdom', 'iCurrency' => 'Pound'),
			'EUR' => array('iSign' => '€', 'iCountry' => 'Europe', 'iCurrency' => 'Euro'),
			'JPY' => array('iSign' => '¥', 'iCountry' => 'Japan', 'iCurrency' => 'Yen'),
			'INR' => array('iSign' => '₹', 'iCountry' => 'India', 'iCurrency' => 'Rupee'),
		);
		return $o;
	}





} #EndOfClass - oUtil