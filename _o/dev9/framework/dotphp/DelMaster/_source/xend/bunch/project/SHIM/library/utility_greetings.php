<?php
	//function for greetings
	function greetings($currenttime, $get_remark = 'yes'){
		//returns - good morning
		if($currenttime < '12') {
			$greeting = "Good Morning!";
		}
		elseif($currenttime < '17') {
			$greeting = "Good Afternoon!";
		}
		else {
			$greeting = "Good Evening!";
		}
		
		//returns greetings and remark
		if($get_remark == 'yes'){
			$remark = greetings_remark($currenttime);
			$greeting = ($remark.'<strong>'.$greeting.'</strong>');
		}
		
		return $greeting;
	}
	
	
	//function for greeting's remark
	function greetings_remark($currenttime){
		
		if(($currenttime > '2') &&  ($currenttime < '7')) { //returns -  you're up early
			$remark = "You're up early - ";
		}
		elseif(($currenttime > '21') ||  ($currenttime < '3')) { //returns -  you're up late
			$remark = "You're up late - ";
		}
		else {
			$remark = "";
		}
		
		return $remark;
	}
    ?>