<?php
if($fuxRoute == 'app'){

	//BEGIN - CARDS (view card list & search)
	if($fuxURI == 'cards'){
		if(!empty($_GET['search'])){
			$oRecord = cardListSearch($_GET['search']);
		}
		elseif(!empty($_POST['search'])){
			$oRecord = cardListSearch($_POST['search']);
		}
		else {
			$oRecord = cardList(106);
		}
	}//END - CARDS (view card list & search)


	//BEGIN - CARD (view card)
	if($fuxURI == 'card'){
		if(!empty($_GET['card'])){
			$oRecord = cardView($_GET['card']);
		}
		else {
			$oRecord['code'] = 'E400A1';
		}
	}	//END - CARD (view card)


	//BEGIN - UPDATE CARD
	if($fuxURI == 'update-card'){
		if(!empty($_POST)){
			$oRecord = cardUpdate($_GET['card'], 'post');
			if(!empty($oRecord['data'])){
				oURL::redirect('update-card?card='.$_GET['card'].'&act=updated');
			}
		} elseif(!empty($_GET['card'])){
			$oRecord = cardView($_GET['card']);
			if(!empty($_GET['act']) && $_GET['act'] == 'updated'){$oRecord['code'] = 'E200A1';}
		}
		else {
			$oRecord['code'] = 'E400A1';
		}
	}//END - UPDATE CARD


	$oRecord = oHelper::response($oRecord, $fuxURI);
	include oDESIGN . 'main.php';

} //APP
?>


	