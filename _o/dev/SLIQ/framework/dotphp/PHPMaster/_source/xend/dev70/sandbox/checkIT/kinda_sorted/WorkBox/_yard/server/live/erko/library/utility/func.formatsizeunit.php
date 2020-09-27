<?php
/* Cigna™ - a micro web content management system by QuickOne™
 * SiEMO™ Nigeria [www.siemo.com.ng]
 * Author(s) -> Crieg A. Siemo ~ www.iamsiemo.com // crieg@siemo.com.ng
 * © August 2014 | version 1.0 beta
 * PHP | func:formatSizeUnit -
 * Dependency » 
 */
	
	function formatSizeUnit($bytes){
		if($bytes >= 1073741824) {
			$bytes = number_format($bytes / 1073741824 , 2) . 'gb';
		}
		elseif($bytes >= 1048576) {
			$bytes = number_format($bytes / 1048576 , 2) . 'mb';
		}
		elseif($bytes >= 1024) {
			$bytes = number_format($bytes / 1024 , 2) . 'kb';
		}
		elseif($bytes > 1) {
			$bytes = $bytes . 'bytes';
		}
		elseif($bytes = 1) {
			$bytes = $bytes . 'byte';
		}
		else {
			$bytes = '0 bytes';
		}
		return $bytes;
	}
?>