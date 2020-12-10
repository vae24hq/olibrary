<?php
//========== FEES SETUP ==========//
$feesModule = array();
require oMODEL.'fees.php';
$feesDBO = new zDBObj('feez');
/*Get all fees*/
$feesDBRow = $feesDBO->read();
#$feesData = $feesDB->readPUID('1115J083q04120R22647988666X14195');
$feesData = new oData($feesDBRow);

include oDESIGN.'main.php';
?>