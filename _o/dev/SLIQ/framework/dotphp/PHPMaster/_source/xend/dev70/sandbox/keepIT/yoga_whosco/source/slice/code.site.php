<?php
//custom functions
function makeNav($pos='main'){
	$faq = 'support & faq';
	$contact = 'contact us';

	if((Device::is() == 'phone' && $pos=='footer') || Device::is() == 'tablet'){$contact = 'contact';}
	if(Device::is() == 'desktop' && device::identify() == 'tablet'){$contact = 'contact';}
	if(Device::is() != 'desktop' || isIE('<',9)){$faq = 'faq';}

	$nav = "\t".'<li>'.navLink('home').'</li>'."\n";
	if(Device::is() != 'phone' || (Device::is() == 'phone' && $pos != 'footer')){
		$nav .= "\t".'<li>'.navLink('about-us','about us').'</li>'."\n";
		$nav .= "\t".'<li>'.navLink('services').'</li>'."\n";
	}

	if($pos=='main'){
		$nav .= "\t".'<li>'.navLink('products').'</li>'."\n";
		$nav .= "\t".'<li>'.navLink('media').'</li>'."\n";
		$nav .= "\t".'<li>'.navLink('latest-supply', 'latest supply').'</li>'."\n";
	}

	if($pos=='footer'){
		if(Device::is() != 'phone'){
$nav .= "\t".'<li>'.makeLinkAbsolute('http://sms.whosco.com', 'sms', 'navlink', 'send sms').'</li>'."\n";
$nav .= "\t".'<li>'.makeLinkAbsolute('http://whosco.com:2095', 'webmail', 'navlink', 'check mail').'</li>'."\n";
		} //end if not phone

		$nav .= "\t".'<li>'.navLink('legal-information', 'legal', 'legal information').'</li>'."\n";
	}

	//hide if device is tablet and redition request is desktop
	if((Device::is() == 'desktop' && device::identify() != 'tablet') || Device::is() == 'phone' || Device::is() == 'tablet'){
		$nav .= "\t".'<li>'.navLink('support-and-faq', $faq).'</li>'."\n";
	}

	if(Device::is() == 'phone' && $pos !='footer'){
		$nav .= "\t".'<li><a href="#searchForm" title="Search for products" class="navlink">search</a></li>'."\n";
	}
	$nav .= "\t".'<li';
	if(isIE('<', 9)){$nav .= ' class="last"';}$nav .='>'.navLink('contact-us', $contact, 'contact us').'</li>'."\n";
	echo $nav;
}
?>