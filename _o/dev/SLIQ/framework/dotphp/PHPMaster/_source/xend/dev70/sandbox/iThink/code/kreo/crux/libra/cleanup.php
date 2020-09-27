<?php

//-------------- Clean up a URL & return domain ---------------
function url2domain($url){
	$domain = $url;
	$domain = string::swap($domain, 'https://', '', 'first');
	$domain = string::swap($domain, 'http://', '', 'first');

	#remove sub-directory if available
	if(string::in($domain, '/')){
		$domain = string::before($domain, '/', 'yeah');
	}

	#remove [known] sub-domain *ToDO [use library]
	$domain = string::swap($domain, 'www.', '', 'first');
	$domain = string::swap($domain, 'en.', '', 'first');
	$domain = string::swap($domain, 'ng.', '', 'first');

	return $domain;
}


function cleanInput($input){
	$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	);
	$output = preg_replace($search, '', $input);
	return $output;
}
?>