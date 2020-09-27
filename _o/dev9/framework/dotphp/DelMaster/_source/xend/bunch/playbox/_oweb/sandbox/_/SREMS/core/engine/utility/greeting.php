<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | utility::session
 * Dependency »
 */
function greetings($withRemark='yes'){
	$timeIs = date("H");
	if($timeIs < '12'){$greeting = 'Good Morning!';}
	elseif($timeIs < '17'){$greeting = 'Good Afternoon!';}
	else {$greeting = 'Good Evening!';}

	if($withRemark=='yes'){
		$remark = remark();
		$greeting = ($remark.'<strong>'.$greeting.'</strong>');
	}		
	return $greeting;
}

function remark(){
	$timeIs = date("H"); $remark = '';
	if($timeIs > '2' && $timeIs < '7'){$remark = "You're up early - ";}
	elseif($timeIs > '21' ||  $timeIs < '3'){$remark = "You're up late - ";}
	return $remark;
}
?>