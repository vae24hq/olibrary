<?php
function oRecord(){
	global $odao;
	// create new card record
	if($odao->uri=='record.new-card'){
		if(!$_POST){
			$mark['code'] = 'E100A1';
		}
		else {
			include oUTIL.'record.php';
			$mark = uRecordNewCard('puid','post');
			if(!empty($mark['data'])){
				$markData = $mark['data'];
				if(!empty($markData['isCreated']) && $markData['isCreated'] == 'yeap'){
					$histuri = '/record/add-history?card='.$markData['puid'];
					Utility::redirect($histuri);
				}
			}
		}
		return $mark;
	}
	// end - create new card record




	// update card record
	if($odao->uri=='record.update-card'){
		if(!$_POST){
			$isCard = record::isCard($_GET['card'], 'hospitalno');
				if($isCard === FALSE){
					$mark['code'] = 'E401F1';
					Utility::redirect('/record/cards');
				}
				else {
					$mark['code'] = 'E100A1';
					$mark['data'] = record::cardInfo('*', $_GET['card']);
				}
		}
		else {
			include oUTIL.'record.php';
			$mark = uRecordUpdateCard('puid','post', $_GET['card']);
			if(!empty($mark['data'])){
				$markData = $mark['data'];
				if(!empty($markData['isUpdated']) && $markData['isUpdated'] == 'yeap'){
					$link = '/record/card?card='.$markData['puid'];
					Utility::redirect($link);
				}
			}
		}
		return $mark;
	}
	// end - update card record


	// get patient's card
	if($odao->uri=='record.card' || $odao->uri=='record.add-history'){
		if(empty($_GET['card'])){
				$mark['code'] = 'E405F1';
			}
			else {
				$isCard = record::isCard($_GET['card'], 'hospitalno');
				if($isCard === FALSE){$mark['code'] = 'E401F1';}
				else {
					$mark['code'] = 'E200A1';
					$mark['data'] = record::cardInfo('*', $_GET['card']);
					$mark['history'] = record::cardHistory20('*', $_GET['card']);

					# start - ADD HISTORY TO CARD
					if(!empty($_POST)){
						$_POST = Utility::removePostBTN($_POST);
						if($odao->uri=='record.add-history'){
							include oUTIL.'record.php';
							if(uRecordNewHistory($_GET['card'])){
								Utility::redirect('/record/add-history?card='.$_GET['card']);
							}
						}
					}
					#end - ADD HISTORY TO CARD
				}

			}
		return $mark;
	}


	// create patient's treatment history
	if($odao->uri=='history-new'){
		if(empty($_GET['patient'])){
				$mark['code'] = 'E405F1';
				$mark['data'] = array('reason' => 'No patient was selected. <a href="patient-list">View Patients</a>');
			}
			else {
				$isCard = patient::isCard($_GET['patient'], 'hospitalno');
				if($isCard === FALSE){
					$mark['code'] = 'E401F1';
					$mark['data'] = array('reason' => 'The patient you selected was not found');
				}
				elseif(!$_POST){
					$mark['code'] = 'E200A1';
					$mark['data'] = array('reason' => 'Please complete with valid information');
				}
				else {
					include oUTIL.'patient.php';
					$mark = doPatientHistoryNew($_GET['patient']);
				}

			}
		return $mark;
	}





}
?>