<h2>Deburg - <em>easy test-run & deburg</em></h2>
<p>QUERY_STRING: <?php echo '<small><strong>'.strtolower($_SERVER['QUERY_STRING']).'</strong></small>';?></p>
<hr>
<p>Calling...
<?php echo '<small><strong>';
if(isset($_GET['page']) && !empty($_GET['page'])){
	echo strtolower(str_replace('/', '_', $_GET['page']));}
else {echo strtolower('index');}
echo ' page</strong></small><br>';

if(isset($_GET['act'])){
	echo 'Action: <small><strong>'.strtolower($_GET['act']);
	if($_GET['act'] == 'download'){ echo ' file ('.$_GET['file'].')';}
	if($_GET['act'] == 'redirect'){ echo ' to ('.$_GET['location'].')';}
	echo '</strong></small><br>';
}
?></p>

<p><?php echo 'Timezone: <small><strong>'.date_default_timezone_get().'</strong></small>';?>

<p>Calling...<?php 
if(isset($_GET['api'])){echo 'API: '; if(empty($_GET['api'])){echo 'index';} else {echo ucfirst($_GET['api']);}}
if(isset($_GET['link'])){echo 'LINK: '; if(empty($_GET['link'])){echo 'index';} else {echo ucfirst($_GET['link']);}}
if(isset($_GET['page'])){if(empty($_GET['page'])){echo ucfirst('index');} else {echo ucfirst($_GET['page']);} echo ' Page';}
?></p>

<hr>
<p>
<?php echo 'Page: ';
if(isset($_GET['page']) && !empty($_GET['page'])){echo $_GET['page'];} else {echo 'empty';}?></p>