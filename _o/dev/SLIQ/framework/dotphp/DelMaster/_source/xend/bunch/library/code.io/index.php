<?php

include 'utility.php';

$dbconfig = array(
	'host' => "localhost",
	'user' => "root",
	'password' => "",
	'database' => "iconxdb"
);

include 'engine.php';
include 'app.php';


//DEMO
// $demo = array('name'=>"Ellse'", 'phone'=>"09090", 'email'=>"iam@ellse.co.uk");
// $result = create_user($demo);
// var_dump($result);
if(isset($_POST['submit'])){
	$userinfo = $_POST;
	unset($userinfo['submit']);
	var_dump(create_user($userinfo));
}
include 'form.php';
?>
