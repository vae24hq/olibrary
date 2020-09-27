<?php
/**XENQ™ is an evolving framework for rapid & efficient development of modem responsive applications and APIs using PHP, SQL, HTML, CSS, JS & derived/relative technology
 * Originator: Osawere™ O. Anthony - @iamodao - www.osawere.com  © March 2020 | Apache License
 * ============================================================================================
 * oInput ~ Summary of Class • DEPENDENCY»
 */
class oInput {
	private static $instance;

	/***** [PREVENTS MULTIPLE INSTANCES] *****/
	private function __construct(){return;}

	/***** [PREVENTS DUPLICATES] *****/
	private function __clone(){return;}

	/***** [RETURNS SINGLE INSTANCE] *****/
	public static function instantiate(){
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}

	/***** [RETURNS CLEAN STRING/ARRAY] *****/
	public static function clean($input, $tags_allowed=''){
		#To strip out javascript | HTML tags | style tags | multi-line comments
		$search = array(
			'@<script[^>]*?>.*?</script>@si',
			'@<[\/\!]*?[^<>]*?>@si',
			'@<style[^>]*?>.*?</style>@siU',
			'@<![\s\S]*?--[ \t\n\r]*>@'
		);
		if(!is_array($input)){
			$rez = '';
			$rez = preg_replace($search, '', $input);
			$rez = strip_tags($rez);
		}
		else {
			$rez = array();
			foreach ($input as $key => $value){
				$clean = preg_replace($search, '', $value);
				$clean = strip_tags($clean);
				$rez[$key] = $clean;
			}
		}

		return trim($rez);
	}

	/***** [REMOVE OR ADD SLASH TO STRING/ARRAY] *****/
	public static function slash($input, $task='iTrim'){
		if($task == 'iTrim'){
			if(!is_array($input)){
				$rez = '';
				$rez = stripslashes($input);
			}
			else {
				$rez = array();
				foreach ($input as $key => $value){
					$clean = stripslashes($value);
					$rez[$key] = $clean;
				}
			}
		}
		elseif($task == 'iAdd'){
			if(!is_array($input)){
				$rez = '';
				$rez = addslashes($input);
			}
			else {
				$rez = array();
				foreach ($input as $key => $value){
					$clean = addslashes($value);
					$rez[$key] = $clean;
				}
			}
		}
	}

	/***** [RETURNS DATA FROM POST/GET/REQUEST] *****/
	public static function method($res='iPost'){
		if(!empty($res)){
			if($res == 'iRequest' && !empty($_REQUEST)){$rez = $_REQUEST;}
			elseif($res == 'iGet' && !empty($_GET)){$rez = $_GET;}
			elseif($res == 'iPost' && !empty($_POST)){$rez = $_POST;}
		}
		if(!empty($rez)){return $rez;}
		return false;
	}
}
?>