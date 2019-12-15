<?php
$servername = "localhost";
$username = "id11939594_jaydeep";
$password = "suthar";
$dbname = "id11939594_mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>