<?php
$school = Select('Title','school','LIMIT 1');
$faculty = Select('Title','faculty','LIMIT 1');
?>
<!--footer section-->
<footer id="pageFooter">
  <div class="inside group">
	<div class="brand">
		<span class="school"><?php echo $school;?></span>
		<span class="faculty">Faculty of <?php echo $faculty;?></span>
	</div>
	<div class="developed"><span class="developer">Project by: Omorefe G. Osahon</span></div>
	<div class="supervised"><span class="supervisor">Supervisor: PROF. EDOKPIA R. O</span></div>
  </div>
</footer>
<!--footer section end-->
