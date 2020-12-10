<?php if(device::is()=='desktop'){?>
<div id="navbar" class="group">
<?php }?>
<nav id="navigation">
<h3 class="hide">Navigation</h3>
<div class="nav-collapse">
	<ul class="group">
	<?php	isNav('main');?>
	</ul>
</div>
</nav>

<?php if(device::is()=='desktop'){?>
<form action="" method="post" name="search" id="search">
	<table class="formTable">
		<tr>
			<td><input type="text" name="product" id="product" required placeholder="Search for product"></td>
			<th scope="row" class="btn"><input type="submit" name="SearchBtn" id="SearchBtn" value="Search"></th>
		</tr>
	</table>
</form>
<?php } if(device::is()=='desktop'){?>
</div>
<?php }?>

<script>
  <?php if(!validate_ie('<', 9)){?>var nav = responsiveNav(".nav-collapse");<?php }?>
</script>