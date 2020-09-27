<?php
function writeExam(){
	if(!empty($_POST['StartExam'])){
		startExam();
		$question = loadQuestion();
		if($question){
			$url = "exam_live&id=".$_GET['id']."&exam=".$_GET['exam'];
			redirect(isURL($url),0,'off');
		}
		else {
			$url = "exam_done&id=".$_GET['id']."&exam=".$_GET['exam'];
			redirect(isURL($url),0,'off');
		}
	}
}

function startExam(){
	$_SESSION['examinationBindID'] = $_GET['exam'];
	$_SESSION['examinationCourseBindID'] = $_GET['id'];
	$StartTime = doTime('unix');
	$Duration = $_POST['duration'];
	$EndTime = doTimeStamp('+'.$Duration.' mins');
	$TimeNow = doTime('unix');
	$TimeRemains = timeBetween($TimeNow, $EndTime);
	$_SESSION['liveExamBindID'] = randomize('bind');
	$puid = randomize('puid');
	$suid = randomize('suid');
	$tuid = randomize('tuid');
	$time = randomize('time');

	#Insert Record
	$insertSQL = "INSERT INTO `exam` (User, Student, Course, ExamCourse, Duration, StartTime, EndTime, RemaingTime, Status, ";
	$insertSQL .= " PUID, SUID, TUID, BindID, EntryStamp)";
	$insertSQL .=" VALUES ('$_SESSION[UserBindID]', '$_SESSION[StudentBindID]', '$_SESSION[examinationCourseBindID]', '$_SESSION[examinationBindID]', '$Duration', '$StartTime', '$EndTime', '$TimeRemains', 'started', ";
	$insertSQL .=" '$puid', '$suid', '$tuid', '$_SESSION[liveExamBindID]', '$time')";
	return $insert = Query($insertSQL);
}

function endExam(){
	$queryendExam = "SELECT *, sum(OptionScore) FROM `exam_live_question`";
	$queryendExam .= " WHERE `User` = '".$_SESSION['UserBindID']."'";
	$queryendExam .= " AND `Student` = '".$_SESSION['StudentBindID']."'";
	$queryendExam .= " AND `Course` = '".$_SESSION['examinationCourseBindID']."'";
	$queryendExam .= " AND `Exam` = '".$_SESSION['liveExamBindID']."'";
	$queryendExam .= " AND `Status` = 'answered'";

	$rsEndExam = Query($queryendExam);
	$rsEndExamRow = mysql_fetch_assoc($rsEndExam);
	$totalrsEndExamRow = mysql_num_rows($rsEndExam);
	$totalScore = 0;
	if($totalrsEndExamRow !=0){
		$totalScore = $rsEndExamRow['sum(OptionScore)'];
	}

	#UPDATE COURSE REG SCORE
	$query = "UPDATE `course_reg` SET `Score` = '".$totalScore."', `Status` = 'done'";
	$query .= " WHERE `Student` = '".$_SESSION['UserBindID']."'";
	$query .= " AND `Course` = '".$_SESSION['examinationCourseBindID']."'";
	$update = Query($query);
}

function loadQuestion(){
	$queryrsLiveExam = "SELECT * FROM `exam` WHERE  `BindID` = '".$_SESSION['liveExamBindID']."'";
	$rsLiveExam = Query($queryrsLiveExam);
	$rsLiveExamRow = mysql_fetch_assoc($rsLiveExam);
	$totalrsLiveExamRow = mysql_num_rows($rsLiveExam);

	$query = "SELECT * FROM `exam_question` WHERE `Course` ='".$rsLiveExamRow['Course']."'";
	
		$querySub = "SELECT `Question` FROM `exam_live_question`";
		$querySub .= " WHERE `User` = '".$_SESSION['UserBindID']."'";
		$querySub .= " AND `Student` = '".$_SESSION['StudentBindID']."'";
		$querySub .= " AND `Course` = '".$_SESSION['examinationCourseBindID']."'";
		$querySub .= " AND `Exam` = '".$_SESSION['liveExamBindID']."'";
		$query .= " AND `BindID`";
		$query .= " NOT IN ($querySub)";

	$query .= " ORDER BY RAND()";
	$rsExamQuestion = Query($query);
	if($rsExamQuestion){return $rsExamQuestion;}
	else {return FALSE;}
}

function postAnswer(){ //only if action selected is set to answer
	$QuestionBindID = $_POST['QuestionBindID'];
	if(!empty($_POST['OptionSelected'])) {$OptionSelected = $_POST['OptionSelected'];}
	elseif(!empty($_POST['AnsEntered'])) {$OptionSelected = $_POST['AnsEntered'];}	

	$puid = randomize('puid');
	$suid = randomize('suid');
	$tuid = randomize('tuid');
	$time = randomize('time');
	$BindID = randomize('bind');

	#prep OptionScore
	$prepCondiction = "WHERE `BindID` = '".$QuestionBindID."'";
	$prepQ = Select('*','exam_question',$prepCondiction);
	if($prepQ){
		$prepQRow = $prepQ['row'];
		$QuestionAnswer = $prepQRow['Answer'];
	}
	
	if(!empty($_POST['AnsEntered'])) {
		$QuestionAnswer = strtolower($prepQRow['OptionA']);
		$OptionSelected = strtolower($OptionSelected);
		$correct = strpos($QuestionAnswer, $OptionSelected);
		if ($correct === false) {$OptionScore = 0;}
		else {$OptionScore = $prepQRow['Mark'];}
	}
	else {
		if($OptionSelected == $QuestionAnswer){
		$OptionScore = $prepQRow['Mark'];} else {$OptionScore = 0;}
	}

	#TAKE QUESTION
	$insertLiveQuestion = "INSERT INTO `exam_live_question` (User, Student, Course, Exam, Question, OptionSelected, OptionScore, Status, ";
	$insertLiveQuestion .= " PUID, SUID, TUID, BindID, EntryStamp)";
	$insertLiveQuestion .=" VALUES ('$_SESSION[UserBindID]', '$_SESSION[StudentBindID]', '$_SESSION[examinationCourseBindID]', '$_SESSION[liveExamBindID]', '$QuestionBindID', '$OptionSelected', '$OptionScore', 'answered', ";
	$insertLiveQuestion .=" '$puid', '$suid', '$tuid', '$BindID', '$time')";
	$insertLiveQ = Query($insertLiveQuestion);
}
?>