<?php
class App {

	public static function login(){
		$username = oDATA::oRead('UserID', 'oPOST');
		$password = oDATA::oRead('Password', 'oPOST');

		$sql = "SELECT * FROM `user` WHERE `Username` = '{$username}' AND `Password` = '{$password}' AND `Status` = 2 LIMIT 1";
		$rez = oSQL::run($sql);
		if(!empty($rez['errNo'])){
			#Todo ~ error in query (everywhere)
		}
		elseif($rez['numRows'] < 1){
			oRoute::redirect('login.php?state=invalid');
		}
		elseif($rez['numRows'] === 1){
			$record = $rez['result']->fetch_assoc();
			$_SESSION['user'] = $record['BIND'];
			oRoute::redirect('index.php');
		}
	}



	// Create new member
	public static function member_new(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$FirstName = oDATA::oRead('FirstName', 'oPOST');
		$LastName = oDATA::oRead('LastName', 'oPOST');
		$Email = oDATA::oRead('Email', 'oPOST');
		$Phone = oDATA::oRead('Phone', 'oPOST');
		$Gender = oDATA::oRead('Gender', 'oPOST');
		$DoB = oDATA::oRead('DoB', 'oPOST');

		$sql = "INSERT INTO `user` (`BIND`, `MemberID`, `FirstName`, `LastName`, `Email`, `Phone`, `Gender`, `DoB`) VALUES
		('$BIND', '$MemberID', '$FirstName', '$LastName', '$Email', '$Phone', '$Gender', '$DoB')";
		$rez = oSQL::run($sql);
		if(!empty($rez['errNo'])){} #Todo ~ error in query (everywhere)
		elseif($rez['affectedRows'] === 1){
			oRoute::redirect(oRoute::ref().'.php?state=success');
		}
	}

	// View all members
	public static function members($return=''){
		$sql = "SELECT * FROM `user` WHERE `Type` = 1 ORDER BY `LastName` ASC";
		$rez = oSQL::run($sql);
		if(empty($rez['errNo']) && $rez['numRows'] > 0){
			$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
			if($return == 'JSON'){return json_encode($record);}
			return $record;
		}
	}

	// View member's information
	public static function member($value, $filter='BIND', $return='*'){
		$sql = "SELECT {$return} FROM `user` WHERE `{$filter}` = '{$value}' LIMIT 1";
		$rez = oSQL::run($sql);
		if(empty($rez['errNo']) && $rez['numRows'] > 0){
			$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
			return $record[0];
		}
	}

	// View member's last loan
	public static function lastloan($value, $filter='MemberID', $return='*'){
		$sql = "SELECT {$return} FROM `loan` WHERE `{$filter}` = '{$value}' LIMIT 1";
		$rez = oSQL::run($sql);
		if(empty($rez['errNo']) && $rez['numRows'] > 0){
			$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
			return $record[0];
		}
	}

	// Loan view payments
	public static function loan_view($type){
		$loan =  self::lastloan($_GET['MID'], 'Member');
		if(!empty($loan)){
			$LoanID = $loan['LoanID'];
			$sql = "SELECT * FROM `loan_transaction` WHERE `LoanID` = '".$LoanID."' AND `type` = '{$type}'";
			$rez = oSQL::run($sql);
			if(empty($rez['errNo']) && $rez['numRows'] > 0){
				$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
				return $record;
			}
		}
	}

	public static function totalLoanPayment(){
		$loan =  self::lastloan($_GET['MID'], 'Member');
		if(!empty($loan)){
			$LoanID = $loan['LoanID'];
			$sql = "SELECT SUM(`Amount`) AS SumTotal FROM `loan_transaction` WHERE `LoanID` = '".$LoanID."'";
			$rez = oSQL::run($sql);
			if(empty($rez['errNo']) && $rez['numRows'] > 0){
				$record = $rez['result']->fetch_all(MYSQLI_ASSOC);
				return $record[0]['SumTotal'];
			}
		}
	}


