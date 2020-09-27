

<footer id="footer">

<?php if(erko3::page('name') != 'index'){?>
	<div class="navwrap">
		<ul id="footerNav" class="navigation">	
		<?php makeNav('footer');?>
		</ul>
	</div>
<?php }?>


	<div class="bottom group">
	<span class="copyright"><?php echo copyright();?></span>
	<span class="powered">Powered by <a href="http://www.boldright.net" target="_blank" title="BoldRight Limited"><img src="<?php echo responsiveImg('marketer', 'icon');?>" alt="BoldRight" class="marketer"></a></span>

<?php if(Device::is() != 'phone' && !isIE('==', 6)){echo renderNav();}?>

	</div>

<?php if(Device::is()=='phone' && !isIE('==', 6)){echo renderNav();}?>

</footer>
<!-- end footer section -->

