
<section id="secondary">
<h2 class="hide">Additional Information</h2>
<div class="group">
<?php
	if(device::is()=='desktop'){erko::piece('slice-secondary-brief');}
	if(device::is()!='phone'){erko::piece('slice-secondary-contact');}
	if(device::is()!='desktop'){erko::piece('slice-secondary-search');}
	erko::piece('slice-secondary-newsletter');
?>
</div>
</section>
