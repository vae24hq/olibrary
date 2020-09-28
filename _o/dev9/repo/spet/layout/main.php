<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Template Engine</title>
	<style>
		body {line-height: 1.5;}
		span {display: block; margin: 5px 0; color: tan; line-height: 1.3;}
		h1 {font: 150% Arial, sans-serif; line-height: 1; margin: 0 auto; font-weight: bold;}
		strong {color: brown;}
	</style>
</head>
<body>

	{slice-header}

	<div>
		<span><strong>Name:</strong> {name}</span>
		<span><strong>Username:</strong> {username}</span>
		<span><strong>Role:</strong> {role}</span>
		<span><strong>Location:</strong> {location}</span>
	</div>

</body>
</html>