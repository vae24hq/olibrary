<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * IGNITE ~ Default File • DEPENDENCY»
 */
require 'ignit.inc';

#INITIALIZE PROJECT (based on a specific project)
#@NOTE ~ when set to TRUE, omain is used if source directory is not found
oFile::inc(oRoute::path('init', true), 'iRequired'); #@TODO ~ do full testing ON route's methods using sub domain


#DEVBOX FILE - for development, demo & testing
oFile::inc(oROOT.'_o'.DS.'ignor'.DS.'_debug.inc', 'iOptional');
?>