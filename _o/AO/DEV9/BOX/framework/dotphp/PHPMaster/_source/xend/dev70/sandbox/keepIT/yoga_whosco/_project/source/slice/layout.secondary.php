
<!-- begin separatior section -->
<div class="separator">&nbsp;</div>
<!-- end separatior section -->


<!-- begin secondary section -->
<div id="secondary" class="moreInfo">
<div class="inside group">
<?php
if(Device::is() == 'desktop'){piece('brief');}
if(Device::is() != 'phone'){if(Device::is() == 'desktop'){echo "\n";} piece('contact');}
if(Device::is() != 'desktop'){piece('search');}
piece('mailing');?>

</div>
</div>
<!-- end secondary section -->
