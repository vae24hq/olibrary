<?php
quin::piece('header'); echo "\n";
quin::piece('navigation'); echo "\n";
if(grab_link('uri')=='default'){
	quin::piece('banner'); echo "\n";
	quin::run_app(); echo "\n";
} else {?>
<div class="wrapper">
<div id="page" class="group">
	<div class="inner">
	<div id="side" class="left">
	<?php quin::piece('sidebar'); echo "\n";?>
	</div>

	<div id="main" class="right">
	<?php quin::run_app(); echo "\n";?>
	</div>
	</div>

</div>
</div>
<?php } quin::piece('footer'); echo "\n";?>