<?php 

	class device_view {
		
		//AUTO DETECT DEVICE VIEW
		function get_view () {
			$mobile_browser = '0';		
			if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))){
			$mobile_browser++;
			}		
			if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or
				((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))){
				$mobile_browser++;
			}		
			$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
			$mobile_agents = array(
				'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
				'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
				'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
				'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
				'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
				'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
				'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
				'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
				'wapr','webc','winw','winw','xda','xda-');				
			if(in_array($mobile_ua,$mobile_agents)){
				$mobile_browser++;
			}		
			if(isset($_SERVER['ALL_HTTP'])) {
				if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
					$mobile_browser++;
				}
			}		
			if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
				$mobile_browser = 0;
			}
	
			if($mobile_browser > 0){
				$view_set = "mobile";
			} else {
				$view_set = "screen";
			}		
			
			return $view_set;	
		}
		
		//SET DEVICE VIEW
		function set_view ($in_mode = 'detect') {
			if($in_mode == 'm') {
				$appview = "mobile";
			}
			elseif($in_mode == 't') {
				$appview = "touch";
			}
			elseif($in_mode == 's') {
				$appview = "screen";
			}
			else {
			$appview = $this->get_view();
			}
			return $appview;		
		}
				
	}
	
	/*HOW TO USE
	 $device_view = new device_view();	
	 echo $view = $device_view->set_view();
	 */	
?>