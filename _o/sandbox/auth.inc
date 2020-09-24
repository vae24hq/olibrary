<?php
class oAuth {
	public static function IsLoggedIn(){
		if(!empty($_SESSION['IsLoggedIn'])){

		}
		else {
			return false;
		}
	}
}