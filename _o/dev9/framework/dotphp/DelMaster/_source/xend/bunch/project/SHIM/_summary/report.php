<link rel="stylesheet" type="text/css" href="../script/css/screen.css"/>
 
 <?php 
 	include("../_restaurant/income_summary.php");  
	include("../_vip_bar/income_summary.php");
	include("../_bush_bar/income_summary.php"); 
	include("../_reception/accommodation_report.php");
 ?>
 
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    </td>
  </tr>
  <tr>
    <td align="center" valign="middle">
    			<?php //send sms
				
				$summaryRestaurant;
				$summaryVIP;
				$summaryBUSH;
				
				$summaryAccTCost;
				$summaryAccTotalIncome;
				$summaryAccCBal;	
				
				//$msg = "Summary for ACCOMMODATION: ";
				
				$msg = "Restaurant -  ".$summaryRestaurant;
				$msg .= "VIP -  ".$summaryVIP;
				$msg .= "Bush Bar -  ".@$summaryBUSH;
				$msg .= "Room -  ".@$summaryAccTCost;
				$msg .= "Room Income -  ".@$summaryAccTotalIncome;
				$msg .= urlencode($msg);				
				
				$owner_email = urlencode('talk2steve4good@yahoo.co.uk');
				$sub_account = urlencode('rialto');
				$subacc_pwd = urlencode('rialto');
				//$msg = urlencode($_POST['msg']);
				$from_sender = urlencode('Rialto');
				//$send_to = urlencode($_POST["to_destination"]);
				$send_to = urlencode("+2348153952858");
				//$send_to = urlencode("+2348133798803, +2348022894103");
				$msg_type = '0';
				$schedule = ('13 Aug 2012 12:30 PM');
				
				if(isset($_POST['sendsms'])) {
					
					//send email test
					
				 //take care of error
				 error_reporting(E_ALL ^ E_WARNING);
				if($send_to_api = file("http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=$owner_email&subacct=$sub_account&subacctpwd=$subacc_pwd&message=$msg&sender=$from_sender&sendto=$send_to&msgtype=$msg_type")) { 
		   		  
			  	$return = $send_to_api['0']; 
			    $return_check = strstr($return, 'OK');			   
			   if ($return_check) {					
					echo "<p>Notification sent!</p>";					
					
			  	} else {
					
				  echo "<p>Notification NOT SUCCESSFULL...</p>";
			  	}		
		   } 
		   else { echo "<p><font color=red>An internal error occured, <br/> Please make sure you have internet connection <br/> TRY AGAIN!</font></p>";}
				} //send sms
		  ?>
              
    <form id="sendNotification" name="sendNotification" method="post" action="">
      <input name="sendsms" type="hidden" id="sendsms" value="go" />
    
    
      <input type="submit" name="button" id="button" value="Post Report" />
    </form></td>
  </tr>
</table>