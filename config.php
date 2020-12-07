<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "peek_db";

$pdo = new PDO("mysql:dbname=".$database.";host=".$servername,$username,$password);