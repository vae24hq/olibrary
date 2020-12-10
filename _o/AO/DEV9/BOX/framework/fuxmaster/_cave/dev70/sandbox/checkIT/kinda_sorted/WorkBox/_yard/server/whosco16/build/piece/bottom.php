
<div id="bottom">

<?php if(erko::return_value('page') !='index'){erko::piece('slice-footer-nav');}?>
<?php erko::piece('slice-footer');?>
<?php if(device::is()=='phone' && !validate_ie('==', 6)){erko::piece('slice-rendition');}?>
</div>
