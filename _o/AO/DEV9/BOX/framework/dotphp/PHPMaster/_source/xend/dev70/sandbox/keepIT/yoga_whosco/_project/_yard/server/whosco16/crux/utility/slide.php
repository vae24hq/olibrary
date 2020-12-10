<?php
/* erko™ framework ~ an evolving, robust platform for rapid & efficient development of modem responsive static or dynamic website;
 * Built by DeronEllse™ [@deronellse - www.deronellse.com/about] using PHP, MySQL, HTML, CSS, JS & derived technology.
 * © February 2016 | version 1.0
 * ===================================================================================================================
 * Dependency »
 * PHP | slide::utility ~ for slide operations
 */

//Return image for slide banner
function slide_img($name='1', $caption='', $alt=''){
	if(is_empty($alt) && !is_empty($name)){$alt = $name;}
	$apend = 'slide';

	#prepare image size-name based on device
	$size = '';
	if(device::is()=='phone'){$size ='-small';}
	if(device::is()=='tablet'){$size ='-medium';}
	if(device::is()=='desktop'){$size ='-large';}

	#prepare image name
	$image = path_to('banner').$apend.$size.'-'.$name.'.jpg';
	if(!found_file($image)){$image = path_to('banner').$apend.'-'.$name.'.jpg';}
	if(!found_file($image)){$image = path_to('media').'banner-slide-'.$name.'.jpg';}

	#prepare task
	$chore = '<img class="slides" src="'.$image.'" alt="'.$alt.'">';
	if(!is_empty($caption)){$chore .= '<p class="caption">'.$caption.'</p>';}
	
	#return task
	return $chore;
}


//Return slide banner
function slide_banner($data=''){
	#set defaults
	$chore =''; $name =''; $caption =''; $alt ='';
	if(is_empty($data)){
		global $bannerImgData;
		if(!is_empty($bannerImgData)){$data = $bannerImgData;}
	}

	#prepare task
	if(is_array($data)){
		foreach($data as $row){
			$chore .='	<li>';
			if(is_array($row)){
				if(!is_empty($row['name'])){$name = $row['name'];}
				if(!is_empty($row['caption'])){$caption = $row['caption'];}
				if(!is_empty($row['alt'])){$alt = $row['alt'];}
			}
			$chore .= slide_img($name, $caption, $alt).'</li>'."\n";
		}
	}
	
	#return task
	return $chore;
}
?>