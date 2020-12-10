
<?php if(erko3::page('name') != 'index'){?>
<div id="nav-wrap">
<h2 class="none">Footer Navigation</h2>
	<ul id="footerNav" class="navigation">	
	<?php makeNav('footer');?>
	</ul>
</div>
<?php }?>

<footer id="footer">
<h2 class="none">Copyright & Legal Information</h2>
<div class="group">

<span class="copyright"><?php echo copyright();?></span>
<span class="powered">Powered by <a href="http://www.boldright.net" target="_blank" title="BoldRight Limited"><img src="<?php echo responsiveImg('marketer', 'icon');?>" alt="BoldRight" class="marketer"></a></span>

<?php if(device::is() != 'phone' && !isIE('==', 6)){echo renderNav();}?>

</div>
</footer>
