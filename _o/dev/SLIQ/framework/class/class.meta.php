<?php
/* Quiqway™ - a rapid web development platform by iO™ (inspired cirqle)
 * © April 2015 | version 2.0
 * PHP | class::meta ~
 */

#require_once(DIR_CLASS.DS.'loader.php');
#require_once(DIR_UTILITY.DS.'string.php');

class Meta {
	public static function Data($data='description'){
		global $metaDescription; global $metaKeywords; global $Loader; global $Setting;
		$meta = $Loader->Module().'_'.$Loader->Operation();
		$prep = '';
		if(!empty($Setting->SiteBrand)){$prep = $Setting->SiteBrand;}
		$dataset = array('description', 'keywords');
		if(!empty($data) && in_array($data, $dataset)){
			$prepData = 'meta'.ucfirst(strtolower($data));
			$metaData = $$prepData;
			if($data=='description'){$prep .= ' - ';}
			if($data=='keywords'){$prep .= ', ';}
			if(array_key_exists($meta, $metaData)){$prep .= $metaData[$meta];}
			else{ //use default Tagline & Tags
				if($data=='description' && !empty($Setting->SiteSlogan)){$prep .= ucfirst($Setting->SiteSlogan);}
				if($data=='keywords' && !empty($Setting->SiteTags)){$prep .= ucwords($Setting->SiteTags);}
			}
		} else {die('<p>MetaData Error</p>');}
		return $prep;
	}
}
?>