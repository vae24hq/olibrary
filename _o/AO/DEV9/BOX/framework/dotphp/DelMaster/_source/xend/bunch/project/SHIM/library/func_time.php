<?php
	//require_once("_function/func_display.php");
		
	function unix_time() { //Get Unix time stamp
		$unix_time = time();
		return $unix_time;
	}
		
	function get_unixtime_time($hr, $min, $sec, $mo, $day, $yr) { //BEGIN [GET UNIX TIME from TIME]
		$unix_timestamp = mktime($hr, $min, $sec, $mo, $day, $yr);
		return $unix_timestamp;
	}
	
	function get_unixtime_string($timestring = '') { //[GET UNIX TIME from STRING]
		if($unix_timestamp = strtotime($timestring)) {
			return $unix_timestamp;	
		}
		elseif ($timestring == '') {
			print_msg("Cannot convert <strong>NULL STRING</strong> to time");
		}
		else {
			print_msg("Cannot convert string '{$timestring}' to unix time");
			return;
		}
	}


    function do_date($date_format = 'date', $time_value = 'now') { //BEGIN [DO DATE]
		
		if($time_value == 'now') {
			$unix_time = time();
		}
		elseif (strtotime($time_value)) {
			$unix_time = get_unixtime_string($time_value);
		}
		else {
			$unix_time = $time_value;
		}
		
		if($date_format == 'time') {
			$date_format = "h:i:s a";
		}
		elseif($date_format == 'date') {
			$date_format = "l, F d, Y";
		}
		elseif($date_format == 'QD1') {
			$date_format = "d/m/Y";
		}
		elseif($date_format == 'unix') {
			$date_result = get_unixtime_string($time_value);
			return $date_result;
		}
		$date_result = date("$date_format", $unix_time);			
		return $date_result;
	}

	function set_timezone ($zone = 'domestic'){ //BEGIN [SET TIMEZONE]
	   if ($zone == 'domestic') {
		   date_default_timezone_set('Africa/Lagos');
	   }
	}

		
	
    
	function get_time($unix_time, $show = 'hms', $clock = '12') { //BEGIN [GET TIME]  FROM UNIX TIMESTAMP
		set_timezone();        
		$minute = date("i", $unix_time);
		$second = date("s", $unix_time);
		
		if($clock == '12') {  //12 hour CLOCK
			$hour = date("h", $unix_time);
		} //end 12 hour CLOCK
		else { //24 hour CLOCK
			$hour = date("H", $unix_time);
		} //end 24 hour CLOCK
		
		
	 //SETS TIME DISPLAY
		if($show == 'hr') {  //HOUR
			$time_value = $hour;				
		} //end HOUR		
		elseif($show == 'min') {  //MINUTE
			$time_value = $minute;				
		} //end MINUTE
		elseif($show == 'sec') {  //SECOND
			$time_value = $second;				
		} //end SECOND
		
		elseif($show == 'hms') {  //FULL TIME
			if($clock == '12') { // 12 Hour clock
				$mer = date("A", $unix_time);
				$time_value = ($hour.':'.$minute.':'.$second.' '.$mer);
				
			} // end 12 Hour clock
			else { //24 Hour clock
				$time_value = ($hour.':'.$minute.':'.$second);
			} //end 24 Hour clock				
		} //end FULL TIME      
		
		return $time_value;			
	} 
	
	function get_date($unix_time, $show = 'full_date', $type = 'text', $suffix = 'not_set') { //BEGIN [GET DATE]			
		set_timezone();        
		$date = date("d", $unix_time);
		$year = date("Y", $unix_time);
		$suf = date("S", $unix_time);
		
		if($type == 'num') {  //NUMERIC MONTH
			$month = date("m", $unix_time);				
		} //end NUMERIC MONTH
		elseif($type == 'abbr') {  //ABBREVIATION
			$day = date("D", $unix_time);
			$month = date("M", $unix_time);				
		} //end ABBREVIATION
		elseif ($type == 'text') { //TEXT
			$day = date("l", $unix_time);
			$month = date("F", $unix_time);
		} //end TEXT
		
		
	 //SETS DATE DISPLAY
		if($show == 'full_date') {  //FULL DATE			
			if($suffix == 'set') { // with suffix
				$date_value = ($day.', '.$date.'<sup>'.$suf.'</sup> '.$month. ', '.$year);					
			} // end with suffix
			else { //without suffix
				$date_value = ($day.', '.$month.' '.$date. ', '.$year);					
			} //end without suffix				
		}
		elseif ($show == 'report') {
			$month = date("m", $unix_time);
			$time = date("h:i A", $unix_time);
			$date_value = ($date.'/'.$month. '/'.$year. '&nbsp;&nbsp;'.$time);
		}
		elseif ($show == 'timedate') {
			$date_value = date("dmY", $unix_time);
		}
		return $date_value;
		
	}
	
	function time_since($unix_timestamp_value) { //BEGIN [TIME SINCE]
	  $current_time = unix_time();
	  $current_date = do_date("j", $current_time);
	  $current_month = do_date("n", $current_time);
	  $current_year = do_date("Y", $current_time);
	  
	  $time_date = do_date("j", $unix_timestamp_value);
	  $time_month = do_date("n", $unix_timestamp_value);
	  $time_year = do_date("Y", $unix_timestamp_value);
	  
	  $time_since = "  => ";
	  $num_var = 0;
	  $date_unit ="  => ";

	 if($current_time >= $unix_timestamp_value) {
		 switch(TRUE) {
		  
			case ($current_time-$unix_timestamp_value < 60):
			  // RETURNS SECONDS
			  $seconds = $current_time-$unix_timestamp_value;
			  $time_since = $seconds;
			  $num_var = 773;
			  $dateunit = 'second';
			  break;
			
			case ($current_time-$unix_timestamp_value < 3600):
			  // RETURNS MINUTES
			  $minutes = round(($current_time-$unix_timestamp_value)/60);
			  $time_since = $minutes;
			  $num_var = 774;
			  $dateunit = 'minute';
			  break;
			  
			case ($current_time-$unix_timestamp_value < 86400):
			  // RETURNS HOURS
			  $hours = round(($current_time-$unix_timestamp_value)/3600);
			  $time_since = $hours;
			  $num_var = 775;
			  $dateunit = 'hour';
			  break;
			  
			case ($current_time-$unix_timestamp_value < 1209600):
			  // RETURNS DAYS
			  $days = round(($current_time-$unix_timestamp_value)/86400);
			  $time_since = $days;
			  $num_var = 776;
			  $dateunit = 'day';
			  break;
			  
			  
			case (mktime(0, 0, 0, $current_month-1, $current_date, $current_year) < mktime(0, 0, 0, $time_month, $time_date, $time_year)):
			  // RETURNS WEEKS
			  $weeks = round(($current_time-$unix_timestamp_value)/604800);
			  $time_since = $weeks;
			  $num_var = 777;
			  $dateunit = 'week';
			  break;
			  
			case (mktime(0, 0, 0, $current_month, $current_date, $current_year-1) < mktime(0, 0, 0, $time_month, $time_date, $time_year)):
			  // RETURNS MONTHS
			  if($current_year == $time_year) { $subtract = 0; } else { $subtract = 12; }
			  $months = round($current_month-$time_month+$subtract);
			  $time_since = $months;
			  $num_var = 778;
			  $dateunit = 'month';
			  break;
			default:
			  
			  // RETURNS YEARS
			  if($current_month < $time_month) { 
				$subtract = 1; 
				
			  } elseif($current_month == $time_month) {
				if($current_date < $time_date) { $subtract = 1; } else { $subtract = 0; }
				
			  } else { 
				$subtract = 0; 
				
			  }
			  $years = $current_year-$time_year-$subtract;
			  $time_since = $years;
			  $num_var = 779;
			  $dateunit = 'year';
			  if($years == 0) { $time_since = "  => "; $num_var = 0; }
			  break;

		  }
		  
		return Array($num_var, $time_since, $dateunit);
		}
		else {
			print_msg("Please enter a past time");
		}
	}
	
	function get_time_since ($unix_timestamp_value) { //BEGIN [GET TIME SINCE]
		$time_now_since = time_since($unix_timestamp_value);
		$duration_count = $time_now_since['1'];
		$dateunit = $time_now_since['2'];
			if($duration_count >1){
				$dateunit = ($dateunit.'s');
			}			
		$time_since = ($duration_count.' '.$dateunit.' ago');
		return $time_since;		
	}

	function get_age($birth_date) { //BEGIN [GET AGE from input (YYYY-MM-DD)]
	  $current_time = unix_time();
	  $current_day = do_date("d", $current_time);
	  $current_month = do_date("m", $current_time);
	  $current_year = do_date("Y", $current_time);

	  $time_day = substr($birth_date, 8, 2);
	  $time_month = substr($birth_date, 5, 2);
	  $time_year = substr($birth_date, 0, 4);

	  // RETURNS YEARS
	  if($current_month < $time_month) { 
		$subtract = 1; 
	  } elseif($current_month == $time_month) {
		if($current_day < $time_day) {
		  $subtract = 1;
		} else {
		  $subtract = 0;
		}
	  } else { 
		$subtract = 0; 
	  }
	  $years = $current_year-$time_year-$subtract;
	  return $years;	  
	}
	
	
	
	
	function timebtw($unixvalue){
    $bit = array(
        'y' => $unixvalue / 31556926 % 12,
        'w' => $unixvalue / 604800 % 52,
        'd' => $unixvalue / 86400 % 7,
        'h' => $unixvalue / 3600 % 24,
        'm' => $unixvalue / 60 % 60,
        's' => $unixvalue % 60
        );
        
    foreach($bit as $k => $v)
        if($v > 0)$ret[] = $v . $k;
        
    return join(' ', $ret);
    }
	
	function timebtw2($secs){
    $bit = array(
        ' year'        => $secs / 31556926 % 12,
        ' week'        => $secs / 604800 % 52,
        ' day'        => $secs / 86400 % 7,
        ' hour'        => $secs / 3600 % 24,
        ' minute'    => $secs / 60 % 60,
        ' second'    => $secs % 60
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 's';
        if($v == 1)$ret[] = $v . $k;
        }
    array_splice($ret, count($ret)-1, 0, 'and');
    $ret[] = 'ago.';
    
    return join(' ', $ret);
	
	/** Output:
	$nowtime = time();
	$oldtime = 1335939007;
	echo "time_elapsed_A: ".time_elapsed_A($nowtime-$oldtime)."\n";
	echo "time_elapsed_B: ".time_elapsed_B($nowtime-$oldtime)."\n";
	time_elapsed_A: 6d 15h 48m 19s
	time_elapsed_B: 6 days 15 hours 48 minutes and 19 seconds ago.
	**/
    }
	
	
	function getDaysBtw ($past = '', $future = '') {
		$daysBtw = ($future - $past);
		$daysBtw = ($daysBtw / 86400 % 7);
		return $daysBtw;		
	}
    

    
    





	
	
		function getCleanDate ($datevalue = '', $type = 'unix') {	//e.g 	28/02/2013
		$day = substr("$datevalue", 0, 2); 
		$year = substr("$datevalue", 6, 4);
		$month = substr("$datevalue", 3, 2);
		$monthArray = array(
		"January" => "01"  , "February"  => "02", "March"  => "03", "April"  => "04", "May"  => "05", "June"  => "06",
		"July"  => "07", "August"  => "08", "September"  => "09", "October"  => "10", "November"  => "11", "December"  => "12");
		$monthname = array_search($month, $monthArray);
		$dateString = ($day .' ' .$monthname. ', '. $year);
		$unixdate = get_unixtime_string ($dateString);
		
		if($type = 'unix') { $datevalue = $unixdate;} 		
		elseif($type = 'report') {$datevalue = get_date($unixdate, 'report');}
		else { $datevalue = $dateString;}
		
		return $datevalue;
		}
		
		
		
?>