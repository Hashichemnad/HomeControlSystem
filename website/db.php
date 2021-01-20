<?php
/* Database connection settings */
$host = 'localhost';
$user = 'u919992291_iot';
$pass = 'pass1234';
$db = 'u919992291_iot';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$connect = mysqli_connect($host,$user,$pass,$db);
?>