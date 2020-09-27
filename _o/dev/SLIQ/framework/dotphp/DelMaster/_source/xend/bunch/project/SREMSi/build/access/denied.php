<?php global $pypeAction;?>
<section id="loginOut">
  <h4 class="moduleTitle"><?php global $moduleTitle; echo $moduleTitle;?></h4>
  <div class="moduleContent">
  <?php
  	$action = strtolower($pypeAction);
  	if($action == 'default'){
  		$notice = 'Logging required...';
  		$paragraph = 'You must be logged in to gain access!';
  	}
  	elseif($action == 'student'){
  		$notice = 'Students only...';
  		$paragraph = 'You must be a student to gain access!';
  	}
  	elseif($action == 'lecturer'){
  		$notice = 'Lecturer only...';
  		$paragraph = 'You must be a lecturer to gain access!';
  	}
  	elseif($action == 'admin'){
  		$notice = 'Admin only...';
  		$paragraph = 'You must be an administrator to gain access!';
  	}
  	else {
  		$notice = 'Staff only...';
  		$paragraph = 'You must be a staff to gain access!';
  	}
  ?>
  <div class="notice"><b><?php echo $notice;?></b></div>
  <p style="margin-bottom:20px;"><?php echo $paragraph;?></p>
  </div>
</section>
<?php inSession('reset'); redirect(isURL('access'), '3');?>
