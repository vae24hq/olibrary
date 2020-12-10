<?php
restrict('notstudent');
$activeUser = new ActiveUser;
?>
<aside id="activeUser">
    <h4 class="heading">Active Staff</h4>
    <div class="record">
      <p><span class="label">Username:</span><?php echo $activeUser->Retrieve('Username');?></p>
      <p><span class="label">Account Type:</span><?php $staffIsA = getRecord('StaffIsA',$activeUser->Retrieve('BindID'),'staff'); if(!empty($staffIsA)){ echo $staffIsA;}?></p>
    </div>
  </aside>