<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * INDEX ~ Default File • DEPENDENCY»
 */
#error_reporting(0);
declare(strict_types = 1);
require 'ignit.inc';

#INITIALIZE (based on a specific project)
require oRoute::path('init', true);

#DEVBOX - for development, demo & testing
// oFile::inc(oROOT.'_o'.DS.'ignor'.DS.'_debug.inc', false);

// $var['variables'] = get_defined_vars();
// $var['constants'] = get_defined_constants();
// echo '<pre>'.print_r($var, true).'</pre>';
// echo oPrint::Neat($_REQUEST);
// echo oPrint::Neat($var);
// echo oPrint::neat(['class' => $class, 'file' => $file]);
$device = new oMobile;
echo oPrint::neat($config);
?>