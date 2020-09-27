<?php
function activeCSS($uri='index'){
	if(isActiveLink($uri)){
		echo ' active';
	}
}
function activeNavCSS($uri='index'){
	if(isActiveLink($uri)){
		echo ' odao-nav-link-active';
	}
}
?>