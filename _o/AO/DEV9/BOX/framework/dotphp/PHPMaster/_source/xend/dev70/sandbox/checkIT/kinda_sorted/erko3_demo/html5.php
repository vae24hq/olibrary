<?php
include 'html5-test.html'; echo '<hr>';
include 'html5-float.html'; echo '<hr>';
include 'html5-demo.html'; echo '<hr>';
if(getBrowser() == 'ie'){echo 'Internet Explorer '.ieVer();}
else {echo getBrowser();}
?>