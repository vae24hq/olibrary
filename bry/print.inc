<?php
/**AO™ Library is a vanilla and evolving framework for developing websites, applications, and APIs using web technology.
 * Originator: Anthony O. Osawere - @iamodao - www.osawere.com  © 2020 | Apache License
 * ============================================================================================
 * oPrint ~ Variable PRINT & DUMP • DEPENDENCY»
 */
class oPrint {
	#EXPORT • var_export
	public static function export($i, $capture=true){
		return '<pre><tt>'.var_export($i, $capture).'</tt></pre>';
	}





	#PRINTR • print_r
	public static function human($i, $capture=true){
		return print_r($i, $capture);
	}





	#DUMP • var_dump
	public static function dump($i){
		return var_dump($i);
	}





	#NEAT • Describe method
	public static function neat($i){
		$o = '';
		if(is_array($i)){$label = 'array';}
		elseif(is_bool($i) === true){$label = 'boolean';}
		if(is_array($i)){
			$o .= '<em style="color:gold;">is_'.$label.'</em>';
			$o .='<div style="margin: 0px 0 4px 6px; padding: 4px 6px 6px 12px; border-left: 1px dotted gold;">';
			foreach ($i as $key => $value){
				$o .= '<strong style="color:brown;">'.$key.': </strong>';
				if(is_bool($value) === true){
					$o .= '<em style="color:gold;">is_boolean</em>';
					if($value === true){$o .= ' → oTRUE<span><br>';}
					elseif($value === false){$o .= ' → oFALSE<span><br>';}
				}

				elseif(is_array($value)){
					$o .= self::neat($value);
				}
				elseif(is_object($value)){
					$o .= self::export($value);
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
			$o .= self::export($i);
		}
		else {
			$o .= self::human($i);
		}

		return $o;
	}





} #EndOfClass - oPrint