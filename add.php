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

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO students (full_name, age, gender, course, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $age, $gender, $course, $email);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px; 
        }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        .error {
            color: #dc3545;
            text-align: center;
            margin-bottom: 15px;
            padding: 10px;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 6px;
        }
        label { font-weight: bold; margin-bottom: 6px; display: block; color: #444; }
        input, select {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        input:focus, select:focus { border-color: #007BFF; outline: none; }
        button {
            width: 100%;
            padding: 12px;
            background: #007BFF;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover { background: #0056b3; }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        .back-link:hover { text-decoration: underline; }
        @media (max-width: 480px) {
            .form-container { margin: 20px; padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Student</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="add.php">
            <label>Full Name:</label>
            <input type="text" name="full_name" required>

            <label>Age:</label>
            <input type="number" name="age" required>

            <label>Gender:</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label>Course:</label>
            <input type="text" name="course" required>

            <label>Email:</label>
            <input type="email" name="email" required>

            <button type="submit">Add Student</button>
        </form>
        <a href="index.php" class="back-link">Back to Student List</a>
    </div>
</body>
</html>
