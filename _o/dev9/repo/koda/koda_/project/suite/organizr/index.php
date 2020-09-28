<?php
/**ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | index::organizer ~ default/landing
 **/

#$zernApp->redirect('dashboard');
$input['phone'] = '09026636728';
$username = 'software';
$input['Username'] = oAuth::ocrypt($username, 'oEN64');
$input['Email'] = oAuth::ocrypt($username.'@xena.ca', 'oEN64');
$input['Password'] = oAuth::password('Software#');
$input['Type'] = oAuth::ocrypt('software', 'oENCODE');
$input['LastName'] = oAuth::ocrypt('Xena', 'oENCODE');
$input['FirstName'] = oAuth::ocrypt('Software', 'oENCODE');
$input['Sex'] = 'M';
$input['Country'] = 'NG';
$input['State'] = 'Edo';
$input['LGA'] = 'Oredo';
$input['DOB'] = oPeriod::create('October 31, 1997','oMYSQLDATE');
$input['ReferralID'] = 'XENA';
if(!empty($zernDB)){
	$insert = $zernDB->insertSQL('oUSERZ_TABLE', $input);
	dbug($insert);
}
else {
	echo 'NO DB';
}
?>