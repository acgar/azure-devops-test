<?php

$serverName = "sqlsrv";
$connectionOptions = array(
    "Database" => "test",
    "Uid" => "sa",
    "PWD" => "jgRt64Slkjdfpoahk0121"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn) {
    echo "Connected!";
}
else {
    echo "Conexión no se pudo establecer.<br />";
    die(print_r(sqlsrv_errors(), true));
}