<?php
/* ZERN™ Framework ~ an evolving, robust platform for rapid & efficient development of modem responsive applications and APIs;
 * Built by ODAO™ [www.osawere.com] using PHP, SQL, HTML, CSS, JS & derived technology.
 * © July 2019 | beta 1.0
 * ===================================================================================================================
 * Dependency » ~
 * PHP | data::zern ~ data handling
 */

class oData {

	//****** CLASS CONSTRUCT  ******//
	public function __construct($data=''){
		if(!empty($data)){$this->set($data);}
		return;
	}


	//****** SET/POPULATE OBJECT PROPERTY [INFORMATION] ******//
	public function set($data){
		if(is_array($data)){
			foreach ($data as $label => $value) {
				if (is_array($value)) { #label is an array
					foreach ($value as $sub_label => $sub_value) {
						$subLabel = $label . '_' . $sub_label;
						$this->$subLabel = $sub_value;
					}
				} #end - label is an array
				else { #label is not array
					$this->$label = $value;
				} #end - label is not array
			}
		}
	} //****** END ******//


	//****** FIND [oDATA] KEY IN ARRAY & RETURN AS [Array of Rows] $data[] ******//
	public function toRow(array $data)
	{
		$row = '';
		if(!empty($data)){
			if(isset($data['oDATA'])){$row = $data['oDATA'];}
		}
		return $row;
	} //****** END ******//


	//****** GET PROPERTY INFORMATION ******//
	public function obtain($property, $seprator=' ')
	{
		if(!empty($property)){
			if(!is_array($property) && isset($this->$property)){return $this->$property;}
			elseif(is_array($property)){
				$resolve = '';
				foreach ($property as $column){
					if(isset($this->$column)){$resolve .= $this->$column.$seprator;}
				}
				if(!empty($resolve)){
					$resolve = rtrim($resolve, $seprator);
					return $resolve;
				}
			}
		}
		return false;
	} //****** END ******//


	//****** GET COLUMN INFORMATION, from ARRAY ******//
	public function filter($column, array $data)
	{
		if(!empty($column) && !empty($data)){
			if(isset($data[$column])){return $data[$column];}
		}
		return false;
	} //****** END ******//
}
?>