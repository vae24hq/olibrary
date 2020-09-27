<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | slide::utility ~ for slide operations
 */
//detects image for slideshow
function slide_img($name='1', $caption='', $alt=''){
	if(is_empty($alt) && !is_empty($name)){$alt = $name;}
	$slideapend = 'slide';

	//prepare device name
	$device = '';
	if(device::is()=='phone'){$device ='-small';}
	if(device::is()=='tablet'){$device ='-medium';}
	if(device::is()=='desktop'){$device ='-large';}
	$image = path_to('banner').$slideapend.$device.'-'.$name.'.jpg';
	if(!found_file($image)){$image = path_to('banner').$slideapend.'-'.$name.'.jpg';}
	if(!found_file($image)){$image = path_to('media').'banner-slide-'.$name.'.jpg';}

	$prep = '<img class="slides" src="'.$image.'"';
	$prep .= ' alt="'.$alt.'">';
	if(!is_empty($caption)){$prep .= '<p class="caption">'.$caption.'</p>';}
	return $prep;
}

//returns slide banner
function slide_banner($data=''){
	$prep =''; $name =''; $caption =''; $alt ='';
	if(is_empty($data)){
		global $bannerImgData;
		if(!is_empty($bannerImgData)){$data = $bannerImgData;}
	}

	if(is_array($data)){
		foreach($data as $row){
			$prep .='	<li>';
			if(is_array($row)){
				if(!is_empty($row['name'])){$name = $row['name'];}
				if(!is_empty($row['caption'])){$caption = $row['caption'];}
				if(!is_empty($row['alt'])){$alt = $row['alt'];}
			}
			$prep .= slide_img($name, $caption, $alt).'</li>'."\n";
		}
	}
	return $prep;
}

?>