<aside id="activeUser">
  <h4 class="heading">Student Information</h4>
  <img class="profile" src="./storage/passport/<?php echo isLoggedInStudent('Passport','person');?>">
  <div class="record group" style="max-height:300px; overflow:auto;">
    <div style="width:50%; float:left;">
      <p><span class="label">Username:</span><?php echo isLoggedInStudent('Username','user');?></p>
      <p><span class="label">Account:</span><?php echo isLoggedInStudent('UserType','user');?></p>
      <p><span class="label">Name:</span><?php echo isLoggedInStudent('fullname','person');?></p>
      <p><span class="label">Date of Birth:</span><?php echo isLoggedInStudent('BirthDate','person');?></p>
      <p><span class="label">Sex:</span><?php echo isLoggedInStudent('Sex','person');?></p>
      <p><span class="label">L.G.A:</span><?php echo isLoggedInStudent('OriginLGA','person');?></p>
      <p><span class="label">State:</span><?php echo isLoggedInStudent('OriginState','person');?></p>
    </div>
    <div style="width:50%; float:right;">
      <p><span class="label">Date Admitted:</span><?php echo isLoggedInStudent('DateAdmitted','admission');?></p>
      <p><span class="label">Program Duration:</span><?php echo isLoggedInStudent('Duration','admission').' years';?></p>
      <p><span class="label">Current Level:</span><?php echo getRecord('Level',isLoggedInStudent('CurrentYear','admission'),'level');?></p>
      <p><span class="label">Department:</span><?php echo getRecord('Title',isLoggedInStudent('Department','admission'),'department');?></p>
      <p><span class="label">Program:</span><?php echo ucwords(getRecord('Title',isLoggedInStudent('Program','admission'),'program'));?></p>
      <p><span class="label">Program Type:</span><?php echo ucwords(getRecord('Title',isLoggedInStudent('ProgramType','admission'),'program_type'));?></p>
      <p><span class="label">Degree:</span><?php echo getRecord('Acronym', isLoggedInStudent('ProgramDegree','admission'),'degree');?></p>
    </div>
  </div>
</aside>