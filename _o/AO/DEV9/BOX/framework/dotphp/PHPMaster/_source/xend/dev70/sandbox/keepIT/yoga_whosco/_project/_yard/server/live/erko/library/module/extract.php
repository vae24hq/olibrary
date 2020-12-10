<?php
$loader = new Loader;  $loader->action();
require('Connections/dbcon.php');
include("dw/getsqlvaluestring.php");
$editFormAction = './'; #$_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

mysql_select_db($database_dbcon, $dbcon);
$query_dataset = "SELECT email, name, phone FROM subscription WHERE email <> ''  AND email IS NOT NULL ORDER BY email";
$dataset = mysql_query($query_dataset, $dbcon) or die(mysql_error());
$row_dataset = mysql_fetch_assoc($dataset);
$totalRows_dataset = mysql_num_rows($dataset);
?>

<table border="0" cellspacing="0" cellpadding="0" class="viewTabHr" width="100%">
   <tr >
    <td colspan="6" scope="row" class="cellTitle">RESULT: <?php if ($totalRows_dataset != 0) {  ?>Total  <?php echo $totalRows_dataset ?> emails<?php } ?></td>
    </tr>
<?php
	$content = ''; 
	do { $content .= $row_dataset['email'].', '; } while ($row_dataset = mysql_fetch_assoc($dataset)); 
	$content = replaceLast(',','',$content);
if(!$handle = fopen("download/email.txt", "w")){ die("can't open file");}
else {
	fwrite($handle, $content);
	fclose($handle);
} 
?>
   <tr class="tabTitle">
    <th width="230" align="left" valign="middle" scope="col">subject</th>
    <th width="60" scope="col">Download</th>
    </tr>
     <tr>
    
      <td scope="row">Email Addresses</td>
      <td align="center" valign="middle"><a href="./download.php?data=email">TXT</a>(<?php $size = filesize('download/email.txt'); echo formatSizeUnit($size);?>)</td>
      </tr>
    </table>

</div>
<?php
mysql_free_result($dataset);
?>
