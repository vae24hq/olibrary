<?php

function getRecord($data,$bind,$object){
	global $dbconnect;

	if($object=='staffAccount'){
		$query = sprintf("SELECT * FROM user WHERE BindID = %s AND `UserType` <> 'student'", GetSQLValueString($bind, "text"));
	}
	if($object=='studentAccount'){
		$query = sprintf("SELECT * FROM user WHERE BindID = %s AND `UserType` = 'student'", GetSQLValueString($bind, "text"));
	}
	if($object=='student'){
		$query = sprintf("SELECT * FROM student WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='staff'){
		$query = sprintf("SELECT * FROM staff WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='admission'){
		$query = sprintf("SELECT * FROM admission WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='person'){
		$query = sprintf("SELECT * FROM person WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='semester'){
	  $query = sprintf("SELECT * FROM academic_semester WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='department'){
		$query = sprintf("SELECT * FROM department WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='course_group'){
		$query = sprintf("SELECT * FROM course_group WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='course'){
		$query = sprintf("SELECT * FROM course WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}

	if($object=='question'){
		$query = sprintf("SELECT * FROM exam_question WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='level'){
  		$query = sprintf("SELECT * FROM academic_level WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='program'){
  		$query = sprintf("SELECT * FROM program WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='program_type'){
  		$query = sprintf("SELECT * FROM program_type WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='degree'){
  		$query = sprintf("SELECT * FROM program_degree WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='credit_limit'){
  		$query = sprintf("SELECT * FROM academic_credit WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	if($object=='exam'){
  		$query = sprintf("SELECT * FROM exam_course WHERE BindID = %s", GetSQLValueString($bind, "text"));
	}
	




	if($object=='exam_result_course_reg'){
		$query = sprintf("SELECT * FROM course_reg WHERE `Course` = %s", GetSQLValueString($bind, "text"));
	}



	$Record = mysql_query($query, $dbconnect) or die(mysql_error());
	$row_Record = mysql_fetch_assoc($Record);
  	$totalRows_Record = mysql_num_rows($Record);

  	if($totalRows_Record !=0){
  		if(!empty($data)){
  			if($data == 'isRecord'){
  				return TRUE;
  			}
  			elseif($data == 'shortname'){
		        if(!empty($row_Record["FirstName"])){$task = $row_Record["FirstName"];}
		        if(!empty($row_Record["LastName"])){$task .= ' '.$row_Record["LastName"];} 
		        return $task; 
	      	}
	      	elseif($data == 'fullname'){
				if(!empty($row_Record["FirstName"])){$task = $row_Record["FirstName"];}
				if(!empty($row_Record["OtherName"])){$task .= ' '.$row_Record["OtherName"];}
				if(!empty($row_Record["LastName"])){$task .= ' '.$row_Record["LastName"];}	
				return $task;
			}
  			else {
  				if(!empty($row_Record[$data])){
  					return $row_Record[$data];
  				}
		        else {return FALSE;}
		    }
  		}

  	}
  	else {
  		return FALSE;
  	}      
}


global $dbconnect;

$query_rsOfLevel = "SELECT * FROM academic_level ORDER BY `Level` ASC";
$rsOfLevel = mysql_query($query_rsOfLevel, $dbconnect) or die(mysql_error());
$row_rsOfLevel = mysql_fetch_assoc($rsOfLevel);
$totalRows_rsOfLevel = mysql_num_rows($rsOfLevel);

$query_rsOfDepartment = "SELECT * FROM department ORDER BY Title ASC";
$rsOfDepartment = mysql_query($query_rsOfDepartment, $dbconnect) or die(mysql_error());
$row_rsOfDepartment = mysql_fetch_assoc($rsOfDepartment);
$totalRows_rsOfDepartment = mysql_num_rows($rsOfDepartment);

$query_rsOfGroup = "SELECT * FROM course_group ORDER BY Title ASC";
$rsOfGroup = mysql_query($query_rsOfGroup, $dbconnect) or die(mysql_error());
$row_rsOfGroup = mysql_fetch_assoc($rsOfGroup);
$totalRows_rsOfGroup = mysql_num_rows($rsOfGroup);

$query_rsOfCourse = "SELECT * FROM course ORDER BY Title ASC";
$rsOfCourse = mysql_query($query_rsOfCourse, $dbconnect) or die(mysql_error());
$row_rsOfCourse = mysql_fetch_assoc($rsOfCourse);
$totalRows_rsOfCourse = mysql_num_rows($rsOfCourse);

$query_rsOfQuestion = "SELECT * FROM exam_question ORDER BY Question ASC";
$rsOfQuestion = mysql_query($query_rsOfQuestion, $dbconnect) or die(mysql_error());
$row_rsOfQuestion = mysql_fetch_assoc($rsOfQuestion);
$totalRows_rsOfQuestion = mysql_num_rows($rsOfQuestion);

$query_rsOfSemester = "SELECT * FROM academic_semester ORDER BY `Title` ASC";
$rsOfSemester = mysql_query($query_rsOfSemester, $dbconnect) or die(mysql_error());
$row_rsOfSemester = mysql_fetch_assoc($rsOfSemester);
$totalRows_rsOfSemester = mysql_num_rows($rsOfSemester);

$query_rsOfProgram = "SELECT * FROM program ORDER BY Title ASC";
$rsOfProgram = mysql_query($query_rsOfProgram, $dbconnect) or die(mysql_error());
$row_rsOfProgram = mysql_fetch_assoc($rsOfProgram);
$totalRows_rsOfProgram = mysql_num_rows($rsOfProgram);

$query_rsOfProgramDegree = "SELECT * FROM program_degree ORDER BY Acronym ASC";
$rsOfProgramDegree = mysql_query($query_rsOfProgramDegree, $dbconnect) or die(mysql_error());
$row_rsOfProgramDegree = mysql_fetch_assoc($rsOfProgramDegree);
$totalRows_rsProgramOfDegree = mysql_num_rows($rsOfProgramDegree);

$query_rsOfProgramType = "SELECT * FROM program_type ORDER BY Title ASC";
$rsOfProgramType = mysql_query($query_rsOfProgramType, $dbconnect) or die(mysql_error());
$row_rsOfProgramType = mysql_fetch_assoc($rsOfProgramType);
$totalRows_rsOfProgramType = mysql_num_rows($rsOfProgramType);


function getStudentRow($data,$userBind, $object){
  $queryCond = "WHERE `User` = '".$userBind."'";
  $studentTab = array('person');
  $admissionTab = array('admission');
  if(in_array($object, $studentTab)){
    $result = Select('Person','student',$queryCond);
    return getRecord($data,$result,'person');
  }
}
?>