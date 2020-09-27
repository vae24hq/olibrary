<?php
	function do_rand ($type = 's', $maxno = '', $minno = '0') {
		$micro_gen = rand(1000, 9999);
		$macro_gen = mt_rand(100000000, 999999999);
		$rand_content = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$content_value_random = array_rand($rand_content, 14);
		$randva1 = ($rand_content[$content_value_random[7]]);
		$randva2 = ($rand_content[$content_value_random[9]]);
		$randva3 = ($rand_content[$content_value_random[3]]);
		$randva4 = ($rand_content[$content_value_random[1]]);
		$randva5 = ($rand_content[$content_value_random[13]]);
		$randvafuid = ($rand_content[$content_value_random[10]]);
		
		if ($maxno == '') {
			$maxno = mt_getrandmax(); 
		}
		$micronum = mt_rand($minno, $maxno);
		$microid = mt_rand('10000', '99999');
		$suid = $randva3.$randva2.$micro_gen.$randva1.$randva4.$randva5.$macro_gen;
		$tuid = time();
		$fuid = $randvafuid.$randva1.$macro_gen.$micro_gen.$randva3.$randva4.$tuid.$randva2.$randva5;
			
		if ($type == 'm') {					 
			$result = $micronum;
		}
		if ($type == 'cusid') {					 
			$result = $microid;
		}
		if ($type == 's') {
			$result = $suid;
		}
		if ($type == 't') {
			$result = $tuid;
		}
		if ($type == 'f') {
			$result = $fuid;
		}				
		return $result;	
	}
	
	//echo do_rand('s') . "<br/>" . do_rand('t') . "<br/>" . do_rand('f') . "<br/>";
?>