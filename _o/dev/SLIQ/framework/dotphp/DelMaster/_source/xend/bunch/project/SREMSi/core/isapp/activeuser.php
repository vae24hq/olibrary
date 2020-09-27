<?php
$ActiveUsername = "";
if (isset($_SESSION['Username'])) {
  $ActiveUsername = $_SESSION['Username'];
}
$query_rsActiveUser = sprintf("SELECT * FROM `user` WHERE Username = %s LIMIT 1", GetSQLValueString($ActiveUsername, "text"));
$rsActiveUser = mysql_query($query_rsActiveUser, $dbconnect) or die(mysql_error());
$row_rsActiveUser = mysql_fetch_assoc($rsActiveUser);
$totalRows_rsActiveUser = mysql_num_rows($rsActiveUser);
?>

<?php
class ActiveUser {
  public function isGuest(){
    global $totalRows_rsActiveUser;
    if($totalRows_rsActiveUser==0){return TRUE;}
    else{return FALSE;}
  }

  public function Retrieve($data){
    if($data != ''){
      global $row_rsActiveUser;
      if(!empty($row_rsActiveUser[$data])){$task = $row_rsActiveUser[$data];}
      else {return FALSE;}
      return $task;
    }
  }
}
?>

<?php
mysql_free_result($rsActiveUser);
?>