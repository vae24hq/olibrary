<?php
	erko::piece('header');
	erko::piece('navigation');
	if(erko::return_value('page')=='index'){erko::piece('banner');}
	erko::piece('content');
	erko::piece('footer');
?>
