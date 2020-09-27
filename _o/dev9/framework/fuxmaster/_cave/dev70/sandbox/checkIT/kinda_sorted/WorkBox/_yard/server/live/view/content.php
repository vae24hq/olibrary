<?php if($facil_device->isA() != 'phone') { 
	if(loadsite('link') == 'home') {
		include('banner-home.php'); 
	}
 }?>

<div id="content" class="group">
  <section id="main" class="group">
  <?php loadsite('page'); ?>
</section>
  <aside id="sidebar"><?php include('sidebar.php');?></aside>
</div>
<?php if(loadsite('link') != 'contact-us' && loadsite('link') != 'subscribed') { include('secondary.php'); }?>
