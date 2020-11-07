<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * IGNITE ~ Default File • DEPENDENCY»
 */
require 'ignit.inc';

#INITIALIZE (based on a specific project)
oFile::inc(oRoute::path('init', false), true);

#DEVBOX - for development, demo & testing
oFile::inc(oROOT.'_o'.DS.'ignor'.DS.'_debug.inc', false);
?>