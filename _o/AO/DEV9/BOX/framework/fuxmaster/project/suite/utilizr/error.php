<?php
if (!function_exists('isErrorMsg')){
	function isErrorMsg($code, $source='oGET', $return="message"){
		if(empty($source) || $source == 'oGET'){$source = URL::uri();}
		#Login
		if($source == 'login'){
			$e['E100A1'] = 'Please enter your login details';

			$e['E400A1'] = 'Your UserID and Password are required';
			$e['E400A2'] = 'Your UserID is required';
			$e['E400A3'] = 'Your Password is required';

			$e['E405A1'] = 'Authentication failed';
			$e['E401A1'] = 'Incorrect login details';
			$e['E401A2'] = 'Your password is incorrect';

			$e['E200A1'] = 'Login successful';

			$e['E600B1'] = 'An error occurred';
		}

		#Modify Password
		if($source == 'modify-password'){
			$e['E100A1'] = 'Please enter your password details';
			$e['E400A1'] = 'All fields are required';
			$e['E400A2'] = 'Your current password is required';
			$e['E400A3'] = 'Your new password is required';
			$e['E400A4'] = 'Please confirm your new password';
			$e['E400A5'] = 'Your new password does not match';

			$e['E401A2'] = 'Your password is incorrect';

			$e['E200A1'] = 'Your password has been modified.<br>Please <a href="login?act=refresh">re-login</a> with your new password';

			$e['E501A1'] = 'An error occurred';
			$e['E601A1'] = 'Your password was not modified';
			$e['E600'] = 'An error occurred';
		}


		#New Card
		if($source == 'new-card'){
			$e['E100A1'] = 'Please complete with valid information';

			$e['E400A1'] = 'Please complete the required fields with valid information';
			$e['E400A2'] = 'Please provide information for Name and Birth Date';
			$e['E400A3'] = "The patient's Surname is required";
			$e['E400A3'] = "The patient's First name is required";
			$e['E400A4'] = "Please provide patient's Phone Number";

			$e['E400B1'] = 'The Hospital Number '.Form::retainInput('cardno').' already exists';
			$e['E400B2'] = 'Possible duplicate entry as Name & Birth Date already exists';

			$e['E400B3'] = 'A patient with the phone number '.Form::retainInput('phone').' already exists';
			$e['E400B4'] = 'A patient with the email '.Form::retainInput('email').' already exists';


			$e['E600Z1'] = 'Your operation could not be completed';

			if($source == 'new-card'){
				$e['E200A1'] = "The patient's Card record has been created";
			}

			if($source == 'record.update-card'){
				$e['E200A1'] = "The patient's Card record has been updated";

				$e['E405F1'] = "No patient's card was selected. ".'<a href="/record/cards">View Cards</a>';
				$e['E401F1'] = 'The patient you selected was not found <a href="/record/cards">View Cards</a>';

				$e['E601A1'] = "The patient's Card record was not updated";

			}
		}

		#Manage Card
		if($source == 'manage-card'){
			#Card List
			$e['E100S1'] = '';
			$e['E400A1'] = "Please search by Hospital Number or Patient's Name" ;
		}

		#Update Card
		if($source == 'update-card'){
				$e['E200A1'] = "The patient's Card record has been updated";
		}

		#Return
		if(!empty($e[$code])){return $e[$code];}
		return false;
	}
}
?>