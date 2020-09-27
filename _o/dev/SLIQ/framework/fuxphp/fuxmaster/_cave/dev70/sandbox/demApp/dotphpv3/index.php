<?php
require '.separator.php';
require __DIR__.DS.'dot'.DS.'.initializr.php';

// Launch & Run Application
global $MediPlex;
dot::runApp($MediPlex);
?>