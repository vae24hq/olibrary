
<footer id="footer">
<?php if(device::is()!='phone'){?>
<div id="nav-wrap">
	<ul id="footerNav" class="navigation">	
	<?php isNav('footer');?>
	</ul>
</div>
<?php }?>
<div class="bottom">
<p class="copyright"><?php echo erko::copyright('2012');?></p>
</div>

</footer>