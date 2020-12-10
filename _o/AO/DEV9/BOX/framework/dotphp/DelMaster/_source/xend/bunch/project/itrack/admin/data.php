<?php require_once 'setting.php';

$module = ''; $otype = '';
if(!empty($_GET['module'])){$module = $_GET['module'];}
if(!empty($_SESSION['type'])){$otype = $_SESSION['type'];}


//Process JSON tracking list
if($module == 'trackings'){
  $data = trackings('record');
  $record = trackLoop($data);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($record);
  die();
}
else {
  header('Location: ./');
  die();
}
?>