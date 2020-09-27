<style type="text/css">
  .label {margin: 0 10px; text-align:right; width:120px; }
</style>
<aside id="activeUser">
  <img class="profile" src="./storage/passport/<?php echo isInStudent('Passport','person');?>">
  <div class="record group">
    <div>
      <p><span class="label">Name:</span><?php echo isInStudent('fullname','person');?></p>
      <p><span class="label">Date of Birth:</span><?php echo isInStudent('BirthDate','person');?></p>
      <p><span class="label">Sex:</span><?php echo isInStudent('Sex','person');?></p>
      <p><span class="label">Origin:</span><?php echo isInStudent('OriginLGA','person');?>, <?php echo isInStudent('OriginState','person');?></p>
      <p><span class="label">Program:</span><?php echo ucwords(getRecord('Title',isInStudent('Program','admission'),'program'));?></p>
      <p><span class="label">Program Type:</span><?php echo ucwords(getRecord('Title',isInStudent('ProgramType','admission'),'program_type'));?></p>
      <p><span class="label">Degree:</span><?php echo getRecord('Acronym', isInStudent('ProgramDegree','admission'),'degree');?></p>
      <p><span class="label">Date Admitted:</span><?php echo isInStudent('DateAdmitted','admission');?></p>
      <p><span class="label">Program Duration:</span><?php echo isInStudent('Duration','admission').' years';?></p>
      <p><span class="label">Current Level:</span><?php echo getRecord('Level',isInStudent('CurrentYear','admission'),'level');?></p>
      <p><span class="label">Department:</span><?php echo getRecord('Title',isInStudent('Department','admission'),'department');?></p>
    </div>
  </div>
<p>&nbsp;</p>
<button onclick="window.print();return false" class="button">Print</button>
</aside>

