<?php
function Select($record='*', $table, $condition=''){
	global $dbconnect;
	$chore['query'] = 'SELECT '.$record.' FROM '.$table.' '.$condition;
	$chore['chore'] = mysql_query($chore['query'], $dbconnect) or die(mysql_error());
	$chore['row'] = mysql_fetch_assoc($chore['chore']);
	$chore['totalRows'] = mysql_num_rows($chore['chore']);
	if($chore['totalRows'] == 0){
		return FALSE;
	}
	else {
		if(!inString(',', $record) && $record != '*' && $chore['totalRows']<2){
			if(!empty($chore['row'][$record])){$chore = $chore['row'][$record];}
			else {$chore = NULL;}
		}
		return $chore;
	}
}


function Insert($input,$table){
	global $dbconnect;
	if(!is_array($input)){
		exit('$input must be an array of columns and value');
	}
	$query = 'INSERT INTO `'.$table.'` (';
	$length = count($input);
	$seprator['field'] = 1;
	$seprator['data'] = 1;

    //prepare fields i.e columns
	foreach($input as $field => $data){
		$query .='`'.$field.'`';
		if($seprator['field'] < $length){$query .= ', ';}
		$seprator['field']++;
	}
	$query .=') VALUES (';

    //prepare data i.e records
	foreach($input as $data){
		$query .="'".$data."'";
		if($seprator['data'] < $length){$query .= ', ';}
		$seprator['data']++;
	}
	$query .=')';
	$insert = mysql_query($query, $dbconnect) or die(mysql_error());

	return $insert;
}


function Update($input, $table, $condition=''){
	global $dbconnect;
	if(!is_array($input)){
		exit('$input must be an array of columns and value');
	}
	$query = 'UPDATE `'.$table.'` SET ';
	$length = count($input);
	$seprator = 1;

    //prepare fields & data
	foreach($input as $field => $data){
		$query .='`'.$field."` ='";
		$query .=$data."'";
		if($seprator < $length){$query .= ', ';}
		$seprator++;
	}
	$query .=' '.$condition;

	$update = mysql_query($query, $dbconnect) or die(mysql_error());
	return $update;
}


function Delete($table, $condition=''){
	global $dbconnect;
	if(!is_array($input)){
		exit('$input must be an array of columns and value');
	}
	$query = 'DELETE FROM `'.$table;
	$query .=' '.$condition;

	$delete = mysql_query($query, $dbconnect) or die(mysql_error());
	return $delete;
}

function Query($sql){
	global $dbconnect;
	$query = mysql_query($sql, $dbconnect) or die(mysql_error());
	return $query;
}

function InsertRecord($input, $table){
	$puid = randomize('puid');
	$suid = randomize('suid');
	$tuid = randomize('tuid');
	$time = randomize('time');
	$prep = array("EntryAuthor"=>"APP","EntryIS" => "okay",
		"PUID"=>$puid,"SUID"=>$suid,"TUID"=>$tuid,"EntryStamp"=>$time);
	$prep = array_merge($prep,$input);
	$chore = Insert($prep, $table);
	return $chore;
}
?>