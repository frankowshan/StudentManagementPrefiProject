<?php
$conn = mysqli_connect("localhost", "root", "", "studentdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['full_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (full_name, age, gender, course, email)
            VALUES ('$name', '$age', '$gender', '$course', '$email')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        
        $error = "Error: " . mysqli_error($conn);
    }
}
?>


