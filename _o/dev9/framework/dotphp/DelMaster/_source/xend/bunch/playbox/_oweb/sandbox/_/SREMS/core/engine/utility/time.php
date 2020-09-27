<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | utility::time
 * Dependency »
 */
function setTimeZone($zone='domestic'){
	 if ($zone == 'domestic') {
	   date_default_timezone_set('Africa/Lagos');
   }		
}

function microtime_float(){
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

function doDate($format='pype',$date='today'){
	#prep date
	if($date=='today'){$dateIs = time();}
	elseif(!$dateIs = strtotime($date)){$dateIs = $date;}
	
	#prep format
	if($format=='pype'){$formatIs = 'l, F d, Y h:i:s A';}
	elseif($format=='date'){$formatIs = 'l, F d, Y';}
	elseif($format=='QD1'){$formatIs = 'd/m/Y';}
	elseif($format=='QD2'){$formatIs = 'd-m-Y';}
	elseif($format=='report'){$formatIs = 'd/m/Y h:i:s A';}
	elseif($format=='time'){return doTime('time',$date);}
	elseif($format=='QD3'){return date('M j').'<sup>'.date('S').'</sup> '.date('Y');}
	elseif($format=='letter'){return date('j').'<sup>'.date('S').'</sup> '.date('F, Y');}		
	elseif($format=='unix'){return doTimeStamp($date);}
	else {$formatIs = $format;}

	return date($formatIs, $dateIs);
}

function doTime($format='time',$time='now'){
	#prep time
	if($time=='now'){$timeIs = time();}
	elseif(!$timeIs = strtotime($time)){$timeIs = $time;}
	
	#prep format
	if($format=='pype'){return doDate('pype',$time);}
	elseif($format=='time'){$formatIs = 'h:i:s A';}
	elseif($format=='unix'){return doTimeStamp($time);}
	else {$formatIs = $format;}
	
	return date($formatIs, $timeIs);
}

function doTimeStamp($string){
	if($timeStamp = strtotime($string)){return $timeStamp;}
	else {
		$error = "can't convert [" .$string. "] to timestamp";
		return $error;
	}
}

function cleanDate ($date = '', $returnAs = 'unix'){	//e.g 	28/02/2013
	$day = substr($date, 0, 2); $year = substr($date, 6, 4); $month = substr($date, 3, 2);
	$months = array(
	'January'=>"01", 'February'=>"02", 'March'=>"03", 'April'=> "04",
	'May'=>"05", 'June'=>"06", 'July'=>"07", 'August'=>"08",
	'September'=>"09", 'October'=>"10", 'November'=>"11", 'December'=>"12");
	$monthName = array_search($month, $months);
	$dateString = ($day .' ' .$monthName. ', '. $year);
	$unixDate = doTimeStamp($dateString);
	$returns = array('unix','date','QD1','QD2','QD3','letter');
	if(in_array($returnAs, $returns)){
		if($returnAs=='unix'){$date = $unixDate;}
		else {
			$date = doDate($returnAs,$unixDate);
		}
	}
	else {
		$date = $dateString;
	}
	
	return $date;
}

function timeBetween($past='',$future,$return='string',$unitAs='long'){
	if($past>=$future){
		return FALSE;
	}
	$time = $future - $past;

	if($unitAs=='short'){
		$units = array(
		'y'=>$time / 31556926 % 12,
		'w'=>$time / 604800 % 52,
		'd'=>$time / 86400 % 7,
		'h'=>$time / 3600 % 24,
		'm'=>$time / 60 % 60,
		's'=>$time % 60);
	}
	elseif($unitAs=='abbr'){
		$units = array(
		' yr'=>$time / 31556926 % 12,
		' wk'=>$time / 604800 % 52,
		' day'=>$time / 86400 % 7,
		' hr'=>$time / 3600 % 24,
		' min'=>$time / 60 % 60,
		' sec'=>$time % 60);
	}
	else {
		$units = array(
		' year'=>$time / 31556926 % 12,
		' week'=>$time / 604800 % 52,
		' day'=>$time / 86400 % 7,
		' hour'=>$time / 3600 % 24,
		' minute'=>$time / 60 % 60,
		' second'=>$time % 60);
	}
	foreach($units as $unit => $value){
    	if($value>1){
    		if($unitAs!='short'){$ret[] = $value . $unit .'s';}
			else {$ret[] = $value . $unit;}
		}
    	if($value==1){$ret[] = $value . $unit;}
    }
	$count = count($ret);
   if($unitAs!='short'){
   	if($count > 1) {
   		array_splice($ret, count($ret)-1, 0, 'and');}
		$ret[] = '';
   }

   if($return=='string'){return join(' ', $ret);}
   if($return=='array'){return $ret;}

   	#RETURNING PARTICULAR UNIT, from the total
   if($return=='Y'){return ($time / 31556926 % 12);}
   if($return=='W'){return ($time / 604800 % 52);}
   if($return=='D'){return ($time / 86400 % 7);}
   if($return=='H'){return ($time / 3600 % 24);}
   if($return=='M'){return ($time / 60 % 60);}
   if($return=='S'){return ($time % 60);}
	
	#end RETURNING PARTICULAR UNIT		
}

function ageCalc($birthDate, $future='now'){ //e.g(YYYY-MM-DD)
  $time = $future;
  if($future=='now'){$time = time();}
  $day = doDate("d", $time); $month = doDate("m", $time); $year = doDate("Y", $time);
  $birthDay = substr($birthDate, 8, 2); $birthMonth = substr($birthDate, 5, 2); $birthYear = substr($birthDate, 0, 4);

  #RETURN YEARS
  if($month < $birthMonth){$subtract = 1;}
  elseif($month==$birthMonth){
	if($day < $birthDay){$subtract = 1;}
	else {$subtract = 0;}
  }
  else {$subtract = 0;}
  $years = $year-$birthYear-$subtract;
  return $years;
}

function timeSpent($unixTime) {
  $nowTime = time();
  $nowDate = doDate("j", $nowTime); $nowMonth = doDate("n", $nowTime); $nowyear = doDate("Y", $nowTime);
  $timeDate = doDate("j", $unixTime); $timeMonth = doDate("n", $unixTime); $timeYear = doDate("Y", $unixTime);
  $timeSpent = "  => "; $numVar = 0; $dateUnit ="  => ";
  
  if($nowTime>=$unixTime){
	 switch(TRUE){		  
		case ($nowTime-$unixTime < 60):
		  // RETURNS SECONDS
		  $seconds = $nowTime-$unixTime; $timeSpent = $seconds; $numVar = 773; $dateunit = 'second';
		  break;			
		case ($nowTime-$unixTime < 3600):
		  // RETURNS MINUTES
		  $minutes = round(($nowTime-$unixTime)/60); $timeSpent = $minutes; $numVar = 774; $dateunit = 'minute';
		  break;			  
		case ($nowTime-$unixTime < 86400):
		  // RETURNS HOURS
		  $hours = round(($nowTime-$unixTime)/3600); $timeSpent = $hours; $numVar = 775; $dateunit = 'hour';
		  break; 
		case ($nowTime-$unixTime < 1209600):
		  // RETURNS DAYS
		  $days = round(($nowTime-$unixTime)/86400); $timeSpent = $days; $numVar = 776; $dateunit = 'day';
		  break;
		case (mktime(0, 0, 0, $nowMonth-1, $nowDate, $nowyear) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
		  // RETURNS WEEKS
		  $weeks = round(($nowTime-$unixTime)/604800); $timeSpent = $weeks; $numVar = 777; $dateunit = 'week';
		  break;			  
		case (mktime(0, 0, 0, $nowMonth, $nowDate, $nowyear-1) < mktime(0, 0, 0, $timeMonth, $timeDate, $timeYear)):
		  // RETURNS MONTHS
		  if($nowyear==$timeYear){$subtract = 0;} else {$subtract = 12;}
		  $months = round($nowMonth-$timeMonth+$subtract); $timeSpent = $months; $numVar = 778; $dateunit = 'month';
		  break;
		default:		  
		  // RETURNS YEARS
		  if($nowMonth<$timeMonth){$subtract = 1;}
		  elseif($nowMonth==$timeMonth){
		  	if($nowDate<$timeDate){$subtract = 1;}
		  	else {$subtract = 0;}
		  } 
		  else {$subtract = 0;}
		  $years = $nowyear-$timeYear-$subtract;
		  $timeSpent = $years;
		  $numVar = 779;
		  $dateunit = 'year';
		  if($years == 0) { $timeSpent = "  => "; $numVar = 0; }
		  break;
	  }
	  
	return Array($numVar, $timeSpent, $dateunit);
	}
	else {
		die("Please enter a past time");
	}
}

function GetTimeSpent($unixTime){
	$timeSpent = timeSpent($unixTime);
	$durationCount = $timeSpent['1']; $dateUnit = $timeSpent['2'];
	if($durationCount>1){$dateUnit = ($dateUnit.'s');}			
	return ($durationCount.' '.$dateUnit.' ago');
}
?>