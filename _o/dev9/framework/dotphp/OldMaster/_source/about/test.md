
// $demo = db::insertGID('user');
// helper::dbug($demo);
$time_start = microtime(true);
for ($i=0; $i < 100000000 ; $i++) {
	echo $row = helper::oRandomiz('ruid');
	// echo ' - <font color="red">'.strlen($row).'</font>';
	echo '<br>';
}
$time_end = microtime(true);
echo'<hr>';
//dividing with 60 will give the execution time in minutes otherwise seconds
$execution_time = ($time_end - $time_start);

//execution time of the script
echo '<div id="bottom"><b>Total Execution Time:</b> '.$execution_time.' Seconds</div>';
// if you get weird results, use number_format((float) $execution_time, 10)
==============================================================================


echo'<hr>';

$start = microtime(true);
//START SCRIPT HERE
for ($i=0; $i < 10000; $i++){
 $sql = db::insertGID('user');
 db::execSQL($sql);
}
//END SCRIPT HERE
$stop = microtime(true);
$seconds = ($stop - $start);
echo 'Time: '.$seconds.' OR '.($seconds/60).' Mins';
==============================================================================
