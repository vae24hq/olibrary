<?php
//-------------- LOGIN ---------------
function ologin($userid, $password){
	$sql = "SELECT `bind` FROM `user` WHERE '".$userid."' IN (`username`,`email`,`phone`) AND `password` = '".$password."' LIMIT 1";
	$db = db::connect();
	$statement = $db->prepare($sql);
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if(count($result) == 1 && is_array($result)){return $result[0];}
	elseif(is_array($result) && !empty($result)){return $result;}
	return FALSE;
}
?>