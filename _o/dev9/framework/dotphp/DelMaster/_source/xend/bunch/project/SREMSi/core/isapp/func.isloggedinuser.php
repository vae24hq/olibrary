<?php
function isLoggedInStudent($record = '*',$object='user'){
  inSession();
  if(!empty($_SESSION['UserBindID'])){$UserBindID = $_SESSION['UserBindID'];}
  else {$UserBindID = '';}
  if(!empty($_SESSION['StudentBindID'])){$StudentBindID = $_SESSION['StudentBindID'];}
  else {$StudentBindID = '';}
  if(!empty($_SESSION['StudentPersonBindID'])){$StudentPersonBindID = $_SESSION['StudentPersonBindID'];}
  else {$StudentPersonBindID = '';}
  if(!empty($_SESSION['StudentAdmissionBindID'])){$StudentAdmissionBindID = $_SESSION['StudentAdmissionBindID'];}
  else {$StudentAdmissionBindID = '';}

  if($object=='user'){$queryBindID = $UserBindID;}
  if($object=='student'){$queryBindID = $StudentBindID;}
  if($object=='person'){$queryBindID = $StudentPersonBindID;}
  if($object=='admission'){$queryBindID = $StudentAdmissionBindID;}

  $queryFilter = "WHERE `BindID` ='".$queryBindID."'";

  if($record == 'shortname' || $record == 'fullname'){$column = '*';}
  else {$column = $record;}

  $isLoggedInStudent = Select($column, $object, $queryFilter);
  if(!$isLoggedInStudent){return FALSE;}
  else {
    if(!empty($isLoggedInStudent['row'])){$isRS = $isLoggedInStudent['row'];}
    else {$isRS = $isLoggedInStudent;}

    	#ADDITIONAL ENHANCEMENT
		if($record == 'shortname'){
			if(!empty($isRS["FirstName"])){$task = $isRS["FirstName"];}
			if(!empty($isRS["LastName"])){$task .= ' '.$isRS["LastName"];} 
			return $task; 
		}
		elseif($record == 'fullname'){
			if(!empty($isRS["FirstName"])){$task = $isRS["FirstName"];}
			if(!empty($isRS["OtherName"])){$task .= ' '.$isRS["OtherName"];}
			if(!empty($isRS["LastName"])){$task .= ' '.$isRS["LastName"];}	
			return $task;
		}
    return $isRS;
  }
}
?>