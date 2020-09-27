<?php
include 'test.html'; echo '<hr>';
include 'float.html'; echo '<hr>';
include 'test-alternative.html'; echo '<hr>';
if(getBrowser() == 'ie'){echo 'Internet Explorer '.ieVer();}
else {echo getBrowser();}
?>