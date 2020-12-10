<?php
if(!empty($row['description'])){$row['description'] = nl2br(Utility::partOfText($row['description'], 50));}
if(!empty($row['fee'])){$row['fee'] = Utility::currencyToSymbol('naira').number_format($row['fee']);}


#ManageIT
$manageIT = '';
$manageIT .= '<a href="/record/add-history?card='.$row['record'].'">Add</a> | ';
$manageIT .= '<a href="/record/delete-history?history='.$row['puid'].'&card='.$row['record'].'" class="" ';
$manageIT .= 'onclick="return confirm(\'Are you sure you want to delete?\');">Delete</a> ';

if(!empty($manageIT)){$row['manageIT'] = $manageIT;}

$record[] = $row;