<?php if(!isset($_SESSION)){session_start();}

include 'brux/config/db.php';

include 'brux/util/tool.php';
include 'brux/util/start.php';
include 'brux/util/db.php';

include 'brux/app/staff.php';
include 'brux/app/patient.php';
include 'brux/app/appointment.php';

startApp();
?>