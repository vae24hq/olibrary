<?php
	require_once 'setting.php';
	function index(){
		if(!empty($_GET['link'])){
			$link = $_GET['link'];

			if(inString($link, '-logout')){
				$_SESSION['email'] = '';
				$_SESSION['type'] = '';
				session::reset();
				$type = stringBefore($link, '-logout');
				header('Location: '.$type.'-login.php');
			}
		}
		elseif(isset($_SESSION['type']) && !empty($_SESSION['type'])){$type = $_SESSION['type'];}
		else {$type = 'admin';}
		header('Location: '.$type.'.php');
		exit();
	}

index();
?>