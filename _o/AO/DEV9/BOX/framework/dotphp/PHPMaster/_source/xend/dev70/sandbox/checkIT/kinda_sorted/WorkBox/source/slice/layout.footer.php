
<!-- begin footer section -->
<footer id="footer" class="pageFooter">
<?php if(erko::page() != 'index'){?>
	<div class="navwrap">
		<ul class="navigation footerNav">	
<?php makeNav('footer');?>
		</ul>
	</div>
<?php }?>
	<div class="footnote group">
		<span class="copyright"><?php echo copyright();?></span>
		<span class="powered">
			Powered by <a href="http://www.boldright.net" target="_blank" title="BoldRight Limited"><img src="<?php echo resImg('marketer');?>" alt="BoldRight" class="marketer"></a>
		</span>
<?php if(Device::is() != 'phone' && !isIE('==', 6)){echo "\n"."\t\t".renderNav();}?>
	</div>
<?php if(/*Device::identify() != 'phone' && */Device::is() == 'phone' && !isIE('==', 6)){echo "\n"."\t".renderNav();}?>
</footer>
<!-- end footer section -->
