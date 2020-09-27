<?php
	$queryrsExam = "SELECT * FROM `exam_course` WHERE  `BindID` = '".$_GET['exam']."'";
	$rsExam = Query($queryrsExam);
	$rsExamRow = mysql_fetch_assoc($rsExam);
	$totalrsExamRow = mysql_num_rows($rsExam);
	
	$queryrsLiveExam = "SELECT * FROM `exam` WHERE  `BindID` = '".$_SESSION['liveExamBindID']."'";
	$rsLiveExam = Query($queryrsLiveExam);
	$rsLiveExamRow = mysql_fetch_assoc($rsLiveExam);
	$totalrsLiveExamRow = mysql_num_rows($rsLiveExam);
	
	if(!timeBetween(doTime('unix'),$rsLiveExamRow['EndTime'])){
		$url = "exam_done&id=".$_GET['id']."&exam=".$_GET['exam'];
		redirect(isURL($url),0,'off');
	}
	

    $timeDiff = $rsLiveExamRow['EndTime'] - doTime('unix') + 1;
    if($timeDiff < 0){$timeDiff = 0;}
    $url = "exam_done&id=".$_GET['id']."&exam=".$_GET['exam'];
    redirect(isURL($url),$timeDiff,'off');

	#INSERT ANSWER
	if(!empty($_POST['ActionBtn'])){
		postAnswer();		
	}
?>

<form id="StartExamForm" name="StartExamForm" method="POST" action="">
  
  <?php //LOAD QUESTION
    $question = loadQuestion();
    if($question){
      $questionRow= mysql_fetch_assoc($question);
      $totalquestionRow = mysql_num_rows($question);
    }
    if($totalquestionRow ==0){
      $url = "exam_done&id=".$_GET['id']."&exam=".$_GET['exam'];
      redirect(isURL($url),0,'off');
    }
  ?>
  <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th height="50" colspan="2" scope="col">

  

      <table border="0" cellspacing="0" cellpadding="0" class="viewTabHr">
    <tr class="cellTitle">
      <th scope="col">Exam</th>
      <th scope="col">Course</th>
      <th scope="col">Duration</th>
      <th scope="col">Start Time</th>
      <th scope="col">Finish Time</th>
      <th scope="col" width="200">Time Remaining</th>
    </tr>
    <tr class="cellContent">
      <td align="left" valign="middle"><?php echo $rsExamRow['Title'];?></td>
      <td align="left" valign="middle"><?php echo getRecord('Acronym',$rsLiveExamRow['Course'], 'course').getRecord('Code',$rsLiveExamRow['Course'], 'course');?></td>
      <td align="left" valign="middle"><?php echo $rsLiveExamRow['Duration'].' mins';?></td>
      <td align="left" valign="middle"><?php echo doTime('time',$rsLiveExamRow['StartTime']);?></td>
      <td align="left" valign="middle"><?php echo doTime('time',$rsLiveExamRow['EndTime']);?></td>
      <td align="left" valign="middle">
	  <?php
    $Hour = timeBetween(doTime('unix'),$rsLiveExamRow['EndTime'],'H');
		$Min = timeBetween(doTime('unix'),$rsLiveExamRow['EndTime'],'M');
		$Sec = timeBetween(doTime('unix'),$rsLiveExamRow['EndTime'],'S');
		?>
        <style>
	  #countdown {padding:2px 10px; min-width:140px;}
	  </style>
	<script>
		$(function () {
		var austDay = new Date();
		austDay = new Date(
			austDay.getFullYear(), austDay.getMonth(), austDay.getDate(),
			austDay.getHours() + <?php echo $Hour;?>, austDay.getMinutes() + <?php echo $Min;?>,
			austDay.getSeconds() + <?php echo $Sec;?>);
		$('#countdown').countdown({until: austDay, format: 'dHMS'});
		});
    </script>


        <div id="countdown"></div>
        <span id="countit"></span>
      </td>
    </tr>
  </table>
  </th>
    </tr>
    <tr>
      <th height="30" colspan="2" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <th height="20" colspan="2" align="left" valign="middle" scope="row">
      <span style="font-weight:bold; font-size:1.2em; font-family:Verdana, Geneva, sans-serif;"><?php echo $questionRow['Question'];?>?</span>
      </th>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top" scope="row" style="padding:10px;">
      <?php if($questionRow['Type'] == 'short'){?>
      <span id="spryAnsEntered">
      <label for="AnsEntered">Answer:</label>
      <input type="text" name="AnsEntered" id="AnsEntered">
      <span class="textfieldRequiredMsg"></span></span>
		<script type="text/javascript">
        var spryAnsEntered = new Spry.Widget.ValidationTextField("spryAnsEntered");
        </script>
      <?php } ?>
      <?php if($questionRow['Type'] != 'short'){?>
      <span id="spryOptionSelected">
       <span class="radioRequiredMsg" style="min-height:30px; font-size:1em!important;">Please select your answer</span><br>
       <label>
          <input type="radio" name="OptionSelected" value="OptionA" id="OptionSelected[A]">
          <?php echo $questionRow['OptionA'];?></label>
        <br>
        <label>
          <input type="radio" name="OptionSelected" value="OptionB" id="OptionSelected[B]">
          <?php echo $questionRow['OptionB'];?></label>
        
        <?php if($questionRow['Type'] == 'objective'){?>
        <br><label>
          <input type="radio" name="OptionSelected" value="OptionC" id="OptionSelected[C]">
          <?php echo $questionRow['OptionC'];?></label>
        <br>
        <label>
          <input type="radio" name="OptionSelected" value="OptionD" id="OptionSelected[D]">
          <?php echo $questionRow['OptionD'];?></label>
          <?php } ?>
			<script type="text/javascript">
            var spryOptionSelected = new Spry.Widget.ValidationRadio("spryOptionSelected");
            </script>
        </span> <?php } ?>
        
        <span style="height:20px; display:block;">
        <input name="QuestionBindID" type="hidden" id="QuestionBindID" value="<?php echo $questionRow['BindID'];?>">
        </span>
        <hr>
      </td>
    </tr>
    <tr>
      <th width="5%" height="30" scope="row">&nbsp;</th>
      <td width="95%"><input type="submit" name="ActionBtn" id="ActionBtn" value="Answer Question">
     <span style="margin-left:20px;">
      <?php 
        $refreshUrl = "exam_live&id=".$_GET['id']."&exam=".$_GET['exam'];
        echo markupURL($refreshUrl,'SKIP QUESTION', 'skip question');
		  ?>
    </span>
 </td>
    </tr>
  </table>
</form>



