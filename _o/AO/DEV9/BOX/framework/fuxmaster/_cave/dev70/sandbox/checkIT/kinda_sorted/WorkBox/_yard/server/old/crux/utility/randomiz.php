<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | randomiz::utility ~ generate randomly unique values
 */

//Return random value
function randomiz($return =''){
	#prepare values
	$prid = mt_rand(100000000, 999999999);

	#prepare & return task
	if($return=='prid'){return $random = $prid;}
	$suid = str_shuffle(time()).mt_rand(10000, 99999);
	if($return=='suid'){return $random = $suid;}
	if($return=='time'){return $random = time();}

	$alphabets = array('A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z');
	$randAlphabets = array_rand($alphabets, 51);
	$randAlphabet = ($alphabets[$randAlphabets[mt_rand(0,9)]]);

	$numbers = array(0,1,2,3,4,5,6,7,8,9);
	$randNumbers = array_rand($numbers, 10);
	$randNumber = ($numbers[$randNumbers[mt_rand(0,9)]]);

	if($return=='tuid'){
		$random = ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= str_shuffle($suid);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= mt_rand(1000, 9999);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		return $random;
	}

	if($return=='bind'){
		$random = mt_rand(100, 999);
		$random .= time();
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= str_shuffle($suid);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= str_shuffle($prid);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		$random .= ($alphabets[$randAlphabets[mt_rand(0,9)]]);
		return $random;
	}
	if($return=='logid'){return str_shuffle(randomiz('prid').randomiz('bind').randomiz('tuid'));}
	if(empty($return)){return mt_rand();}
}

//Return randomized values
function get_random(){
	#prepare values
	$prid  = randomiz('prid');
	$suid  = randomiz('suid');
	$tuid  = randomiz('tuid');
	$bind  = randomiz('bind');
	$time  = randomiz('time');
	$logid = randomiz('logid');

	#prepare task
	$chore  = '<pre>';
	$chore .= 'PRID: '."\t".strlen($prid)."\t".$prid.'<br>';
	$chore .= 'SUID: '."\t".strlen($suid)."\t".$suid.'<br>';
	$chore .= 'TUID: '."\t".strlen($tuid)."\t".$tuid.'<br>';
	$chore .= 'BIND: '."\t".strlen($bind)."\t".$bind.'<br>';
	$chore .= 'Time: '."\t".strlen($time)."\t".$time.'<br>';
	$chore .= 'LogID: '."\t".strlen($logid)."\t".$logid.'<br>';
	$chore .= '</pre>';
	
	#return task
	return $chore;
}
?>