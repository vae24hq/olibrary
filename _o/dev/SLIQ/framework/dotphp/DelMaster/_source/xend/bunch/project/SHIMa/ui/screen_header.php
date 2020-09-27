<?php
if (isset($_SESSION['userID'])) {
	$UserOn = new UserOn;
	$userOn_Name = $UserOn ->getPersonInfo("FullName");
	
		if($userOn_Name == 'Guest') {
			$salute = "Hi";
		}
		else { $salute = "Welcome"; } 
} 
else {
	class UserOff {
		function getPersonInfo($value = "FullName") {
			$task = 'Guest';
			return $task;
		}		
	}
	$UserOn = new UserOff;
	$salute = "Hi";
}
?>
<table width="100%" align="center" cellpadding="0" cellspacing="0" id="hedbar">
  <tr>
        <td valign="middle" class="hedbar">
        	<greetings>
            	<?php print_msg($salute); ?>
                <user><?php print_msg($UserOn ->getPersonInfo("FullName")); ?></user>,
                <?php 
					$timenow = do_date("unix");
					$timenow = get_time($timenow,"hr","24");
					print_msg(greetings($timenow));
				?>
            </greetings>
            <date><?php print_msg(do_date()); ?></date>
        </td>
	</tr>
</table>
