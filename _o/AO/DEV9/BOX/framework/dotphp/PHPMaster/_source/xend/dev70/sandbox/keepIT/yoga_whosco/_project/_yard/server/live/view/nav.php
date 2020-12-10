<div class="group"><?php if($facil_device->isA() == 'phone') { include('search.php'); }?>
<a href="#" title="toggle menu" id="toggle" class="plus">Menu</a></div>
<nav id="nav" role="navigation" class="group">
  <h2 class="hide">Main Navigation</h2>  
  <div class="menu">
    <ul class="mainnavigation group" id="menu">
      <li><a href="./?link=home" title="whosco home">home</a></li>
      <li><a href="./?link=about-us" title="about whosco">about us</a></li>
      <li><a href="./?link=services" title="our services">services</a></li>
     <li><a href="./?link=products" title="our products">products gallery</a></li>
      <li><a href="./?link=media-center" title="our gallery">media</a></li>
      <li><a href="./?link=contact-us" title="contact us">contact</a></li>
    </ul>
  </div>
  <?php if($facil_device->isA() != 'phone') { include('search.php'); }?>
</nav>
 <script>
$( "#toggle" ).click(function() {	
		$( "#toggle" ).toggleClass( "minus");	
		$( "#menu" ).toggle( "swing",function() {
    // Animation complete.
  });
  
});
</script>
