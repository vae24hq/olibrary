<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | image::utility ~ for image files
 */

function load_image($image='', $path='media'){
	if(is_empty($image)){return false;}

	#prepare and return
	if(defined('REWRITE_URL') && REWRITE_URL == 'yeah'){
		$image = path_to($path, 'domain').$image;
	}
	else {
		$image = path_to($path).$image;
	}

	return $image;
}

function trans_img($image='', $path='media'){
	if(is_empty($image)){return false;}

	$image = load_image($image, $path);

	#prepare and return
	if(validate_ie('==', 6)){$image .= '-ie6';}
	if(defined('REWRITE_URL') && REWRITE_URL == 'yeah'){return $imgurl .='.png';}
	else {
		if(found_file($imgfile.'.png')){return $imgfile .='.png';}
		elseif(found_file($imgfile.'.jpg')){return $imgfile .='.jpg';}
		elseif(found_file($imgfile.'.gif')){return $imgfile .='.gif';}
	}
	return false;
}
?>