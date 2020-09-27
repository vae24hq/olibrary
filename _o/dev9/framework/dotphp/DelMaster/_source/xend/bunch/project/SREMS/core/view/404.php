
<section id="notFound">
<h4 class="moduleTitle">404: NOT FOUND!</h4>
<div class="moduleContent">
<p>The requested document [<?php echo isDocument();?>] was not found on this server</p>
<hr>
<?php if(ENVIRONMENT =='dev'){global $pypeContent; echo 'File: '.$pypeContent.'.'.EXTENSION;}?>
	
</div>
</section>