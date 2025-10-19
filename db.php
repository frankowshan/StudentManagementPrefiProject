<?php
$host = "localhost";
$user = "root";
$pass = "";

// Connect without selecting DB
$conn = new mysqli($host, $user, $pass);

// Create database if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS testdb");
$conn->select_db("testdb");

echo "Connected to database successfully!";
?>
