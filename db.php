<?php
$conn = new mysqli("localhost", "root", "","exp4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>