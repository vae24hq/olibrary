<?php
	endExam();
	$msg = 'Your examination has ended. Go to go <a href="./?url=exam_list" title="check result">My Exam/Result</a> to check score.';
	echo $isNotify = isNotify($msg,'success');
?>