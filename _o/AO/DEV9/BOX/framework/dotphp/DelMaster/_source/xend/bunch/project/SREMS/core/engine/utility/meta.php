<?php
/* PYPE™ - web development framework [HTML/CSS/PHP/SQL/JS/MORE]
 * PHP | util::meta
 * Dependency » *
 */
function isMeta($meta=''){
	global $metaDescription;
	global $metaKeywords;
	global $pypeApp;
	global $pypeTagline;
	global $pypeModule;
	global $pypeOperation;
	global $pypeAction;

	$module = str_replace(' ', '-',strtolower($pypeModule));
	$operation = str_replace(' ', '-',strtolower($pypeOperation));

	$chore = $pypeApp;

	if($meta=='description'){
		if($module=='pype'){$chore .=' - '.$pypeTagline;}
		elseif($module=='page'){
			$chore .=' '.isDocument();
			if(!empty($metaDescription) && is_array($metaDescription)&& array_key_exists($operation, $metaDescription)){
				$chore .=' - '.$metaDescription[$operation];			
			}
		}
		#$module is not a page
		else {
			$chore .=' '.isDocument();
			if(!empty($metaDescription) && is_array($metaDescription)&& array_key_exists($module.'.'.$operation, $metaDescription)){
				$chore .=', '.$metaDescription[$module.'.'.$operation];			
			}
		}
	}

	if($meta=='keywords'){
		if($module=='pype'){$chore .=', '.$metaKeywords['default'];}
		elseif($module=='page'){
			$chore .=' '.isDocument();
			if(!empty($metaKeywords) && is_array($metaKeywords)&& array_key_exists($operation, $metaKeywords)){
				$chore .=', '.$metaKeywords[$operation];			
			}
		}
		#$module is not a page
		else {
			$chore .=', '.$pypeApp.' '.isDocument();
			if(!empty($metaKeywords) && is_array($metaKeywords)&& array_key_exists($module.'.'.$operation, $metaKeywords)){
				$chore .=', '.$metaKeywords[$module.'.'.$operation];			
			}
		}
	}

	return $chore;
}
?>