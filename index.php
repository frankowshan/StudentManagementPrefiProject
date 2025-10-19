<?php

$conn = mysqli_connect("localhost", "root", "", "studentdb");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
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
            padding: 30px;
            color: #333;
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

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            max-width: 1200px;
            margin: 0 auto;
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
            font-size: 2rem;
            position: relative;
            padding-bottom: 10px;
        }

        h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, #9d50bb, #6e48aa);
            border-radius: 3px;
        }

        .add-btn {
            display: inline-block;
            background: linear-gradient(to right, #9d50bb, #6e48aa);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
        }

        .add-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 15px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            text-align: left;
        }

        th {
            background: linear-gradient(to right, #6e48aa, #9d50bb);
            color: white;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: rgba(244, 248, 252, 0.5);
        }

        tr:hover {
            background-color: rgba(234, 243, 255, 0.8);
        }

        td a {
            text-decoration: none;
            margin: 0 5px;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        td a.edit {
            color: #6e48aa;
            background-color: rgba(110, 72, 170, 0.1);
        }

        td a.edit:hover {
            background-color: rgba(110, 72, 170, 0.2);
        }

        td a.delete {
            color: #e74c3c;
            background-color: rgba(231, 76, 60, 0.1);
        }

        td a.delete:hover {
            background-color: rgba(231, 76, 60, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-graduation-cap"></i> Student Information</h2>
        <a href="add.php" class="add-btn"><i class="fas fa-plus"></i> Add New Student</a>

        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Age</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['full_name'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= $row['course'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="edit"><i class="fas fa-edit"></i> Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Are you sure you want to delete this student?')"><i class="fas fa-trash-alt"></i> Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </table>
        
        <div style="margin-top: 30px; text-align: center; color: #6e48aa; font-size: 0.9rem;">
       
        </div>
    </div>
    
    <!-- Particles JS for visual effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('body');
            
            for (let i = 0; i < 50; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'fixed';
                particle.style.width = Math.random() * 5 + 'px';
                particle.style.height = particle.style.width;
                particle.style.background = 'rgba(255, 255, 255, 0.5)';
                particle.style.borderRadius = '50%';
                particle.style.top = Math.random() * 100 + 'vh';
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.pointerEvents = 'none';
                particle.style.zIndex = '-1';
                
                // Animation
                particle.style.animation = `float ${Math.random() * 10 + 10}s linear infinite`;
                
                container.appendChild(particle);
            }
            
            // Add keyframes for float animation
            const style = document.createElement('style');
            style.innerHTML = `
                @keyframes float {
                    0% {
                        transform: translateY(0) translateX(0);
                        opacity: 0;
                    }
                    50% {
                        opacity: 0.8;
                    }
                    100% {
                        transform: translateY(-100vh) translateX(${Math.random() * 100}px);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>
