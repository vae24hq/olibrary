<?php
//-------------- Returns base URL ---------------
function baseURL(){
	return strtolower($_SERVER['HTTP_HOST']);
}

//-------------- Returns base Domain ---------------
function baseDomain(){
	return strtolower(url2domain(baseURL()));
}

//-------------- Returns remote directory ---------------
function baseDir(){
	return strtolower(string::swap($_SERVER['DOCUMENT_ROOT'], DS, '', 'last'));
}
?>