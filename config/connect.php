<?php

$servername = "localhost";
$username = "root";
$password = "123";

// Create connection
$conn = mysqli_connect($servername, $username, $password ,"rsys");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





// Check connection



