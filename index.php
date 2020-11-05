<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * IGNITE ~ Default File • DEPENDENCY»
 */
require 'ignite.inc';

#INITIALIZE PROJECT (based on a specific project)
$initpath = oRoute::Path('init', true); #@NOTE ~ if TRUE - omain is used when source directory is not found
oFile::Inc($$initpath, 'iOptional'); #@TODO ~ do full testing ON route's methods using this option


#DEVBOX FILE - for development, demo & testing
oFile::Inc(oROOT.'_o'.DS.'ignor'.DS.'_debug.inc', 'isOptional');
?>