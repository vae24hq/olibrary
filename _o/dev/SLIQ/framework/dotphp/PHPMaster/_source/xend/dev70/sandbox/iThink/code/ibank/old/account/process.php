<?php require('../brux.php'); require('is_restrict.php');
$transMsg = validateTransfer();
$billing = false; $billingAuthentication = '';
// If code validation has been initiated
if((isset($_POST["Form_Process"])) && ($_POST["Form_Process"] == "ProcessIT")){
	if(!validateBilling()){
		// when transaction id is not set on URL
		if(empty($_GET['transferID'])){
			echo '<meta http-equiv="Refresh" content="3; URL=dashboard.php">';
			$transMsg = '<p class="text-danger" style="margin: 100px auto; text-align: center">You do not have any transfer selected</p>';
		}
		else {
			$billing = transferBilling();
		}
		$billingAuthentication = '<p class="col-md-offset-2 warning" style="font-weight: bold;">';
		$billingAuthentication .= 'AUTHENTICATION FAILED !</span><br>';
		$billingAuthentication .= 'Please enter only valid information for ';
		if(isset($billing['label']) && !empty($billing['label'])){$billingAuthentication .= $billing['label'];}
		$billingAuthentication .='</p> ';

	}
	// Post billing value is correct, so launch processing pad
	else {
		$transMsg = validateSplash();
	}
}
// When code validation has not been initiated
else {
	$billing = transferBilling();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Process :: iNetB - <?php echo firm('name');?></title>
<?php include('../in_head.php');?>
</head>

<body>
<div id="content">
	<div class="col-md-12">
		<div class="table-responsive">
		<?php echo $transMsg;
		#If billing record exists, show form
		if($billing !== false){?>
		<form name="requiredForm" id="requiredForm" method="POST" action="<?php echo $editFormAction;?>">

		<table id="requiredInfo" class="record col-md-12">
			<tr>
				<th class="col-md-12 table-heading" colspan="12">Funds Transfer</th>
			</tr>
			<tr>
				<td class="col-md-12" colspan="12">
					<div class="ibox">
						<?php if(!empty($billingAuthentication)){echo $billingAuthentication;} else {?>
						<p class="col-md-offset-2 text-primary" style="font-weight: bold;"><?php echo $billing['line'];?></p>
						<?php }?>
					</div>
				</td>
			</tr>
			<tr>
				<th class="col-md-3 title" colspan="3"><?php echo $billing['label'];?></th>
				<td class="col-md-9 value" colspan="9">
					<input name="value" type="text" id="value" class="form-control" value="<?php echo retainInput('value');?>" tabindex="1" required>
					<input type="hidden" name="billing" value="<?php echo $billing['buid'];?>">
				</td>
			</tr>
		</table>
		
		<table class="col-md-12 no-border">
			<tr>
				<td colspan="12" class="col-md-12">
					<div class="" style="text-align: center; padding: 30px 0 40px;">
						<input type="hidden" name="Form_Process" value="ProcessIT">
						<input type="submit" name="VerifyBTN" id="VerifyBTN" class="btn btn-md btn-primary" value="Verify">
						<input type="reset" name="clear" id="clear" class="btn btn-md btn-danger" value="Cancel">
					</div>
				</td>
			</tr>
		</table>
		</form>

		<?php }?>
		</div>
	</div>
</div>
</body>
</html>