
<footer id="footer">
<h2 class="hide">Copyright & Legal Information</h2>
	<div class="group">
		<p class="copyright"><?php echo erko::copyright();?></p>
		<p class="powered">
		Powered by <a href="http://www.boldright.net" target="_blank" title="BoldRight Limited"><img src="<?php echo path_to('icon').'marketer'.erko::$trans_img;?>" alt="BoldRight Limited" class="marketer"></a></p>

<?php if(device::is()!='phone' && !validate_ie('==', 6)){erko::piece('slice-rendition');}?>

	</div>
</footer>
