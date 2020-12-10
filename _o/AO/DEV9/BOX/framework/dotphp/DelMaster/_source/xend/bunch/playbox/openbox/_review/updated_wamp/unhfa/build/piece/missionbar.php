
<div id="missionbar">
	<div id="missiontime"></div>
	<script type="text/javascript">
	  new showLocalTime("missiontime", "server-ssi", delay, "short")
	</script>
	<div id="panelMenu">
	<?php $obj = 'client';?>
	<ul>
		<li><?php echo link_menu($obj.'_profile','profile');?></li>
		<li><?php echo link_menu($obj.'_leave-application','leave application');?></li>
		<li><?php echo link_menu($obj.'_logout','logout');?></li>
	</ul>
	</div>
</div>