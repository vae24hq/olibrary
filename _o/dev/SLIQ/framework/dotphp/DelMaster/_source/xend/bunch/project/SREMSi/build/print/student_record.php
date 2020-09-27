<?php
function isInStudent($record = '*',$object='student'){
  inSession();
  if(!empty($_SESSION['StudentBindID'])){$StudentBindID = $_SESSION['StudentBindID'];}
  else {$StudentBindID = '';}
  if(!empty($_SESSION['StudentPersonBindID'])){$StudentPersonBindID = $_SESSION['StudentPersonBindID'];}
  else {$StudentPersonBindID = '';}
  if(!empty($_SESSION['AdmissionBindID'])){$StudentAdmissionBindID = $_SESSION['AdmissionBindID'];}
  else {$StudentAdmissionBindID = '';}

  if($object=='student'){$queryBindID = $StudentBindID;}
  if($object=='person'){$queryBindID = $StudentPersonBindID;}
  if($object=='admission'){$queryBindID = $StudentAdmissionBindID;}

  $queryFilter = "WHERE `BindID` ='".$queryBindID."'";

  if($record == 'shortname' || $record == 'fullname'){$column = '*';}
  else {$column = $record;}

  $isInStudent = Select($column, $object, $queryFilter);
  if(!$isInStudent){return FALSE;}
  else {
    if(!empty($isInStudent['row'])){$isRS = $isInStudent['row'];}
    else {$isRS = $isInStudent;}

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
?><div id="formPage" class="group">
  <section class="module">
    <h4 class="moduleTitle"><?php global $moduleTitle; echo $moduleTitle;?></h4>
    <div class="moduleContent"><?php include(SLICE.DS.'instudent.php');?>
    </div>
  </section>
</div>
