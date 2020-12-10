<?php
	//require_once("function.php");

	class loader {
		
		function get_set_url($inputurl = 'autoget') {
			if(isset($_GET['url']) && ($_GET['url'] != '')) {
				$urlvalue = $_GET['url'];
			}
			else { //no url set
				$urlvalue = "launch_application";
			}
			$urlvalue = strtolower($urlvalue);						
			return $urlvalue;
		}

		function get_module() {
			$urlvalue = $this->get_set_url();
			if (!$module = strstr($urlvalue, '_')) { // prints _application
				$module = $urlvalue;
			}
			else {
				$module = str_replace('_', '', $module); //removes the '_' and prints application	
			}			
			$module = str_replace('-', '_', $module); //replace the '-' with '_'
			
			if($module == '' || $module == '_') {
				$module = "application";
			}
			return $module;
		}
		
		function get_page() {
			$urlvalue = $this->get_set_url();
			$page = strstr($urlvalue, '_', true); // prints launch
			if($page == '') {
				$page = "index";
				}
			$page = str_replace('-', '_', $page); //replace the '-' with '_'
			return $page;			
		}	
			
		//set page title
		function set_title($set_page_title = '', $set_module_title = '') {
			if($set_page_title == '' && $set_module_title == '') {
				print_msg("You must provide a value for title");
				exit;
			}
			elseif($set_module_title == '') {
				return $this->return_title($set_page_title);
			}
			elseif($set_page_title == '') {
				return $this->return_title("",$set_module_title);
			}
			else {
				return $this->return_title($set_page_title, $set_module_title);					 
			}			
		}

		//get page title
		function get_title() {				
			$get_page_title = $this->get_page();
			$get_module_title = $this->get_module();
			return $this->return_title($get_page_title, $get_module_title);
		}

		
		//get location map
		function get_location() {				
			$get_page_title = $this->get_page();
			$get_module_title = $this->get_module();
			return $this->return_title($get_page_title, $get_module_title, "location");
		}		
		
		//returns page title
		function return_title($page_name = '', $module_name = '', $location_map = 'no') {			
			
			
			$app_name = 'System for Hotel Information Management'; 
			$app_acronym = 'SHIM';
			
			
			//clean page and module title
			$page_title = str_replace('_', ' ', $page_name); //replace the '_' with ' '
			$page_title = ucwords($page_title);
			$module_title = str_replace('_', ' ', $module_name); //replace the '_' with ' '
			$module_title = ucwords($module_title);
			
			//echo "<br />Page Name: " . $page_title . "<br />" . "Module Name: " .$module_title. "<br />"."File Name:".$page_name;
			
			if($location_map == 'no'){
				$title = '<title>';
				if($page_title == '' && $module_title == '') {
					$title .= '.::'."{$app_acronym}".' - '."{$app_name}";
				}
				elseif($module_title == '') {
					$title .= "{$page_title}".' :: '."{$app_acronym}".' - '."{$app_name}";
				}
				elseif($page_title == '') {
					$title .= "{$module_title}".' &raquo; '."{$app_acronym}".' - '."{$app_name}";
				}
				else {
				$title .= "{$module_title}".' &raquo; '."{$page_title}".' :: '."{$app_acronym}".' - '."{$app_name}";
				}
				$title .= '</title>';
			}
			else {
				 //set information for location map
				 if(isset($_GET['act'])){$activity = strtoupper($_GET['act']);}
				 if($module_title == '') {
					$title = "{$page_title}";
				}
				elseif($page_title == '') {
					$title = "{$module_title}";
				}
				elseif (isset($activity) && $activity != '') {
				$title = "{$module_title}".' &raquo; '."<small>{$activity}</small>".' :: '."{$page_title}";
				}
				else {
				$title = "{$module_title}".' &raquo; '."{$page_title}";
				}
				
			}
			return $title;
		}
		
		function load_page($inputPage = '', $inputModule = '') {
			if($inputPage == '') {
				$inputPage = $this->get_page();
			}
			
			if($inputModule == '') {
				$inputModule = $this->get_module();
			}
			
			$inputPage = $inputPage.".php";
			
			inc("../_{$inputModule}/{$inputPage}");
			return;		
		}
		
		
		
		function load_topMiniNav($inputNav = '') {
			if($inputNav == '') {
				$inputNav = $this->get_module();
				$inputPage = $this->get_page();
			}		
			$topMiniNav = "../_".$inputNav."/topMiniNav/".$inputPage.".php";
			     
				 
				 if($inputPage == 'accommodation') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/".$inputPage.".php";
				 }
				 elseif($inputPage == 'car_hire') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/".$inputPage.".php";
				 }
				 elseif($inputPage == 'gymnasium') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/".$inputPage.".php";
				 }
				 elseif($inputPage == 'confrence_hall') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/".$inputPage.".php";
				 }
				 elseif($inputPage == 'swimming_pool') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/".$inputPage.".php";
				 }
				 elseif($inputPage == 'car_hire_invoice') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/"."car_hire.php";
				 }
				 elseif($inputPage == 'car_hire_report') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/"."car_hire.php";
				 }
				 elseif($inputPage == 'gymnasium_report') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/"."gymnasium.php";
				 }
				 elseif($inputPage == 'confrence_hall_report') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/"."confrence_hall.php";
				 }
				 elseif($inputPage == 'swimming_pool_report') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/"."swimming_pool.php";		 
				 }
				 elseif($inputPage == 'accommodation_report') {
					 $topMiniNav = "../_".$inputNav."/topMiniNav/"."accommodation.php";		 
				 }
				 
				 
			if (file_exists($topMiniNav)) {		
			inc("$topMiniNav");
			}
			return;		
		}		
	}
	
	
	/*HOW TO USE
		$startloader = new loader();
			$page = $startloader->get_page();
			$module = $startloader->get_module();
			
			echo $startloader->get_title();
			$startloader->load_page();
	*/	
?>