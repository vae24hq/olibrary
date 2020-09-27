
<!-- separatior-->
<div class="separator">&nbsp;</div>
<!-- end separatior-->

<!-- moreinfo-->
<section class="moreinfo">
<h2 class="none">Additional Information</h2>
<div class="inside group">
<?php
if(Device::is() == 'desktop'){piece('brief');}
if(Device::is() != 'phone'){if(Device::is() == 'desktop'){echo "\n";} piece('contact');}
if(Device::is() != 'desktop'){piece('search');}
piece('newsletter');?>

</div>
</section>
<!-- end moreinfo-->
