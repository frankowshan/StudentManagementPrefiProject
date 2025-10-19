<?php
$host = "localhost";
$user = "root";
$pass = "";


$conn = new mysqli($host, $user, $pass);

$conn->query("CREATE DATABASE IF NOT EXISTS testdb");
$conn->select_db("testdb");

echo "Connected to database successfully!";
?>
