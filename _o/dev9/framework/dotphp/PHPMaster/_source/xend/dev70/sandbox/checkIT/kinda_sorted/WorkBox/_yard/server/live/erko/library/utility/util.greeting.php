<?php
/* Cigna™ - a micro web content management system by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | util:greeting - welcome greetings
 * Dependency » 
 */
	
	function Greetings($withRemark='yes'){
		$timeIs = date("H");
		if($timeIs < '12'){$greeting = 'Good Morning!';}
		elseif($timeIs < '17'){$greeting = 'Good Afternoon!';}
		else {$greeting = 'Good Evening!';}

		if($withRemark=='yes'){
			$remark = Remark();
			$greeting = ($remark.'<b>'.$greeting.'</b>');
		}		
		return $greeting;
	}
	
	function Remark(){
		$timeIs = date("H"); $remark = '';
		if($timeIs > '2' && $timeIs < '7'){$remark = "You're up early - ";}
		elseif($timeIs > '21' ||  $timeIs < '3'){$remark = "You're up late - ";}
		return $remark;
	}
?>