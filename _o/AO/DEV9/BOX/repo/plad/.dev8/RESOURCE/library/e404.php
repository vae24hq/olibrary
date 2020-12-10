<?php
function not_found($data='', $notify='display'){ #display | email | sms | log | all
	$prep = '<div class="content">'."\n";
	$prep .= '<h3>'.ucwords($data).' - Not Found!</h3>';
	$prep .= '<p>We are sorry for this awkwardness as the requested document is not available.<br>'."\n";
	$prep .= 'Please return to '.markup_url('index', quin::$name).'</p>'."\n";
	$prep .= '<p class="spaceTop">You may report this issue to us via ';
	$prep .= '<a href="mailto:'.quin::$mailadmin.'" target="_blank" class="email">'.quin::$mailadmin.'</a></p>'."\n";
	$prep .= '</div>'."\n";

	if($notify=='all' || $notify=='display'){echo $prep;}

	return;
}
?>