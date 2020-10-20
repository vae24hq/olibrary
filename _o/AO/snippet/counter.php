<?php
function counter($count='view'){
	if($count == 'view'){
		if(!isset($_SESSION)){session_start();}
		if(empty($_SESSION['count_view'])){$_SESSION['count_view'] = 1;}
		else {
			if(counter('reload') == 1){
				$_SESSION['count_view'] = $_SESSION['count_view'] + 1;
			}
		}
		return $_SESSION['count_view'];
	}

	else {
		static $count = 1; // "inner" count = 0 only the first run
    return $count++; // "inner" count + 1
  }
}

echo counter();
echo counter();
echo counter();