
	<form action="" method="post" name="searchForm" class="searchForm" id="searchForm">
	<table class="searchTable">
		<tr>
		<td><input type="search" name="product" required placeholder="Product name" class="textfield"></td>
		<td class="btn"><input type="submit" name="searchBtn" value="Search<?php if(Device::is() != 'phone' && !isIE('<',9)){echo' Product';}?>" class="actBtn searchBtn"></td>
		</tr>
	</table>
	</form>
