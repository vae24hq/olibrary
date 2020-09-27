<?php
	function oCPassW($puid=''){
		if(!$_POST){
			$mark['code'] = 'E100A1';
		}
		else {
			if(empty($puid)){
				$mark['code'] = 'E501A1';
			} else {
				include oUTIL.'cpassw.php';
				$mark = uCPassW($puid, 'post');
				if(!empty($mark['data'])){
					Utility::redirect('/login?act=refresh', 4);
				}
			}
		}

		return $mark;
	}
?>