	// Post new transaction
	public static function transaction_post(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$TransID = mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$MemberRow = self::member($MemberID, 'MemberID', 'BIND');
		$MemberBIND = $MemberRow['BIND'];
		$type = oDATA::oRead('transactionType', 'oPOST');
		$amount = oDATA::oRead('transactionAmount', 'oPOST');
		$date = oDATA::oRead('transactionDate', 'oPOST');

		if($type == 'savings'){
			$row = self::member($MemberID, 'MemberID', 'Savings');
			$savings = ($row['Savings'] + $amount);
			$sql = "UPDATE `user` SET `Savings` = '{$savings}' WHERE `MemberID` = '{$MemberID}' LIMIT 1;";
			$rez = oSQL::run($sql);

			$sql = " INSERT INTO `transaction` (`BIND`, `Member`, `MemberID`, `Amount`, `Type`, `TransDate`, `TransID`)
			VALUES ('$BIND', '$MemberBIND', '$MemberID', '$amount', '$type', '$date', '$TransID')";
			$rez = oSQL::run($sql);
			if(!empty($rez['errNo'])){} #Todo ~ error in query (everywhere)
			else{
				oRoute::redirect(oRoute::ref().'.php?state=success');
			}
		}
	}

	// Post loan payment
	public static function loan_payment(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$TransID = mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$MemberRow = self::member($MemberID, 'MemberID', 'BIND');
		$MemberBIND = $MemberRow['BIND'];
		// $type = 'repayment';
		$amount = oDATA::oRead('transactionAmount', 'oPOST');
		$date = oDATA::oRead('transactionDate', 'oPOST');

		$loan = self::lastloan($MemberID, 'MemberID');
		$LoanID = $loan['LoanID'];

		$serviceLoanInput['MemberBIND'] = $MemberBIND;
		$serviceLoanInput['MemberID'] = $MemberID;
		$serviceLoanInput['LoanID'] = $LoanID;
		$serviceLoanInput['date'] = $date;

		// #when amount is equal monthly total payment due
		// if($amount == $loan['TotalPer']){

		// 	$amtPayInterest = $loan['InterestPer'];
		// 	self::serviceLoan($serviceLoanInput, $amtPayInterest, 'interest');

		// 	$amtPayPrincipal = $loan['PrincipalPer'];
		// 	self::serviceLoan($serviceLoanInput, $amtPayPrincipal, 'principal');
		// }
		// else {

			#if interest has not been paid fully
		$amountBal = $amount + $loan['Credit'];
		$countNow = $loan['InterestCount'];
		while (self::canPayInterest($amountBal, $loan['InterestPer'], $countNow)){
			$amtPayInterest = $loan['InterestPer'];
			self::serviceLoan($serviceLoanInput, $amtPayInterest, 'interest');
			$amountBal = $amountBal - $loan['InterestPer'];
			$countNow = $countNow - 1;
		}

		$countNowP = $loan['PrincipalCount'];
		while (self::canPayInterest($amountBal, $loan['PrincipalPer'], $countNowP)){
			$amtPayPrincipal = $loan['PrincipalPer'];
			self::serviceLoan($serviceLoanInput, $amtPayPrincipal, 'principal');
			$amountBal = $amountBal - $loan['PrincipalPer'];
			$countNowP = $countNowP - 1;
		}

		#add balance to credit
		$sqlU = "UPDATE `loan` SET `Credit` = '{$amountBal}' WHERE `MemberID` = '".$serviceLoanInput['MemberID']."' LIMIT 1;";
		oSQL::run($sqlU);
		// }
		oRoute::redirect('members.php?state=success');

		// elseif($amount > $loan['TotalPer']){

		// 	$amtPayInterest = $loan['InterestPer'];
		// 	self::serviceLoan($serviceLoanInput, $amtPayInterest, 'interest');

		// 	$amtPayPrincipal = $loan['PrincipalPer'];
		// 	self::serviceLoan($serviceLoanInput, $amtPayPrincipal, 'principal');

		// 	#remove paid from amount balance
		// 	$amountBal = $amount - $loan['TotalPer'];

		// }

	}

	public static function canPayInterest($amount, $interest, $count){
		if(($count > 0) && ($amount >= $interest)){return true;}
		return false;
	}

