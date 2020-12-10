<style type="text/css">
  #activeUser {max-width: 174px!important;}
  .value {min-width: 40px!important;}
</style>
<aside id="activeUser">
  <h4 class="heading">Student Information</h4>
  <img class="profile" src="./storage/passport/<?php echo isLoggedInStudent('Passport','person');?>">
  <div class="record group" style="max-height:300px; overflow:auto;">
      <p>
      <span class="value"><?php echo isLoggedInStudent('fullname','person');?></span></p>
      <p>
      <span class="value"><?php echo isLoggedInStudent('Sex','person');?></span></p>
      
      <p>
      <span class="value"><?php echo getRecord('Level',isLoggedInStudent('CurrentYear','admission'),'level');?></span></p>
      <p>
      <span class="value"><?php echo getRecord('Title',isLoggedInStudent('Department','admission'),'department');?></span></p>
  </div>
</aside>