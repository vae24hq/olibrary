<?php
function cleanPhone($number=''){
	if(oString::in($number, '|') === true){
		$code = trim(oString::before($number, '|', true));
		$phone = trim(oString::after($number, '|', true));
		if($phone[0] === '0'){$number = $code.ltrim($phone, $phone[0]);}
		else {$number = $code.$phone;}
	}
	return $number;
}