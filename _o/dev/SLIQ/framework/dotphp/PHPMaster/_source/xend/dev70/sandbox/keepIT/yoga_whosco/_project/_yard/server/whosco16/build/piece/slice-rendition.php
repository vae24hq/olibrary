
<div id="render">
	<ul id="renderNav" class="navigation">
	Switch to: 
<?php
	if(device::is() =='phone'){
		$rend ='	<li>'.render('desktop').'</li>'."\n";
		$rend .='	<li';if(validate_ie('<', 9)){$rend .= ' class="last"';}$rend .='>'.render('tablet').'</li>'."\n";
	}
	elseif(device::is() =='tablet'){
		$rend ='	<li>'.render('desktop').'</li>'."\n";
		$rend .='	<li';if(validate_ie('<', 9)){$rend .= ' class="last"';}$rend .='>'.render('phone').'</li>'."\n";
	}
	else {
		$rend ='	<li>'.render('tablet').'</li>'."\n";
		$rend .='	<li';if(validate_ie('<', 9)){$rend .= ' class="last"';}$rend .='>'.render('phone').'</li>'."\n";
	}
	echo $rend;
?>
	</ul>
</div>