	public static function canPayPrincipalDue($amount, $principal, $count){
		if(($count > 0) && ($amount >= $principal)){return true;}
		return false;
	}


	public static function serviceLoan($service, $amtPay, $type){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$TransID = mt_rand(10000000,99999999);
		$sql = " INSERT INTO `loan_transaction` (`BIND`, `Member`, `MemberID`, `LoanID`, `Amount`, `Type`, `TransDate`, `TransID`)
		VALUES ('$BIND', '$service[MemberBIND]', '$service[MemberID]', '$service[LoanID]', '$amtPay', '$type', '$service[date]', '$TransID')";
		oSQL::run($sql);

		#find loan & update count
		$foundLoan = self::lastloan($service['MemberID'], 'MemberID');

		if($type == 'principal'){
			$countNow = $foundLoan['PrincipalCount'] - 1;
			$sqlU = "UPDATE `loan` SET `PrincipalCount` = '{$countNow}' WHERE `MemberID` = '".$service['MemberID']."' LIMIT 1;";
		}
		elseif($type == 'interest'){
			$countNow = $foundLoan['InterestCount'] - 1;
			$sqlU = "UPDATE `loan` SET `InterestCount` = '{$countNow}' WHERE `MemberID` = '".$service['MemberID']."' LIMIT 1;";
		}

		oSQL::run($sqlU);
		return;
	}


	// Prepare loan
	public static function loan_prepare(){
		$alpha = chr(rand() > 0.5 ? rand(65, 90) : rand(97,122));
		$BIND = $alpha.mt_rand(10000000,99999999);
		$LoanID = mt_rand(10000000,99999999);
		$MemberID = oDATA::oRead('MemberID', 'oPOST');
		$MemberRow = self::member($MemberID, 'MemberID', 'BIND');
		$MemberBIND = $MemberRow['BIND'];

		$type = oDATA::oRead('Type', 'oPOST');
		$DisbursedAs = oDATA::oRead('DisbursedAs', 'oPOST');
		$ReleaseDate = oDATA::oRead('ReleaseDate', 'oPOST');

		$Principal = oDATA::oRead('Principal', 'oPOST');
		$InterestRate = oDATA::oRead('InterestRate', 'oPOST');
		$Duration = oDATA::oRead('Duration', 'oPOST');

		$TotalInterest = (($InterestRate/100) * $Principal);
		$TotalPayment = $Principal + $TotalInterest;

		$InterestPer = $TotalInterest/$Duration;
		$PrincipalPer = $Principal/$Duration;
		$TotalPer = $PrincipalPer+$InterestPer;

		$RepaymentCycle = oDATA::oRead('RepaymentCycle', 'oPOST');
		#$RepaymentCount = oDATA::oRead('RepaymentCount', 'oPOST');
		$RepaymentCount = $Duration;


		$sql = " INSERT INTO `loan` (`BIND`, `Member`, `MemberID`, `Type`, `DisbursedAs`, `Principal`, `ReleaseDate`, `InterestRate`, `Duration`, `InterestPer`, `PrincipalPer`, `LoanID`, `RepaymentCycle`, `RepaymentCount`, `TotalInterest`, `TotalPayment`, `TotalPer`, `InterestCount`, `PrincipalCount`)
		VALUES ('$BIND', '$MemberBIND', '$MemberID', '$type', '$DisbursedAs', '$Principal', '$ReleaseDate', '$InterestRate', '$Duration', '$InterestPer', '$PrincipalPer', '$LoanID', '$RepaymentCycle', '$RepaymentCount', '$TotalInterest', '$TotalPayment', '$TotalPer', '$Duration', '$Duration')";
		$rez = oSQL::run($sql);

		$row = self::member($MemberID, 'MemberID', 'Loans');
		$loans = ($row['Loans'] + $Principal);
		$sqlU = "UPDATE `user` SET `Loans` = '{$loans}' WHERE `MemberID` = '{$MemberID}' LIMIT 1;";
		$rez = oSQL::run($sqlU);

		if(!empty($rez['errNo'])){} #Todo ~ error in query (everywhere)
		else{
			oRoute::redirect(oRoute::ref().'.php?state=success');
		}
	}



}
?>