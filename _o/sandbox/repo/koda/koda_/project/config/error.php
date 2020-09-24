<?php
// Error Codes & Messages
$oErrorConfig = array();

	#Login
$oErrorConfig['login'] = array(
	'E100A1' => 'Please enter your login details',

	'E200A1' => 'Login successful',
	'E200A2' => 'You have logged out successfully',

	'E400A1' => 'Your UserID and password are required',
	'E400A2' => 'Your UserID is required',
	'E400A3' => 'Your password is required',

	'E401A1' => 'Your password is incorrect',

		'E404A1' => 'User account was not found!', #[oNORECORD]

		'E501A1' => 'A program error occurred',

		'E600B2' => 'Login failed', #query[oERROR]
		'E600B3' => 'Operation failed', #query[false]


		// 'E405A1' => 'Authentication failed',
		// 'E401A1' => 'Incorrect login details',
		// 'E401A2' => 'Your UserID is incorrect',
		// 'E600B1' => 'An authentication error occurred',
		// 'E600B4' => 'Your authentication has failed', #query returned unknown result
	);

	#Locked
$oErrorConfig['locked'] = array(
	'E100A1' => 'Please enter your password',

	'E200A1' => 'Login successful',
	'E200A3' => 'Your password has been modified',

	'E400A3' => 'Your password is required',
	'E401A1' => 'Your password is incorrect',
);

	#Modify password
$oErrorConfig['change-password'] = array(
	'E100A1' => 'Please enter credentials to update your password',

	'E400A1' => 'All fields are required',
	'E400A2' => 'Your current password is required',
	'E400A3' => 'Your new password is required',
	'E400A4' => 'Please confirm your new password',
	'E400A5' => 'Your new password does not match the confirmation password',

	'E401A1' => 'Your current password is incorrect',

		'E404A1' => 'User account was not found!', #[oNORECORD]

		'E600B2' => 'Password modification failed', #query[oERROR]
		'E600B3' => 'Operation failed', #query[false]


		// 'E200A1' => 'Your password has been modified.<br>Please <a href="login?refresh=yeap">re-login</a> with your new password',

		// 'E501A1' => 'An error occurred',
		// 'E601A1' => 'Your password was not modified',

		// 'E600B2' => 'Change password object failed', #query failed
		// 'E600B3' => 'Change password failed', #query returned false
		// 'E600B4' => 'Your action to change password has failed', #query returned unknown result
	);
	?>