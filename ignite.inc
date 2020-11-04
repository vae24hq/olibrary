<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * IGNITE ~ Ignition • DEPENDENCY»
 */

#DEFINE SEPARATOR
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('PS') ? null : define('PS', '/');

require 'ao.path.inc';

#Using HTACCESS for PATH
defined('CLOUD') ? null : define('CLOUD', 'cloud'.PS);
defined('ASSET') ? null : define('ASSET', 'asset'.PS);
defined('CSS') ? null : define('CSS', 'css'.PS);
defined('ICON') ? null : define('ICON', 'icon'.PS);
defined('JS') ? null : define('JS', 'js'.PS);
defined('MEDIA') ? null : define('MEDIA', 'media'.PS);
defined('AUDIO') ? null : define('AUDIO', 'audio'.PS);
defined('DOCUMENT') ? null : define('DOCUMENT', 'document'.PS);
defined('GRAFIX') ? null : define('GRAFIX', 'grafix'.PS);
defined('IMAGE') ? null : define('IMAGE', 'image'.PS);
defined('VIDEO') ? null : define('VIDEO', 'video'.PS);
defined('FONT') ? null : define('FONT', 'font' . PS);

require 'ao.lib.inc';



#INITIALIZE PROJECT (based on a specific project)
// oFile::Inc(oRoute::Path('init', true), 'iOptional'); #@TODO ~ do full testing ON route's methods using this option
#oFile::Inc(oRoute::Path('init'), 'iRequired');


#REDIRECT URL ~ @TODO
// if((!empty($_REQUEST['action'])) && $_REQUEST['action'] == 'redirect'){
// 	$destination = quin::site_url();
// 	$location = $_GET['location'];
// 	if(!empty($location)){
// 		if(in_string($location,'www.')){
// 			redirect('http://'.$location);
// 		}
// 		else {
// 			$destination .= PS.$location;
// 			redirect($destination);
// 		}
// 	}
// }


?>