<?php
	$loader = new loader;
	$module = $loader->get_module();
	if($module == 'inventory') {?>
<li class="subHeader">Inventory</li>
<li><a href="?url=items_inventory&update">update to stock</a></li>

<li><a href="?url=items_inventory">view items</a></li>
<li><a href="?url=inventory&store=<?php echo $_SESSION['store']; ?>">view category</a></li>
<li><a href="?url=create-item_inventory">create item</a></li>
<li><a href="?url=create-category_inventory">create category</a></li>
<br/>
<?php } else { ?>
<li class="subMenu"><a href="?url=inventory&store=<?php echo $_SESSION['store']; ?>">Inventory</a></li>
<?php } ?>