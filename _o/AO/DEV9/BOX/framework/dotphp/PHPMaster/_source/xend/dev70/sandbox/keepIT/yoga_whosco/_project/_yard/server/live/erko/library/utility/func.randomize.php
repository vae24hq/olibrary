<?php
/* Cigna™ - a micro web content management system by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | func:randomize - randomization
 * Dependency » 
 */
	
	function doRand($return = 'suid'){
		$suid = mt_rand(100000000, 999999999);
		$buid = time().mt_rand(10000, 99999);
		
		$alphabets = array('A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z');
		$randAlphabets = array_rand($alphabets, 51);
		$randAlphabet = ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		
		$numbers = array(0,1,2,3,4,5,6,7,8,9);
		$randNumbers = array_rand($numbers, 10);
		$randNumber = ($numbers[$randNumbers[mt_rand(0,9)]]);
		if($return=='suid') {$random = $suid;}
		if($return=='buid') {$random = $buid;}
		if($return=='ref') {
			$random = ($alphabets[$randAlphabets[mt_rand(0,9)]]);
			$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
			$random .= mt_rand(1000, 9999);
			$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
			$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		}
		return $random;
	}
?>