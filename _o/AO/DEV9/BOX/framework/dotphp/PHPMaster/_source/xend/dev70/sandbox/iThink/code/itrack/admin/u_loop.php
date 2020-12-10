<?php
function trackLoop($data){
	foreach($data as $row){
    $row['manage'] = '';
    $row['manage'] .= '<a href="?link=process&action=view&id=';
    $row['manage'] .= $row['bind'].'" class="text-mute" title="view"><i class="fa fa-book fa-lg" aria-hidden="true"></i></a>';

    $row['manage'] .= '<a href="?link=process&action=update&id=';
    $row['manage'] .= $row['bind'].'" class="text-primary" title="update"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>';    
    
    $row['manage'] .= '<a href="?link=process&action=delete&id=';
    $row['manage'] .= $row['bind'].'" class="text-danger" title="delete"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>';
    
    $record[] = $row;
  }
	return $record;
}
?>