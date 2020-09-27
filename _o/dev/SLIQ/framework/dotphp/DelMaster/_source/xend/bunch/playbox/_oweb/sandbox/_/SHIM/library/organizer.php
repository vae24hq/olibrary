<?php
require("function.php");
require("class.php");

require("utility_layout.php");

require("utility_applocation.php");

require("utility_authenticate.php");

require("utility_application.php");
require("utility_greetings.php");


if (isset($_SESSION['userID'])) {
  require("utility_useron.php"); 
}

require("../_application/_login.php");

if(isset($_GET['url']) && $_GET['url'] != 'login_') {
	$authenticate = new authenticate();
}
?>