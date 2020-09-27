<?php isLoggedIn();  $loader = new Loader; ?>
<nav id="nav" class="group" role="navigation">
  <h2 class="hide">Navigation</h2>
  <ul id="menu">
    <?php $category = array ('category','create_category','modify_category','delete_category');  if (in_array($loader->module(), $category)) {?>
    <li class="space">
      <ul>
        <li class="heading">category</li>
        <li><a href="./?link=create_category" title="create">create</a></li>
        <li><a href="./?link=category" title="manage">manage</a></li>
      </ul>
    </li>
    <?php }  $products = array ('product','create_product','modify_product','delete_product');  if (in_array($loader->module(), $products)) {?>
    <li class="space">
      <ul>
        <li class="heading">product</li>
        <li><a href="./?link=create_product" title="create">create</a></li>
        <li><a href="./?link=product" title="manage">manage</a></li>
      </ul>
    </li>
    <?php }  $subscribers = array ('subscribers','new_subscriber', 'modify_subscriber', 'unsubscribe', 'resubscribe', 'delete_subscriber','extract');  if (in_array($loader->module(), $subscribers)) {?>
    <li class="space">
      <ul>
        <li class="heading">subscription</li>
        <li><a href="./?link=subscribers" title="subscribers">subscribers</a></li>
        <li><a href="./?link=new_subscriber" title="new subscriber">subscribe</a></li>
        <li><a href="./?link=modify_subscriber" title="modify ">modify</a></li>
        <li><a href="./?link=unsubscribe" title="unsubscribe">unsubscribe</a></li>
        <li><a href="./?link=resubscribe" title="resubscribe">re-subscribe</a></li>
        <li><a href="./?link=delete_subscriber" title="delete">delete</a></li>
        <li><a href="./?link=extract" title="extract email">extract data</a></li>
      </ul>
    </li>
    <?php } ?>
    <li class="space">
      <ul>
        <li><a href="./?link=logout" title="logout">logout</a></li>
      </ul>
    </li>
  </ul>
</nav>
