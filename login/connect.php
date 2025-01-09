<?php
$host = "localhost";
$user = "root";
$password = "root";
$db = "login";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    echo "Nem sikerült csatlakozni: ". $conn->connect_error;
}
?>