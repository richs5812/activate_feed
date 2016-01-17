<?php
$servername = "localhost";
$username = "detrojd9_313";
$password = "activate313";
$dbname = "detrojd9_activate313feed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>