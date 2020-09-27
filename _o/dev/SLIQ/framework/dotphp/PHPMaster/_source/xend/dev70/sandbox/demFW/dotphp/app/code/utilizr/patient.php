<?php
addFile('patient','modelizr');

function addpatient(){
	if(!empty($_POST)){
		$go = patient::create('cardno');
		dbug($go);
		if($go !== FALSE){
			oRedirect('patient-list?patient='.$go);
		}
	}
}
?>