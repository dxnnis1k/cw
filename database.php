<?php

$host = "localhost";
$dbname = "socnet_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) { 
    die("Connection error". $mysqli->connect_error);
}

return $mysqli;