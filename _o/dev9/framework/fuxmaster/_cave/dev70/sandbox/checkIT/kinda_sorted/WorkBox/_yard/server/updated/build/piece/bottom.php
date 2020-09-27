
<div id="separator">&nbsp;</div>
<section id="secondary" class="group">
<h2 class="hide">Additional Information</h2>
<div class="inside group">
<?php
	if(device::is()=='desktop'){erko::piece('slice-bottom-brief');}
	if(device::is()!='phone'){erko::piece('slice-bottom-contact');}
	if(device::is()!='desktop'){erko::piece('slice-bottom-search');}
	erko::piece('slice-bottom-mailing');
?>
</div>
</section>

<div id="bottom">

<div id="nav-wrap">
<h2 class="hide">Quick Navigation</h2>
	<ul id="footerNav" class="navigation">	
	<?php isNav('footer');?>
	</ul>
</div>

<footer id="footer">
<h2 class="hide">Copyright & Legal Information</h2>
	<div class="inside group">
		<span class="copyright"><?php echo erko::copyright();?></span>
		<span class="powered">Powered by <a href="http://www.boldright.net" target="_blank" title="BoldRight Limited"><img src="<?php echo path_to('icon').'marketer'.erko::$trans_img;?>" alt="BoldRight Limited" class="marketer"></a></span>
	</div>
</footer>

</div>
