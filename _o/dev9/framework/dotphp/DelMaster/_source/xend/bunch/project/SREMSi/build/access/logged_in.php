<?php global $pypeAction;?>
<section id="loginOut">
  <h4 class="moduleTitle"><?php global $moduleTitle; echo $moduleTitle;?></h4>
  <div class="moduleContent">
  <?php
    $action = strtolower($pypeAction);
  	if($action == 'student'){
  		redirect(isURL('student'), '3','off');
  	}
  	else{
      redirect(isURL('staff'), '3','off');
  	}
  ?>
  <div class="success"><b>Logging in...</b></div>
  <p style="margin-bottom:20px;">You are already logged in, please wait!</p>
  </div>
</section>
