<?php

global $dbconnect;
$currentPage = cleanIndexURL($_SERVER["PHP_SELF"]);
$maxRows_rsData = 20;
$pageNum_rsData = 0;
if (isset($_GET['pageNum_rsData'])) {
  $pageNum_rsData = $_GET['pageNum_rsData'];
}
$startRow_rsData = $pageNum_rsData * $maxRows_rsData;
$query_rsData = "SELECT * FROM user WHERE `UserType` <> 'student' ORDER BY Username ASC";
$query_limit_rsData = sprintf("%s LIMIT %d, %d", $query_rsData, $startRow_rsData, $maxRows_rsData);
$rsData = mysql_query($query_limit_rsData, $dbconnect) or die(mysql_error());
$row_rsData = mysql_fetch_assoc($rsData);

if (isset($_GET['totalRows_rsData'])) {
  $totalRows_rsData = $_GET['totalRows_rsData'];
} else {
  $all_rsData = mysql_query($query_rsData);
  $totalRows_rsData = mysql_num_rows($all_rsData);
}
$totalPages_rsData = ceil($totalRows_rsData/$maxRows_rsData)-1;

$queryString_rsData = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsData") == false && 
        stristr($param, "totalRows_rsData") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsData = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsData = sprintf("&totalRows_rsData=%d%s", $totalRows_rsData, $queryString_rsData);
?>


<?php
	if($totalRows_rsData ==0){
		$msg = 'No record found!';
		echo isNotify($msg,'error');
	}
?>

<?php if($totalRows_rsData !=0){?>
<table border="0" cellspacing="0" cellpadding="0" class="viewTabHr">
  <tr>
    <td colspan="9" align="left" valign="middle" class="tabTitle" scope="col">Showing <?php echo ($startRow_rsData + 1) ?> - <?php echo min($startRow_rsData + $maxRows_rsData, $totalRows_rsData) ?> of <?php echo $totalRows_rsData ?>
      <div class="tabPagination">
        <?php if ($pageNum_rsData > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_rsData=%d%s", $currentPage, 0, $queryString_rsData); ?>">First</a> ~
          <?php } // Show if not first page ?>
        <?php if ($pageNum_rsData < $totalPages_rsData) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_rsData=%d%s", $currentPage, min($totalPages_rsData, $pageNum_rsData + 1), $queryString_rsData); ?>">Next</a> ~
          <?php } // Show if not last page ?>
        <?php if ($pageNum_rsData > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_rsData=%d%s", $currentPage, max(0, $pageNum_rsData - 1), $queryString_rsData); ?>">Previous</a>
          <?php if($pageNum_rsData<$totalPages_rsData){ echo '~';}?>
          <?php } // Show if not first page ?>
        <?php if ($pageNum_rsData < $totalPages_rsData) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_rsData=%d%s", $currentPage, $totalPages_rsData, $queryString_rsData); ?>">Last</a>
          <?php } // Show if not last page ?>
      </div></td>
  </tr>
  <tr class="cellTitle">
    <th scope="col">S/N</th>
    <th scope="col">Username</th>
    <th scope="col">Name</th>
    <th scope="col">Phone</th>
    <th scope="col">Email</th>
    <th scope="col">Account</th>
    <th scope="col">Account Type</th>
    <th colspan="1" class="manage" scope="col">Manage</th>
  </tr>
  <?php $sn = $startRow_rsData; do { ?>
    <tr class="tabContent">
      <td><?php echo $sn = $sn+1; ?></td>
      <td><?php if(!empty($row_rsData['Username'])){echo $row_rsData['Username'];}?></td>
      <td><?php echo getRecord('shortname',$row_rsData['BindID'],'person');?></td>
      <td><?php echo getRecord('phone',$row_rsData['BindID'],'person');?></td>
      <td><?php echo getRecord('email',$row_rsData['BindID'],'person');?></td>
      <td><?php if(!empty($row_rsData['UserType'])){ echo $row_rsData['UserType'];}?></td>
      <td><?php $staffIsA = getRecord('StaffIsA',$row_rsData['BindID'],'staff'); if(!empty($staffIsA)){ echo $staffIsA;}?></td>
      <td class="delete"><a href="<?php echo isURL('delete_staff&id='.$row_rsData['BindID']);?>">delete</a></td>
    </tr>
    <?php } while ($row_rsData = mysql_fetch_assoc($rsData)); ?>
</table>
<?php } ?>

<?php mysql_free_result($rsData);?>