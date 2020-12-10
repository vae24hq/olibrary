<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Mobile Version 1.0</title>
</head>

<body>
<p>Hello!<br />
  You have reached the mobile version of this application and it is currently unavaliable.<br />
Please <a href="?v=s">click here</a> to continue using the main version.</p>
<p>Thanks,<br />
Dynat Seamlux Team</p>


<?php $mystring = strtolower($_SERVER['HTTP_USER_AGENT']); 
	$findme   = 'tablet';
	$pos = strpos($mystring, $findme);
	
	if ($pos === false) {
    echo "The string '$findme' was not found in the string '$mystring'";
} else {
    echo "The string '$findme' was found in the string '$mystring'";
    echo " and exists at position $pos";
}


?>
</body>
</html>