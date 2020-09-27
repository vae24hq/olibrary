<?php
if(
	mail('allo@eirvo.ga', 'Hello', 'I this is a ZETTAHOST.COM SMTP TEST')
	){
		echo 'Email SENT!';
	}
	else {
		echo 'Email FAILED!';
	}
?>