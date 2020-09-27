<?php
/* CYAR™ framework is an evolving library for rapid & efficient development of modem responsive static or dynamic website and applications.
 * Built and maintained at OIAVO™ using PHP, MySQL, HTML, CSS, JS & derived technology. Version 0.0.1 | CYAR™ Web framework © 2016
 * ========================================================================================================================================
 * PHP | utility::browser ~ browser related functions | Dependency » utility {vital}
 */

//-------------- Return browser agent string ---------------
function browserAgent(){
	return strtolower($_SERVER['HTTP_USER_AGENT']);
}


//-------------- Handles IE browser ---------------
function IE($operator=false, $version=NULL){
	if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches)
	|| preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT'])){
		return false === $operator ? false : NULL;
	}
	if(false !== $operator
	  && in_array($operator, array('<', '>', '<=', '>=', '==', '!='))
	  && in_array((int)$version, array(5,6,7,8,9,10))){
	  return eval('return ('.$matches[1].$operator.$version.');');
	}
	else {return (int)$matches[1];}
}

//-------------- Validate IE browser and version ---------------
function isIE($operator='', $version=''){
	if(!isEmpty($operator) && !isEmpty($version)){
		$ie = IE($operator, $version);
	} else {$ie = IE();}
	if(!$ie){return FALSE;}
	return TRUE;
}

//-------------- Returns IE version ---------------
function ieVersion(){
	if(isIE()){return IE();}
	return FALSE;
}


//-------------- Validate opera mobile browser ---------------
function isOperaMobi(){
	if(inString(browserAgent(), 'opera mobi')){return TRUE;}
	return FALSE;
}


//-------------- Validate opera mini browser ---------------
function isOperaMini(){
	if(inString(browserAgent(), 'opera mini')){return TRUE;}
	return FALSE;
}


//-------------- Return browser information ---------------
function getBrowser($return='name'){
	if(isIE()){$info = 'ie';}
	elseif(isOperaMobi()){$info = 'operamobi';}
	elseif(isOperaMini()){$info = 'operamini';}
	else {$info = browserAgent();}
	return strtolower($info);
}
?>