<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ERROR 403 | FORBIDDEN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* {line-height: 1.3; margin: 0;}
		html {
			color: #888; font-family: Arial, Helvetica, sans-serif;
			height: 100%; width: 100%;
			text-align: center;
			display: table;
		}
		body {display: table-cell; vertical-align: middle; margin: 2em auto;}
		h1 {color: #555; font-size: 2em; font-weight: 400;}
		h2 {font-family: 'Monotype Corsiva';}
		p {margin: 0 auto; max-width:400px; font-family: "Trebuchet MS", sans-serif; font-size: 1em;}
		@media only screen and (max-width: 280px) {
			body, p {width: 95%;}
			h1 {font-size: 1.5em; margin: 0 0 0.3em;}
		}
		#page {margin: 0 10px;}
		span {font-size: 0.85em; color: tan;}
	</style>
</head>
<body>
	<div id="page">
	<h1>E403 - FORBIDDEN</h1>
	<h2>Request Denied</h2>
	<p>We apologize for this awkwardness!<br>However, you have been denied access to the requested resource.<br>
		<span><?php if(!empty($_SERVER['REQUEST_URI'])){echo $_SERVER['REQUEST_URI'];}?></span></p>
	</div>
</body>
</html>