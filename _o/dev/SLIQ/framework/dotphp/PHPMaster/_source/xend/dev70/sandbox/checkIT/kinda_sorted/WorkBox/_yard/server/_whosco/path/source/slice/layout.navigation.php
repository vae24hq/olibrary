
<?php if(Device::is() == 'desktop'){?>
<div id="navbar" class="group">
<?php }?>

<nav id="navigation">
<h3 class="none">Navigation</h3>
<div class="nav-collapse">
	<ul class="group">
	<?php	makeNav('main');?>
	
	</ul>
</div>
</nav>

<?php if(Device::is() == 'desktop'){?>
<form action="" method="post" name="search" id="search">
	<table class="formTable">
		<tr>
			<td><input type="text" name="product" id="product" required placeholder="Search for product"></td>
			<th scope="row" class="btn"><input type="submit" name="SearchBtn" id="SearchBtn" value="Search"></th>
		</tr>
	</table>
</form>
</div>
<?php }?>

<?php if(!isIE('<', 9)){?>
<script>
	var nav = responsiveNav(".nav-collapse");
</script><?php }?>
