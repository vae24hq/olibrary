<?php $mysqli = new mysqli("localhost", "root", "", "pypedb");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if (!$mysqli->query("SET a=1")) {
    printf("Errormessage: %s\n", $mysqli->error);
}

$result = mysqli_query('SELECT * WHERE 1=1');
if (!$result) {
    echo ('Invalid query: ' . mysqli_error());
}

/* close connection */
$mysqli->close();?>