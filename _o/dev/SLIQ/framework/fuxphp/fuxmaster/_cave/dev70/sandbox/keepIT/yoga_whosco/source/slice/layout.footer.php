
<!-- begin footer-->
<footer class="footer">
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
		<?php if(!isOperamini()){echo 'Powered by';} else {echo 'Design';}?> <a href="http://www.boldright.net" target="_blank" title="BoldRight Limited"><img src="<?php echo resImg('marketer');?>" alt="BoldRight" class="marketer"></a>
	</span>
<?php if(!isIE('<', 9) && Device::is() != 'phone'){echo "\n"."\t".renderNav();}?>
	</div>
<?php if(!isIE('<', 9) && Device::is() == 'phone'){echo "\n"."\t".renderNav();}?>
</footer>
<!-- end footer-->
