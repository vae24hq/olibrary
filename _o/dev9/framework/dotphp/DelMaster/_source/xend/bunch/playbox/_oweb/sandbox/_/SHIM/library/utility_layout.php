<?php
	do_session();	
	//PROCESS DEVICE VIEW
	function process_view() {
		if(!isset($_REQUEST['v'])){	
			if(!isset($_SESSION['display_type'])){
				$device_view = new device_view();
				$display_type = $device_view->set_view();
				$_SESSION['display_type'] = $display_type;
			}
		}
		else {
			$user_choice = $_REQUEST['v'];			
			$device_view = new device_view();
			$display_type = $device_view->set_view($user_choice);
			$_SESSION['display_type'] = $display_type;						
		}	
		$device_display = $_SESSION['display_type'];
		return $device_display;
	}	
	//END PROCESS DEVICE VIEW

	//BEGIN GET LAYOUT
	function get_layout(){
		$value = process_view();
		inc('../ui/'.$value.'.php');
		return;			
	} //END GET LAYOUT
	
	
	
	function getContentArea(){
			$view = process_view();
			$loader = new loader();
			$module = $loader->get_module();
			$singleColumn = array("application");
			
			if(in_array($module,$singleColumn)) {
				$content_area = $view."_contentarea_single";
			}
			else {
				$content_area = $view."_contentarea";
			}
			
			inc('../ui/'.$content_area.'.php');
			return;				
	}
    ?>