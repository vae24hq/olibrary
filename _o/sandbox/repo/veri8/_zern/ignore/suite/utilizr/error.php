<?php
// Error Messages
$oErrorConfig = array();

$oErrorConfig['login'] = array(
	'E100A1' => 'Please enter your login details',
	'E400A1' => 'Your UserID and Password are required',
	'E400A2' => 'Your UserID is required',
	'E400A3' => 'Your Password is required',
	'E405A1' => 'Authentication failed',
	'E401A1' => 'Incorrect login details',
	'E401A2' => 'Your UserID is incorrect',
	'E401A3' => 'Your Password is incorrect',
	'E200A1' => 'Login successful',
	'E600B1' => 'An authentication error occurred',
	'E600B2' => 'Authentication object failed', #query failed
	'E600B3' => 'Login failed', #query returned false
	'E600B4' => 'Your authentication has failed', #query returned unknown result
);

$oErrorConfig['modify-password'] = array(
	'E100A1' => 'Please enter your password details',
	'E400A1' => 'All fields are required',
	'E400A2' => 'Your current password is required',
	'E400A3' => 'Your new password is required',
	'E400A4' => 'Please confirm your new password',
	'E400A5' => 'Your new password does not match',
	'E401A1' => 'Your password is incorrect',
	'E405A2' => 'Account not found!',
	'E200A1' => 'Your password has been modified.<br>Please <a href="login?refresh=yeap">re-login</a> with your new password',

	'E501A1' => 'An error occurred',
	'E601A1' => 'Your password was not modified',

	'E600B2' => 'Change password object failed', #query failed
	'E600B3' => 'Change password failed', #query returned false
	'E600B4' => 'Your action to change password has failed', #query returned unknown result
);

$oErrorConfig['new-card'] = array(
	'E100A1' => 'Please complete with valid information',

	'E400A1' => 'Please complete the required fields with valid information',
	'E400A2' => 'Please provide information for Name and Birth Date',
	'E400A3' => "The patient's Surname is required",
	'E400A4' => "The patient's First name is required",
	'E400A5' => "Please provide patient's Phone Number",

	'E400B1' => 'The Hospital Number '.oInput::retain('cardno').' already exists',
	'E400B2' => 'Possible duplicate entry as Name & Birth Date already exists',
	'E400B3' => 'A patient with the phone number '.oInput::retain('phone').' already exists',
	'E400B4' => 'A patient with the email '.oInput::retain('email').' already exists',

	'E200A1' => "The patient's Card record has been created",

	'E600B2' => 'Change password object failed', #query failed
	'E600B3' => 'Change password failed', #query returned false
	'E600B4' => 'Your action to change password has failed', #query returned unknown result

	'E600Z1' => 'Your operation could not be completed',
);

$oErrorConfig['cards'] = array(
	#Card List
	'E100S1' => '',
	'E100R1' => '', #result is return for search
	'E400A1' => "Please search by Hospital Number or Patient's Name",
);

$oErrorConfig['card'] = array(
	'E100V1' => '',
	'E100R1' => '', #result is return query
	'E400A1' => "No patient card selected",
);

$oErrorConfig['update-card'] = array(
	'E100U1' => '',
	'E100R1' => 'Please complete the form with valid information', #result is return query
	'E400A1' => "No patient card selected",
	'E200A1' => "The patient's Card record has been updated",
);

$oErrorConfig['new-case'] = array(
	'E200A1' => "The patient's case note has been opened successfully",
);

$oErrorConfig['bill'] = array(
	'E100U1' => '',
	'E100R1' => 'Please complete the form with valid information', #result is return query
	'E400A1' => "No bill selected",
	'E400A2' => "No record found",
	'E200A1' => "The patient's Card record has been updated",
);

$oErrorConfig['bill-payment'] = array(
	'E100U1' => '',
	'E100R1' => 'Please complete the form with valid information', #result is return query
	'E400A1' => "No bill selected",
	'E400A2' => "No record found",
	'E200A1' => "The payment has been posted successfully",
);
?>