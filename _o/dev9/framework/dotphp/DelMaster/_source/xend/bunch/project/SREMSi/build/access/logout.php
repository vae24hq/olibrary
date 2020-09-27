<section id="loginOut">
  <h4 class="moduleTitle"><?php global $moduleTitle; echo $moduleTitle;?></h4>
  <div class="moduleContent">
  <div class="notice"><b>Logging out...</b></div>
  <p style="margin-bottom:20px;">You are now being logged out!</p>
  </div>
</section>
<?php inSession('reset'); redirect(isURL('access'), '3');?>
