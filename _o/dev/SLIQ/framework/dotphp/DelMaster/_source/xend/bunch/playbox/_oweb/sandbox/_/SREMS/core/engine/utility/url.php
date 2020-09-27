<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | utility::url - handles url functions
 * Dependency » config, util:string
 */
function markupURL($url, $name='', $tag=''){
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
	$isActive = isActiveURL($url);
	if($isActive=='yeah'){$cssClass .=' class="active"';}

	$chore = strtolower($chore);
	$prep ='<a href="'.$chore.'" title="'.$tag.'"'.$cssClass.'>'.$name.'</a>';
	return $prep;		
}

function isURL($url){
	$chore ='./';
	if(!empty($url)){$chore .='?url='.trimspace($url);}
	return $chore;
}

function isActiveURL($link){
	$url = getURL();
	if($link==$url){$chore ='yeah';}
	else {$chore = 'nope';}
	return $chore;
}

function getURL($return='url'){
	$chore = 'default';
	if(!empty($_GET['url'])){$chore = $_GET['url'];}
	return $chore;
}

function selfURL(){
	return isURL(getURL());
}

function refererURL(){
	if(isset($_SERVER['HTTP_REFERER'])){
		$referer = $_SERVER['HTTP_REFERER'];
		return $referer;
	}
}
?>