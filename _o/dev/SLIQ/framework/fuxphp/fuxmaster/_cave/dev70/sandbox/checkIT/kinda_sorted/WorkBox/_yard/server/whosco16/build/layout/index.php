<?php
erko::piece('topbar');
erko::piece('header');
if(erko::return_value('page') !='index'){
erko::piece('navigation');
erko::piece('banner');
erko::piece('content');	
erko::piece('arrival');
} else {
erko::piece('banner');
erko::piece('index');
}

erko::piece('separator');
erko::piece('secondary');
erko::piece('bottom');
?>