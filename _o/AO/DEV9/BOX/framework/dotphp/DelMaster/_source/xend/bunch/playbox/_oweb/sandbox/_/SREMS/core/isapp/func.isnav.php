<?php

function isNavURL($icon, $url, $name='', $tag=''){
	$chore ='';
	if(!empty($url)){
		$chore .=isURL($url);
		if(empty($tag)){
			$tag = clean($url);
			$tag = decorate($tag, 'capword');
		}
		$tag = decorate($tag,'sentence');
		if(empty($name)){$name = strtolower($tag);}	
	}

	$cssClass = '';
	$isActiveNav = isActiveNav($url);
	if($isActiveNav=='yeah'){$cssClass .=' class="active"';}

	$chore = strtolower($chore);
	$prep ='<a href="'.$chore.'" title="'.$tag.'"'.$cssClass.'><img src="'.ICON.FS.$icon.'.png'.'">'.$name.'</a>';
	echo $prep;
}

function isActiveNav($link){
	$url = getURL();
	global $pypeLoader;
	$module = $pypeLoader->module();
	if($link==$url || $link == $module){$chore ='yeah';}
	else {$chore = 'nope';}
	return $chore;
}
?>