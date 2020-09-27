<?php
/* iQYRE™ - a micro web application development framework by iCYZa™ © 2015
 * Program -> ie.php
 */

function IEVersion($compare=false, $to=NULL){
    if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $m)
     || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT'])){
    	return false === $compare ? false : NULL;
    }

    if(false !== $compare
        && in_array($compare, array('<', '>', '<=', '>=', '==', '!=')) 
        && in_array((int)$to, array(5,6,7,8,9,10))){
        return eval('return ('.$m[1].$compare.$to.');');
    }
    else{
        return (int)$m[1];
    }
}

function AsIE($getVersion='nope'){
	$ie = IEVersion();
	if(!$ie){return 'nope';}
	elseif($getVersion !='nope'){return $ie;}
	return 'yeah';
}
?>