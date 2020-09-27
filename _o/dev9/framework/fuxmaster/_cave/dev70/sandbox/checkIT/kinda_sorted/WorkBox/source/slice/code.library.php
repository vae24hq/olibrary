<?php
//custom functions
function makeNav($pos='main'){
	$faq = 'support & faq';
	$contact = 'contact us';

	if((Device::is() == 'phone' && $pos=='footer') || Device::is() == 'tablet'){$contact = 'contact';}
	if(Device::is() == 'desktop' && device::identify() == 'tablet'){$contact = 'contact';}
	if(Device::is() != 'desktop'){$faq = 'faq';}

	$nav = '			<li>'.pageMenu('home').'</li>'."\n";
	if(Device::is() != 'phone' || (Device::is() == 'phone' && $pos != 'footer')){
		$nav .= '			<li>'.pageMenu('about-us','about us').'</li>'."\n";
		$nav .= '			<li>'.pageMenu('services').'</li>'."\n";
	}

	if($pos=='main'){
		$nav .= '			<li>'.pageMenu('products', 'products gallery').'</li>'."\n";
		$nav .= '			<li>'.pageMenu('media').'</li>'."\n";
		$nav .= '			<li>'.pageMenu('latest-supply', 'latest supply').'</li>'."\n";
	}

	if($pos=='footer'){
		if(Device::is() != 'phone'){
			$nav .= '			<li>'.makeLinkAbsolute('http://sms.whosco.com', 'sms', 'menu', 'send sms').'</li>'."\n";
			$nav .= '			<li>'.makeLinkAbsolute('http://whosco.com:2095', 'webmail', 'menu', 'check mail').'</li>'."\n";
		} //end if not phone

		$nav .= '			<li>'.pageMenu('legal-information', 'legal', 'legal information').'</li>'."\n";
	}

	//hide if device is tablet and redition request is desktop
	if((Device::is() == 'desktop' && device::identify() != 'tablet') || Device::is() == 'phone' || Device::is() == 'tablet'){
		$nav .= '			<li>'.pageMenu('support-and-faq', $faq).'</li>'."\n";
	}

	if(Device::is() == 'phone' && $pos !='footer'){
		$nav .= '			<li><a href="#search" title="search for products" class="menu">search</a></li>'."\n";
	}
	$nav .= '			<li';
	if(isIE('<', 9)){$nav .= ' class="last"';}$nav .='>'.pageMenu('contact-us', $contact, 'contact us').'</li>'."\n";
	echo $nav;
}
?>