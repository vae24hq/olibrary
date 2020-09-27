<?php
// echo'<hr>';
// echo 'REQUEST: '; var_dump($_REQUEST); echo'<hr>';
// echo 'GET: '; var_dump($_GET); echo'<hr>';
// echo 'POST: '; var_dump($_POST); echo'<hr>';

// if(isset($_GET['http'])){echo 'HTTP ERROR: '.$_GET['http'];}

require '.initializr.php';
$oAPP->runApp();
?>