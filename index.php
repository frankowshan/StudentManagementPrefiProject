<?php

$conn = mysqli_connect("localhost", "root", "", "studentdb");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

