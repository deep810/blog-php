<?php
$conn = new mysqli("localhost", "root", "", "blog");
echo "Success";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




?>