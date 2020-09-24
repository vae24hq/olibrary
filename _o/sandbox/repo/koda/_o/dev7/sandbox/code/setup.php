<?php
//========== FEES SETUP ==========//
$feesModule = array();
require oMODEL.'fees.php';
$feesDB = new DBData('feez');

$fees_data = $feesDB->read('Name');
// $fees_data = $feesDB->readPUID('1115J083q04120R22647988666X14195');
$feesAll = new oData();
$feesAll->set($fees_data);

// var_dump($feesAll->obtain('Name'));
// echo($feesAll->obtain('Name'));
// $namez = $feesAll->obtain('Name');
// echo $namez[0];
echo $feesAll->obtain('Name')[0];
echo 'Total: '.$feesAll->totalRow;
//

	// dbug($feesAll);
// $names = $feesAll->Name;
// $arrayLength = count($names);
// $i = 0;
// while ($i < $arrayLength)
// {
// 	echo 'Name:' .$feesAll->Name[$i] ." ";
// 	echo 'AUID:' .$feesAll->AUID[$i] ."<br />";
// 	$i++;
// }
// dbug($feesAll->Name);


// TEST IMPOSSIBLE CASE
// $row = array('boss', 'lady');
// $rowz = array('bosa', 'ladi');
// $demo[1] = $row;
// $demo[2] = $rowz;

// dbug(isArrayMulti($demo));

// // var_dump($demo);
// $feesND = new oData();
// $feesND->set($row);
// var_dump($feesND);
#include oDESIGN.'main.php';
?>