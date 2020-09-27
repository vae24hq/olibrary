<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oPrint ~ Variable PRINT & DUMP • DEPENDENCY»
 */
class oPrint {
	private static $Instance;

	//CONSTRUCT • Prevents multiple instantiation
	private function __construct(){return;}


	//CLONE • Prevent duplicate
	private function __clone(){return;}


	//INSTANTIATE • Return fresh instance
	public static function Instantiate(){
		if(is_null(self::$Instance)){
			self::$Instance = new self();
		}
		return self::$Instance;
	}


	//EXPORT • var_export
	public static function Export($i, $capture=true){
		return '<pre><tt>'.var_export($i, $capture).'</tt></pre>';
	}


	//PRINT • print_r
	public static function Human($i, $capture=true){
		return print_r($i, $capture);
	}


	//PRINT • var_dump
	public static function Dump($i){
		return var_dump($i);
	}


	//NEAT • Describe method
	public static function Neat($i){
		$o = '';
		if(is_array($i)){$label = 'array';}
		elseif(is_bool($i) === true){$label = 'boolean';}

		if(is_array($i)){
			$o .= '<em style="color:gold;">is_'.$label.'</em>';
			$o .='<div style="margin: 0px 0 4px 6px; padding: 3px 5px 5px 10px; border-left: 1px dotted gold;">';
			foreach ($i as $key => $value){
				$o .= '<strong style="color:brown;">'.$key.': </strong>';
				if(is_bool($value) === true){
					$o .= '<em style="color:gold;">is_boolean</em>';
					if($value === true){$o .= ' → oTRUE<span><br>';}
					elseif($value === false){$o .= ' → oFALSE<span><br>';}
				}

				elseif(is_array($value)){
					$o .= self::Neat($value);
				}
				elseif(is_object($value)){
					$o .= self::Export($value);
				}
				else {
					$o .= $value.'<span><br>';
				}
			}
			$o .= '</div>';
		}
		elseif(is_bool($i) === true){
			$o .= '<em style="color:gold;">is_'.$label.'</em>';
			if($i === true){$o .= ' → oTRUE<span><br>';}
			elseif($i === false){$o .= ' → oFALSE<span><br>';}
		}
		elseif(is_object($i)){
			$o .= self::Export($i);
		}
		else {
			$o .= self::Human($i);
		}

		return $o;
	}


} // EndOfClass - oPrint