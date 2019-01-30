<?php

// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "modules";

// connect to mysql database

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT head FROM module";

// for method 1

$result = mysqli_query($connect, $query);



?>
