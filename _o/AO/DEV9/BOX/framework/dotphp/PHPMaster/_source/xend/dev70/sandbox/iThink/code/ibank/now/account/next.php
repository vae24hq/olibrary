<?php require('../brux.php'); require('is_restrict.php');
	// if transaction id is set on URL
	if(!empty($_GET['transferID'])){
		$transfer = getTransfer('buid', $_GET['transferID'], 'fetchRow');
		if($transfer){
			// If transfer process_serial is default
			if($transfer['process_serial'] == 'default'){

				// If user's account billing is set to default
				if($userInfo['billing'] == 'default'){
					#Get default billing process from billing list
					$billing = getBilling('default', '', 'fetchRow');
				} 
				// If user's account billing is set to a value from billing list
				else {
					#Get billing process from user's set
					$billing = getBilling('buid', $userInfo['billing'], 'fetchRow');
				}
			}
			// If transfer process_serial is not default
			else {
				#Get billing process from transfer process_serial set
				$billing = getBilling('buid', $transfer['process_serial'], 'fetchRow');
			}
		}

		if($billing){
			$updateSQL = "UPDATE `transfer` SET `statement` = 'Your transfer is in progress', `status` = 'pending', `process_serial` = '".$_GET['ID']."' WHERE `buid`= '".$_GET['transferID']."'";
			$runSQL = mysql_query($updateSQL, $connect) or die(mysql_error());
			header("Location: ".'process.php?transferID='.$_GET['transferID']);
		}
	}
	// when transaction id is not set on URL
	if(empty($_GET['transferID'])){
		header("Location: ".'dashboard.php');
		die();
	} 
	// when transaction id is set on URL but not valid
	elseif(!$transfer){
		header("Location: ".'dashboard.php');
		die();
	}
?>