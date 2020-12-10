<?php

#cPanel Information
$cp_user = 'apriahelp';
$cp_password = 'XO'.mt_rand();
$cp_domain = 'apriahelp.com';
$cp_skin = 'x3';

#CP Email Information
$cp_email_user = 'info';
$cp_email_password = mt_rand().'GO';
$cp_email_quota = 50;

#WHM Information
$whm_user   = "vien3c";
$whm_password   = "H9UeZrEtIid76";
$whm_host = 'vien3.com';

#Hosting
$whm_plan = 'vien3c_LiteBH';
$whm_email = 'hosting@vien3.com';

#Notification
$notication_email = 'admin@vien3.com';


#RUN THE SERVICE

// Auto create account on the cPanel server
	$whm_script = "http://$whm_user:$whm_password@$whm_host:2086/scripts/wwwacct";
	$whm_params = "?plan=$whm_plan&domain=$cp_domain&username=$cp_user&password=$cp_password&contactemail=$whm_email";
	$whm_file_handle = fopen($whm_script.$whm_params, "r");
	// while (!feof($whm_file_handle)){
	// 	$whm_line_of_text = fgets($whm_file_handle);
	// 	print $whm_line_of_text . "<br>";
	// }
	fclose($whm_file_handle);

  	


//Auto creation of email for $cp_email_user@$cp_domain
	$cp_script = "http://$cp_user:$cp_password@$whm_host:2082/frontend/$cp_skin/mail/doaddpop.html";
	$cp_params = "?email=$cp_email_user&domain=$cp_domain&password=$cp_email_password&quota=$cp_email_quota";
	$cp_file_handle = fopen($cp_script.$cp_params, "r");
	// while (!feof($cp_file_handle)){
	// 	$cp_line_of_text = fgets($cp_file_handle);
	// 	print $cp_line_of_text . "<br>";
	// }
	fclose($cp_file_handle);

	
	#Output the notification
	if($whm_file_handle){
		echo "<p>The cPanel Account: <i>$cp_domain</i> has been created with username [<b>$cp_user</b>] and password [<b>$cp_password</b>]</p>";
	}

	#Output the notification
	if($cp_file_handle){
		echo "<p>The email address: <i>$cp_email_user@$cp_domain</i> has been created with password [<b>$cp_email_password</b>]</p>";
	}
?>