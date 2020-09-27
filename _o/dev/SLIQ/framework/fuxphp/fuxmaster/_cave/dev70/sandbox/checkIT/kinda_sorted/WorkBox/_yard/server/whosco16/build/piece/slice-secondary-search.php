
<aside id="search">
<div class="content">
<h4 class="heading">Quick Search</h4>

<div class="wrapper">
	<p>Please use the form below to find your product</p>
	<form action="" method="post" name="searchForm" id="searchForm">
	<table class="searchTable">
		<tr>
			<td><input type="text" name="product" id="product" required placeholder="product name"></td>
			<th scope="row" class="btn"><input type="submit" name="SearchBtn" id="SearchBtn" value="Search"></th>
		</tr>
	</table>
	</form>
</div>

<?php if(device::is()!='phone'){?>
<h4 class="heading">BEST QUALITY GUARANTEED</h4>
<p class="paragraph">When you buy from Whosco, you are guaranteed to get top-notch, world-class products. If that quality product is available on this planet, we get it to you</p>
<?php }?>
</div>
</aside>
