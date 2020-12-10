<div class="page">

<?php 
	code('site');
	layout('header');
	#if(erko::page() != 'index'){
		layout('nav');
	#}
	layout('banner');
	#if(erko::page() == 'index'){outline('index');} else {outline('primary');}
	layout('moreinfo');
	layout('footer');
?>

</div>