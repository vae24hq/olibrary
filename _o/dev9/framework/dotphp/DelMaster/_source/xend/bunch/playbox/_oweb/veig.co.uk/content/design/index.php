<?php
$lang = lang(); $langLink = '';
$langLink = $lang.'_';
$view = quin::operation();

quin::piece('header'); echo "\n";
quin::piece('navigation'); echo "\n";
if(grab_link('uri')=='default'){
	quin::piece($langLink.'banner'); echo "\n";
	include('content/view/'.$langLink.$view.'.php'); echo "\n";
} else {?>
<div class="wrapper">
<div id="page" class="group">
	<div class="inner">
	<div id="side" class="left">
	<?php quin::piece('sidebar'); echo "\n";?>
	</div>

	<div id="main" class="right">
	<?php include('content/view/'.$langLink.$view.'.php'); echo "\n";?>
	</div>
	</div>

</div>
</div>
<?php } quin::piece('footer'); echo "\n";?>