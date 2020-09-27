<?php
function browser(){
	$chore = strtolower($_SERVER['HTTP_USER_AGENT']);

	return $chore;
}


function ie($operator=false, $version=NULL){
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


function validate_ie($operator='', $version=''){
	if(!empty($operator) && !empty($version)){
		$chore = ie($operator, $version);
	} else {
		$chore = ie();
	}

  if(!$chore){return FALSE;}

  return TRUE;
}


function get_ie(){
	if(validate_ie()){return ie();}

	return FALSE;
}


function validate_operamobi(){
	if(in_string(browser(), 'opera mobi')){return TRUE;}

	return FALSE;
}


function validate_operamini(){
	if(in_string(browser(), 'opera mini')){return TRUE;}

	return FALSE;
}


function browser_info(){
	if(validate_ie()){$chore = 'ie';}
	elseif(validate_operamobi()){$chore = 'operamobi';}
	elseif(validate_operamini()){$chore = 'operamini';}
	else {$chore = browser();}

	return strtolower($chore);
}
?>