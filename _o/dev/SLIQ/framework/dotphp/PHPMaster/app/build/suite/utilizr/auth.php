<?php
	 function doAuth(){
		# To prevent repetitive calls but exclude for login view
		global $odao;
		$uri = $odao->uri();
		if($uri != 'login'){return $odao->auth();}
	}
?>