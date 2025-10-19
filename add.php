<?php
$conn = mysqli_connect("localhost", "root", "", "studentdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


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











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(135deg, #6e48aa, #9d50bb, #6e48aa);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            padding: 20px;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px 35px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            width: 100%;
            max-width: 500px;
            position: relative;
            z-index: 10;
            animation: container-appear 0.8s ease-out forwards;
        }

        @keyframes container-appear {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #6e48aa;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.8rem;
            position: relative;
            padding-bottom: 10px;
        }

        h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #9d50bb, #6e48aa);
            border-radius: 3px;
        }

        .error {
            color: #dc3545;
            text-align: center;
            margin-bottom: 20px;
            padding: 12px;
            background: rgba(248, 215, 218, 0.8);
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            font-size: 0.95rem;
        }

        label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
            color: #555;
            font-size: 0.95rem;
        }

        input, select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.9);
        }

        input:focus, select:focus {
            border-color: #9d50bb;
            outline: none;
            box-shadow: 0 0 0 3px rgba(157, 80, 187, 0.1);
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #9d50bb, #6e48aa);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        button:active {
            transform: translateY(1px);
        }

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-top: 20px;
            text-decoration: none;
            color: #6e48aa;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #9d50bb;
        }

        @media (max-width: 580px) {
            .form-container {
                padding: 25px;
            }
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
            <label><i class="fas fa-user"></i> Full Name:</label>
            <input type="text" name="full_name" required>

            <label><i class="fas fa-birthday-cake"></i> Age:</label>
            <input type="number" name="age" required>

            <label><i class="fas fa-venus-mars"></i> Gender:</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label><i class="fas fa-book"></i> Course:</label>
            <input type="text" name="course" required>

            <label><i class="fas fa-envelope"></i> Email:</label>
            <input type="email" name="email" required>

            <button type="submit"><i class="fas fa-plus-circle"></i> Add Student</button>
        </form>
        <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Student List</a>
    </div>
</body>
</html>
