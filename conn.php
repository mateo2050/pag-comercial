<?php
$host = "localhost";
$dbusu = "root";
$dbpass = "";
$dbname = "usuarios";

$conn = mysqli_connect($host, $dbusu, $dbpass, $dbname);

if (!$conn) {
    die("Fallo en la conexión: " . mysqli_connect_error());
}

echo "";
?>
