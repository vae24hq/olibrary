<?php #require_once 'setting.php';
require '.separator.php';
require __DIR__.DS.'dot'.DS.'.initializr.php';
require MODELIZR.'patient.php';
// $module = ''; $otype = '';
// if(!empty($_GET['module'])){$module = $_GET['module'];}
// if(!empty($_SESSION['type'])){$otype = $_SESSION['type'];}


//Process JSON tracking list
// if($module == 'trackings'){
  $data = patient::all();
  #$record = trackLoop($data);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($data);
//   die();
// }
// else {
//   header('Location: ./');
//   die();
// }
?>