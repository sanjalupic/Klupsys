<?php
$servername = "localhost";
$username = "root";
$password = "mmJ0207.";
$dbname = "rezervacije";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>






















