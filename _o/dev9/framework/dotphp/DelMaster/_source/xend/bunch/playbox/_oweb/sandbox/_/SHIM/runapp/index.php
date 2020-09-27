<?php error_reporting(0);
	if (!isset($_SESSION)) {
		session_start();
	}
	if(isset($_GET['loc'])) {
		$_SESSION['loc'] = $_GET['loc'];
		$_SESSION['iniLaunch'] = $_GET['loc'];
	}
	require("../library/organizer.php");
	get_layout();
 ?>