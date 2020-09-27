<?php
function do_rand($return =''){
	$prid = mt_rand(100000000, 999999999);
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
	if($return=='logid'){return str_shuffle(do_rand('prid').do_rand('bind').do_rand('tuid'));}
	if(empty($return)){return mt_rand();}
}
?>