<?php
function getCourse($data,$bind){
  global $database_dbcon; global $dbcon;
  mysql_select_db($database_dbcon, $dbcon);
  $query_Course = sprintf("SELECT * FROM course WHERE BindID = %s", GetSQLValueString($bind, "text"));
  $Course = mysql_query($query_Course, $dbcon) or die(mysql_error());
  $row_Course = mysql_fetch_assoc($Course);
  $totalRows_Course = mysql_num_rows($Course);  
  if($totalRows_Course !=0){
    if($data != ''){
      if($data == 'isCourse'){
        $task = TRUE;
      }
      else {
        if(!empty($row_Course[$data])){$task = $row_Course[$data];}
        else {return FALSE;}
      }
      return $task;       
      } 
  }       
}

$query_rsOfCourse = "SELECT * FROM course ORDER BY Title ASC";
$rsOfCourse = mysql_query($query_rsOfCourse, $dbcon) or die(mysql_error());
$row_rsOfCourse = mysql_fetch_assoc($rsOfCourse);
$totalRows_rsOfCourse = mysql_num_rows($rsOfCourse);
?>